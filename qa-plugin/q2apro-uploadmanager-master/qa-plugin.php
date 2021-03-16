<?php

/*
	Plugin Name: q2apro Upload Manager
	Plugin URI: 
	Plugin Description: A complete upload manager for question2answer with upload details, image rotate features and more!
	Plugin Version: 1.0
	Plugin Date: 2016-02-22
	Plugin Author: q2apro
	Plugin Author URI: 
	Plugin Minimum Question2Answer Version: 1.6
	Plugin Update Check URI: 
	
	Plugin License: GPLv3

	This program is free software: you can redistribute it and/or modify
	it under the terms of the GNU General Public License as published by
	the Free Software Foundation, either version 3 of the License, or
	(at your option) any later version.

	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.

	More about this license: http://www.gnu.org/licenses/gpl.html	
*/

if(!defined('QA_VERSION'))
{
	header('Location: ../../');
	exit;
}

// main page
qa_register_plugin_module('page', 'q2apro-uploadmanager-page.php', 'q2apro_uploadmanager_page', 'q2apro Upload Manager Page');

// rotate page
qa_register_plugin_module('page', 'q2apro-image-rotate-page.php', 'q2apro_image_rotate_page', 'q2apro Image Rotate Page');

// admin
qa_register_plugin_module('module', 'q2apro-uploadmanager-admin.php', 'q2apro_uploadmanager_admin', 'q2apro Upload Manager Admin');

// language file
qa_register_plugin_phrases('q2apro-uploadmanager-lang-*.php', 'q2apro_uploadmanager_lang');



/*
	Omit PHP closing tag to help avoid accidental output
*/
