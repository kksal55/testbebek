<?php

/*
	Plugin Name: q2apro-ajax-usersearch
	Plugin URI: http://www.q2apro.com/plugins/usersearch
*/


	class q2apro_ajax_usersearch_admin {

		function init_queries($tableslc) {
		}

		// option's value is requested but the option has not yet been set
		function option_default($option) {
			switch($option) {
				case 'q2apro_ajax_usersearch_enabled':
					return 1; // true
				case 'q2apro_ajax_usersearch_imgsize':
					return 100; // image size
				case 'q2apro_ajax_usersearch_maxshow':
					return 20; // max users to show
				default:
					return null;
			}
		}
		
		function allow_template($template) {
			return ($template!='admin');
		}
		
		function admin_form(&$qa_content){                       

			// process the admin form if admin hit Save-Changes-button
			$ok = null;
			if (qa_clicked('q2apro_ajax_usersearch_save')) {
				qa_opt('q2apro_ajax_usersearch_enabled', (bool)qa_post_text('q2apro_ajax_usersearch_enabled')); // empty or 1
				qa_opt('q2apro_ajax_usersearch_imgsize', (int)qa_post_text('q2apro_ajax_usersearch_imgsize')); // int
				qa_opt('q2apro_ajax_usersearch_maxshow', (int)qa_post_text('q2apro_ajax_usersearch_maxshow')); // int
				$ok = qa_lang('admin/options_saved');
			}
			
			// form fields to display frontend for admin
			$fields = array();
			
			$fields[] = array(
				'type' => 'checkbox',
				'label' => qa_lang('q2apro_ajax_usersearch_lang/enable_plugin'),
				'tags' => 'name="q2apro_ajax_usersearch_enabled"',
				'value' => qa_opt('q2apro_ajax_usersearch_enabled'),
			);
			
			$fields[] = array(
				'type' => 'number',
				'label' => qa_lang('q2apro_ajax_usersearch_lang/admin_imgsize'),
				'tags' => 'name="q2apro_ajax_usersearch_imgsize"',
				'value' => qa_opt('q2apro_ajax_usersearch_imgsize'),
			);

			$fields[] = array(
				'type' => 'number',
				'label' => qa_lang('q2apro_ajax_usersearch_lang/admin_maxshow'),
				'tags' => 'name="q2apro_ajax_usersearch_maxshow"',
				'value' => qa_opt('q2apro_ajax_usersearch_maxshow'),
			);
			
			$fields[] = array(
				'type' => 'static',
				'note' => '<span style="font-size:12px;color:#789;">'.strtr( qa_lang('q2apro_ajax_usersearch_lang/contact'), array( 
							'^1' => '<a target="_blank" href="http://www.q2apro.com/plugins/usersearch">',
							'^2' => '</a>'
						  )).'</span>',
			);
			
			return array(           
				'ok' => ($ok && !isset($error)) ? $ok : null,
				'fields' => $fields,
				'buttons' => array(
					array(
						'label' => qa_lang_html('main/save_button'),
						'tags' => 'name="q2apro_ajax_usersearch_save"',
					),
				),
			);
		}
	}


/*
	Omit PHP closing tag to help avoid accidental output
*/