<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if (!class_exists('Services_Twilio')) {
	/**
	 * The main Twilio.php file contains an autoload method for its dependent
	 * classes, we only need to include the one file manually.
	 */
	include_once(APPPATH.'libraries/Services/Mandrill.php');
}

/**
 * Return a Mandrill services object.
 *
 * Since we don't want to create multiple connection objects we
 * will return the same object during a single page load
 *
 * @return object Mandrill Service
 */
function get_mandrill_service() {
	static $mandrill_service;

	$mandrill_service = new Mandrill('YOUR_API_KEY');

	return $mandrill_service;
}
