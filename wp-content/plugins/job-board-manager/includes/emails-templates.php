<?php	


/*
* @Author 		PickPlugins
* Copyright: 	2015 PickPlugins.com


*/

if ( ! defined('ABSPATH')) exit;  // if direct access 



class class_job_bm_emails_templates  {
	
	
    public function __construct(){
		
		echo $this->job_bm_templates_settings_display();
		
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
	
	public function job_bm_templates_editor(){
		
			$html = '';
			
			$templates_data = $this->job_bm_email_templates_data();
		
			$html.= '<div class="templates_editor expandable">';		
			foreach($templates_data as $key=>$templates){
				
				$html.= '<div class="items template '.$key.'">';
				$html.= '<div class="header">'.$templates['name'].'</div>';						
				$html.= '<div class="options">';
				
				$html.= '<label>Email Subject:<br/>';	// .options				
				$html.= '<input type="text" name="job_bm_email_subjects['.$key.']" value="'.$templates['subject'].'" />';	// .options	
				$html.= '</label>';					
						
						
				ob_start();
				wp_editor( $templates['html'], $key, $settings = array('textarea_name'=>'job_bm_email_body['.$key.']','media_buttons'=>false,'wpautop'=>true,'teeny'=>true,'editor_height'=>'400px', ) );				
				$editor_contents = ob_get_clean();
				
				
								
				$html.= '<br/><label>Email Body:<br/>';	// .options				
				$html.= $editor_contents;
				$html.= '</label>';		
				

				
											
								
								
				
				$html.= '</div>';	// .options			
				$html.= '</div>'; //.items
				
			
				
				}
		
		$html.= '</div>';	
		
		return $html;
		}
		
		
		

	public function job_bm_templates_parameters(){
		
		
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
	
	
	
	public function job_bm_templates_settings_display(){
		
		$html = '';
		$html.= '<div class="wrap">';		
		$html.= '<div id="icon-tools" class="icon32"><br></div><h2>'.__(job_bm_plugin_name.' - Emails Templates', 'job_bm').'</h2>';		
		$html.= '<div class="para-settings job-bm-emails-templates">';
		
		//$class_job_bm_emails_templates = new class_job_bm_emails_templates();
		
		$html.= $this->job_bm_templates_editor();
		
		$parameters = $this->job_bm_templates_parameters();
		
		
		$html.= '<div class="parameters"><ul>';			
		
		foreach($parameters as $key=>$parameter){
			
			$html.='<li><br /><b>'.$parameter['title'].'</b>';
			foreach($parameter['parameters'] as $parameter_name){
				$html.='<li>'.$parameter_name;			
				$html.='</li>';
				}
			
			$html.='</li>';
			
			}
			
		$html.= '</ul>';				
		$html.= '</div></div></div>';			
			
			
		return $html;	
			
			
		
		}
	
	
	
	
	
	
	
	
	
	
}

//new class_job_bm_emails_templates();


