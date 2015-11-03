<?php
/*
* @Author 		ParaTheme
* Copyright: 	2015 ParaTheme
*/

if ( ! defined('ABSPATH')) exit;  // if direct access 

	$permalink_structure = get_option('permalink_structure');	

	if(empty($permalink_structure)){
		
		$permalink_joint = '&';
		
		}
	else{
		$permalink_joint = '?';
		
		}

	foreach($jobsingle_meta_items as $meta_key=>$item_data){
		


		if($meta_key== 'clear'){
			$html .= '<div class="'.$item_data['class'].'"></div>';
			}			
			

		elseif($meta_key== 'job_bm_job_type'){
			
			if(!empty($meta_key_values[$meta_key])){
				
				$html .= '<div title="'.$item_data['title'].'" class="job-meta '.$item_data['class'].' '.$meta_key_values[$meta_key].'"><i class="fa fa-'.$item_data['fa'].'"></i><a href="'.$job_bm_archive_page_link.$permalink_joint.'job_type='.$meta_key_values[$meta_key].'">'.ucfirst($meta_key_values[$meta_key]).'</a></div>';
				}

			}				
			
		elseif($meta_key== 'job_bm_job_status'){
			
			if(!empty($meta_key_values[$meta_key])){
				$html .= '<div title="'.$item_data['title'].'" class="job-meta '.$meta_key_values[$meta_key].' '.$item_data['class'].'"><a href="'.$job_bm_archive_page_link.$permalink_joint.'job_status='.$meta_key_values[$meta_key].'">'.ucfirst($meta_key_values[$meta_key]).'</a></div>';

				}

			
			}
			
		elseif($meta_key== 'job_bm_company_name'){
			
			if(post_type_exists('company')){
				$company_data = get_page_by_title( $meta_key_values[$meta_key], 'OBJECT', 'company' );
				}
			else{
				$company_data = '';
				}

			
			if(!empty($company_data)){
				
				$company_link = get_post_permalink($company_data->ID);
					if(empty($company_link)){
					
						$company_link = '#';
						
					}
				}
			else{
				
					$company_link = '#';
				}
			


			
			
			if(!empty($meta_key_values[$meta_key])){
				$html .= '<div title="'.$item_data['title'].'" class="job-meta '.$item_data['class'].'"><i class="fa fa-'.$item_data['fa'].'"></i><a href="'.$company_link.'">'.$meta_key_values[$meta_key].'</a></div>';
				}

			}			
			
		elseif($meta_key== 'job_bm_expire_date'){
			if(!empty($meta_key_values[$meta_key])){
				$html .= '<div title="'.$item_data['title'].'" class="job-meta '.$item_data['class'].'"><i class="fa fa-'.$item_data['fa'].'"></i><a href="'.$job_bm_archive_page_link.$permalink_joint.'expire_date='.$meta_key_values[$meta_key].'">'.$meta_key_values[$meta_key].'</a></div>';
				}

			}			
			
		elseif($meta_key== 'job_bm_location'){
			
			if(post_type_exists('location')){
				$location_data = get_page_by_title( $meta_key_values[$meta_key], 'OBJECT', 'location' );
				}
			else{
				$location_data = '';
				}
			
			
			//$location_data = get_page_by_title( $meta_key_values[$meta_key], 'OBJECT', 'location' );
			
			if(!empty($location_data)){
				
				$location_link = get_post_permalink($location_data->ID);
					if(empty($location_link)){
					
						$location_link = '#';
						
					}
				}
			else{
				
					$location_link = '#';
				}
			
			
			
			if(!empty($meta_key_values[$meta_key])){
				$html .= '<div title="'.$item_data['title'].'" class="job-meta '.$item_data['class'].'"><i class="fa fa-'.$item_data['fa'].'"></i><a href="'.$location_link.'">'.$meta_key_values[$meta_key].'</a></div>';
				}

			}
						
		else{
			if(!empty($meta_key_values[$meta_key])){
				$html .= '<div title="'.$item_data['title'].'" class="job-meta '.$item_data['class'].'"><i class="fa fa-'.$item_data['fa'].'"></i><a href="#">'.$meta_key_values[$meta_key].'</a></div>';
				}

			}
		
		
		}
		
