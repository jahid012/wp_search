<?php
namespace Jh_Ajax_Search\Classes;


use Elementor\Plugin;

class JhAjaxSearchAdmin
{
    public function __construct()
    {
        $this->init_admin();

    }

    public function init_admin(){
        new JhAjaxSearchAdminAssets();
        new JhAjaxSearchAdminMenu();

        add_action('admin_init', [$this,'form_handler']);
        add_action('elementor/init', [$this, 'eg_elementor_init']);
        add_action('elementor/widgets/widgets_registered', [$this, 'register_elements']);
        
    }

    public function eg_elementor_init(){

        Plugin::instance()->elements_manager->add_category(
            'eg-addons-elementor',
            [
                'title'  => esc_html__( 'EG Addons', 'eg-addons-for-elementor'),
                'icon' => 'fa fa-th-list'
            ]
        );

    }

    public function form_handler(){

        $settings = new JhAjaxSettingsPage();
        $settings->handle_form();

    }
    
    public function register_elements(){

        //require_once EG_ADDONS_PATH . '/includes/Elements/Info_Box.php';

    }

}