=== Job Board Manager ===
	Contributors: pickplugins
	Donate link: http://pickplugins.com
	Tags:  Job Board Manager, Job Board, job portal, Job, Job Poster, job manager, job, job list, job listing, Job Listings, job lists, job management, job manager,
	Requires at least: 4.1
	Tested up to: 4.3.1
	Stable tag: 1.0.11
	License: GPLv2 or later
	License URI: http://www.gnu.org/licenses/gpl-2.0.html

	Awesome Job Board Manager

== Description ==


Creating job for WordPress made easy by “Job Board Manager” plugin. super lightweight plugin allows you to create job manager site employer can submit job and employee can apply for job.

Based on short-code made easy to use anywhere displaying job-list, single job page & etc.

Easy to customizable made this plugin supper developer friendly , you can add your own values for some options via filter hook. You can create unlimited themes for job archive page & job single page by filter hook.

### Job Board Manager by http://pickplugins.com
* [Live Demo!&raquo;](http://www.pickplugins.com/demo/job-board-manager/)
* [Plugin details!&raquo;](http://www.pickplugins.com/item/job-board-manager-create-job-site-for-wordpress/)
* [Documentation!&raquo;](http://www.pickplugins.com/docs/documentation/job-board-manager/)

<strong>Video tutorial</strong>

https://www.youtube.com/watch?v=Z-ZzJiyVNJ4&feature=youtu.be


<strong>Add-on for Job Board Manager</strong>

<b>Free</b>

* [Locations &raquo;](https://wordpress.org/plugins/job-board-manager-locations/)
* [Company Profile &raquo;](https://wordpress.org/plugins/job-board-manager-company-profile/)

<b>Premium</b>

* [Saved Jobs &raquo;](http://www.pickplugins.com/item/job-board-manager-saved-jobs/)
* [Social Share &raquo;](http://www.pickplugins.com/item/job-board-manager-social-share/)
* [Application Manager &raquo;](http://www.pickplugins.com/item/job-board-manager-application-manager/)
* [WooCommerce Paid Listing &raquo;](http://www.pickplugins.com/item/job-board-manager-woocommerce-paid-listing/)

<strong>Plugin Features</strong>

* Job list with pagination support via short-codes.
* Job single page via short-code.
* Extensible supported setting page by filter hook.
* reCAPTCHA for job submission form.
* Notification email for new job posted, published.
* Extensible supported job meta input by filter hook.
* Front-End job submission form via short-codes
* Featured job marker.

<strong>Job List page</strong>

Use this short-code `[job_list]` to display latest job with pagination

<strong>Front-End Job submit form</strong>

Use this short-code `[job_submit_form]` to display new job submission form.

<strong>Client job list</strong>

Display list of jobs posted by logged in clients/employer by using following short-code `[client_job_list]`


<strong>Job Single page</strong>

If you want to display job on single page like default post, you need to copy your theme single.php and rename to single-job.php

you need to replace content section by following short-code

`<?php echo do_shortcode('[job_single job_id="'.get_the_ID().'"]'); ?>`








<strong>Filters job type</strong>

you can add your job type by filter hook as following example bellow.

`
function job_bm_filters_job_type_extra($job_type){
	
	$job_type_new = array('job_type_1'=>'Job Type 1','job_type_2'=>'Job Type 2');
	$job_type = array_merge($job_type,$job_type_new);
	
	return $job_type;
		
	}
add_filter('job_bm_filters_job_type','job_bm_filters_job_type_extra');
`

<strong>Filters salary type</strong>

you can add your salary type by filter hook as following example bellow.

`
function job_bm_filters_salary_type_extra($salary_type){
	
	$salary_type_new = array('salary_type_1'=>'Salary Type 1','salary_type_1'=>'Salary Type 2',);
	$salary_type = array_merge($salary_type,$salary_type_new);
	
	return $salary_type;
		
	}
add_filter('job_bm_filters_salary_type','job_bm_filters_salary_type_extra');
`

<strong>Extend meta fields</strong>

If you need some extra input fields under job post type you can use filter hook as following, currently support input fileds are text, textarea, radio, select, checkbox, multi-text,

Please see the file <strong>includes/class-post-meta.php</strong> for example option input by array. 

`
function job_bm_filters_meta_options_extra($options){
	
	$options['Meta extra'] = array(
								'job_bm_location_extra'=>array(
									'css_class'=>'location_extra',					
									'title'=>'Location _extra',
									'option_details'=>'Job Location _extra',						
									'input_type'=>'text', // text, radio, checkbox, select, 
									'input_values'=>'Dhaka extra', // could be array
									),
								);
	return $options;
		
	}

add_filter('job_bm_filters_meta_options','job_bm_filters_meta_options_extra');


`


== Installation ==

1. Install as regular WordPress plugin.<br />
2. Go your plugin setting via WordPress Dashboard and find "<strong>Job Board Manager</strong>" activate it.<br />




== Screenshots ==

1. List of latest job with pagination.
2. Single job page.
3. Job submit input admin side.
4. Settings page style tab
5. Client job list
6. Front-end Job Submission form.
7. Ready addons for Job Board Manager.

== Changelog ==

	= 1.0.11 =
    * 16/09/2015 - fix - minor php error fixed in job list.
    
	= 1.0.10 =
    * 08/09/2015 - add - sanitization for job front submission form.

	= 1.0.9 =
    * 03/09/2015 - add - option for pages.
    * 03/09/2015 - add - display job list by job type, job status, expiry date.
    
	= 1.0.8 =
    * 02/09/2015 - add - Client job list.

    
	= 1.0.7 =
    * 01/09/2015 - fix - job submission email issue fixed.
    
	= 1.0.6 =
    * 30/08/2015 - add - date picker for job submit form.
    * 30/08/2015 - add - new job status 'expired' added.
    * 30/08/2015 - add - Emails Templates for email notification.    

	= 1.0.5 =
    * 24/08/2015 - add - front-end job submit form validation check.
    
	= 1.0.4 =
    * 24/08/2015 - add - front-end job submit form.
    * 24/08/2015 - add - reCAPTCHA for job submit form.
    * 24/08/2015 - add - New Submitted Job Status.       
    
	= 1.0.3 =
    * 14/08/2015 - add - company page link to job & job list.
    
	= 1.0.2 =
    * 10/08/2015 - add - company page link to job & job list.

	= 1.0.1 =
    * 10/08/2015 - add -Menu page for addons list.
    
	= 1.0.0 =
    * 05/08/2015 Initial release.
