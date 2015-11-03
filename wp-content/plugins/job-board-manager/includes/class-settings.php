<?php

/*
* @Author 		ParaTheme
* @Folder	 	job-board-manager/includes
* Copyright: 	2015 ParaTheme
*/

if ( ! defined('ABSPATH')) exit;  // if direct access 


class class_job_bm_settings  {
	
	
    public function __construct(){

		add_action( 'admin_menu', array( $this, 'admin_menu' ), 12 );
    }
	

	
	
	public function admin_menu() {
		
		add_submenu_page( 'edit.php?post_type=job', __( 'Settings', 'job_bm' ), __( 'Settings', 'job_bm' ), 'manage_options', 'job_bm-settings', array( $this, 'settings_page' ) );
		add_submenu_page( 'edit.php?post_type=job', __( 'Help', 'job_bm' ), __( 'Help', 'job_bm' ), 'manage_options', 'job_bm-help', array( $this, 'help_page' ) );		
		
		
		add_submenu_page( 'edit.php?post_type=job', __( 'Addons', 'job_bm' ), __( 'Addons', 'job_bm' ), 'manage_options', 'job_bm_addons', array( $this, 'addons_page' ) );
		
		add_submenu_page( 'edit.php?post_type=job', __( 'Emails Templates', 'job_bm' ), __( 'Emails Templates', 'job_bm' ), 'manage_options', 'emails_templates', array( $this, 'emails_templates' ) );		
		
		
		
		do_action( 'job_bm_action_admin_menus' );
		
	}
	
	public function settings_page(){
		
		include( 'menu/settings.php' );
		}
	
	public function help_page(){
		
		include( 'menu/help.php' );
		}	
	
	

	public function addons_page(){
		
		include( 'menu/addons.php' );
		}
	
	
	public function emails_templates(){
		
		include( 'menu/emails-templates.php' );
		}	
	
	
	

	}


new class_job_bm_settings();

