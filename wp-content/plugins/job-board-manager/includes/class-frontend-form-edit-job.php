<?php

/*
* @Author 		ParaTheme
* Copyright: 	2015 ParaTheme
*/

if ( ! defined('ABSPATH')) exit;  // if direct access 

class class_frontend_forms{
	
	public function __construct(){
		
		
		//meta box action for "job"
		//add_action('add_meta_boxes', array($this, 'meta_boxes_job'));
		//add_action('save_post', array($this, 'meta_boxes_job_save'));

		}
		
		
		
		
	
	public function frontend_forms_html($form_info,$meta_options){
		

		//var_dump($meta_options);
		
			$job_bm_reCAPTCHA_site_key = get_option('job_bm_reCAPTCHA_site_key');
			$job_bm_reCAPTCHA_secret_key = get_option('job_bm_reCAPTCHA_secret_key');
			$job_bm_submitted_job_status = get_option('job_bm_submitted_job_status');				
			
			
			if(empty($job_bm_submitted_job_status)){
				$job_bm_submitted_job_status = 'pending';
				}
		
			if ( is_user_logged_in() ) 
				{
					$userid = get_current_user_id();
				}


				
				
		
			$html = '';
			$html.= '<div class="frontend-forms '.$form_info['form-id'].'">';
			$html.= '<div class="validations" ></div>';	
			
			
			if(isset($_GET['job_edit_id'])){
				
					$job_edit_id = (int)$_GET['job_edit_id'];
					$job_data = get_post($job_edit_id);
					
					$post_title = $job_data->post_title;
					$post_content = $job_data->post_content;
				}
			else{
					$post_title ='';
					$post_content ='';
				}
				
				
				
			if(empty($_POST['frontend_form_hidden']))
				{
					
					
				}
			elseif(isset($_POST['frontend_form_hidden']) && $_POST['frontend_form_hidden'] == 'Y' && !empty($_POST['g-recaptcha-response'])){

					$post_title = sanitize_text_field($_POST['post_title']);
					$post_content = sanitize_text_field($_POST['post_content']);				
					
					$job_post = array(
					  'post_title'    => $post_title,
					  'post_content'  => $post_content,
					  'post_status'   => $job_bm_submitted_job_status,
					  'post_type'   => 'job',
					  'post_author'   => $userid,
					);
					
					// Insert the post into the database
					//wp_insert_post( $my_post );
					$job_ID = wp_insert_post($job_post);
					
					//sanitize
					//$meta_options = job_bm_sanitize_data($meta_options);
					
					
					
					foreach($meta_options as $key=>$options){
						
						foreach($options as $option_key=>$option_info){
							
							
							
							$option_value = $_POST[$option_key];
							$option_value = job_bm_sanitize_data($option_info['input_type'],$_POST[$option_key]);
							
							//var_dump($option_value);
							
							update_post_meta($job_ID, $option_key , $option_value);
							
							}
						
						
						}
			
					
					$job_bm_submitted_job_status = get_option('job_bm_submitted_job_status');
					
					
					$html.= '<div class="message green" ><i class="fa fa-check-square-o"></i> '.__('Job Submited','job_bm').'</div>';
					$html.= '<div class="submission-status" ><i class="fa fa-exclamation-triangle"></i> '.__('Submission Status: ','job_bm').''.$job_bm_submitted_job_status.'</div>';					
					
					
					$html.= apply_filters('job_bm_after_job_submitted','', $job_ID);
					
					//require_once(  plugin_dir_path( __FILE__ ) .'menu/emails-templates.php');
					

					
					global $current_user; // to get user display name
					
					$vars = array(
						'{site_name}'=> get_bloginfo('name'),
						'{site_description}' => get_bloginfo('description'),
						'{site_url}' => get_bloginfo('url'),						
					 	'{site_logo_url}' => get_option('job_bm_logo_url'),
					  
					  	'{user_name}' => $current_user->display_name,						  
					  	'{user_avatar}' => get_avatar( $userid, 60 ),
					  	'{user_email}' => '',
													
					  	'{job_title}'  => get_the_title($job_ID),						  			
					  	'{job_url}'  => get_permalink($job_ID),
					  	'{job_edit_url}'  => get_admin_url().'post.php?post='.$job_ID.'&action=edit',						
					  	'{job_id}'  => $job_ID,	
					  	'{job_content}'  => $post_content,												

					);
					
					$admin_email = get_option('admin_email');					
					
					$class_job_bm_emails = new class_job_bm_emails();
					$job_bm_email_templates_data = $class_job_bm_emails->job_bm_email_templates_data();
					
					
					$email_body = strtr($job_bm_email_templates_data['new_job_submitted']['html'], $vars);
					$email_subject =strtr($job_bm_email_templates_data['new_job_submitted']['subject'], $vars);
					
					$headers = "";
					$headers .= "From: ".get_option('job_bm_from_email')." \r\n";
					$headers .= "MIME-Version: 1.0\r\n";
					$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
					
					wp_mail($admin_email, $email_subject, $email_body, $headers);
					
					
					}
				else{
					$html.= '<div class="message warring" ><i class="fa fa-close"></i> '.__('Something error','job_bm').'</div>';	
					
					}
		
		
			global $post;
			
			//$meta_options = $this->meta_options();
			//var_dump($meta_options);
			
			
			$html.= '<form id="frontend-form-job-submit" enctype="multipart/form-data"   method="post" action="'.str_replace( '%7E', '~', $_SERVER['REQUEST_URI']).'">';

			$html.= '<input type="hidden" name="frontend_form_hidden" value="Y">';	

			$html.= '<div class="option-box" >';	
			$html.= '<p class="option-title" >Job Title</p>';	
			$html.= '<p class="option-info"></p>';
			$html.= '<input type="text" class="post_title" name="post_title" value="'.sanitize_text_field($post_title).'" />';
			$html.= '</div>';
			
			$html.= '<div class="option-box" >';
			$html.= '<p class="option-title" >Job Content</p>';
			$html.= '<p class="option-info"></p>';
			//To get wp_editor as variable
			ob_start();
			wp_editor( stripslashes($post_content), 'post_content', $settings = array('textarea_name'=>'post_content','media_buttons'=>false,'wpautop'=>true,'teeny'=>true,'editor_height'=>'150px', ) );				
			$editor_contents = ob_get_clean();
			
			$html.= $editor_contents;

			$html.= '</div>';






			$html_nav = '';
			$html_box = '';
					
			$i=1;
			foreach($meta_options as $key=>$options){
			if($i==1){
				$html_nav.= '<li nav="'.$i.'" class="nav'.$i.' active">'.$key.'</li>';				
				}
			else{
				$html_nav.= '<li nav="'.$i.'" class="nav'.$i.'">'.$key.'</li>';
				}
				
				
			if($i==1){
				$html_box.= '<li style="display: block;" class="box'.$i.' tab-box active">';				
				}
			else{
				$html_box.= '<li style="display: none;" class="box'.$i.' tab-box">';
				}

				
			foreach($options as $option_key=>$option_info){
				
				if(isset($_GET['job_edit_id'])){
					$option_value =  get_post_meta( (int)$_GET['job_edit_id'], $option_key, true );
					}
				else{
					$option_value =  get_post_meta( $post->ID, $option_key, true );
					}
				
				
				//var_dump($option_value);
				
				
				if(empty($option_value)){
					$option_value = $option_info['input_values'];
					}
				
				
				$html_box.= '<div class="option-box '.$option_info['css_class'].'">';
				$html_box.= '<p class="option-title">'.$option_info['title'].'</p>';
				$html_box.= '<p class="option-info">'.$option_info['option_details'].'</p>';
				
				if($option_info['input_type'] == 'text'){
				$html_box.= '<input id="'.$option_key.'" type="text" placeholder="" name="'.$option_key.'" value="'.$option_value.'" /> ';					

					}
				elseif($option_info['input_type'] == 'textarea'){
					$html_box.= '<textarea placeholder="" id="'.$option_key.'" name="'.$option_key.'" >'.$option_value.'</textarea> ';
					
					}
					
					
					
					
				elseif($option_info['input_type'] == 'radio'){
					
					$input_args = $option_info['input_args'];
					
					foreach($input_args as $input_args_key=>$input_args_values){
						
						if($input_args_key == $option_value){
							$checked = 'checked';
							}
						else{
							$checked = '';
							}
							
						$html_box.= '<label><input class="'.$option_key.'" type="radio" '.$checked.' value="'.$input_args_key.'" name="'.$option_key.'"   >'.$input_args_values.'</label><br/>';
						}
					
					
					}
					
					
				elseif($option_info['input_type'] == 'select'){
					
					$input_args = $option_info['input_args'];
					$html_box.= '<select name="'.$option_key.'" >';
					foreach($input_args as $input_args_key=>$input_args_values){
						
						if($input_args_key == $option_value){
							$selected = 'selected';
							}
						else{
							$selected = '';
							}
						
						$html_box.= '<option '.$selected.' value="'.$input_args_key.'">'.$input_args_values.'</option>';

						}
					$html_box.= '</select>';
					
					}					
					
					
					
					
					
					
					
					
				elseif($option_info['input_type'] == 'checkbox'){
					
					$input_args = $option_info['input_args'];

					foreach($input_args as $input_args_key=>$input_args_values){

						
						if(in_array($input_args_key,$option_value)){
							$checked = 'checked';
							}
						else{
							$checked = '';
							}
						$html_box.= '<label><input class="'.$option_key.'" '.$checked.' value="'.$input_args_key.'" name="'.$option_key.'[]"  type="checkbox" >'.$input_args_values.'</label><br/>';
						
						
						}
					
					}
					
				elseif($option_info['input_type'] == 'file'){
					
					$html_box.= '<input  type="text" id="file_'.$option_key.'" name="'.$option_key.'" value="'.$option_value.'" /><br />';
					//$html_box.= '<br /><br /><div style="overflow:hidden;max-height:150px;max-width:150px;" class="logo-preview"></div>';
					
					
					$html_box .= '<div id="file-upload-container">';
					$html_box .= '<span class="loading">loading</span>';	
			
					$html_box .= '<a title="filetype: (jpg, png, jpeg), max size: 200Mb" id="file-uploader" class="sticker_button" href="#">Upload</a>
					<div id="uploaded-image-container"></div></div>';
					

					}		
					
					
										
					
								
				$html_box.= '</div>';
				
				}
			$html_box.= '</li>';
			
			
			$i++;
			}
			
			
			$html.= '<ul class="tab-nav">';
			$html.= $html_nav;			
			$html.= '</ul>';
			$html.= '<ul class="box">';
			$html.= $html_box;
			$html.= '</ul>';
					
			$html.= apply_filters( 'frontend_forms_html_scripts','');	
			
			
					
		
			
			
			$html.= '<div class="option-box" >';	
			$html.= '<p class="option-title" >reCAPTCHA</p>';	
			$html.= '<p class="option-info"></p>';
			$html.= '<script src="https://www.google.com/recaptcha/api.js"></script>';	
			$html.= '<div class="g-recaptcha" data-sitekey="'.$job_bm_reCAPTCHA_site_key.'"></div>';	
			$html.= '</div>';
			
			
			
			
			
			
			$html.= '<input class="button job-bm-submit" type="submit" value="'.__('Submit','job_bm' ).'" />';	
			

			$html.= '</form>';
			$html.= '</div>';
			
			$html.= '
			
        <script>
		jQuery(document).ready(function($)
			{
				var job_bm_salary_type = $(".job_bm_salary_type:checked").val();
				
				if(job_bm_salary_type =="fixed"){
					
					$(".option-box.salary_fixed").fadeIn();
					}
				else if(job_bm_salary_type =="min-max"){
					
					
					$(".option-box.salary_min").fadeIn();
					$(".option-box.salary_max").fadeIn();					
					}
				
			})
		</script>
			
			
			';			
			
			
			
			
			
			
			
					
			
			return $html;
		}
	
		
		
		
		
		
		
		

	}
	
new class_frontend_forms();