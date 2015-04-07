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
$merchant_id ="C0Dr8m"; //Shared by Payu 

/** Payu Money Merchant Salt */
$salt ="3sf0jURk"; //Shared by Payu 

/** Reseller Club Key */
$key = "5FG8s6Ay9vX6oRkrsEo1IsK7txuPs72t"; //replace ur 32 bit secure key , Get your secure key from your Reseller Control panel

/** Directry URL */
$directory_url =  "http://demoladybird.com/payment" ;

/** Redirection URL */
$redirect_url =  "http://demoladybird.com/payment/responsehandler.php" ;

/** Action URL from Chekout page */
$action_url =  "http://demoladybird.com/payment/checkout.php" ;

/** Currency */
$currency =  "INR" ;

/** Gateway Post URL */
$base_url="https://test.payu.in/_payment"; // End point - change to https://secure.payu.in for LIVE mode

?>


