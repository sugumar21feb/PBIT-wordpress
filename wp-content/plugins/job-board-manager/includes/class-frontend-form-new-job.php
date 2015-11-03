<?php

/*
* @Author 		ParaTheme
* Copyright: 	2015 ParaTheme
*/

if ( ! defined('ABSPATH')) exit;  // if direct access 

class class_frontend_form_new_job{
	
	public function __construct(){

		//meta box action for "job"
		//add_action('add_meta_boxes', array($this, 'meta_boxes_job'));
		//add_action('save_post', array($this, 'meta_boxes_job_save'));

		}
		
		
		
		
	
	public function frontend_forms_html($form_info,$meta_options){
		
				
			if(empty($_POST['frontend_form_hidden']))
				{
					
					
				}
			elseif($_POST['frontend_form_hidden'] == 'Y'){

					
					$job_post = array(
					  'post_title'    => 'New Job',
					  'post_content'  => "Job Content",
					  'post_status'   => 'publish',
					  'post_type'   => 'job',
					  'post_author'   => 1,
					);
					
					// Insert the post into the database
					//wp_insert_post( $my_post );
					$job_ID = wp_insert_post($job_post);
			
			
					foreach($meta_options as $key=>$options){
						
						foreach($options as $option_key=>$option_info){
							
							update_post_meta($job_ID, $option_key , $_POST[$option_key]);
							
							}
						
						
						}
			
			
			
			
					}
		
		
			global $post;
			
			//$meta_options = $this->meta_options();
			//var_dump($meta_options);
			$html = '';
			
			$html.= '<form id="frontend-form-job-submit"  method="post" action="'.str_replace( '%7E', '~', $_SERVER['REQUEST_URI']).'">';

			$html.= '<input type="hidden" name="frontend_form_hidden" value="Y">';	
					
			$html.= '<div class="frontend-forms '.$form_info['form-id'].'">';		

			if(isset($_GET['job_edit_id'])){
				
				$post_title = get_the_title((int)$_GET['job_edit_id']);
				
				}
			else{
					$post_title ='';
				}
				
			if(isset($_GET['job_edit_id'])){
				
				$post_content = get_the_title((int)$_GET['job_edit_id']);
				
				}
			else{
					$post_content ='';
				}	
	
	
	



			$html.= '<h3 >Job Title</h3>';			
			$html.= '<input type="text" class="post_title" name="post_title" value="'.$post_title.'" />';
			$html.= '<h3 >Job Content</h3>';
			//To get wp_editor as variable
			ob_start();
			wp_editor( $post_content, 'post_content', $settings = array('textarea_name'=>'post_content','wpautop'=>true,'teeny'=>true,'editor_height'=>'150px', ) );				
			$editor_contents = ob_get_clean();
			
			$html.= $editor_contents;








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
					$html_box.= '<textarea placeholder="" name="'.$option_key.'" >'.$option_value.'</textarea> ';
					
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
						$html_box.= '<label><input '.$checked.' value="'.$input_args_key.'" name="'.$option_key.'[]"  type="checkbox" >'.$input_args_values.'</label><br/>';
						
						
						}
					
					}
					
				elseif($option_info['input_type'] == 'file'){
					
					$html_box.= '<input type="text" id="file_'.$option_key.'" name="'.$option_key.'" value="'.$option_value.'" /><br />';
					
					$html_box.= '<input id="upload_button_'.$option_key.'" class="upload_button_'.$option_key.' button" type="button" value="Upload File" />';					
					
					$html_box.= '<br /><br /><div style="overflow:hidden;max-height:150px;max-width:150px;" class="logo-preview"><img width="100%" src="'.$option_value.'" /></div>';
					
					$html_box.= '
<script>
								jQuery(document).ready(function($){
	
									var custom_uploader; 
								 
									jQuery("#upload_button_'.$option_key.'").click(function(e) {
	
										e.preventDefault();
								 
										//If the uploader object has already been created, reopen the dialog
										if (custom_uploader) {
											custom_uploader.open();
											return;
										}
								
										//Extend the wp.media object
										custom_uploader = wp.media.frames.file_frame = wp.media({
											title: "Choose File",
											button: {
												text: "Choose File"
											},
											multiple: false
										});
								
										//When a file is selected, grab the URL and set it as the text field\'s value
										custom_uploader.on("select", function() {
											attachment = custom_uploader.state().get("selection").first().toJSON();
											jQuery("#file_'.$option_key.'").val(attachment.url);
											jQuery(".logo-preview img").attr("src",attachment.url);											
										});
								 
										//Open the uploader dialog
										custom_uploader.open();
								 
									});
									
									
								})
							</script>
					
					';					
					
					
					
					
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
			
			$html.= '<input class="button job-bm-submit" type="submit" value="'.__('Submit','job_bm' ).'" />';	
			
			$html.= '</div>';	
			
		
			
			$html.= '</form>';				
			
			return $html;
		}
	
		
		
		
		
		
		
		

	}
	
new class_frontend_form_new_job();