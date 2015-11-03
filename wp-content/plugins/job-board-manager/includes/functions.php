<?php
/*
* @Author 		ParaTheme
* Copyright: 	2015 ParaTheme
*/

if ( ! defined('ABSPATH')) exit;  // if direct access 
	
	
	

	
	
	
function job_bm_sanitize_data($input_type, $input_values){

	if($input_type=='text' or $input_type=='textarea' or $input_type=='select' or $input_type=='radio'){
		
		$input_values = sanitize_text_field($input_values);
		}
	elseif($input_type=='file'){
		
		$input_values = esc_url($input_values);
		}
	else{
		
		$input_values = $input_values;
		}	

	return $input_values;
	}
	
	
	
	
	function job_bm_page_list_id()
		{	
			$wp_query = new WP_Query(
				array (
					'post_type' => 'page',
					'posts_per_page' => -1,
					) );
					
			$pages_ids = array();
					
			if ( $wp_query->have_posts() ) :
			
	
			while ( $wp_query->have_posts() ) : $wp_query->the_post();
			
			$pages_ids[get_the_ID()] = get_the_title();
			
			
			endwhile;
			wp_reset_query();
			endif;
			
			
			return $pages_ids;
		
		}
	
	
	
	
	
function job_bm_email_job_published($job_ID, $post){
	
	$job_data =get_post($job_ID);
	global $current_user;
		$vars = array(
			'{site_name}'=> get_bloginfo('name'),
			'{site_description}' => get_bloginfo('description'),
			'{site_url}' => get_bloginfo('url'),						
			'{site_logo_url}' => get_option('job_bm_logo_url'),
		  
			'{user_name}' => $current_user->display_name,						  
			'{user_avatar}' => get_avatar( $userid, 60 ),
			'{user_email}' => '',
										
			'{job_title}'  => $job_data->post_title,						  			
			'{job_url}'  => get_permalink($job_ID),
			'{job_edit_url}'  => get_admin_url().'post.php?post='.$job_ID.'&action=edit',						
			'{job_id}'  => $job_ID,
			'{job_content}'  => $job_data->post_content,												

		);
	
		$class_job_bm_emails = new class_job_bm_emails();
		$job_bm_email_templates_data = $class_job_bm_emails->job_bm_email_templates_data();
	
		$email_body = strtr($job_bm_email_templates_data['new_job_published']['html'], $vars);
		$email_subject =strtr($job_bm_email_templates_data['new_job_published']['subject'], $vars);
		
		$headers = "";
		$headers .= "From: ".get_option('job_bm_from_email')." \r\n";
		$headers .= "MIME-Version: 1.0\r\n";
		$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
		
		wp_mail(get_option('admin_email'), $email_subject, $email_body, $headers);
	
	
	
	}

	// here is action hook
	add_action(  'publish_job',  'job_bm_email_job_published');




	function job_bm_get_date()
		{	
			$gmt_offset = get_option('gmt_offset');
			$wpls_datetime = date('Y-m-d', strtotime('+'.$gmt_offset.' hour'));
			
			return $wpls_datetime;
		
		}


/*### Extend job meta options sample ###*/


function job_list_item_start_extra($content=''){
	

	$content = '<br >Hello<br >';


	return $content;
		
	}

//add_filter('job_list_item_start','job_list_item_start_extra');
//add_filter('job_list_item_end','job_list_item_start_extra');











/*### Extend job meta options sample ###*/
/*



















// ############### Filter for meta_options ###################


function job_bm_filters_job_meta_options_extra($options){
	
	$options['Company extra'] = array(
								'job_bm_location_extra'=>array(
									'css_class'=>'location_extra',					
									'title'=>'Location _extra',
									'option_details'=>'Job Location _extra',						
									'input_type'=>'text', // text, radio, checkbox, select, 
									'input_values'=>'Dhaka_extra', // could be array
									),
								);
	return $options;
		
	}

add_filter('job_bm_filters_job_meta_options','job_bm_filters_job_meta_options_extra');










// ############### Filter for settings_options ###################

function job_bm_settings_options_extra($options){
	
	$options['Company extra'] = array(
								'job_bm_location_extra'=>array(
									'css_class'=>'location_extra',					
									'title'=>'Location _extra',
									'option_details'=>'Job Location _extra',						
									'input_type'=>'text', // text, radio, checkbox, select, 
									'input_values'=>'Dhaka_extra', // could be array
									),
								);
	return $options;
		
	}

add_filter('job_bm_settings_options','job_bm_settings_options_extra');









// ############### Filter for job_type ###################

function job_bm_filters_job_type_extra($job_type){
	
	$job_type_new = array('freelance1'=>'Freelance 1','full-time1'=>'Full Time 1');
	$job_type = array_merge($job_type,$job_type_new);
	
	return $job_type;
		
	}
add_filter('job_bm_filters_job_type','job_bm_filters_job_type_extra');





// ############### Filter for job_bm_filters_apply_method ###################

function job_bm_filters_apply_method_extra($apply_method){
	
	$apply_method_new = array('method_1'=>'Method 2','method_1'=>'Method 2');
	$apply_method = array_merge($apply_method,$apply_method_new);
	
	return $apply_method;
		
	}
add_filter('job_bm_filters_apply_method','job_bm_filters_apply_method_extra');




// ############### Filter for visitors_role ###################

function job_bm_filters_visitors_extra($visitors_role){
	
	$visitors_role_new = array('freelance1'=>'Freelance 1','full-time1'=>'Full Time 1');
	$visitors_role = array_merge($visitors_role,$visitors_role_new);
	
	return $visitors_role;
		
	}
add_filter('job_bm_filters_visitors','job_bm_filters_visitors_extra');







// ############### Filter for salary_type ###################

function job_bm_filters_salary_type_extra($salary_type){
	
	$salary_type_new = array('negotiable1'=>'Negotiable 1','fixed1'=>'Fixed 1','min-max1'=>'Min-Max 1');
	$salary_type = array_merge($salary_type,$salary_type_new);
	
	return $salary_type;
		
	}
add_filter('job_bm_filters_salary_type','job_bm_filters_salary_type_extra');







// ############### Action for Admin Menu ###################

function job_bm_action_admin_menus_extra(){
	
	add_submenu_page( 'edit.php?post_type=job', __( 'Settings 2', 'job_bm' ), __( 'Settings 2', 'job_bm' ), 'manage_options', 'job_bm-settings2', 'settings_page2' );
	
	}

add_action('job_bm_action_admin_menus','job_bm_action_admin_menus_extra');

function settings_page2(){
	
	include( 'menu/settings2.php' );
	
	}

// #############################




// ############### Filters for apply_method_ ###################



function job_bm_filters_apply_method_extra($apply_method){
	
	$apply_method_new = array('method_1'=>'Method 1','method_2'=>'Method 2');
	$apply_method = array_merge($apply_method,$apply_method_new);
	
	return $apply_method;
		
	}
add_filter('job_bm_filters_apply_method','job_bm_filters_apply_method_extra');


function job_bm_filters_apply_method_html_extra($apply_method_html){

	$apply_method_html_new['method_1'] = '<div class="side-meta"><i class="fa fa-floppy-o"></i>'.__('Method 1 :','job_bm').'<a class="apply-job" href="#" job-id="'.$job_id.'">Submit 1</a></div>';	

	$apply_method_html = array_merge($apply_method_html,$apply_method_html_new);
	
	return $apply_method_html;
		
	}


add_filter('job_bm_filters_apply_method_html','job_bm_filters_apply_method_html_extra');


// #############################















function job_bm_filters_apply_method_extra($apply_method){
	
	$apply_method_new = array('method_1'=>'Method 1','method_2'=>'Method 2');
	$apply_method = array_merge($apply_method,$apply_method_new);
	
	return $apply_method;
		
	}
add_filter('job_bm_filters_apply_method','job_bm_filters_apply_method_extra');



function job_bm_filters_apply_method_html_extra($apply_method_html){

	$apply_method_html_new['method_1'] = '<div class="side-meta"><i class="fa fa-floppy-o"></i>'.__('Method 1 :','job_bm').'<a class="apply-job" href="#" job-id="'.$job_id.'">Submit 1</a></div>';	

	$apply_method_html = array_merge($apply_method_html,$apply_method_html_new);
	
	return $apply_method_html;
		
	}


add_filter('job_bm_filters_apply_method_html','job_bm_filters_apply_method_html_extra');












#############job_bm_settings_section_notification################


function job_bm_settings_section_notification_extra($section_options){
	
	$section_options_new = array(
								'job_bm_notify_email_new_job_publish'=>array(
									'css_class'=>'notify_email_new_job_publish',					
									'title'=>'Notify email new job publish ?',
									'option_details'=>'Notify email new job publish',						
									'input_type'=>'select', // text, radio, checkbox, select, 
									'input_values'=> 'yes', // could be array
									'input_args'=> array('yes'=>'Yes','no'=>'No'),
									),
									
									
									
								);
								
		$section_options = array_merge($section_options,$section_options_new);			
								
	return $section_options;
		
	}

add_filter('job_bm_settings_section_notification','job_bm_settings_section_notification_extra');




*/



