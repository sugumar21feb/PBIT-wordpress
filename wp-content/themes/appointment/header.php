<!DOCTYPE html>
<html <?php language_attributes(); ?> >
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php 
	$appointment_options=theme_setup_data(); 
	$header_setting = wp_parse_args(  get_option( 'appointment_options', array() ), $appointment_options);
	if($header_setting['upload_image_favicon']!=''){ ?>
	<link rel="shortcut icon" href="<?php  echo $header_setting['upload_image_favicon']; ?>" /> 
	<?php } ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700,800' rel='stylesheet' type='text/css'>

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
        <link rel="icon" href="favicon.ico" type="image/x-icon">

        <link rel="stylesheet" href="<?php echo WEBRITI_TEMPLATE_DIR_URI; ?>/css/normalize.css">
        <link rel="stylesheet" href="<?php echo WEBRITI_TEMPLATE_DIR_URI; ?>/css/font-awesome.min.css">
        <link rel="stylesheet" href="<?php echo WEBRITI_TEMPLATE_DIR_URI; ?>/css/fontello.css">
        <link rel="stylesheet" href="<?php echo WEBRITI_TEMPLATE_DIR_URI; ?>/css/animate.css">        
        <link rel="stylesheet" href="<?php echo WEBRITI_TEMPLATE_DIR_URI; ?>/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo WEBRITI_TEMPLATE_DIR_URI; ?>/css/owl.carousel.css">
        <link rel="stylesheet" href="<?php echo WEBRITI_TEMPLATE_DIR_URI; ?>/css/owl.theme.css">
        <link rel="stylesheet" href="<?php echo WEBRITI_TEMPLATE_DIR_URI; ?>/css/owl.transitions.css">
        <link rel="stylesheet" href="<?php echo WEBRITI_TEMPLATE_DIR_URI; ?>/css/style.css">
        <link rel="stylesheet" href="<?php echo WEBRITI_TEMPLATE_DIR_URI; ?>/css/responsive.css">
        <script src="<?php echo WEBRITI_TEMPLATE_DIR_URI; ?>/js/vendor/modernizr-2.6.2.min.js"></script>
	<title><?php wp_title('|', true , 'right'); ?></title>

	<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?> >


	<div class="header-connect">
            
            <div class="container">
                <div class="row">
                    <div class="col-md-5 col-sm-8 col-xs-8">
                        <div class="header-half header-call">
                            <p>
                                <span><i class="icon-cloud"></i>+019 4854 8817</span>
                                <span><i class="icon-mail"></i>info@pbit.com</span>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-2 col-md-offset-5  col-sm-3 col-sm-offset-1  col-xs-3  col-xs-offset-1">
                        <div class="header-half header-social">
                            <ul class="list-inline">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-vine"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>



<!--Logo & Menu Section-->	
<nav class="navbar navbar-default">
	<div class="container">
		<div class="button navbar-right">
                  <button class="navbar-btn nav-button wow bounceInRight login" data-wow-delay="0.8s">Login</button>
                  <button class="navbar-btn nav-button wow fadeInRight" data-wow-delay="0.6s">Sign up</button>
              </div>
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
				
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only"><?php _e('Toggle navigation','appointment'); ?></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>

			</button>
			<a class="navbar-brand" href="#"><img src="<?php echo WEBRITI_TEMPLATE_DIR_URI; ?>/images/Pbit.png" alt=""></a>
		</div>
		
		<?php 
				$facebook = $header_setting['social_media_facebook_link'];
				$twitter = $header_setting['social_media_twitter_link'];
				$linkdin = $header_setting['social_media_linkedin_link'];
				
				$social = '<ul id="%1$s" class="%2$s">%3$s';
				if($header_setting['header_social_media_enabled'] == 0 )
				{
					$social .= '<ul class="head-contact-social">';

					if($header_setting['social_media_facebook_link'] != '') {
					$social .= '<li class="facebook"><a href="'.$facebook.'"';
						if($header_setting['facebook_media_enabled']==1)
						{
						 $social .= 'target="_blank"';
						}
					$social .='><i class="fa fa-facebook"></i></a></li>';
					}
					if($header_setting['social_media_twitter_link']!='') {
					$social .= '<li class="twitter"><a href="'.$twitter.'"';
						if($header_setting['twitter_media_enabled']==1)
						{
						 $social .= 'target="_blank"';
						}
					$social .='><i class="fa fa-twitter"></i></a></li>';
					
					}
					if($header_setting['social_media_linkedin_link']!='') {
					$social .= '<li class="linkedin"><a href="'.$linkdin.'"';
						if($header_setting['linkedin_media_enabled']==1)
						{
						 $social .= 'target="_blank"';
						}
					$social .='><i class="fa fa-linkedin"></i></a></li>';
					}
					$social .='</ul>'; 
					
			}
			$social .='</ul>'; 
		
		?>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<?php wp_nav_menu( array(  
				'theme_location' => 'primary',
				'container'  => '',
				'menu_class' => 'nav navbar-nav navbar-right',
				'fallback_cb' => 'webriti_fallback_page_menu',
				'items_wrap'  => $social,
				'walker' => new webriti_nav_walker()
				 ) );
				?>
		</div><!-- /.navbar-collapse -->
	</div><!-- /.container-fluid -->
</nav>	
<!--/Logo & Menu Section-->	
<div class="clearfix"></div>