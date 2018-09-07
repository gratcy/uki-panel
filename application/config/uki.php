<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| Base Site URL
|--------------------------------------------------------------------------
|
| URL to your CodeIgniter root. Typically this will be your base URL,
| WITH a trailing slash:
|
|	http://example.com/
|
| WARNING: You MUST set this value!
|
| If it is not set, then CodeIgniter will try guess the protocol and path
| your installation, but due to security concerns the hostname will be set
| to $_SERVER['SERVER_ADDR'] if available, or localhost otherwise.
| The auto-detection mechanism exists only for convenience during
| development and MUST NOT be used in production!
|
| If you need to allow multiple domains, remember that this file is still
| a PHP script and you can easily do that on your own.
|
*/
$config['base_url'] = getenv('BASEURL');
$config['faculty'] = ['Kedokteran', 'Ekonomi', 'Sosial & Politik', 'Sastra', 'Hukum', 'Teknik', 'Keguruan dan Ilmu Pendidikan'];
$config['upload']['host'] = getenv('BASEURL');
$config['upload']['media']['path'] = 'upload/';
$config['upload']['gallery']['path'] = 'upload/gallery/';
$config['upload']['slideshow']['path'] = 'upload/slideshow/';
$config['upload']['testimonial']['path'] = 'upload/testimonial/';