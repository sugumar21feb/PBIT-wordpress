jQuery(document).ready(function($)
	{

        $('#job_bm_expire_date').datepicker({
            dateFormat : 'yy-mm-dd'
        });






		$(document).on('submit', '#frontend-form-job-submit', function(event)
			{
				
				
				
				var post_title = $('.post_title').val();
				var post_content = $('#post_content').val();
				var job_bm_company_name = $('#job_bm_company_name').val();			
				var job_bm_location = $('#job_bm_location').val();
				var job_bm_address = $('#job_bm_address').val();				
				var file_job_bm_company_logo = $('#file_job_bm_company_logo').val();
				var job_bm_short_content = $('#job_bm_short_content').val();				
				var job_bm_how_to_apply = $('#job_bm_how_to_apply').val();				
				var job_bm_contact_email = $('#job_bm_contact_email').val();
				var job_bm_apply_method = $('.job_bm_apply_method:checked').val();				
				var recaptcha = $('#recaptcha-anchor').attr('aria-checked');				

				
				error = '';
				
				cross_icon = '<i class="fa fa-close"></i>';
				
				if(post_title==''){
					
					error+= '<div class="message warring" >'+cross_icon+' Job Title is missing.</div>';
					}
				
				if(post_content==''){
					
					error+= '<div class="message warring" >'+cross_icon+' Job Content is missing.</div>';
					}	
					
				if(job_bm_company_name==''){
					
					error+= '<div class="message warring" >'+cross_icon+' Company Name is missing.</div>';
					}					
								
				if(job_bm_location==''){
					
					error+= '<div class="message warring" >'+cross_icon+' Job Location is missing.</div>';
					}	
					
					
				if(job_bm_address==''){
					
					error+= '<div class="message warring" >'+cross_icon+' Address is missing.</div>';
					}	
										
				if(file_job_bm_company_logo==''){
					
					error+= '<div class="message warring" >'+cross_icon+' Company Logo is missing.</div>';
					}					
					
				if(job_bm_short_content==''){
					
					error+= '<div class="message warring" >'+cross_icon+' Short Content is missing.</div>';
					}
					
				if(job_bm_how_to_apply==''){
					
					error+= '<div class="message warring" >'+cross_icon+' Apply instruction is missing.</div>';
					}	
					
				if(job_bm_contact_email==''){
					
					error+= '<div class="message warring" >'+cross_icon+' Contact Email is missing.</div>';
					}					
														
				if(job_bm_apply_method==''){
					
					error+= '<div class="message warring" >'+cross_icon+' Apply Method is missing.</div>';
					}	
					
														
				if(grecaptcha.getResponse() ==''){
					
					error+= '<div class="message warring" >'+cross_icon+' reCaptcha is missing.</div>';
					}					
																			
				
				
				$('.validations').html(error);
				
				if(error){
					
					event.preventDefault();
					$(window).scrollTop($('.validations').offset().top);
					}
				
				
				})











		$(document).on('change', '.job-submit-form .job_bm_salary_type', function()
			{
				var salary_type = $(this).val();
				//alert(salary_type);
				
				if(salary_type=='fixed'){
					
					$('.salary_fixed').fadeIn();
					$('.salary_min, .salary_max').fadeOut();
					
					}
				else if(salary_type=='min-max'){
					
					$('.salary_min, .salary_max').fadeIn();
					$('.salary_fixed').fadeOut();
					
					}
				else{
					$('.salary_fixed').fadeOut();
					$('.salary_min, .salary_max').fadeOut();
					}
				
			})	







	});	







