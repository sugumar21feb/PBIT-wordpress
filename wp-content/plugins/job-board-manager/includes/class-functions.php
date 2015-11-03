<?php

/*
* @Author 		ParaTheme
* @Folder	 	job-board-manager/includes
* Copyright: 	2015 ParaTheme
*/

if ( ! defined('ABSPATH')) exit;  // if direct access 


















class class_job_bm_functions{
	

	public function job_bm_joblist_themes($themes = array()){

			$themes = array(
							'flat'=>'Flat',			
							);
			
			foreach(apply_filters( 'job_bm_joblist_themes', $themes ) as $theme_key=> $theme_name)
				{
					$theme_list[$theme_key] = $theme_name;
				}

			
			return $theme_list;

		}
	
		
	public function job_bm_joblist_themes_dir($themes_dir = array()){
		
			$main_dir = job_bm_plugin_dir.'themes/joblist/';
			
			$themes_dir = array(
							'flat'=>$main_dir.'flat',
				
							);
			
			foreach(apply_filters( 'job_bm_joblist_themes_dir', $themes_dir ) as $theme_key=> $theme_dir)
				{
					$theme_list_dir[$theme_key] = $theme_dir;
				}

			
			return $theme_list_dir;

		}


	public function job_bm_joblist_themes_url($themes_url = array()){
		
			$main_url = job_bm_plugin_url.'themes/joblist/';
			
			$themes_url = array(
							'flat'=>$main_url.'flat',
				
							);
			
			foreach(apply_filters( 'job_bm_joblist_themes_url', $themes_url ) as $theme_key=> $theme_url)
				{
					$theme_list_url[$theme_key] = $theme_url;
				}

			return $theme_list_url;

		}
		
// #################################################################	
		
		

	public function job_bm_jobsingle_themes($themes = array()){

			$themes = array(
							'flat'=>'Flat',			
							);
			
			foreach(apply_filters( 'job_bm_jobsingle_themes', $themes ) as $theme_key=> $theme_name)
				{
					$theme_list[$theme_key] = $theme_name;
				}

			
			return $theme_list;

		}
	
		
	public function job_bm_jobsingle_themes_dir($themes_dir = array()){
		
			$main_dir = job_bm_plugin_dir.'themes/jobsingle/';
			
			$themes_dir = array(
							'flat'=>$main_dir.'flat',
				
							);
			
			foreach(apply_filters( 'job_bm_jobsingle_themes_dir', $themes_dir ) as $theme_key=> $theme_dir)
				{
					$theme_list_dir[$theme_key] = $theme_dir;
				}

			
			return $theme_list_dir;

		}


	public function job_bm_jobsingle_themes_url($themes_url = array()){
		
			$main_url = job_bm_plugin_url.'themes/jobsingle/';
			
			$themes_url = array(
							'flat'=>$main_url.'flat',
				
							);
			
			foreach(apply_filters( 'job_bm_jobsingle_themes_url', $themes_url ) as $theme_key=> $theme_url)
				{
					$theme_list_url[$theme_key] = $theme_url;
				}

			return $theme_list_url;

		}
			
		
/***********************************************/

	public function job_bm_client_job_list_themes($themes = array()){

			$themes = array(
							'flat'=>'Flat',			
							);
			
			foreach(apply_filters( 'job_bm_client_job_list_themes', $themes ) as $theme_key=> $theme_name)
				{
					$theme_list[$theme_key] = $theme_name;
				}

			
			return $theme_list;

		}
	
		
	public function job_bm_client_job_list_themes_dir($themes_dir = array()){
		
			$main_dir = job_bm_plugin_dir.'themes/client-job-list/';
			
			$themes_dir = array(
							'flat'=>$main_dir.'flat',
				
							);
			
			foreach(apply_filters( 'job_bm_client_job_list_themes_dir', $themes_dir ) as $theme_key=> $theme_dir)
				{
					$theme_list_dir[$theme_key] = $theme_dir;
				}

			
			return $theme_list_dir;

		}


	public function job_bm_client_job_list_themes_url($themes_url = array()){
		
			$main_url = job_bm_plugin_url.'themes/client-job-list/';
			
			$themes_url = array(
							'flat'=>$main_url.'flat',
				
							);
			
			foreach(apply_filters( 'job_bm_client_job_list_themes_url', $themes_url ) as $theme_key=> $theme_url)
				{
					$theme_list_url[$theme_key] = $theme_url;
				}

			return $theme_list_url;

		}
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
	
	public function job_bm_share_plugin()
		{
			
			?>
<iframe src="//www.facebook.com/plugins/like.php?href=https%3A%2F%2Fwordpress.org%2Fplugins%2Fresumes-builder%2F&amp;width&amp;layout=standard&amp;action=like&amp;show_faces=true&amp;share=true&amp;height=80&amp;appId=652982311485932" scrolling="no" frameborder="0" style="border:none; overflow:hidden; height:80px;" allowTransparency="true"></iframe>
            
            <br />
            <!-- Place this tag in your head or just before your close body tag. -->
            <script src="https://apis.google.com/js/platform.js" async defer></script>
            
            <!-- Place this tag where you want the +1 button to render. -->
            <div class="g-plusone" data-size="medium" data-annotation="inline" data-width="300" data-href="<?php echo job_bm_share_url; ?>"></div>
            
            <br />
            <br />
            <a href="https://twitter.com/share" class="twitter-share-button" data-url="<?php echo job_bm_share_url; ?>" data-text="<?php echo job_bm_plugin_name; ?>" data-via="ParaTheme" data-hashtags="WordPress">Tweet</a>
            <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>



            <?php

		}
		
		
	
	public function job_bm_list_user_role(){
		
		global $wp_roles;
		$roles = $wp_roles->get_names();
		return $roles;
		}	
		
		
	
	}
	
	new class_job_bm_functions();