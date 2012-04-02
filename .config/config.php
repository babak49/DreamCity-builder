<?php
$config = array(/* main settings */
                'system_path'       =>  'DRM',
                'library_path'	    =>  'library',
                'app_path'	    =>	'interedinfo',
                'main_page'         =>  'index',
                'encoding'          =>  'UTF-8',
                'main_template'     =>  'main.tpl',
                'main_content_value'=>  'content',      
                'base_href'         =>  'http://interedinfo.work/',
                'time_zone'         =>  'Europe/Kiev',
                'statistic'         =>  true,
                'default_i18n'      =>  'en',
                'all_i18n'          =>  array('all', 'en', 'pl'),      
                'names_i18n'        =>  array('All', 'English', 'Polska'),      
                'title'             =>  'Interedinfo inc',
                'comment'           =>  'true',
                'ajax'              =>  false,
                
                /* default values for html */
                'input_size'        =>  40,
                'input_max_chars'   =>  1000,
                'textarea_cols'     =>  60,
                'textarea_rows'     =>  10,
                'error_class'       =>  'error',
                
                /* db settings */
                'db_host'           =>  'localhost',
                'db_user'           =>  'root',
                'db_password'       =>  'root',
                'db_table'          =>  'engine',
                'db_encoding'       =>  'utf8',
                
                /*paginator */
                'on_page'           =>  5,
                'paginator_class'   =>  'class="paginator"',
                'active_link'       =>  'class="active_link"',
                'paginator_link'    =>  'class="link"'
        );

define('BASE_HREF', 'http://engine.drm/');
