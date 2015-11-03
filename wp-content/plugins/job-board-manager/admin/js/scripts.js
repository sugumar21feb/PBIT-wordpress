jQuery(document).ready(function($)
	{

        $('#job_bm_expire_date').datepicker({
            dateFormat : 'yy-mm-dd'
        });


		$(document).on('change', '.job-bm-meta .job_bm_salary_type', function()
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







