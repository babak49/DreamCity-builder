<?php
$_css = array(
    'main'          =>  $this->registry()->config['client_css'].'/main.css',
    'boilerplate'   =>  $this->registry()->config['client_css'].'/boilerplate.css',
    'green'         =>  $this->registry()->config['client_css'].'/green.css',
    'ie8'           =>  $this->registry()->config['client_css'].'/ie8.css',
    'ie9'           =>  $this->registry()->config['client_css'].'/ie9.css',
    'mozilla_reset' =>  $this->registry()->config['client_css'].'/mozilla_reset.css',
    'chosen'        =>  $this->registry()->config['library_path'].'/chosen/chosen.css',
    'qtip2'         =>  $this->registry()->config['library_path'].'/qTip2/jquery.qtip.min.css',
    'fancybox'      =>  $this->registry()->config['library_path'].'/fancybox/jquery.fancybox.css',
    'jqueryui'      =>  $this->registry()->config['library_path'].'/jquery-ui/jquery-ui-1.8.23.custom.css',
);

$_js = array(
    'en'            =>  '.config/i18n/messages.en.js',
    'chosen'        =>  $this->registry()->config['library_path'].'/chosen/chosen.min.js',
    'fancybox'      =>  $this->registry()->config['library_path'].'/fancybox/jquery.fancybox.js',
    'jqueryui'      =>  $this->registry()->config['library_path'].'/jquery-ui/jquery-ui-1.8.23.custom.min.js',
    'jquery'        =>  $this->registry()->config['library_path'].'/DRM/jquery-1.8.3.min.js',
    'qtip2'         =>  $this->registry()->config['library_path'].'/qTip2/jquery.qtip.min.js',
    'drm'           =>  $this->registry()->config['library_path'].'/DRM/drm.js',
    'helpers'       =>  $this->registry()->config['library_path'].'/DRM/drm-helpers.js',
    'yepnope'       =>  $this->registry()->config['library_path'].'/DRM/yepnope.js',
    'validate'      =>  $this->registry()->config['library_path'].'/DRM/validator.js',
);