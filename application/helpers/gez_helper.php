<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');


use GuzzleHttp\Client;

if ( ! function_exists('gezClient')){
  function gezClient(){

    require_once(FCPATH.'application/third_party/gez/vendor/autoload.php');

    // Create a new instance of the Crawler
		$crawler = new Client();
		return $crawler;

  }

}