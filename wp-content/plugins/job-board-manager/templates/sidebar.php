<?php
/*
* @Author 		ParaTheme
* Copyright: 	2015 ParaTheme
*/

if ( ! defined('ABSPATH')) exit;  // if direct access 





	$html_about_company = '';
	
	if($job_bm_display_company_name == 'yes'){
		
		$html_about_company .= '<div class="company_name"><img src="'.$job_bm_company_logo.'" />'.$job_bm_company_name.'</div>';
		}
		

		$html_about_company .= '<div class="side-meta location"><i class="fa fa-map-marker"></i>'.$job_bm_location.'</div>';
	
		
	if($job_bm_display_company_address == 'yes'){
		
		$html_about_company .= '<div class="side-meta address"><i class="fa fa-home"></i>'.$job_bm_address.'</div>';
		}	
			
		$html_about_company .= '<div class="side-meta website"><i class="fa fa-link"></i><a href="'.$job_bm_company_website.'">'.__('Website','job_bm').'</a></div>';
		
		$html_about_company .= '<div class="side-meta website"><i class="fa fa-hand-o-right"></i><a href="'.$job_bm_job_link.'">'.__('Job Link','job_bm').'</a></div>';



	$sections[] = array(
						'title'=>'About Company',
						'html'=> $html_about_company,						
						
						);
						
						
	$job_info = '';
	
	$job_info .= '<div class="side-meta"><i class="fa fa-paper-plane-o"></i>'.__('Job Status: ','job_bm').$job_status[$job_bm_job_status].'</div>';
	
	$job_info .= '<div class="side-meta"><i class="fa fa-users"></i>'.__('No of Vacancies: ','job_bm').$job_bm_total_vacancies.'</div>';	
	
	$job_info .= '<div class="side-meta"><i class="fa fa-exclamation-triangle"></i>'.__('Expiry Date: ','job_bm').$job_bm_expire_date.'</div>';	
		
	$job_info .= '<div class="side-meta"><i class="fa fa-taxi"></i>'.__('Job Type: ','job_bm').$job_type[$job_bm_job_type].'</div>';
	
	$job_info .= '<div class="side-meta"><i class="fa fa-signal"></i>'.__('Job Level: ','job_bm').$job_level[$job_bm_job_level].'</div>';	
	
	$job_info .= '<div class="side-meta"><i class="fa fa-bolt"></i>'.__('Years of Experience: ','job_bm').$job_bm_years_experience.'</div>';				
						
						
	$sections[] = array(
						'title'=>'Job Info',
						'html'=>$job_info,						
						
						);						
						
						
						
						
						
	$salary_info = '';

	if(empty($job_bm_salary_currency)){
		$job_bm_salary_currency = $job_bm_salary_currency_option;
		}


	$salary_info .= '<div class="side-meta"><i class="fa fa-usd"></i>'.__('Salary Type: ','job_bm').$job_bm_salary_type.'</div>';




	
	if($job_bm_salary_type=='fixed'){
		
		$salary_info .= '<div class="side-meta"><i class="fa fa-usd"></i>'.__('Salary: ','job_bm').$job_bm_salary_currency.ucfirst($job_bm_salary_fixed).'</div>';
		
		}
	elseif($job_bm_salary_type=='min-max'){
		

		$salary_info .= '<div class="side-meta"><i class="fa fa-usd"></i>'.__('Salary: ','job_bm').$job_bm_salary_currency.$job_bm_salary_min.'-'.$job_bm_salary_currency.$job_bm_salary_max.'</div>';
		
		}	
						
				
						
	$sections[] = array(
						'title'=>'Salary Info',
						'html'=> $salary_info,						
						
						);							
						
						
						
						
	$html_apply_method = '';				
						
	if(!empty($job_bm_how_to_apply)){
		$html_apply_method .= '<div class="side-meta"><i class="fa fa-trophy"></i>'.__('How to Apply ?<br> ','job_bm').$job_bm_how_to_apply.'</div>';
		
		}



	$apply_method_html['direct_email'] = '<div class="side-meta"><i class="fa fa-envelope-o"></i>'.__('Apply via email :','job_bm').'<a class="apply-job" href="mailto:'.$job_bm_contact_email.'?subject='.$job_post_data->post_title.'">Send Email</a></div>';


	
	$apply_method_html = apply_filters('job_bm_filters_apply_method_html',$apply_method_html);

//var_dump($apply_method_html);

	
	if(!empty($job_bm_apply_method)){
		
		foreach($job_bm_apply_method as $key=>$method){
			//var_dump($method);
				$html_apply_method .= $apply_method_html[$method];

			}
		
		}
						
						
						
				
						
	$sections[] = array(
						'title'=>'Apply on this job',
						'html'=> $html_apply_method,						
						
						);						
						
						
	$sections = apply_filters('job_bm_filter_sidebar_sections',$sections);				


	foreach($sections as $section){
		$html .= '<div class="section">';
		
		
		$html .= '<div class="title">'.$section['title'].'</div>';
		$html .= $section['html'];		
		
		
		$html .= '</div>';	// .section	
		
		}



