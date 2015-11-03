<?php 
$appointment_options=theme_setup_data(); 
$service_setting = wp_parse_args(  get_option( 'appointment_options', array() ), $appointment_options );
if($service_setting['service_section_enabled'] == '' ) { ?>
<div class="Service-section">
	 <div class="content-area">
            <div class="container">
                <h2>Overview</h2>
                    <div class="overview">
                         <p>Successful businesses in this dynamic world believe in building the right talent at the right time to support their vision and objectives. We believe our hands-on knowledge in the IT industry with our smart head hunters coming from a technical background will support you through the Talent Acquisitions needs. </p>

                        <p>Recruitment business with tailored processes and models for each customer, relying on the modern social and professional networks besides the Job Portals and other recruitment events. Track record of a quick turnaround and high success rate along with a competitive margin in the market would mean everything to you.</p>

                        <p>Having developed a few innovative recruitment solutions and candidate assessment techniques to identify the right talent, across a wide variety of domain specialisations, at different levels, we would be very happy to be your talent partner and drive your business growth.
                        </p>
                  </div>                   
            </div>
            <hr>

           <div class="container">
                <div class="row page-title text-center wow zoomInDown" data-wow-delay="1s">
                    <h5>Our Process</h5>
                    <h2>How we work for you?</h2>
                    
                </div>
                <div class="row how-it-work text-center">
                    <div class="col-md-3">
                        <div class="single-work wow fadeInUp" data-wow-delay="0.8s">
                            <img src="<?php echo WEBRITI_TEMPLATE_DIR_URI; ?>/images/technology.png" alt="">
                            <h3>Technology</h3>
                            <p><a href="#">View jobs</a></p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="single-work  wow fadeInUp"  data-wow-delay="0.9s">
                            <img src="<?php echo WEBRITI_TEMPLATE_DIR_URI; ?>/images/media.png" alt="">
                            <h3>Telecom and Media</h3>
                            <p><a href="#">View jobs</a></p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="single-work wow fadeInUp"  data-wow-delay="1s">
                            <img src="<?php echo WEBRITI_TEMPLATE_DIR_URI; ?>/images/retail.png" alt="">
                            <h3>Retail</h3>
                            <p><a href="#">View jobs</a></p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="single-work wow fadeInUp"  data-wow-delay="1s">
                            <img src="<?php echo WEBRITI_TEMPLATE_DIR_URI; ?>/images/finance.png" alt="">
                            <h3>Finance</h3>
                            <p><a href="#">View jobs</a></p>
                        </div>
                    </div>
                </div>
            </div>
            <hr>

            <div class="container">
                <div class="row page-title text-center wow bounce"  data-wow-delay="1s">
                    <h5>Recent Jobs</h5>
                    <h2><span>54716</span> Available jobs for you</h2>
                </div>
                <div class="row jobs">
                    <div class="col-md-9">
                        <div class="job-posts table-responsive">
                            <table class="table">
                                <tr class="odd wow fadeInUp" data-wow-delay="1s">
                                    <td class="tbl-logo"><img src="<?php echo WEBRITI_TEMPLATE_DIR_URI; ?>/images/job-logo1.png" alt=""></td>
                                    <td class="tbl-title"><h4>Web Designer <br><span class="job-type">full time</span></h4></td>
                                    <td><p>dribbble community</p></td>
                                    <td><p><i class="icon-location"></i>San Franciso, USA</p></td>
                                    <td><p>&dollar; 14000</p></td>
                                    <td class="tbl-apply"><a href="#">Apply now</a></td>
                                </tr>
                                <tr class="even wow fadeInUp" data-wow-delay="1.1s">
                                    <td class="tbl-logo"><img src="<?php echo WEBRITI_TEMPLATE_DIR_URI; ?>/images/job-logo2.png" alt=""></td>
                                    <td class="tbl-title"><h4>Front End Developer <br><span class="job-type">full time</span></h4></td>
                                    <td><p>Jolil corporation</p></td>
                                    <td><p><i class="icon-location"></i>San Franciso, USA</p></td>
                                    <td><p>&dollar; 14000</p></td>
                                    <td class="tbl-apply"><a href="#">Apply now</a></td>
                                </tr>
                                <tr class="odd wow fadeInUp" data-wow-delay="1.2s">
                                    <td class="tbl-logo"><img src="<?php echo WEBRITI_TEMPLATE_DIR_URI; ?>/images/job-logo3.png" alt=""></td>
                                    <td class="tbl-title"><h4>HR Manager <br><span class="job-type">full time</span></h4></td>
                                    <td><p>Fanta bevarage</p></td>
                                    <td><p><i class="icon-location"></i>San Franciso, USA</p></td>
                                    <td><p>&dollar; 14000</p></td>
                                    <td class="tbl-apply"><a href="#">Apply now</a></td>
                                </tr>
                                <tr class="even wow fadeInUp" data-wow-delay="1.3s">
                                    <td class="tbl-logo"><img src="<?php echo WEBRITI_TEMPLATE_DIR_URI; ?>/images/job-logo4.png" alt=""></td>
                                    <td class="tbl-title"><h4>Internship Designer <br><span class="job-type">full time</span></h4></td>
                                    <td><p>Google</p></td>
                                    <td><p><i class="icon-location"></i>San Franciso, USA</p></td>
                                    <td><p>&dollar; 14000</p></td>
                                    <td class="tbl-apply"><a href="#">Apply now</a></td>
                                </tr>
                                <tr class="odd wow fadeInUp" data-wow-delay="1.4s">
                                    <td class="tbl-logo"><img src="<?php echo WEBRITI_TEMPLATE_DIR_URI; ?>/images/job-logo5.png" alt=""></td>
                                    <td class="tbl-title"><h4>Software Designer <br><span class="job-type">full time</span></h4></td>
                                    <td><p>Microsoft</p></td>
                                    <td><p><i class="icon-location"></i>San Franciso, USA</p></td>
                                    <td><p>&dollar; 14000</p></td>
                                    <td class="tbl-apply"><a href="#">Apply now</a></td>
                                </tr>
                                <tr class="even hide-jobs">
                                    <td class="tbl-logo"><img src="<?php echo WEBRITI_TEMPLATE_DIR_URI; ?>/images/job-logo4.png" alt=""></td>
                                    <td class="tbl-title"><h4>Internship Designer <br><span class="job-type">full time</span></h4></td>
                                    <td><p>Google</p></td>
                                    <td><p><i class="icon-location"></i>San Franciso, USA</p></td>
                                    <td><p>&dollar; 14000</p></td>
                                    <td class="tbl-apply"><a href="#">Apply now</a></td>
                                </tr>
                                <tr class="odd hide-jobs">
                                    <td class="tbl-logo"><img src="<?php echo WEBRITI_TEMPLATE_DIR_URI; ?>/images/job-logo5.png" alt=""></td>
                                    <td class="tbl-title"><h4>Software Designer <br><span class="job-type">full time</span></h4></td>
                                    <td><p>Microsoft</p></td>
                                    <td><p><i class="icon-location"></i>San Franciso, USA</p></td>
                                    <td><p>&dollar; 14000</p></td>
                                    <td class="tbl-apply"><a href="#">Apply now</a></td>
                                </tr>
                                <tr class="even hide-jobs">
                                    <td class="tbl-logo"><img src="<?php echo WEBRITI_TEMPLATE_DIR_URI; ?>/images/job-logo4.png" alt=""></td>
                                    <td class="tbl-title"><h4>Internship Designer <br><span class="job-type">full time</span></h4></td>
                                    <td><p>Google</p></td>
                                    <td><p><i class="icon-location"></i>San Franciso, USA</p></td>
                                    <td><p>&dollar; 14000</p></td>
                                    <td class="tbl-apply"><a href="#">Apply now</a></td>
                                </tr>
                                <tr class="odd hide-jobs">
                                    <td class="tbl-logo"><img src="<?php echo WEBRITI_TEMPLATE_DIR_URI; ?>/images/job-logo5.png" alt=""></td>
                                    <td class="tbl-title"><h4>Software Designer <br><span class="job-type">full time</span></h4></td>
                                    <td><p>Microsoft</p></td>
                                    <td><p><i class="icon-location"></i>San Franciso, USA</p></td>
                                    <td><p>&dollar; 14000</p></td>
                                    <td class="tbl-apply"><a href="#">Apply now</a></td>
                                </tr>
                            </table>
                        </div>
                        <div class="more-jobs">
                            <a href=""> <i class="fa fa-refresh"></i>View more jobs</a>
                        </div>
                    </div>
                    <div class="col-md-3 hidden-sm">
                        <div class="job-add wow fadeInRight" data-wow-delay="1.5s">
                            <h2>Seeking a job?</h2>
                            <a href="#">Create a Account</a>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
<!-- /HomePage Service Section -->
<?php } ?>