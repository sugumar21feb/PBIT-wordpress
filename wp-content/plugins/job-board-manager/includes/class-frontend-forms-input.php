<?php

/*
* @Author 		ParaTheme
* @Folder	 	job-board-manager/includes
* Copyright: 	2015 ParaTheme
*/

if ( ! defined('ABSPATH')) exit;  // if direct access 

class class_frontend_forms_input{
	
    public function __construct(){
		
		add_shortcode( 'job_submit_form', array( $this, 'job_submit_form_display' ) );	

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
									'title'=>'Company Logo, you can use url or upload your own.',
									'option_details'=>'Company Logo',						
									'input_type'=>'file', // text, radio, checkbox, select, 
									'input_values'=>'', // could be array
									'ajax'        => true,
									'multiple'    => false,
									'allowed_mime_types' => array(
										'jpg'  => 'image/jpeg',
										'jpeg' => 'image/jpeg',
										'gif'  => 'image/gif',
										'png'  => 'image/png'
									)
									
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
									'input_args'=> apply_filters('job_bm_filters_job_status',array('open'=>'Open','closed'=>'Closed','filled'=>'Filled','re-open'=>'Re-Open')),
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
									'input_values'=> 'negotiable', // could be array
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
									'input_values'=> '$', // could be array
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
									'input_values'=>array(), // could be array
									'input_args'=> apply_filters('job_bm_filters_apply_method',array('direct_email'=>'Direct Email')),
									),																	
									
			);







			
			$options = apply_filters( 'job_bm_filters_job_meta_options', $options);

			return $options;
		
		}












	public function job_submit_form_display($atts, $content = null ) {
			$atts = shortcode_atts(
				array(		
					'themes' => 'flat',
					), $atts);
					
		
			//$job_bm_jobsingle_themes = $atts['themes'];
	
			$class_frontend_forms = new class_frontend_forms();

			$form_info['form-id']='job-submit-form';
			$form_info['post_title']='yes';			
			$form_info['post_content']='yes';		

			$html = '';
			
			//var_dump($this->job_meta_options());

			$html.= $class_frontend_forms->frontend_forms_html($form_info,$this->job_meta_options());

			return $html;
	
	
		}
			
	}
	
	new class_frontend_forms_input();