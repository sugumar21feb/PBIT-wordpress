<?php

/*
* @Author 		ParaTheme
* @Folder	 	job-board-manager/includes
* Copyright: 	2015 ParaTheme
*/

if ( ! defined('ABSPATH')) exit;  // if direct access 

class class_job_bm_post_meta{
	
	public function __construct(){

		//meta box action for "job"
		add_action('add_meta_boxes', array($this, 'meta_boxes_job'));
		add_action('save_post', array($this, 'meta_boxes_job_save'));

		}
		
	
	public function job_meta_options($options = array()){


			$options['Company Info'] = array(
			
			
								'job_bm_company_name'=>array(
									'css_class'=>'company_name',					
									'title'=>'Company Name',
									'option_details'=>'Company Name, ex: Google Inc.',						
									'input_type'=>'text', // text, radio, checkbox, select, 
									'input_values'=>'', // could be array
									),
										
								'job_bm_display_company_name'=>array(
									'css_class'=>'display_company_name',					
									'title'=>'Display Company Name ?',
									'option_details'=>'Display Company Name',						
									'input_type'=>'radio', // text, radio, checkbox, select, 
									'input_values'=> 'yes', // could be array
									'input_args'=> array('yes'=>'Yes','no'=>'No'),
									),
			
			
			
								'job_bm_location'=>array(
									'css_class'=>'location',					
									'title'=>'Location',
									'option_details'=>'Job Location, ex: California (City or States)',						
									'input_type'=>'text', // text, radio, checkbox, select, 
									'input_values'=>'', // could be array
									),
									
								'job_bm_address'=>array(
									'css_class'=>'address',					
									'title'=>'Address',
									'option_details'=>'Full Address, ex: 1600 Amphitheatre Parkway, Mountain View, CA 94043',						
									'input_type'=>'textarea', // text, radio, checkbox, select, 
									'input_values'=>'', // could be array
									),									
									
								'job_bm_display_company_address'=>array(
									'css_class'=>'display_company_address',					
									'title'=>'Display Company Address ?',
									'option_details'=>'Display Company Address',						
									'input_type'=>'radio', // text, radio, checkbox, select, 
									'input_values'=> 'yes', // could be array
									'input_args'=> array('yes'=>'Yes','no'=>'No'),
									),

														
								'job_bm_company_website'=>array(
									'css_class'=>'company_website',					
									'title'=>'Company Website',
									'option_details'=>'Company Website, ex: http://pickplugins.com',						
									'input_type'=>'text', // text, radio, checkbox, select, 
									'input_values'=>'', // could be array
									),
									
								'job_bm_company_logo'=>array(
									'css_class'=>'company_logo',					
									'title'=>'Company Logo',
									'option_details'=>'Company Logo',						
									'input_type'=>'file', // text, radio, checkbox, select, 
									'input_values'=>'', // could be array
									),									
									
								'job_bm_job_link'=>array(
									'css_class'=>'job_link',				
									'title'=>'Job Link',
									'option_details'=>'Job Link at Company Website, ex: http://pickplugins.com/jobs/developer-wanted',					
									'input_type'=>'text', // text, radio, checkbox, select,
									'input_values'=>'', // could be array
									
									),
										
														

						);

			
			$options['Job Info'] = array(
			
								'job_bm_job_status'=>array(
									'css_class'=>'job_status',					
									'title'=>'Job Status',
									'option_details'=>'Job Status',						
									'input_type'=>'select', // text, radio, checkbox, select, 
									'input_values'=> '', // could be array
									'input_args'=> apply_filters('job_bm_filters_job_status',array('open'=>'Open','closed'=>'Closed','filled'=>'Filled','re-open'=>'Re-Open','expired'=>'Expired')),
									),		
			
								'job_bm_short_content'=>array(
									'css_class'=>'short_content',					
									'title'=>'Short Content',
									'option_details'=>'Short Content',						
									'input_type'=>'textarea', // text, radio, checkbox, select, 
									'input_values'=>'', // could be array
									),		
										
								'job_bm_total_vacancies'=>array(
									'css_class'=>'total_vacancies',					
									'title'=>'No of Vacancies',
									'option_details'=>'No of Vacancies',						
									'input_type'=>'text', // text, radio, checkbox, select, 
									'input_values'=>'3', // could be array
									),			
			
								'job_bm_expire_date'=>array(
									'css_class'=>'expire_date',					
									'title'=>'Expiry Date',
									'option_details'=>'Expiry Date',						
									'input_type'=>'text', // text, radio, checkbox, select, 
									'input_values'=>job_bm_get_date(), // could be array
									),
									
								'job_bm_featured'=>array(
									'css_class'=>'featured',					
									'title'=>'Featured Job',
									'option_details'=>'Featured Job',						
									'input_type'=>'checkbox', // text, radio, checkbox, select, 
									'input_values'=>array(), // could be array
									'input_args'=> array('yes'=>'Yes'),
									),									
									
								'job_bm_job_type'=>array(
									'css_class'=>'job_type',					
									'title'=>'Job Type ?',
									'option_details'=>'Job Type ',						
									'input_type'=>'select', // text, radio, checkbox, select, 
									'input_values'=> 'full-time', // could be array
									'input_args'=> apply_filters('job_bm_filters_job_type',array('freelance'=>'Freelance','full-time'=>'Full Time','internship'=>'Internship','part-time'=>'Part Time','temporary'=>'Temporary')),
									),
									
								'job_bm_job_level'=>array(
									'css_class'=>'job_level',					
									'title'=>'Job Level ?',
									'option_details'=>'Job Level ',						
									'input_type'=>'select', // text, radio, checkbox, select, 
									'input_values'=> '', // could be array
									'input_args'=> apply_filters('job_bm_filters_job_level',array('any'=>'Any','entry_level'=>'Entry level','mid_level'=>'Mid level','top_level'=>'Top level',)),
									),
									
								'job_bm_years_experience'=>array(
									'css_class'=>'years_experience',					
									'title'=>'Years of Experience ?',
									'option_details'=>'Years of Experience',						
									'input_type'=>'text', // text, radio, checkbox, select, 
									'input_values'=> '2', // could be array
									),									
																										
									

						);
			
			$options['Salary Info'] = array(
								'job_bm_salary_type'=>array(
									'css_class'=>'salary_type',					
									'title'=>'Salary Range ?',
									'option_details'=>'Salary Range',						
									'input_type'=>'radio', // text, radio, checkbox, select, 
									'input_values'=> '', // could be array
									'input_args'=> apply_filters('job_bm_filters_salary_type',array('negotiable'=>'Negotiable','fixed'=>'Fixed','min-max'=>'Min-Max')),
									),

									
								'job_bm_salary_fixed'=>array(
									'css_class'=>'salary_fixed',					
									'title'=>'Salary Fixed ?',
									'option_details'=>'Salary fixed',						
									'input_type'=>'text', // text, radio, checkbox, select, 
									'input_values'=> '12000', // could be array
									),									
									
									
								'job_bm_salary_min'=>array(
									'css_class'=>'salary_min',					
									'title'=>'Salary Min ?',
									'option_details'=>'Salary Min',						
									'input_type'=>'text', // text, radio, checkbox, select, 
									'input_values'=> '1000', // could be array
									),																	
									
								'job_bm_salary_max'=>array(
									'css_class'=>'salary_max',					
									'title'=>'Salary Max ?',
									'option_details'=>'Salary Max',						
									'input_type'=>'text', // text, radio, checkbox, select, 
									'input_values'=> '10000', // could be array
									),
									
								'job_bm_salary_currency'=>array(
									'css_class'=>'salary_currency',					
									'title'=>'Salary currency ?',
									'option_details'=>'Salary currency(Optional)',						
									'input_type'=>'text', // text, radio, checkbox, select, 
									'input_values'=> '', // could be array
									),									
									
			
						);

			$options['Application'] = array(
								'job_bm_how_to_apply'=>array(
									'css_class'=>'how_to_apply',					
									'title'=>'How to apply your job, instruction for applicant ?',
									'option_details'=>'How to Apply',						
									'input_type'=>'textarea', // text, radio, checkbox, select, 
									'input_values'=> '', // could be array
									),
									
								'job_bm_contact_email'=>array(
									'css_class'=>'contact_email',					
									'title'=>'Contact Email ?',
									'option_details'=>'Contact Email',						
									'input_type'=>'text', // text, radio, checkbox, select, 
									'input_values'=> '', // could be array
									),
									
								'job_bm_apply_method'=>array(
									'css_class'=>'apply_method',					
									'title'=>'Apply Method ?',
									'option_details'=>'Apply Method',						
									'input_type'=>'checkbox', // text, radio, checkbox, select, 
									'input_values'=> array(), // could be array
									'input_args'=> apply_filters('job_bm_filters_apply_method',array('direct_email'=>'Direct Email')),
									),													
									
			);







			
			$options = apply_filters( 'job_bm_filters_job_meta_options', $options );

			return $options;
		
		}
	
	
	public function job_meta_options_form(){
		
			global $post;
			
			$job_meta_options = $this->job_meta_options();
			//var_dump($job_meta_options);
			$html = '';
			
			$html.= '<div class="para-settings job-bm-settings">';			

			$html_nav = '';
			$html_box = '';
					
			$i=1;
			foreach($job_meta_options as $key=>$options){
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

				$option_value =  get_post_meta( $post->ID, $option_key, true );
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
					$html_box.= '<textarea id="'.$option_key.'" placeholder="" name="'.$option_key.'" >'.$option_value.'</textarea> ';
					
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
					//var_dump($option_value);
					foreach($input_args as $input_args_key=>$input_args_values){


						//var_dump($input_args_key);
						
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
					
			$html.= apply_filters( 'job_bm_job_meta_scripts','');	
			
			$html.= '</div>';	
					
			return $html;
		}
	
	
	
	
	public function meta_boxes_job($post_type) {
			$post_types = array('job');
	 
			//limit meta box to certain post types
			if (in_array($post_type, $post_types)) {
				add_meta_box('job_metabox',
				__('job Data','job_bm'),
				array($this, 'job_meta_box_function'),
				$post_type,
				'normal',
				'high');
			}
		}
	public function job_meta_box_function($post) {
 
        // Add an nonce field so we can check for it later.
        wp_nonce_field('job_nonce_check', 'job_nonce_check_value');
 
        // Use get_post_meta to retrieve an existing value from the database.
       // $job_bm_data = get_post_meta($post -> ID, 'job_bm_data', true);

		$job_meta_options = $this->job_meta_options();
		
		//var_dump($job_meta_options);
		foreach($job_meta_options as $options_tab=>$options){
			
			foreach($options as $option_key=>$option_data){
				
				${$option_key} = get_post_meta($post -> ID, $option_key, true);

				}
			}
			
		//var_dump($job_bm_salary_currency);
        // Display the form, using the current value.
		
		?>
        <div class="job-bm-meta">
        
        <?php
		
		
        echo $this->job_meta_options_form(); 
		?>
        </div>
        
        
        <script>
		jQuery(document).ready(function($)
			{
				var job_bm_salary_type = $('.job_bm_salary_type:checked').val();
				
				if(job_bm_salary_type =='fixed'){
					
					$('.option-box.salary_fixed').fadeIn();
					}
				else if(job_bm_salary_type =='min-max'){
					
					
					$('.option-box.salary_min').fadeIn();
					$('.option-box.salary_max').fadeIn();					
					
					}
				
			})
		</script>
        
        
        
        
        
        <?php
		

		
		




   		}
	
	
	public function meta_boxes_job_save($post_id){
	 
			/*
			 * We need to verify this came from the our screen and with 
			 * proper authorization,
			 * because save_post can be triggered at other times.
			 */
	 
			// Check if our nonce is set.
			if (!isset($_POST['job_nonce_check_value']))
				return $post_id;
	 
			$nonce = $_POST['job_nonce_check_value'];
	 
			// Verify that the nonce is valid.
			if (!wp_verify_nonce($nonce, 'job_nonce_check'))
				return $post_id;
	 
			// If this is an autosave, our form has not been submitted,
			//     so we don't want to do anything.
			if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
				return $post_id;
	 
			// Check the user's permissions.
			if ('page' == $_POST['post_type']) {
	 
				if (!current_user_can('edit_page', $post_id))
					return $post_id;
	 
			} else {
	 
				if (!current_user_can('edit_post', $post_id))
					return $post_id;
			}
	 
			/* OK, its safe for us to save the data now. */
	 
			// Sanitize the user input.
			//$job_bm_data = stripslashes_deep($_POST['job_bm_data']);
	
			
			// Update the meta field.
			//update_post_meta($post_id, 'job_bm_data', $job_bm_data);
			
			$job_meta_options = $this->job_meta_options();
			
			foreach($job_meta_options as $options_tab=>$options){
				
				foreach($options as $option_key=>$option_data){
					
					${$option_key} = stripslashes_deep($_POST[$option_key]);
					
					update_post_meta($post_id, $option_key, ${$option_key});			
					
					}
				}
			
			
			
			
			
					
		}
	
	}


new class_job_bm_post_meta();