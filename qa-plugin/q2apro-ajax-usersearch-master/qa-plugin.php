<?php

/*
	Plugin Name: q2apro-ajax-usersearch
	Plugin URI: 
	Plugin Description: This plugin extends the users page by an ajax-driven searchfield.
	Plugin Version: 0.1
	Plugin Date: 2015-04-10
	Plugin Author: q2apro
	Plugin Author URI: 
	Plugin License: GPLv3
	Plugin Minimum Question2Answer Version: 1.5
	Plugin Update Check URI: 

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

	if (!defined('QA_VERSION')) { // don't allow this page to be requested directly from browser
		header('Location: ../../');
		exit;
	}

	// layer to insert script in head and search field on users page
	qa_register_plugin_layer('q2apro-ajax-usersearch-layer.php', 'q2apro ajax usersearch Layer');

	// page for ajax requests
	qa_register_plugin_module('page', 'q2apro-ajax-usersearch-page.php', 'q2apro_ajax_usersearch_page', 'Ajax Usersearch Page');
	
	// language file
	qa_register_plugin_phrases('q2apro-ajax-usersearch-lang-*.php', 'q2apro_ajax_usersearch_lang');

	// admin
	qa_register_plugin_module('module', 'q2apro-ajax-usersearch-admin.php', 'q2apro_ajax_usersearch_admin', 'q2apro Ajax Usersearch Admin');

/*
	Omit PHP closing tag to help avoid accidental output
*/
