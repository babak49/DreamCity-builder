<?php
class Router extends DRM {
    private $path;
    private $url;
    
    function __construct() {
        $this->url = isset($_SERVER['QUERY_STRING']) ? strtolower($_SERVER['QUERY_STRING']) : 'index';
        $this->clean_up();
        $this->load();
    }
    
    /*
     *  @param create array from str url and if last element is empty put "index"
     *  @return none;
     */
    
    private function parse_url () {
        $path = explode('/', $this->path);

        foreach ($path as $key => $value){
            if(empty($value)) {
                unset($path[$key]);
            };
        }
        $this->path = isset($path) ? $path : array('');
    }
    
    /*
     *   @param clean_up - check is url clean.
     *   @return checked url or if not cut bed simbols and redirect to clean url
     */
    
    private function clean_up() {
        $array = array('"'  => '',
                       '\\' => '',
                       '\'' => '',
                       '@'  => '',
                       '$'  => '',
                       '^'  => '',
                       '#'  => '',
                       '%'  => '',
                       '?'  => '',
                       ' '  => '',
                       '..' => '',
                       '<'  => '',
                       '>'  => '',
                       '&'  => '');
        $this->path = strtr($this->url,$array+array('href='=>''));
        $this->url!==strtr($this->url,$array) ? $this->reload_page() : '';
    }
    
    /*
     * @param - using whith clean_up function for refresh page
     * @return - none; 
     */
    
    private function reload_page() {
        //header('Location: '.BASE_HREF.$this->path);
    }
    
    /*
     *  @param - load controller
     *  @return - none;
     */
    
    private function load() {
        set_include_path(PATH);

        $this->parse_url();
         if (!isset($this->path[0]) || $this->path[0] == $this->registry()->config['main_page']) {
               $this->path[0] = $this->registry()->config['main_page'];
         };
        if(isset($this->registry()->routes[$this->path[0]])) {
            $this->path = $this->registry()->routes[$this->path[0]];
            $this->parse_url();
        };

        $PATH = '/controllers/Controller_'.$this->path[0].'.php';
        if(is_file(APP_PATH.$PATH) || is_file(SYS_PATH.$PATH)) {
            $class = 'Controller_'.$this->path[0];
            if(is_file(APP_PATH.$PATH)) {
                $PATH = APP_PATH.$PATH;
                $this->registry()->PATH = APP_PATH;
            } else {
                $PATH = SYS_PATH.$PATH;
                $this->registry()->PATH = SYS_PATH;
            };
            
            include_once($PATH);
        } else {
            $class = 'request';
            include_once(SYS_PATH.'/controllers/request.php');
            Logger::error('Class ['.$this->path[0].'] not isset');  
        };

        $controller = new $class();
        if(!isset($this->path[1]) || is_callable(array($controller, $this->path[1])) == false) {
            $action = 'index';
            if(is_callable(array($controller, $action)) == false && $class!=='request') {
              Logger::error('Method ['.$action.'] not isset in file ['.$PATH.']');  
            };
            $this->registry()->controller = $this->path[0].'/';
            unset($this->path[0]);
        } else {
            $action = $this->path[1];
            $this->registry()->controller = $this->path[0].'/'.$this->path[1].'/';
            unset($this->path[0], $this->path[1]);
        };
        $this->registry()->values = $this->path;
        
        $controller->$action();
    }
    
    function __destruct() {
        unset($this->path);
    }
}