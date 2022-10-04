<?php
namespace Jh_Ajax_Search\Classes;

class JhAjaxSearchFrontendAssets

{
    public function __construct()
    {
        add_action('wp_enqueue_scripts', [ $this, 'setup_jh_frontend_scripts' ]);
    }

    public function setup_jh_frontend_scripts(){

        wp_enqueue_style('jh-style', JH_SEARCH_ASSETS.'/css/style.css', false, JH_SEARCH_VERSION);

        wp_enqueue_script('jh-main-script', JH_SEARCH_ASSETS.'/js/main.js',array( 'jquery' ),JH_SEARCH_VERSION,true);
        wp_localize_script('jh-main-script','jhAjax', array('jhajaxurl' => home_url( '/' ),));
    }
}