<?php
/*
Plugin Name: Job Board Manager
Plugin URI: http://pickplugins.com
Description: Awesome Job Board Manager.
Version: 1.0.11
Author: pickplugins
Author URI: http://pickplugins.com
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

if ( ! defined('ABSPATH')) exit;  // if direct access 


class JobBoardManager{
	
	public function __construct(){
	
	define('job_bm_plugin_url', WP_PLUGIN_URL . '/' . plugin_basename( dirname(__FILE__) ) . '/' );
	define('job_bm_plugin_dir', plugin_dir_path( __FILE__ ) );
	define('job_bm_wp_url', 'https://wordpress.org/plugins/job-board-manager/' );
	define('job_bm_wp_reviews', 'http://wordpress.org/support/view/plugin-reviews/job-board-manager' );
	define('job_bm_pro_url','http://www.pickplugins.com/item/job-board-manager-create-job-site-for-wordpress/' );
	define('job_bm_demo_url', 'www.pickplugins.com/demo/job-board-manager/' );
	define('job_bm_conatct_url', 'http://www.pickplugins.com/contact/' );
	define('job_bm_qa_url', 'http://www.pickplugins.com/questions/' );
	define('job_bm_plugin_name', 'Job Board Manager' );
	define('job_bm_plugin_version', '1.0.11' );
	define('job_bm_customer_type', 'free' );	 // pro & free	
	define('job_bm_share_url', 'https://wordpress.org/plugins/job-board-manager/' );
	define('job_bm_tutorial_video_url', '//www.youtube.com/embed/Z-ZzJiyVNJ4?rel=0' );

	// Class
	require_once( plugin_dir_path( __FILE__ ) . 'includes/class-post-types.php');	
	require_once( plugin_dir_path( __FILE__ ) . 'includes/class-post-meta.php');	
	require_once( plugin_dir_path( __FILE__ ) . 'includes/class-shortcodes.php');	
	require_once( plugin_dir_path( __FILE__ ) . 'includes/class-functions.php');
	require_once( plugin_dir_path( __FILE__ ) . 'includes/class-settings.php');
	require_once( plugin_dir_path( __FILE__ ) . 'includes/class-emails.php');	
	
	//Front-end Forms Input Class
	require_once( plugin_dir_path( __FILE__ ) . 'includes/class-frontend-forms-input.php');	
	require_once( plugin_dir_path( __FILE__ ) . 'includes/class-frontend-form-edit-job.php');
	require_once( plugin_dir_path( __FILE__ ) . 'includes/class-frontend-form-new-job.php');
	require_once( plugin_dir_path( __FILE__ ) . 'includes/ajax-upload.php');	
				

	// Function's
	require_once( plugin_dir_path( __FILE__ ) . 'includes/functions.php');

	add_action( 'admin_enqueue_scripts', 'wp_enqueue_media' );
	add_action( 'wp_enqueue_scripts', array( $this, 'job_bm_front_scripts' ) );
	add_action( 'admin_enqueue_scripts', array( $this, 'job_bm_admin_scripts' ) );
	
	}
	
	public function job_bm_install(){
		
		do_action( 'job_bm_action_install' );
		}		
		
	public function job_bm_uninstall(){
		
		do_action( 'job_bm_action_uninstall' );
		}		
		
	public function job_bm_deactivation(){
		
		do_action( 'job_bm_action_deactivation' );
		}
		
	public function job_bm_front_scripts(){
		
		wp_enqueue_script('jquery');
		wp_enqueue_script('jquery-ui-datepicker');
		
		wp_enqueue_script('job_bm_front_js', plugins_url( '/js/scripts.js' , __FILE__ ) , array( 'jquery' ));
		
		wp_enqueue_script('plupload-handlers');
		wp_enqueue_script('job_file_uploader', plugins_url( '/js/ajax-upload.js' , __FILE__ ) , array( 'jquery' ));		
		
		
        wp_localize_script('job_file_uploader', 'job_file_uploader', array(
            'ajaxurl' => admin_url('admin-ajax.php'),
            'nonce' => wp_create_nonce('job_file_uploader'),
            'remove' => wp_create_nonce('job_file_upload_remove'),
            'number' => 1,
            'upload_enabled' => true,
            'confirmMsg' => __('Are you sure you want to delete this?'),
            'plupload' => array(
                'runtimes' => 'html5,flash,html4',
                'browse_button' => 'file-uploader',
                'container' => 'file-upload-container',
                'file_data_name' => 'job_file_uploader_file',
                'max_file_size' => '200000000b',
                'url' => admin_url('admin-ajax.php') . '?action=job_file_uploader&nonce=' . wp_create_nonce('job_file_upload_allow'),
                'flash_swf_url' => includes_url('js/plupload/plupload.flash.swf'),
                'filters' => array(array('title' => __('Allowed Files'), 'extensions' => 'gif,png')),
                'multipart' => true,
                'urlstream_upload' => true,
            )
        ));
		
		
		
		
		
		wp_localize_script( 'job_bm_front_js', 'job_bm_ajax', array( 'job_bm_ajaxurl' => admin_url( 'admin-ajax.php')));
		
		
		wp_enqueue_style('job_bm_style', job_bm_plugin_url.'css/style.css');
		wp_enqueue_style('frontend-forms-css', job_bm_plugin_url.'css/frontend-forms.css');
		wp_enqueue_style('font-awesome', job_bm_plugin_url.'css/font-awesome.css');
		wp_enqueue_style('jquery-ui', job_bm_plugin_url.'admin/css/jquery-ui.css');
		
		//ParaAdmin
		//wp_enqueue_style('ParaAdmin', job_bm_plugin_url.'ParaAdmin/css/ParaAdmin.css');
		wp_enqueue_script('ParaAdmin', plugins_url( 'ParaAdmin/js/ParaAdmin.js' , __FILE__ ) , array( 'jquery' ));	
		
			
			
		}

	public function job_bm_admin_scripts(){
		
		wp_enqueue_script('jquery');
		wp_enqueue_script('jquery-ui-core');
		wp_enqueue_script('jquery-ui-sortable');
		wp_enqueue_script('jquery-ui-datepicker');
		wp_enqueue_script('job_bm_admin_js', plugins_url( '/admin/js/scripts.js' , __FILE__ ) , array( 'jquery' ));
		wp_localize_script( 'job_bm_admin_js', 'job_bm_ajax', array( 'job_bm_ajaxurl' => admin_url( 'admin-ajax.php')));
		wp_enqueue_style('job_bm_admin_style', job_bm_plugin_url.'admin/css/style.css');
		wp_enqueue_style('jquery-ui', job_bm_plugin_url.'admin/css/jquery-ui.css');


		wp_enqueue_script('chosen.jquery', plugins_url( '/admin/js/chosen.jquery.js' , __FILE__ ) , array('jquery'));
		wp_enqueue_script('ajax-chosen', plugins_url( '/admin/js/ajax-chosen.js' , __FILE__ ) , array('jquery'));		
		
		wp_enqueue_style('chosen.min', job_bm_plugin_url.'admin/css/chosen.min.css');	
		
		
		//ParaAdmin
		wp_enqueue_style('ParaAdmin', job_bm_plugin_url.'ParaAdmin/css/ParaAdmin.css');		
		wp_enqueue_script('ParaAdmin', plugins_url( 'ParaAdmin/js/ParaAdmin.js' , __FILE__ ) , array( 'jquery' ));
		
		wp_enqueue_style( 'wp-color-picker' );
		wp_enqueue_script( 'job_bm_color_picker', plugins_url('/admin/js/color-picker.js', __FILE__ ), array( 'wp-color-picker' ), false, true );
		
		}
	
	
	
	
	}

new JobBoardManager();