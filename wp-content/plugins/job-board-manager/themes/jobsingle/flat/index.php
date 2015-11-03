<?php

/*
* @Author 		ParaTheme
* Copyright: 	2015 ParaTheme
*/

if ( ! defined('ABSPATH')) exit;  // if direct access

	include job_bm_plugin_dir.'/templates/variables.php';
	
	$html .= '<div class="job-single">';
	
	$html .= '<div class="continer-main">';
	
	include job_bm_plugin_dir.'/templates/title.php';
	
	$html .= '<div class="meta-container">';
	include job_bm_plugin_dir.'/templates/meta.php';
	$html .= '</div>'; // .meta-container


	include job_bm_plugin_dir.'/templates/content.php';
	
	$html .= '</div>'; // .continer-main

	$html .= '<div class="continer-side">';	
	include job_bm_plugin_dir.'/templates/sidebar.php';
	$html .= '</div>'; // .continer-side	

	$html .= '</div>'; // .job-single	

	include job_bm_plugin_dir.'/templates/style.php';