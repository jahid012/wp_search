<?php
/**
 * Plugin Name:       JH AJAX SEARCH
 * Plugin URI:        https://jahdi-hasan.xyz/jh-ajax-search
 * Description:       This is a wordpress ajax search plugin
 * Version:           1.0.0
 * Author:            Jahid Hasan
 * Author URI:        https://jahid-hasan.xyz/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       jh-ajax
 * Domain Path:       /languages
 */

// If this file is called directly, abort.

use Elementor\Plugin;

if ( ! defined( 'WPINC' ) ) {
    die;
}
require_once 'autoload.php';

final class Jh_Ajax_Search_Plugin
{
    const version = '1.0.0';

    /*
     * Class Constructor
     */
    private function __construct()
    {
        $this->define_constants();

        add_action('plugins_loaded', [$this, 'init_plugin']);

    }

    /**
     * Initializes a singleton instance
     *
     * @return \Ajax_Search_Addons
     */
    public static function init()
    {
        static $instance = false;
        if (!$instance) {
            $instance = new self();
        }

        return $instance;
    }

    /**
     * Define the required plugin constants
     *
     * @return void
     */
    public function define_constants()
    {
        define('JH_SEARCH_TEXT_DOMAIN', 'jh-ajax');
        define('JH_SEARCH_VERSION', self::version);
        define('JH_SEARCH_FILE', plugin_basename(__FILE__));
        define('JH_SEARCH_PATH', __DIR__);
        define('JH_SEARCH_URL', plugins_url('', JH_SEARCH_FILE));
        define('JH_SEARCH_ASSETS', JH_SEARCH_URL . '/assets');
    }

    /*
     * Initializes the plugins
     */
    public function init_plugin()
    {
        $this->init_hooks();
        new \Jh_Ajax_Search\Classes\JhAjaxSearchAdmin();
        if (is_admin()) {
        } else {
            new \Jh_Ajax_Search\Classes\JhAjaxSearchFrontend();
        }

    }

    /*
     * Init all Hooks
     */
    public function init_hooks()
    {
        add_action('admin_notices', [$this, 'sample_admin_notice__success']);

    }
    
    /*
     * Notice Board Message
     */
    function sample_admin_notice__success()
    {

    }
}
/**
 * Initializes the plugin
 */
 Jh_Ajax_Search_Plugin::init();

