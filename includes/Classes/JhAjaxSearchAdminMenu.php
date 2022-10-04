<?php


namespace Jh_Ajax_Search\Classes;



class JhAjaxSearchAdminMenu
{
    function __construct()
    {
        add_action('admin_menu', [$this, 'jh_search_admin_menu']);

        add_action( 'wp_ajax_exad_ajax_save_jh_search_setting', [$this, 'ajax_save_jh_search_setting_function'] );
    }
    /*
     * Return admin menu
     */
    public function jh_search_admin_menu(){
        add_menu_page(
            __('Jh Ajax Search', JH_SEARCH_TEXT_DOMAIN),
            __('Jh Ajax Search', JH_SEARCH_TEXT_DOMAIN),
            'manage_options',
            'js-search',
            [$this, 'jh_search_admin_page'],
            'dashicons-search',
            '59'
        );
    }
    /*
     * Return admin menu page content
     */
    function jh_search_admin_page(){
       new JhAjaxSettingsPage();
        ?>
            <h1>Welcome to the settings</h1>
        <?php
    }


}
