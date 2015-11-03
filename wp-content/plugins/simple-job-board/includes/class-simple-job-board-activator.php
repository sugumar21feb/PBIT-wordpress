<?php

/**
 * Fired during plugin activation
 *
 * @link       https://wordpress.org/plugins/simple-job-board
 * @since      1.0.0
 *
 * @package    Simple_Job_Board
 * @subpackage Simple_Job_Board/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Simple_Job_Board
 * @subpackage Simple_Job_Board/includes
 * @author     PressTigers <support@presstigers.com>
 */
class Simple_Job_Board_Activator
{

    /**
     * Short Description. (use period)
     *
     * Long Description.
     *
     * @since    1.0.0
     */
    public static function activate ()
    {
        // Options-> General Settings -> List Jobs with Logo & Detail
        add_option ( 'job_board_listing', 'logo-detail' );
        
        // Options-> Search filters
        add_option ( 'job_board_category_filter', 'yes', '' );
        add_option ( 'job_board_jobtype_filter', 'yes', '' );
        add_option ( 'job_board_location_filter', 'yes', '' );
        add_option ( 'job_board_search_bar', 'yes', '' );

        // Options-> Notifications
        add_option ( 'job_board_admin_notification', 'yes' );
        add_option ( 'job_board_applicant_notification', 'yes' );
        add_option ( 'job_board_hr_notification', 'no' );

        // Options-> Uploaded File Extensions
        add_option ( 'job_board_all_extensions_check', 'yes' );
        add_option ( 'job_board_anti_hotlinking', 'yes' );
        add_option ( 'job_board_allowed_extensions', array ( 'pdf', 'doc', 'docx', 'odt', 'rtf', 'txt' ) );
                  
        // .htaccess Anti-Hotlinking Rules
        $sjbrObj = new Simple_Job_Board_Rewrite();
        $sjbrObj->job_board_rewrite ();
        
        flush_rewrite_rules ();
    }

}
