<?php

/*
* @Author 		ParaTheme
* Copyright: 	2015 ParaTheme
*/

if ( ! defined('ABSPATH')) exit;  // if direct access

	if ( is_user_logged_in() ){

		$userid = get_current_user_id();
		
		$job_bm_list_per_page = get_option('job_bm_list_per_page');
		$job_bm_job_type_bg_color = get_option('job_bm_job_type_bg_color');	
		$job_bm_job_status_bg_color = get_option('job_bm_job_status_bg_color');	
		$job_bm_featured_bg_color = get_option('job_bm_featured_bg_color');	
		
		if(empty($job_bm_list_per_page)){
			$job_bm_list_per_page = 10;
			}
		
			if ( get_query_var('paged') ) {
			
				$paged = get_query_var('paged');
			
			} elseif ( get_query_var('page') ) {
			
				$paged = get_query_var('page');
			
			} else {
			
				$paged = 1;
			
			}
			
			
		$wp_query = new WP_Query(
			array (
				'post_type' => 'job',
				'orderby' => 'Date',
				'order' => 'DESC',
				'author' => $userid,
				'posts_per_page' => $job_bm_list_per_page,
				'paged' => $paged,
				
				) );
		

			
		$html .= '<div class="client-job-list">';
		$html .= '<table style="width:100%">'; 
		$html .= '<tr class="single">';
		$html .= '<th class="title list-meta">Title</th>';
		$html .= '<th class="post-date list-meta">Post Date</th>';	
		$html .= '<th class="publish-status list-meta">Publish Status</th>';
		$html .= '<th class="job-status list-meta">Job Status</th>';
		$html .= '<th class="featured list-meta">Featured</th>';
		$html .= '<th class="type list-meta">Type</th>';
		$html .= '<th class="level list-meta">Level</th>';				
						
		$html .= '</tr>';
			
		
		$job_type_filters = apply_filters('job_bm_filters_job_type',array('freelance'=>'Freelance','full-time'=>'Full Time','internship'=>'Internship','part-time'=>'Part Time','temporary'=>'Temporary'));
		
		$job_label_filters = apply_filters('job_bm_filters_job_level',array('any'=>'Any','entry_level'=>'Entry level','mid_level'=>'Mid level','top_level'=>'Top level',));
		
		$job_status_filters = apply_filters('job_bm_filters_job_status',array('open'=>'Open','closed'=>'Closed','filled'=>'Filled','re-open'=>'Re-Open','expired'=>'Expired'));		
			
		
		
		//var_dump($job_label_filters);
		
		
		
		if ( $wp_query->have_posts() ) :
		while ( $wp_query->have_posts() ) : $wp_query->the_post();	


			$job_title = get_the_title();
			$post_date = get_the_date('Y-m-d');
			$expiry_date = get_post_meta(get_the_ID(), 'job_bm_expire_date',true);
			$publish_status = get_post_status(get_the_ID());
			$job_status = get_post_meta(get_the_ID(), 'job_bm_job_status',true);
			$featured = get_post_meta(get_the_ID(), 'job_bm_featured',true);
			$job_type = get_post_meta(get_the_ID(), 'job_bm_job_type',true);
			
			
			
			
			$job_label = get_post_meta(get_the_ID(), 'job_bm_job_level',true);

			if(!empty($featured)){
				$featured = 'Yes';
				}
			else{
				$featured = 'No';
				}


		$html .= '<tr class="single">';
		
		$html .= '<td class="title list-meta"><a href="'.get_permalink().'">'.$job_title.'</a></td>';
		$html .= '<td class="post-date list-meta">Published: '.$post_date.'<br/>Expiry: '.$expiry_date.'</td>';	
		$html .= '<td class="publish-status list-meta">'.$publish_status.'</td>';
		$html .= '<td class="job-status list-meta">'.$job_status_filters[$job_status].'</td>';
		$html .= '<td class="featured list-meta">'.$featured.'</td>';
		$html .= '<td class="type list-meta">'.$job_type_filters[$job_type].'</td>';
		$html .= '<td class="level list-meta">'.$job_label_filters[$job_label].'</td>';
		
		
		$html .= '</tr>'; // .single
		endwhile;
		
		$html .= '</table>'; 
		$html .= '<div class="paginate">';
		$big = 999999999; // need an unlikely integer
		$html .= paginate_links( array(
			'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
			'format' => '?paged=%#%',
			'current' => max( 1, $paged ),
			'total' => $wp_query->max_num_pages
			) );
	
		$html .= '</div >';	

		wp_reset_query();
		
		else:
		
		$html .= __('No job found posted by you.','job_bm');
		
		endif;

		$html .= '</div>'; // .client-job-list
		
		}
	else{
		$html .= __('Please login to see your job list.','job_bm');
		
		}
		
		





	

