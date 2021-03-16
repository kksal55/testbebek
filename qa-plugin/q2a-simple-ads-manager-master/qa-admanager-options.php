<?php


class pt_qa_simple_admanager {

	function allow_template($template)
	{
		return ($template!='admin');
	}


	function option_default($option) {

                switch($option) {
			case 'pt_q2a_ad_css': return '.sidebar-ad{position:fixed; left:0; vertical-align: top; height: 400px; width:150px;} .adcode{margin:0px;}@media only screen and (max-width: 1499px) {.sidebar-ad{display:none;}  }';
			case 'pt_q2a_ad_after_question_level':
			case 'pt_q2a_ad_before_question_level':
			case 'c':
			case 'pt_q2a_ad_after_all_answers_level':
			case 'pt_q2a_ad_after_all_questions_level':
			case 'pt_q2a_ad_before_all_questions_level':
			case 'pt_q2a_ad_sidebar_level':
			case 'pt_q2a_ad_leftside_level':
			case 'pt_q2a_ad_autoad_level':
                                return QA_USER_LEVEL_SUPER+1;
			case 'pt_q2a_ad_hideaskpage': return 1;
			
			//-----
			case 'pt_q2a_ad_ust_desktop':
			case 'pt_q2a_ad_ust_mobil':
			case 'pt_q2a_ad_head_desktop':
			case 'pt_q2a_ad_head_mobil':
			case 'pt_q2a_ad_body_desktop':
			case 'pt_q2a_ad_body_mobil':
			//-------
                        default:
                                return null;
                }

        }


	function admin_form(&$qa_content)
	{

		$ok = null;
		if (qa_clicked('pt_q2a_simple_ads_manager_save_button')) 
		{
			qa_opt('pt_q2a_ad_css', qa_post_text('pt_q2a_ad_css'));  
			qa_opt('pt_q2a_ad_app_reklam_suresi', qa_post_text('pt_q2a_ad_app_reklam_suresi'));
 
			qa_opt('pt_q2a_ad_after_question',(bool)qa_post_text('pt_q2a_ad_after_question'));
			qa_opt('pt_q2a_ad_after_question_codebox', qa_post_text('pt_q2a_ad_after_question_code_field'));   
			qa_opt('pt_q2a_ad_after_question_level',qa_post_text('pt_q2a_ad_after_question_level'));
			qa_opt('pt_q2a_ad_after_question_app_ok',(bool)qa_post_text('pt_q2a_ad_after_question_app_ok'));
            qa_opt('pt_q2a_ad_after_question_app_level',qa_post_text('pt_q2a_ad_after_question_app_level'));
			
			qa_opt('pt_q2a_ad_before_question',(bool)qa_post_text('pt_q2a_ad_before_question'));
			qa_opt('pt_q2a_ad_before_question_codebox', qa_post_text('pt_q2a_ad_before_question_code_field'));   
			qa_opt('pt_q2a_ad_before_question_level',qa_post_text('pt_q2a_ad_before_question_level'));
            qa_opt('pt_q2a_ad_before_question_app_level',qa_post_text('pt_q2a_ad_before_question_app_level'));

			
			qa_opt('pt_q2a_ad_after_menu_bar',(bool)qa_post_text('pt_q2a_ad_after_menu_bar'));
			qa_opt('pt_q2a_ad_after_menu_bar_codebox', qa_post_text('pt_q2a_ad_after_menu_bar_code_field'));   
			qa_opt('pt_q2a_ad_after_menu_bar_level',qa_post_text('pt_q2a_ad_after_menu_bar_level'));
            qa_opt('pt_q2a_ad_after_menu_bar_app_level',qa_post_text('pt_q2a_ad_after_menu_bar_app_level'));

			
			qa_opt('pt_q2a_ad_after_all_answers',(bool)qa_post_text('pt_q2a_ad_after_all_answers'));
			qa_opt('pt_q2a_ad_after_all_answers_codebox', qa_post_text('pt_q2a_ad_after_all_answers_code_field'));   
			qa_opt('pt_q2a_ad_after_all_answers_level',qa_post_text('pt_q2a_ad_after_all_answers_level'));
            qa_opt('pt_q2a_ad_after_all_answers_app_level',qa_post_text('pt_q2a_ad_after_all_answers_app_level'));

			qa_opt('pt_q2a_ad_after_first_answer',(bool)qa_post_text('pt_q2a_ad_after_first_answer'));
			qa_opt('pt_q2a_ad_after_first_answer_codebox', qa_post_text('pt_q2a_ad_after_first_answer_code_field'));  
            qa_opt('pt_q2a_ad_after_first_answer_codebox_1', qa_post_text('pt_q2a_ad_after_first_answer_code_field_1')); 
            qa_opt('pt_q2a_ad_after_first_answer_codebox_des', qa_post_text('pt_q2a_ad_after_first_answer_code_field_des'));  
            qa_opt('pt_q2a_ad_after_first_answer_codebox_1_d', qa_post_text('pt_q2a_ad_after_first_answer_code_field_1_d')); 
            qa_opt('pt_q2a_ad_after_first_answer_codebox_3', qa_post_text('pt_q2a_ad_after_first_answer_code_field_3')); 
			qa_opt('pt_q2a_ad_after_first_answer_level',qa_post_text('pt_q2a_ad_after_first_answer_level'));
            qa_opt('pt_q2a_ad_after_first_answer_loop',qa_post_text('pt_q2a_ad_after_first_answer_loop'));
            qa_opt('pt_q2a_ad_after_first_answer_app_level',qa_post_text('pt_q2a_ad_after_first_answer_app_level'));
			
			qa_opt('pt_q2a_ad_after_all_questions',(bool)qa_post_text('pt_q2a_ad_after_all_questions'));
			qa_opt('pt_q2a_ad_after_all_questions_codebox', qa_post_text('pt_q2a_ad_after_all_questions_code_field'));   
			qa_opt('pt_q2a_ad_after_all_questions_level',qa_post_text('pt_q2a_ad_after_all_questions_level'));
			qa_opt('pt_q2a_ad_after_all_questions_app_ok',(bool)qa_post_text('pt_q2a_ad_after_all_questions_app_ok'));
            qa_opt('pt_q2a_ad_after_all_questions_app_level',qa_post_text('pt_q2a_ad_after_all_questions_app_level'));

			
			qa_opt('pt_q2a_ad_before_all_questions',(bool)qa_post_text('pt_q2a_ad_before_all_questions'));
			qa_opt('pt_q2a_ad_before_all_questions_codebox', qa_post_text('pt_q2a_ad_before_all_questions_code_field'));   
			qa_opt('pt_q2a_ad_before_all_questions_level',qa_post_text('pt_q2a_ad_before_all_questions_level'));
            qa_opt('pt_q2a_ad_before_all_questions_app_level',qa_post_text('pt_q2a_ad_before_all_questions_app_level'));
			
			qa_opt('pt_q2a_ad_sidebar',(bool)qa_post_text('pt_q2a_ad_sidebar'));
			qa_opt('pt_q2a_ad_sidebar_codebox', qa_post_text('pt_q2a_ad_sidebar_code_field'));   
			qa_opt('pt_q2a_ad_sidebar_level',qa_post_text('pt_q2a_ad_sidebar_level'));
            qa_opt('pt_q2a_ad_sidebar_app_level',qa_post_text('pt_q2a_ad_sidebar_app_level'));
			
			
			//--------------
			
			qa_opt('pt_q2a_ad_ust_desktop',(bool)qa_post_text('pt_q2a_ad_ust_desktop'));
			qa_opt('pt_q2a_ad_ust_desktop_codebox', qa_post_text('pt_q2a_ad_ust_desktop_code_field'));   
			qa_opt('pt_q2a_ad_ust_desktop_level',qa_post_text('pt_q2a_ad_ust_desktop_level'));
			qa_opt('pt_q2a_ad_ust_desktop_app_ok',(bool)qa_post_text('pt_q2a_ad_ust_desktop_app_ok'));
            qa_opt('pt_q2a_ad_ust_desktop_app_level',qa_post_text('pt_q2a_ad_ust_desktop_app_level'));
			
			qa_opt('pt_q2a_ad_ust_mobil',(bool)qa_post_text('pt_q2a_ad_ust_mobil'));
			qa_opt('pt_q2a_ad_ust_mobil_codebox', qa_post_text('pt_q2a_ad_ust_mobil_code_field'));   
			qa_opt('pt_q2a_ad_ust_mobil_level',qa_post_text('pt_q2a_ad_ust_mobil_level'));
			qa_opt('pt_q2a_ad_ust_mobil_app_ok',(bool)qa_post_text('pt_q2a_ad_ust_mobil_app_ok'));
            qa_opt('pt_q2a_ad_ust_mobil_app_level',qa_post_text('pt_q2a_ad_ust_mobil_app_level'));
			
			qa_opt('pt_q2a_ad_head_desktop',(bool)qa_post_text('pt_q2a_ad_head_desktop'));
			qa_opt('pt_q2a_ad_head_desktop_codebox', qa_post_text('pt_q2a_ad_head_desktop_code_field'));   
			qa_opt('pt_q2a_ad_head_desktop_level',qa_post_text('pt_q2a_ad_head_desktop_level'));
            qa_opt('pt_q2a_ad_head_desktop_app_level',qa_post_text('pt_q2a_ad_head_desktop_app_level'));
			
			qa_opt('pt_q2a_ad_head_mobil',(bool)qa_post_text('pt_q2a_ad_head_mobil'));
			qa_opt('pt_q2a_ad_head_mobil_codebox', qa_post_text('pt_q2a_ad_head_mobil_code_field'));   
			qa_opt('pt_q2a_ad_head_mobil_level',qa_post_text('pt_q2a_ad_head_mobil_level'));
            qa_opt('pt_q2a_ad_head_mobil_app_level',qa_post_text('pt_q2a_ad_head_mobil_app_level'));
			
			qa_opt('pt_q2a_ad_body_desktop',(bool)qa_post_text('pt_q2a_ad_body_desktop'));
			qa_opt('pt_q2a_ad_body_desktop_codebox', qa_post_text('pt_q2a_ad_body_desktop_code_field'));   
			qa_opt('pt_q2a_ad_body_desktop_level',qa_post_text('pt_q2a_ad_body_desktop_level'));
            qa_opt('pt_q2a_ad_body_desktop_app_level',qa_post_text('pt_q2a_ad_body_desktop_app_level'));
			
			qa_opt('pt_q2a_ad_body_mobil',(bool)qa_post_text('pt_q2a_ad_body_mobil'));
			qa_opt('pt_q2a_ad_body_mobil_codebox', qa_post_text('pt_q2a_ad_body_mobil_code_field'));   
			qa_opt('pt_q2a_ad_body_mobil_level',qa_post_text('pt_q2a_ad_body_mobil_level'));
            qa_opt('pt_q2a_ad_body_mobil_app_level',qa_post_text('pt_q2a_ad_body_mobil_app_level'));
			
			//--------------
			
			
			qa_opt('pt_q2a_ad_leftside',(bool)qa_post_text('pt_q2a_ad_leftside'));
			qa_opt('pt_q2a_ad_leftside_codebox', qa_post_text('pt_q2a_ad_leftside_code_field'));   
			qa_opt('pt_q2a_ad_leftside_level',qa_post_text('pt_q2a_ad_leftside_level'));
            qa_opt('pt_q2a_ad_leftside_app_level',qa_post_text('pt_q2a_ad_leftside_app_level'));
			
			qa_opt('pt_q2a_ad_autoad',(bool)qa_post_text('pt_q2a_ad_autoad'));
			qa_opt('pt_q2a_ad_autoad_codebox', qa_post_text('pt_q2a_ad_autoad_code_field'));   
			qa_opt('pt_q2a_ad_autoad_level',qa_post_text('pt_q2a_ad_autoad_level'));
            qa_opt('pt_q2a_ad_autoad_app_level',qa_post_text('pt_q2a_ad_autoad_app_level'));
            			
			qa_opt('pt_q2a_ad_hide_categories', qa_post_text('pt_q2a_ad_hide_categories'));   
			qa_opt('pt_q2a_ad_hideaskpage',(bool)qa_post_text('pt_q2a_ad_hideaskpage'));
			
			$ok = qa_lang('admin/options_saved');
		}
        
		qa_set_display_rules($qa_content, array(
				
			'pt_q2a_ad_after_menu_bar_code_display' => 'pt_q2a_ad_after_menu_bar',
                'pt_q2a_ad_after_menu_bar_code_display_level_on' => 'pt_q2a_ad_after_menu_bar',
                'pt_q2a_ad_after_menu_bar_code_display_loop_on' => 'pt_q2a_ad_after_menu_bar',
			'pt_q2a_ad_before_question_code_display' => 'pt_q2a_ad_before_question',
                'pt_q2a_ad_before_question_code_display_level_on' => 'pt_q2a_ad_before_question',
                'pt_q2a_ad_before_question_code_display_loop_on' => 'pt_q2a_ad_before_question',
			'pt_q2a_ad_after_question_code_display' => 'pt_q2a_ad_after_question',
                'pt_q2a_ad_after_question_code_display_level_on' => 'pt_q2a_ad_after_question',
                'pt_q2a_ad_after_question_code_display_loop_on' => 'pt_q2a_ad_after_question',
			'pt_q2a_ad_after_first_answer_code_display' => 'pt_q2a_ad_after_first_answer',
                'pt_q2a_ad_after_first_answer_code_display_1' => 'pt_q2a_ad_after_first_answer',
                'pt_q2a_ad_after_first_answer_code_display_1_d' => 'pt_q2a_ad_after_first_answer',
                'pt_q2a_ad_after_first_answer_code_display_3' => 'pt_q2a_ad_after_first_answer',
                'pt_q2a_ad_after_first_answer_loop_display' => 'pt_q2a_ad_after_first_answer',
                'pt_q2a_ad_after_first_answer_code_display_des' => 'pt_q2a_ad_after_first_answer',
                'pt_q2a_ad_after_first_answer_loop_display_on' => 'pt_q2a_ad_after_first_answer',
                'pt_q2a_ad_after_first_answer_loop_display_off' => 'pt_q2a_ad_after_first_answer',
                'pt_q2a_ad_after_first_answer_code_display_level_on' => 'pt_q2a_ad_after_first_answer',
            
			'pt_q2a_ad_after_all_answers_code_display' => 'pt_q2a_ad_after_all_answers',
                'pt_q2a_ad_after_all_answers_code_display_level_on' => 'pt_q2a_ad_after_all_answers',
                'pt_q2a_ad_after_all_answers_code_display_loop_on' => 'pt_q2a_ad_after_all_answers',

			'pt_q2a_ad_before_all_questions_code_display' => 'pt_q2a_ad_before_all_questions',
                'pt_q2a_ad_before_all_questions_code_display_level_on' => 'pt_q2a_ad_before_all_questions',
                'pt_q2a_ad_before_all_questions_code_display_loop_on' => 'pt_q2a_ad_before_all_questions',
            
			'pt_q2a_ad_after_all_questions_code_display' => 'pt_q2a_ad_after_all_questions',
                'pt_q2a_ad_after_all_questions_code_display_level_on' => 'pt_q2a_ad_after_all_questions',
                'pt_q2a_ad_after_all_questions_code_display_loop_on' => 'pt_q2a_ad_after_all_questions',
            
			'pt_q2a_ad_sidebar_code_display' => 'pt_q2a_ad_sidebar',
                'pt_q2a_ad_sidebar_code_display_level_on' => 'pt_q2a_ad_sidebar',
                'pt_q2a_ad_sidebar_code_display_loop_on' => 'pt_q2a_ad_sidebar',
            
			'pt_q2a_ad_leftside_code_display' => 'pt_q2a_ad_leftside',
                'pt_q2a_ad_leftside_code_display_loop_on' => 'pt_q2a_ad_leftside',
                'pt_q2a_ad_leftside_code_display_level_on' => 'pt_q2a_ad_leftside',
            
			'pt_q2a_ad_autoad_code_display' => 'pt_q2a_ad_autoad',
            
                'pt_q2a_ad_autoad_code_display_on' => 'pt_q2a_ad_autoad',
                'pt_q2a_ad_autoad_code_display_level_on' => 'pt_q2a_ad_autoad',
                'pt_q2a_ad_autoad_code_display_loop_on' => 'pt_q2a_ad_autoad',
			
			//-----
			'pt_q2a_ad_ust_desktop_code_display' => 'pt_q2a_ad_ust_desktop',
                'pt_q2a_ad_ust_desktop_code_display_level_on' => 'pt_q2a_ad_ust_desktop',
                'pt_q2a_ad_ust_desktop_code_display_loop_on' => 'pt_q2a_ad_ust_desktop',
			'pt_q2a_ad_ust_mobil_code_display' => 'pt_q2a_ad_ust_mobil',
                'pt_q2a_ad_ust_mobil_code_display_level_on' => 'pt_q2a_ad_ust_mobil',
                'pt_q2a_ad_ust_mobil_code_display_loop_on' => 'pt_q2a_ad_ust_mobil',
			'pt_q2a_ad_head_desktop_code_display' => 'pt_q2a_ad_head_desktop',
                'pt_q2a_ad_head_desktop_code_display_level_on' => 'pt_q2a_ad_head_desktop',
                'pt_q2a_ad_head_desktop_code_display_loop_on' => 'pt_q2a_ad_head_desktop',
			'pt_q2a_ad_head_mobil_code_display' => 'pt_q2a_ad_head_mobil',
                'pt_q2a_ad_head_mobil_code_display_level_on' => 'pt_q2a_ad_head_mobil',
                'pt_q2a_ad_head_mobil_code_display_loop_on' => 'pt_q2a_ad_head_mobil',
			'pt_q2a_ad_body_desktop_code_display' => 'pt_q2a_ad_body_desktop',
                'pt_q2a_ad_body_desktop_code_display_level_on' => 'pt_q2a_ad_body_desktop',
                'pt_q2a_ad_body_desktop_code_display_loop_on' => 'pt_q2a_ad_body_desktop',
			'pt_q2a_ad_body_mobil_code_display' => 'pt_q2a_ad_body_mobil',
                'pt_q2a_ad_body_mobil_code_display_level_on' => 'pt_q2a_ad_body_mobil',
                'pt_q2a_ad_body_mobil_code_display_loop_on' => 'pt_q2a_ad_body_mobil',
			
			'pt_q2a_ad_ust_desktop_app_ok_code_display' => 'pt_q2a_ad_ust_desktop_app_ok',
                'pt_q2a_ad_ust_desktop_app_ok_code_display_level_on' => 'pt_q2a_ad_ust_desktop_app_ok',
                'pt_q2a_ad_ust_desktop_app_ok_code_display_loop_on' => 'pt_q2a_ad_ust_desktop_app_ok',
			'pt_q2a_ad_ust_mobil_app_ok_code_display' => 'pt_q2a_ad_ust_mobil_app_ok',
                'pt_q2a_ad_ust_mobil_app_ok_code_display' => 'pt_q2a_ad_ust_mobil_app_ok',
                'pt_q2a_ad_ust_mobil_app_ok_code_display_loop_on' => 'pt_q2a_ad_ust_mobil_app_ok',
			//----
				
		));

		$showoptions = array(
                                QA_USER_LEVEL_BASIC => "Registered",
                                QA_USER_LEVEL_EXPERT => "Experts",
                                QA_USER_LEVEL_EDITOR => "Editors",
                                QA_USER_LEVEL_MODERATOR =>      "Moderators",
                                QA_USER_LEVEL_ADMIN =>  "Admins",
                                QA_USER_LEVEL_SUPER =>  "Super Admins",
                                QA_USER_LEVEL_SUPER + 1 =>  "Show for EveryOne",
                                );
        
        $app_user_reklam_durumu = array(
                                2 => "Belirlenen zamanda bir",
                                1 => "Herzaman açık kalsın",
                                0 => "herzaman kapalı kalsın",
                                );

		$fields = array();
		$fields[] = array(
			'id' => 'pt_q2a_ad_css',
			'label' => 'CSS code',
			'type' => 'textarea',
			'value' => qa_opt('pt_q2a_ad_css'),
			'tags' => 'NAME="pt_q2a_ad_css"',
            'rows' => 2,
		);
		
		$fields[] = array(
			'id' => 'pt_q2a_ad_app_reklam_suresi',
			'label' => 'App kullanicilarina Reklamlar kac dakikada bir yayınlansin',
			'type' => 'number',
			'value' => qa_opt('pt_q2a_ad_app_reklam_suresi'),
			'tags' => 'NAME="pt_q2a_ad_app_reklam_suresi"',
            'rows' => 1,
		);
		
		$fields[] = array(
			'label' => 'Hide Ads on Ask Page (makes reload faster)',
			'type' => 'checkbox',
			'value' => qa_opt('pt_q2a_ad_hideaskpage'),
			'tags' => 'NAME="pt_q2a_ad_hideaskpage" ID="pt_q2a_ad_hideaskpage"',
		);
		$fields[] = array(
			'id' => 'pt_q2a_ad_hide_categories',
			'label' => 'Enter the categories for which no Ad will be shown',
			'type' => 'text',
			'value' => qa_opt('pt_q2a_ad_hide_categories'),
			'tags' => 'NAME="pt_q2a_ad_hide_categories"',
            );
		$fields[] = array(
			'label' => 'Ad after Menu Bar',
			'type' => 'checkbox',
			'value' => qa_opt('pt_q2a_ad_after_menu_bar'),
			'tags' => 'NAME="pt_q2a_ad_after_menu_bar" ID="pt_q2a_ad_after_menu_bar"',
		);
		
		$fields[] = array(
			'id' => 'pt_q2a_ad_after_menu_bar_code_display',
			//'label' => 'Paste HTML Ad Code in this box(try 728x15 text/link ad)',
			'type' => 'textarea',
			'value' => qa_opt('pt_q2a_ad_after_menu_bar_codebox'),
			'tags' => 'NAME="pt_q2a_ad_after_menu_bar_code_field"',
            'rows' => 2,
		);		
        
        $fields[] = array(
            
            'id' => 'pt_q2a_ad_after_menu_bar_code_display_loop_on',
			'label' => 'App user Durum: ',
			'type' => 'select',
			'value' => @$app_user_reklam_durumu[qa_opt('pt_q2a_ad_after_menu_bar_app_level')],
			'tags' => 'NAME="pt_q2a_ad_after_menu_bar_app_level" ID="pt_q2a_ad_after_menu_bar_app_level"',
			'options' => $app_user_reklam_durumu
		);
        
		$fields[] = array(
            'id' => 'pt_q2a_ad_after_menu_bar_code_display_level_on',
			'label' => 'Kullanıcı seviyesi: ',
			'type' => 'select',
			'value' => @$showoptions[qa_opt('pt_q2a_ad_after_menu_bar_level')],
			'tags' => 'NAME="pt_q2a_ad_after_menu_bar_level" ID="pt_q2a_ad_after_menu_bar_level"',
			'options' => $showoptions
		);

        $fields[] = array(
           'type' => 'custom',
            'html' => '<hr style="border-top: 1px dotted gray;">',
		);
         
		$fields[] = array(
			'label' => 'Ad before Question',
			'type' => 'checkbox',
			'value' => qa_opt('pt_q2a_ad_before_question'),
			'tags' => 'NAME="pt_q2a_ad_before_question" ID="pt_q2a_ad_before_question"',
		);
		$fields[] = array(
			'id' => 'pt_q2a_ad_before_question_code_display',
			//'label' => 'Paste HTML Ad Code in this box(try 728x90 banner ad)',
			'type' => 'textarea',
			'value' => qa_opt('pt_q2a_ad_before_question_codebox'),
			'tags' => 'NAME="pt_q2a_ad_before_question_code_field"',
            'rows' => 2,
		);
        
        $fields[] = array(
            
             'id' => 'pt_q2a_ad_before_question_code_display_loop_on',
			'label' => 'App user Durum: ',
			'type' => 'select',
			'value' => @$app_user_reklam_durumu[qa_opt('pt_q2a_ad_before_question_app_level')],
			'tags' => 'NAME="pt_q2a_ad_before_question_app_level" ID="pt_q2a_ad_before_question_app_level"',
			'options' => $app_user_reklam_durumu
		);
        
		$fields[] = array(
            'id' => 'pt_q2a_ad_before_question_code_display_level_on',
			'label' => 'Kullanıcı seviyesi: ',
			'type' => 'select',
			'value' => @$showoptions[qa_opt('pt_q2a_ad_before_question_level')],
			'tags' => 'NAME="pt_q2a_ad_before_question_level" ID="pt_q2a_ad_before_question_level"',
			'options' => $showoptions
		);
        
        
        $fields[] = array(
           'type' => 'custom',
            'html' => '<hr style="border-top: 1px dotted gray;">',
		);
        
        

		$fields[] = array(
			'label' => 'Ad after Question',
			'type' => 'checkbox',
			'value' => qa_opt('pt_q2a_ad_after_question'),
			'tags' => 'NAME="pt_q2a_ad_after_question" ID="pt_q2a_ad_after_question"',
		);
		
		$fields[] = array(
			'id' => 'pt_q2a_ad_after_question_code_display',
			//'label' => 'Paste HTML Ad Code in this box(try 728x90 banner ad)',
			'type' => 'textarea',
			'value' => qa_opt('pt_q2a_ad_after_question_codebox'),
			'tags' => 'NAME="pt_q2a_ad_after_question_code_field"',
            'rows' => 2,
		);
//		$fields[] = array(
//			'label' => 'Uygulama kullanicilarinda suresiz yayınlansin',
//			'type' => 'checkbox',
//			'value' => qa_opt('pt_q2a_ad_after_question_app_ok'),
//			'tags' => 'NAME="pt_q2a_ad_after_question_app_ok" ID="pt_q2a_ad_after_question_app_ok"',
//		);
        
         $fields[] = array(
            
             'id' => 'pt_q2a_ad_after_question_code_display_loop_on',
			'label' => 'App user Durum: ',
			'type' => 'select',
			'value' => @$app_user_reklam_durumu[qa_opt('pt_q2a_ad_after_question_app_level')],
			'tags' => 'NAME="pt_q2a_ad_after_question_app_level" ID="pt_q2a_ad_after_question_app_level"',
			'options' => $app_user_reklam_durumu
		);
		$fields[] = array(
            'id' => 'pt_q2a_ad_after_question_code_display_level_on',
			'label' => 'Kullanıcı seviyesi: ',
			'type' => 'select',
			'value' => @$showoptions[qa_opt('pt_q2a_ad_after_question_level')],
			'tags' => 'NAME="pt_q2a_ad_after_question_level" ID="pt_q2a_ad_after_question_level"',
			'options' => $showoptions
		);
        
        $fields[] = array(
           'type' => 'custom',
            'html' => '<hr style="border-top: 1px dotted gray;">',
		);

		$fields[] = array(
			'label' => 'Ad after All Answers',
			'type' => 'checkbox',
			'value' => qa_opt('pt_q2a_ad_after_all_answers'),
			'tags' => 'NAME="pt_q2a_ad_after_all_answers" ID="pt_q2a_ad_after_all_answers"',
		);
		
		$fields[] = array(
			'id' => 'pt_q2a_ad_after_all_answers_code_display',
			//'label' => 'Paste HTML Ad Code in this box(try 728x90 banner ad)',
			'type' => 'textarea',
			'value' => qa_opt('pt_q2a_ad_after_all_answers_codebox'),
			'tags' => 'NAME="pt_q2a_ad_after_all_answers_code_field"',
            'rows' => 2,
		);		
        
        $fields[] = array(
            
             'id' => 'pt_q2a_ad_after_all_answers_code_display_loop_on',
			'label' => 'App user Durum: ',
			'type' => 'select',
			'value' => @$app_user_reklam_durumu[qa_opt('pt_q2a_ad_after_all_answers_app_level')],
			'tags' => 'NAME="pt_q2a_ad_after_all_answers_app_level" ID="pt_q2a_ad_after_all_answers_app_level"',
			'options' => $app_user_reklam_durumu
		);
        
		$fields[] = array(
            'id' => 'pt_q2a_ad_after_all_answers_code_display_level_on',
			'label' => 'Kullanıcı seviyesi: ',
			'type' => 'select',
			'value' => @$showoptions[qa_opt('pt_q2a_ad_after_all_answers_level')],
			'tags' => 'NAME="pt_q2a_ad_after_all_answers_level" ID="pt_q2a_ad_after_all_answers_level"',
			'options' => $showoptions
		);
        
        $fields[] = array(
           'type' => 'custom',
            'html' => '<hr style="border-top: 1px dotted gray;">',
		);
        
		$fields[] = array(
			'label' => 'Ad After First Answer and Loop',
			'type' => 'checkbox',
			'value' => qa_opt('pt_q2a_ad_after_first_answer'),
			'tags' => 'NAME="pt_q2a_ad_after_first_answer" ID="pt_q2a_ad_after_first_answer"',
		);
        $fields[] = array(
			'id' => 'pt_q2a_ad_after_first_answer_code_display_1',
			'label' => 'MOBIL 1.Satırda çıkacak olan reklam',
			'type' => 'textarea',
			'value' => qa_opt('pt_q2a_ad_after_first_answer_codebox_1'),
			'tags' => 'NAME="pt_q2a_ad_after_first_answer_code_field_1"',
            'rows' => 2,
		);
        
        $fields[] = array(
			'id' => 'pt_q2a_ad_after_first_answer_code_display_3',
			'label' => 'MOBIL 3.Satırda çıkacak olan reklam',
			'type' => 'textarea',
			'value' => qa_opt('pt_q2a_ad_after_first_answer_codebox_3'),
			'tags' => 'NAME="pt_q2a_ad_after_first_answer_code_field_3"',
            'rows' => 2,
		);	
		
		$fields[] = array(
			'id' => 'pt_q2a_ad_after_first_answer_code_display',
			'label' => 'Döngüsel olarak çıkıcak reklam',
			'type' => 'textarea',
			'value' => qa_opt('pt_q2a_ad_after_first_answer_codebox'),
			'tags' => 'NAME="pt_q2a_ad_after_first_answer_code_field"',
            'rows' => 2,
		);	
        
        
        
        
         $fields[] = array(
			'id' => 'pt_q2a_ad_after_first_answer_code_display_1_d',
			'label' => 'DESKTOP 1.Satırda çıkacak olan reklam',
			'type' => 'textarea',
			'value' => qa_opt('pt_q2a_ad_after_first_answer_codebox_1_d'),
			'tags' => 'NAME="pt_q2a_ad_after_first_answer_code_field_1_d"',
            'rows' => 2,
		);
        
        $fields[] = array(
			'id' => 'pt_q2a_ad_after_first_answer_code_display_des',
			'label' => 'DESKTOP Döngüsel olarak çıkıcak reklam',
			'type' => 'textarea',
			'value' => qa_opt('pt_q2a_ad_after_first_answer_codebox_des'),
			'tags' => 'NAME="pt_q2a_ad_after_first_answer_code_field_des"',
            'rows' => 2,
		);	
        
        $fields[] = array(
			'id' => 'pt_q2a_ad_after_first_answer_loop_display',
			'label' => 'Dongu Sayisi: ',
			'type' => 'number',
			'value' => qa_opt('pt_q2a_ad_after_first_answer_loop'),
			'tags' => 'NAME="pt_q2a_ad_after_first_answer_loop"',
            'suffix' => ' cevapta bir yayinla',
		);
        
        
        
        $fields[] = array(
            
             'id' => 'pt_q2a_ad_after_first_answer_loop_display_on',
			'label' => 'App user Durum: ',
			'type' => 'select',
			'value' => @$app_user_reklam_durumu[qa_opt('pt_q2a_ad_after_first_answer_app_level')],
			'tags' => 'NAME="pt_q2a_ad_after_first_answer_app_level" ID="pt_q2a_ad_after_first_answer_app_level"',
			'options' => $app_user_reklam_durumu
		);

   
		$fields[] = array(
            'id' => 'pt_q2a_ad_after_first_answer_code_display_level_on',
			'label' => 'Kullanıcı seviyesi: ',
			'type' => 'select',
			'value' => @$showoptions[qa_opt('pt_q2a_ad_after_first_answer_level')],
			'tags' => 'NAME="pt_q2a_ad_after_first_answer_level" ID="pt_q2a_ad_first_answer_level"',
			'options' => $showoptions
		);
		$fields[] = array(
           'type' => 'custom',
            'html' => '<hr>',
		);
        
		$fields[] = array(
			'label' => 'Ad before All Questions',
			'type' => 'checkbox',
			'value' => qa_opt('pt_q2a_ad_before_all_questions'),
			'tags' => 'NAME="pt_q2a_ad_before_all_questions" ID="pt_q2a_ad_before_all_questions"',
		);
		
		$fields[] = array(
			'id' => 'pt_q2a_ad_before_all_questions_code_display',
			//'label' => 'Paste HTML Ad Code in this box(try 728x90 banner ad)',
			'type' => 'textarea',
			'value' => qa_opt('pt_q2a_ad_before_all_questions_codebox'),
			'tags' => 'NAME="pt_q2a_ad_before_all_questions_code_field"',
            'rows' => 2,
		);		
        
        $fields[] = array(
            
             'id' => 'pt_q2a_ad_before_all_questions_code_display_loop_on',
			'label' => 'App user Durum: ',
			'type' => 'select',
			'value' => @$app_user_reklam_durumu[qa_opt('pt_q2a_ad_before_all_questions_app_level')],
			'tags' => 'NAME="pt_q2a_ad_before_all_questions_app_level" ID="pt_q2a_ad_before_all_questions_app_level"',
			'options' => $app_user_reklam_durumu
		);
		$fields[] = array(
            'id' => 'pt_q2a_ad_before_all_questions_code_display_level_on',
			'label' => 'Kullanıcı seviyesi: ',
			'type' => 'select',
			'value' => @$showoptions[qa_opt('pt_q2a_ad_before_all_questions_level')],
			'tags' => 'NAME="pt_q2a_ad_before_all_questions_level" ID="pt_q2a_ad_before_all_questions_level"',
			'options' => $showoptions
		);
        
        $fields[] = array(
           'type' => 'custom',
            'html' => '<hr>',
		);
        
        
		$fields[] = array(
			'label' => 'Ad after All Questions',
			'type' => 'checkbox',
			'value' => qa_opt('pt_q2a_ad_after_all_questions'),
			'tags' => 'NAME="pt_q2a_ad_after_all_questions" ID="pt_q2a_ad_after_all_questions"',
		);
		
		$fields[] = array(
			'id' => 'pt_q2a_ad_after_all_questions_code_display',
			//'label' => 'Paste HTML Ad Code in this box(try 728x90 banner ad)',
			'type' => 'textarea',
			'value' => qa_opt('pt_q2a_ad_after_all_questions_codebox'),
			'tags' => 'NAME="pt_q2a_ad_after_all_questions_code_field"',
            'rows' => 2,
		);		
//		$fields[] = array(
//			'label' => 'Uygulana kullanıcılarına herzaman yayınlansın',
//			'type' => 'checkbox',
//			'value' => qa_opt('pt_q2a_ad_after_all_questions_app_ok'),
//			'tags' => 'NAME="pt_q2a_ad_after_all_questions_app_ok" ID="pt_q2a_ad_after_all_questions_app_ok"',
//		);
		
        $fields[] = array(
            
             'id' => 'pt_q2a_ad_after_all_questions_code_display_loop_on',
			'label' => 'App user Durum: ',
			'type' => 'select',
			'value' => @$app_user_reklam_durumu[qa_opt('pt_q2a_ad_after_all_questions_app_level')],
			'tags' => 'NAME="pt_q2a_ad_after_all_questions_app_level" ID="pt_q2a_ad_after_all_questions_app_level"',
			'options' => $app_user_reklam_durumu
		);
        
		$fields[] = array(
            'id' => 'pt_q2a_ad_after_all_questions_code_display_level_on',
			'label' => 'Kullanıcı seviyesi: ',
			'type' => 'select',
			'value' => @$showoptions[qa_opt('pt_q2a_ad_after_all_questions_level')],
			'tags' => 'NAME="pt_q2a_ad_after_all_questions_level" ID="pt_q2a_ad_after_all_questions_level"',
			'options' => $showoptions
		);
        
        $fields[] = array(
           'type' => 'custom',
            'html' => '<hr>', //----------------------------------------------------
		);
		
		$fields[] = array(
			'label' => 'Ad after Sidebar',
			'type' => 'checkbox',
			'value' => qa_opt('pt_q2a_ad_sidebar'),
			'tags' => 'NAME="pt_q2a_ad_sidebar" ID="pt_q2a_ad_sidebar"',
		);
		
		$fields[] = array(
			'id' => 'pt_q2a_ad_sidebar_code_display',
			//'label' => 'Paste HTML Ad Code in this box(try 160x90 text/link ad)',
			'type' => 'textarea',
			'value' => qa_opt('pt_q2a_ad_sidebar_codebox'),
			'tags' => 'NAME="pt_q2a_ad_sidebar_code_field"',
            'rows' => 2,
		);		
        
         $fields[] = array(
            
             'id' => 'pt_q2a_ad_sidebar_code_display_loop_on',
			'label' => 'App user Durum: ',
			'type' => 'select',
			'value' => @$app_user_reklam_durumu[qa_opt('pt_q2a_ad_sidebar_app_level')],
			'tags' => 'NAME="pt_q2a_ad_sidebar_app_level" ID="pt_q2a_ad_sidebar_app_level"',
			'options' => $app_user_reklam_durumu
		);
        
        
		$fields[] = array(
            'id' => 'pt_q2a_ad_sidebar_code_display_level_on',
			'label' => 'Kullanıcı seviyesi: ',
			'type' => 'select',
			'value' => @$showoptions[qa_opt('pt_q2a_ad_sidebar_level')],
			'tags' => 'NAME="pt_q2a_ad_sidebar_level" ID="pt_q2a_ad_sidebar_level"',
			'options' => $showoptions
		);
        
        $fields[] = array(
           'type' => 'custom',
            'html' => '<hr>',//----------------------------------------------------
		);
        
		$fields[] = array(
			'label' => 'Ad on left Side',
			'type' => 'checkbox',
			'value' => qa_opt('pt_q2a_ad_leftside'),
			'tags' => 'NAME="pt_q2a_ad_leftside" ID="pt_q2a_ad_leftside"',
		);
		
		$fields[] = array(
			'id' => 'pt_q2a_ad_leftside_code_display',
			//'label' => 'Paste HTML Ad Code in this box(try 160x90 text/link ad)',
			'type' => 'textarea',
			'value' => qa_opt('pt_q2a_ad_leftside_codebox'),
			'tags' => 'NAME="pt_q2a_ad_leftside_code_field"',
            'rows' => 2,
		);		
        
         $fields[] = array(
            
             'id' => 'pt_q2a_ad_leftside_code_display_loop_on',
			'label' => 'App user Durum: ',
			'type' => 'select',
			'value' => @$app_user_reklam_durumu[qa_opt('pt_q2a_ad_leftside_app_level')],
			'tags' => 'NAME="pt_q2a_ad_leftside_app_level" ID="pt_q2a_ad_leftside_app_level"',
			'options' => $app_user_reklam_durumu
		);
        
		$fields[] = array(
            'id' => 'pt_q2a_ad_leftside_code_display_level_on',
			'label' => 'Kullanıcı seviyesi: ',
			'type' => 'select',
			'value' => @$showoptions[qa_opt('pt_q2a_ad_leftside_level')],
			'tags' => 'NAME="pt_q2a_ad_leftside_level" ID="pt_q2a_ad_leftside_level"',
			'options' => $showoptions
		);
        
        $fields[] = array(
           'type' => 'custom',
            'html' => '<hr>',//----------------------------------------------------
		);
        
        
		$fields[] = array(
			'label' => 'Google AutoAd',
			'type' => 'checkbox',
			'value' => qa_opt('pt_q2a_ad_autoad'),
			'tags' => 'NAME="pt_q2a_ad_autoad" ID="pt_q2a_ad_autoad"',
		);
		
		$fields[] = array(
			'id' => 'pt_q2a_ad_autoad_code_display',
			//'label' => 'Paste HTML Ad Code in this box',
			'type' => 'textarea',
			'value' => qa_opt('pt_q2a_ad_autoad_codebox'),
			'tags' => 'NAME="pt_q2a_ad_autoad_code_field"',
            'rows' => 2,
		);
        
        
        $fields[] = array(
             'id' => 'pt_q2a_ad_autoad_code_display_on',
			'label' => 'App user Durum: ',
			'type' => 'select',
			'value' => @$app_user_reklam_durumu[qa_opt('pt_q2a_ad_autoad_app_level')],
			'tags' => 'NAME="pt_q2a_ad_autoad_app_level" ID="pt_q2a_ad_autoad_app_level"',
			'options' => $app_user_reklam_durumu
		);
        
		$fields[] = array(
            'id' => 'pt_q2a_ad_autoad_code_display_level_on',
			'label' => 'Kullanıcı seviyesi: ',
			'type' => 'select',
			'value' => @$showoptions[qa_opt('pt_q2a_ad_autoad_level')],
			'tags' => 'NAME="pt_q2a_ad_autoad_level" ID="pt_q2a_ad_autoad_level"',
			'options' => $showoptions
		);
		
		$fields[] = array(
           'type' => 'custom',
            'html' => '<hr>',//----------------------------------------------------
		);
		
		
		$fields[] = array(
			'label' => 'Menu bar sadece MASAUSTU',
			'type' => 'checkbox',
			'value' => qa_opt('pt_q2a_ad_ust_desktop'),
			'tags' => 'NAME="pt_q2a_ad_ust_desktop" ID="pt_q2a_ad_ust_desktop"',
		);		
		$fields[] = array(
			'id' => 'pt_q2a_ad_ust_desktop_code_display',
			//'label' => 'Paste HTML Ad Code in this box(try 728x15 text/link ad)',
			'type' => 'textarea',
			'value' => qa_opt('pt_q2a_ad_ust_desktop_codebox'),
			'tags' => 'NAME="pt_q2a_ad_ust_desktop_code_field"',
            'rows' => 2,
		);		
		
//		$fields[] = array(
//			'label' => 'Uygulama kullanicilarinda suresiz yayınlansin',
//			'type' => 'checkbox',
//			'value' => qa_opt('pt_q2a_ad_ust_desktop_app_ok'),
//			'tags' => 'NAME="pt_q2a_ad_ust_desktop_app_ok" ID="pt_q2a_ad_ust_desktop_app_ok"',
//		);	
		
        $fields[] = array(
             'id' => 'pt_q2a_ad_ust_desktop_code_display_loop_on',
			'label' => 'App user Durum: ',
			'type' => 'select',
			'value' => @$app_user_reklam_durumu[qa_opt('pt_q2a_ad_ust_desktop_app_level')],
			'tags' => 'NAME="pt_q2a_ad_ust_desktop_app_level" ID="pt_q2a_ad_ust_desktop_app_level"',
			'options' => $app_user_reklam_durumu
		);
        
		$fields[] = array(
            'id' => 'pt_q2a_ad_ust_desktop_code_display_level_on',
			'label' => 'Kullanici Seviyesi',
			'type' => 'select',
			'value' => @$showoptions[qa_opt('pt_q2a_ad_ust_desktop_level')],
			'tags' => 'NAME="pt_q2a_ad_ust_desktop_level" ID="pt_q2a_ad_ust_desktop_level"',
			'options' => $showoptions
		);
		
		
		$fields[] = array(
           'type' => 'custom',
            'html' => '<hr>',//----------------------------------------------------
		);
		
		$fields[] = array(
			'label' => 'Menu bar sadece MOBIL',
			'type' => 'checkbox',
			'value' => qa_opt('pt_q2a_ad_ust_mobil'),
			'tags' => 'NAME="pt_q2a_ad_ust_mobil" ID="pt_q2a_ad_ust_mobil"',
		);		
		$fields[] = array(
			'id' => 'pt_q2a_ad_ust_mobil_code_display',
			'label' => '',
			'type' => 'textarea',
			'value' => qa_opt('pt_q2a_ad_ust_mobil_codebox'),
			'tags' => 'NAME="pt_q2a_ad_ust_mobil_code_field"',
            'rows' => 2,
		);	
		
//		$fields[] = array(
//			'label' => 'Uygulama kullanicilarinda suresiz yayınlansin',
//			'type' => 'checkbox',
//			'value' => qa_opt('pt_q2a_ad_ust_mobil_app_ok'),
//			'tags' => 'NAME="pt_q2a_ad_ust_mobil_app_ok" ID="pt_q2a_ad_ust_mobil_app_ok"',
//		);	
		
        $fields[] = array(
             'id' => 'pt_q2a_ad_ust_mobil_code_display_loop_on',
			'label' => 'App user Durum: ',
			'type' => 'select',
			'value' => @$app_user_reklam_durumu[qa_opt('pt_q2a_ad_ust_mobil_app_level')],
			'tags' => 'NAME="pt_q2a_ad_ust_mobil_app_level" ID="pt_q2a_ad_ust_mobil_app_level"',
			'options' => $app_user_reklam_durumu
		);
        
		$fields[] = array(
            'id' => 'pt_q2a_ad_ust_mobil_code_display_level_on',
			'label' => 'Kullanici Seviyesi',
			'type' => 'select',
			'value' => @$showoptions[qa_opt('pt_q2a_ad_ust_mobil_level')],
			'tags' => 'NAME="pt_q2a_ad_ust_mobil_level" ID="pt_q2a_ad_ust_mobil_level"',
			'options' => $showoptions
		);
		
		$fields[] = array(
           'type' => 'custom',
            'html' => '<hr>',
		);
		
				
		$fields[] = array(
			'label' => 'HEAD DESKTOP',
			'type' => 'checkbox',
			'value' => qa_opt('pt_q2a_ad_head_desktop'),
			'tags' => 'NAME="pt_q2a_ad_head_desktop" ID="pt_q2a_ad_head_desktop"',
		);		
		$fields[] = array(
			'id' => 'pt_q2a_ad_head_desktop_code_display',
			'label' => '',
			'type' => 'textarea',
			'value' => qa_opt('pt_q2a_ad_head_desktop_codebox'),
			'tags' => 'NAME="pt_q2a_ad_head_desktop_code_field"',
            'rows' => 2,
		);	
        
        $fields[] = array(
             'id' => 'pt_q2a_ad_head_desktop_code_display_loop_on',
			'label' => 'App user Durum: ',
			'type' => 'select',
			'value' => @$app_user_reklam_durumu[qa_opt('pt_q2a_ad_head_desktop_app_level')],
			'tags' => 'NAME="pt_q2a_ad_head_desktop_app_level" ID="pt_q2a_ad_head_desktop_app_level"',
			'options' => $app_user_reklam_durumu
		);
        
		$fields[] = array(
            'id' => 'pt_q2a_ad_head_desktop_code_display_level_on',
			'label' => 'Kullanici Seviyesi',
			'type' => 'select',
			'value' => @$showoptions[qa_opt('pt_q2a_ad_head_desktop_level')],
			'tags' => 'NAME="pt_q2a_ad_head_desktop_level" ID="pt_q2a_ad_head_desktop_level"',
			'options' => $showoptions
		);
		
			
        $fields[] = array(
           'type' => 'custom',
            'html' => '<hr>',
		);
				
				
		$fields[] = array(
			'label' => 'HEAD MOBIL',
			'type' => 'checkbox',
			'value' => qa_opt('pt_q2a_ad_head_mobil'),
			'tags' => 'NAME="pt_q2a_ad_head_mobil" ID="pt_q2a_ad_head_mobil"',
		);		
		$fields[] = array(
			'id' => 'pt_q2a_ad_head_mobil_code_display',
			'label' => '',
			'type' => 'textarea',
			'value' => qa_opt('pt_q2a_ad_head_mobil_codebox'),
			'tags' => 'NAME="pt_q2a_ad_head_mobil_code_field"',
            'rows' => 2,
		);		
        
        $fields[] = array(
             'id' => 'pt_q2a_ad_head_mobil_code_display_loop_on',
			'label' => 'App user Durum: ',
			'type' => 'select',
			'value' => @$app_user_reklam_durumu[qa_opt('pt_q2a_ad_head_mobil_app_level')],
			'tags' => 'NAME="pt_q2a_ad_head_mobil_app_level" ID="pt_q2a_ad_head_mobil_app_level"',
			'options' => $app_user_reklam_durumu
		);
        
		$fields[] = array(
            'id' => 'pt_q2a_ad_head_mobil_code_display_level_on',
			'label' => 'Kullanici Seviyesi',
			'type' => 'select',
			'value' => @$showoptions[qa_opt('pt_q2a_ad_head_mobil_level')],
			'tags' => 'NAME="pt_q2a_ad_head_mobil_level" ID="pt_q2a_ad_head_mobil_level"',
			'options' => $showoptions
		);
		
		
				
        $fields[] = array(
           'type' => 'custom',
            'html' => '<hr>',
		);
				
				
		$fields[] = array(
			'label' => 'BADY DESKTOP',
			'type' => 'checkbox',
			'value' => qa_opt('pt_q2a_ad_body_desktop'),
			'tags' => 'NAME="pt_q2a_ad_body_desktop" ID="pt_q2a_ad_body_desktop"',
		);		
		$fields[] = array(
			'id' => 'pt_q2a_ad_body_desktop_code_display',
			'label' => '',
			'type' => 'textarea',
			'value' => qa_opt('pt_q2a_ad_body_desktop_codebox'),
			'tags' => 'NAME="pt_q2a_ad_body_desktop_code_field"',
            'rows' => 2,
		);		
        
        $fields[] = array(
             'id' => 'pt_q2a_ad_body_desktop_code_display_loop_on',
			'label' => 'App user Durum: ',
			'type' => 'select',
			'value' => @$app_user_reklam_durumu[qa_opt('pt_q2a_ad_body_desktop_app_level')],
			'tags' => 'NAME="pt_q2a_ad_body_desktop_app_level" ID="pt_q2a_ad_body_desktop_app_level"',
			'options' => $app_user_reklam_durumu
		);
        
		$fields[] = array(
            'id' => 'pt_q2a_ad_body_desktop_code_display_level_on',
			'label' => 'Kullanici Seviyesi',
			'type' => 'select',
			'value' => @$showoptions[qa_opt('pt_q2a_ad_body_desktop_level')],
			'tags' => 'NAME="pt_q2a_ad_body_desktop_level" ID="pt_q2a_ad_body_desktop_level"',
			'options' => $showoptions
		);
		
		$fields[] = array(
           'type' => 'custom',
            'html' => '<hr>',
		);
				
					
		$fields[] = array(
			'label' => 'BADY MOBIL',
			'type' => 'checkbox',
			'value' => qa_opt('pt_q2a_ad_body_mobil'),
			'tags' => 'NAME="pt_q2a_ad_body_mobil" ID="pt_q2a_ad_body_mobil"',
		);		
		$fields[] = array(
			'id' => 'pt_q2a_ad_body_mobil_code_display',
			'label' => '',
			'type' => 'textarea',
			'value' => qa_opt('pt_q2a_ad_body_mobil_codebox'),
			'tags' => 'NAME="pt_q2a_ad_body_mobil_code_field"',
            'rows' => 2,
		);		
        
        $fields[] = array(
             'id' => 'pt_q2a_ad_body_mobil_code_display_loop_on',
			'label' => 'App user Durum: ',
			'type' => 'select',
			'value' => @$app_user_reklam_durumu[qa_opt('pt_q2a_ad_body_mobil_app_level')],
			'tags' => 'NAME="pt_q2a_ad_body_mobil_app_level" ID="pt_q2a_ad_body_mobil_app_level"',
			'options' => $app_user_reklam_durumu
		);
        
		$fields[] = array(
            'id' => 'pt_q2a_ad_body_mobil_code_display_level_on',
			'label' => 'Kullanıcı seviyesi:',
			'type' => 'select',
			'value' => @$showoptions[qa_opt('pt_q2a_ad_body_mobil_level')],
			'tags' => 'NAME="pt_q2a_ad_body_mobil_level" ID="pt_q2a_ad_body_mobil_level"',
			'options' => $showoptions
		);
		
        
        $fields[] = array(
           'type' => 'custom',
            'html' => '<hr>',
		);
        


		$fields[] = array(
			'type' => 'blank',
		);

		return array(
			'ok' => ($ok && !isset($error)) ? $ok : null,
			
			'fields' => $fields,
			
			'buttons' => array(
				array(
				'label' => qa_lang_html('main/save_button'),
				'tags' => 'NAME="pt_q2a_simple_ads_manager_save_button"',
				),
			),
		);
	}

}
/*
	Omit PHP closing tag to help avoid accidental output
*/

