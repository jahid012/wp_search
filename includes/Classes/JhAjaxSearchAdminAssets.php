<?php
namespace Jh_Ajax_Search\Classes;

class JhAjaxSearchAdminAssets
{
    public function __construct()
    {
        add_action('admin_enqueue_scripts', [ $this, 'setup_jh_admin_scripts' ]);
    }

    public function setup_jh_admin_scripts(){
        wp_enqueue_style('jh-admin-style', JH_SEARCH_ASSETS.'/admin/css/jh-admin-style.css', false, JH_SEARCH_VERSION);
        
        
        wp_enqueue_script('jh-admin-script', JH_SEARCH_ASSETS.'/admin/js/jh-admin-script.js', false, JH_SEARCH_VERSION);

    }
}