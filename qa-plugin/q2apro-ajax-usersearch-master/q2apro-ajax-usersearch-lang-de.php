<?php

/*
	Plugin Name: q2apro-ajax-usersearch
	Plugin URI: http://www.q2apro.com/plugins/usersearch
	Plugin Description: Extend the users page with an ajax searchfield, also provides a user search widget.
*/

	return array(
		// default
		'enable_plugin' => 'Plugin aktivieren', // Enable Plugin (checkbox)
		'minimum_level' => 'Auf Seite zugreifen und Posts bearbeiten können:', // Level to access this page and edit posts:
		'plugin_disabled' => 'Dieses Plugin wurde deaktiviert.', // Plugin has been disabled.
		'access_forbidden' => 'Zugriff nicht erlaubt.', // Access forbidden.
		'plugin_page_url' => 'Seite im Forum öffnen:', // Open page in forum:
		'contact' => 'Bei Fragen bitte ^1q2apro.com^2 besuchen.', // For questions please visit ^1q2apro.com^2
		
		// plugin specific
		'input_placeholder' => 'Mitgliedsname',
		'searchlabel' => 'Mitglied finden:',
		'no_user_found' => 'Kein Mitglied mit diesem Namen gefunden.',
		'admin_imgsize' => 'Bildbreite des Avatars:',
		'admin_maxshow' => 'Maximale Anzahl an Mitglieder, die im Suchresultat angezeigt werden:',
	);
	

/*
	Omit PHP closing tag to help avoid accidental output
*/