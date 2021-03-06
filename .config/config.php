<?php
$config = array(/* main settings */
        'system_path'       =>  'DRM',
        'library_path'	    =>  'library',
        'cms_path'	        =>  'cms',
        'main_page'         =>  'index',
        'encoding'          =>  'UTF-8',
        'app_path'          =>  'web',
        'files_path'        =>  'web/uploads',
        'description'       =>  '{DRM} - make development easiest',
        'keyword'           =>  '{DRM} - make development easiest',
        'generator'         =>  '{DRM}.v.0.9.6',
        'generator_version' =>  'v.0.9.6',
        'main_template'     =>  'main.tpl',
        'main_content_value'=>  'content',
        'base_href'         =>  'http://engine.drm/',
        'time_zone'         =>  'Europe/Kiev',
        'statistic'         =>  true,
        'default_i18n'      =>  'en',
        'all_i18n'          =>  array('all', 'en', 'ua'),
        'names_i18n'        =>  array('All', 'English', 'Українська'),
        'title'             =>  '{DRM} - make development easiest',
        'comment'           =>  'true',
        'ajax'              =>  false,
        'env'               =>  'test', //if production than all css and js will be minimized production
        'client_css'        =>  'web/theme/css',
        'enable'            =>  0, // 0 - site enabled, 1 site disabled
        'log_error_to_file' =>  false,
        'log_changes_to_db' =>  false,
        'copyright'         =>  'Copyright &copy; 2011 - 2012 Bogdan Bodnaruk. All Rights Reserved. ',

        /* Using when DB not connected */
        'admin_login'       =>  'admin',
        'admin_pass'        =>  '21232f297a57a5a743894a0e4a801fc3',

        'zip_password'      =>  '123',

        /* default values for html */
        'input_size'        =>  25,
        'input_max_chars'   =>  1000,
        'textarea_cols'     =>  25,
        'textarea_rows'     =>  5,
        'success_class'     =>  'drm-success',
        'warning_class'     =>  'drm-warning',
        'error_class'       =>  'drm-error',
        'valid_class'       =>  'drm-valide',
        'active_class'      =>  'drm-active',
        
        /* db settings */
        'db_host'           =>  'localhost',
        'db_user'           =>  'root',
        'db_password'       =>  'root',
        'db_table'          =>  'engine2',
        'db_encoding'       =>  'utf8',
        'DB-connected'      =>  false,
        
        /*paginator */
        'on_page'           =>  10,
        'paginator_class'   =>  'class="paginator"',
        'active_link'       =>  'class="active_link"',
        'paginator_link'    =>  'class="link"',

        /*features*/
        'min_write_bundles' =>  false,
        'min_use_cache'     =>  false,
);
$config['theme_img'] = $config['app_path'].'/theme/images/';