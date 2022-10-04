<?php
namespace Jh_Ajax_Search\Classes;


/**
 * Class JhAjaxSettingsPage.
 *
 * @since 1.7.0
 */
class JhAjaxSettingsPage {

	public function __construct()
    {
        $this->init_admin();
    }

    public function init_admin(){
        add_action('admin_init', [$this,'admin_settings']);
        
    }

	public function admin_settings(){

register_setting('general','option_1', 'esc_attr');
			register_setting('general','option_2', 'esc_attr');
			
			add_settings_section(  
				'my_settings_section', // Section ID 
				'My Options Title', // Section Title
				'my_section_options_callback', // Callback
				'general' // What Page?  This makes the section show up on the General Settings Page
			);
			
			add_settings_field( // Option 1
				'option_1', // Option ID
				'Option 1', // Label
				'my_textbox_callback', // !important - This is where the args go!
				'general', // Page it will be displayed (General Settings)
				'my_settings_section', // Name of our section
				array( // The $args
					'option_1' // Should match Option ID
				)  
			); 
			
			add_settings_field( // Option 2
				'option_2', // Option ID
				'Option 2', // Label
				'my_textbox_callback', // !important - This is where the args go!
				'general', // Page it will be displayed
				'my_settings_section', // Name of our section (General Settings)
				array( // The $args
					'option_2' // Should match Option ID
				)  
			); 
			
			

    }
	function my_section_options_callback() { // Section Callback
		echo '<p>A little message on editing info</p>';  
	}
	
	function my_textbox_callback($args) {  // Textbox Callback
		$option = get_option($args[0]);
		echo '<input type="text" id="'. $args[0] .'" name="'. $args[0] .'" value="' . $option . '" />';
	}

	
}
