<?php
	/*
    * Basic Site Settings and API Configuration
    */
	
	// Database configuration
	const DB_HOST = 'localhost';
	const DB_USER = 'root';
	const DB_PASS = '';
	const DB_NAME = 'formvalidation';
	
	
	// Google API configuration
	const GOOGLE_CLIENT_ID     = '284096022474-e0adkc8gaup09svoo2tvfsj2en561vgh.apps.googleusercontent.com';
	const GOOGLE_CLIENT_SECRET = 'VvBq3_BdTIAtmjBbumEN4vmV';
	const GOOGLE_REDIRECT_URL  = 'http://localhost/formvalidation/';
	
	
	// Start session
	if ( ! session_id() ) {
		session_start();
	}
	
	// Include Google API client library
	require_once 'google-api-php-client/vendor/autoload.php';
	
	// Call Google API
	$gClient = new Google_Client();
	$gClient->setApplicationName( 'Login to Advaita Real Estate' );
	$gClient->setClientId( GOOGLE_CLIENT_ID );
	$gClient->setClientSecret( GOOGLE_CLIENT_SECRET );
	$gClient->setRedirectUri( GOOGLE_REDIRECT_URL );