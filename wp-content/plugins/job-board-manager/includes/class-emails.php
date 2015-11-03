<?php

/*
* @Author 		ParaTheme
* Copyright: 	2015 ParaTheme
*/

if ( ! defined('ABSPATH')) exit;  // if direct access 

class class_job_bm_emails{
	
	public function __construct(){

		//add_action('add_meta_boxes', array($this, 'meta_boxes_job'));
		//add_action('save_post', array($this, 'meta_boxes_job_save'));

		}
		

	public function job_bm_email_templates_data(){
		
		require_once( 'emails-templates-part/new_job_submitted.php');	
		require_once( 'emails-templates-part/new_job_published.php');			
		
		$templates_data = array(
							
			'new_job_submitted'=>array(	'name'=>'New Job Submitted',
										'subject'=>'New Job Submitted - {site_url}',
										'html'=>$templates_data_html['new_job_submitted'],
						
									),
									
			'new_job_published'=>array(	'name'=>'New Job Published',
										'subject'=>'New Job Published - {site_url}',
										'html'=>$templates_data_html['new_job_published'],
						
									),									
			

		);
		
		$templates_data = apply_filters('job_bm_filters_email_templates_data', $templates_data);
		
		return $templates_data;

		}
		


	public function job_bm_email_templates_parameters(){
		
		
			$parameters['site_parameter'] = array(
												'title'=>'Site Parameters',
												'parameters'=>array('{site_name}','{site_description}','{site_url}','{site_logo_url}'),										
												);
												
			$parameters['user_parameter'] = array(
												'title'=>'Users Parameters',
												'parameters'=>array('{user_name}','{user_avatar}','{user_email}'),										
												);	
												
			$parameters['job_parameter'] = array(
												'title'=>'Job Parameters',
												'parameters'=>array('{job_id}','{job_edit_url}','{job_title}','{job_shortcontent}','{job_url}'),										
												);										
																					
			$parameters['job_application'] = array(
												'title'=>'Job application',
												'parameters'=>array('{appliction_content}','{appliction_url}'),										
												);																
		
												
			$parameters = apply_filters('job_bm_emails_templates_parameters',$parameters);
		
		
			return $parameters;
		
		}
	
		
		
		
		
		

	}
	
new class_job_bm_emails();