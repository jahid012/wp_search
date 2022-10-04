<?php
namespace Jh_Ajax_Search\Classes;


/**
 * Class JhAjaxSettingsPage.
 *
 * @since 1.7.0
 */
class JhAjaxSettingsPage {

	public function settings_page(){
		include __DIR__.'../../Templates/Admin/Settings.php';
		
	}

	public function handle_form(){
		if(!isset($_POST['submit-settings'])){
			return;
		}

		if(!wp_verify_nonce($_POST['_wpnonce'],'save_settings') ){
			wp_die();
		}

		if(!current_user_can('manage_options') ){
			wp_die();
		}

		var_dump($_POST);
	}

	
}
