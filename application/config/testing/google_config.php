<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------
|  Google API Configuration
| -------------------------------------------------------------------
| 
| To get API details you have to create a Google Project
| at Google API Console (https://console.developers.google.com)
| 
|  client_id         string   Your Google API Client ID.
|  client_secret     string   Your Google API Client secret.
|  redirect_uri      string   URL to redirect back to after login.
|  application_name  string   Your Google application name.
|  api_key           string   Developer key.
|  scopes            string   Specify scopes
*/
$config['google_client_id'] = '25991473033-3l9ol352rntj5ocgoeolc4p926jvclef.apps.googleusercontent.com';
$config['google_client_secret'] = 'ld8ftV2eiv8mX0NJV9TuKZcT';
$config['google_redirect_url'] = base_url().'login/google_login';

?>
