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
	
	
	
	public function job_bm_templates_editor(){
		
			$class_job_bm_emails = new class_job_bm_emails();
			$templates_data = $class_job_bm_emails->job_bm_email_templates_data();
		
		
			$html = '';
			
			//$templates_data = $this->job_bm_email_templates_data();
		
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
		
		
	
	
	
	public function job_bm_templates_settings_display(){
		
		$html = '';
		$html.= '<div class="wrap">';		
		$html.= '<div id="icon-tools" class="icon32"><br></div><h2>'.__(job_bm_plugin_name.' - Emails Templates', 'job_bm').'</h2>';		
		$html.= '<div class="para-settings job-bm-emails-templates">';
		$html.= $this->job_bm_templates_editor();
		
		
		$class_job_bm_emails = new class_job_bm_emails();
		$parameters = $class_job_bm_emails->job_bm_email_templates_parameters();

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

new class_job_bm_emails_templates();


