<?php
/**
 * Plugin Name: Payu Payment Gateway for Reseller Club
 * Plugin URI: http://codecanyon.net/user/ladybirdweb
 * Description: This extends Reseller Club to accepts money/payments through Payu Payment gateway on your supersite. 
 * File Description: The base configurations of the plugin.
 * This file has the following configurations:  Reseller Club Key, Payu Merchant ID or Key, Payu Salt 
 * Author: Ladybird Web Solution
 * Author URI: http://www.ladybirdweb.com
 * Version: 1.0
 * Copyright 2014 Ladybird Web Solution
 * @package  Payu Payment Gateway for Reseller Club
 * License: Envato/codecanyon License
 * License URI: http://codecanyon.net/licenses/
 */


/** Payu Money Merchant ID or Key */
$merchant_id ="merchant_id_here"; //Shared by Payu 

/** Payu Money Merchant Salt */
$salt ="salt_here"; //Shared by Payu 

/** Reseller Club Key */
$key = "key_here"; //replace ur 32 bit secure key , Get your secure key from your Reseller Control panel

/** Directry URL */
$directory_url =  "directory_url_here" ;

/** Redirection URL */
$redirect_url =  "redirect_url_here" ;

/** Action URL from Chekout page */
$action_url =  "action_url_here" ;

/** Currency */
$currency =  "currency_here" ;

/** Gateway Post URL */
$base_url="https://secure.payu.in/_payment"; // End point - change to https://test.payu.in for TEST mode

?>


