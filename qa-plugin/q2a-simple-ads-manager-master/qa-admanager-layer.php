<?php


class qa_html_theme_layer extends qa_html_theme_base {

	
	
	function head_title()
	{
		
		
		if (isset($_GET['ref']))
		{
			//echo("ref var <br>");
			 if ($_GET['ref']=='TWc9PSZ4dXF2VmQ1amhCZ0V6Ykh6d05QSDl') 
				 {
						//echo("premium uzanısı var <br>");
						//$_SESSION['reklam'] = time();
                        setcookie("premium_user","true",time()+86400*14,"/");
                        //if ($_COOKIE['premium_user']=="true") echo("prre user");

				 }
			else if ($_GET['ref']=='appuser') 
				 {
						//echo("appuser uzantısı var <br>");
						//$_SESSION['appuserrek'] = time()-(qa_opt('pt_q2a_ad_app_reklam_suresi')*60)+10;
                        setcookie("appuserrek",time()-(qa_opt('pt_q2a_ad_app_reklam_suresi')*60)+10,time()+86400,"/");

				 }
			 else if ($_GET['ref']=='silrefses')	
				 {
					 //echo("temizleme işlemi <br>");
                    setcookie("appuserrek","",1,"/");
                    setcookie("premium_user","",1,"/");
                 
                   setcookie("appuserrek","",1);
                    setcookie("premium_user","",1);
					//$_SESSION['reklam'] = time()-12*60*60;
					//$_SESSION['appuserrek'] = time()-20;
                 
                 
                 if (isset($_SERVER['HTTP_COOKIE'])) {
                        $cookies = explode(';', $_SERVER['HTTP_COOKIE']);
                        foreach($cookies as $cookie) {
                            $parts = explode('=', $cookie);
                            $name = trim($parts[0]);
                            setcookie($name, '', time()-1000);
                            setcookie($name, '', time()-1000, '/');
                        }
                    }

				 }
			
		}
		

		$user_level = qa_get_logged_in_level();
		
		if($this->isMobileDevice()){
			if (qa_opt('pt_q2a_ad_head_mobil') && $user_level < qa_opt('pt_q2a_ad_head_mobil_level')) {
				
				
				if (isset($_COOKIE['premium_user'])){
					 
					 	
//                            $appreklamturu=qa_opt('pt_q2a_ad_head_mobil_app_level');
//			                 if ($appreklamturu=="0") {if (!isset($_COOKIE['appuserrek'])){$this->adoutput(qa_opt('pt_q2a_ad_head_mobil_codebox'));}} //Reklam Yok
//                            else if ($appreklamturu=="1") $this->adoutput(qa_opt('pt_q2a_ad_head_mobil_codebox'));
//                            else if ($appreklamturu=="2") 
//                            {
//                                if($this->appicinreklamdurdur()==true)
//                                {
//
//                                }
//                            else
//                                {
//                                $this->output(qa_opt("pt_q2a_ad_head_mobil_codebox"));
//                                } 
//                            }
						
				 }
				else {
                            $appreklamturu=qa_opt('pt_q2a_ad_head_mobil_app_level');
			if ($appreklamturu=="0") {if (!isset($_COOKIE['appuserrek'])){$this->adoutput(qa_opt('pt_q2a_ad_head_mobil_codebox'));}} //Reklam Yok
                            else if ($appreklamturu=="1") $this->adoutput(qa_opt('pt_q2a_ad_head_mobil_codebox'));
                            else if ($appreklamturu=="2") 
                            {
                                if($this->appicinreklamdurdur()==true)
                                    {

                                    }
                                else
                                    {
                                    $this->output(qa_opt("pt_q2a_ad_head_mobil_codebox"));
                                    } 
                            }
				}
		
			}
		}
		else
		{
			if (qa_opt('pt_q2a_ad_head_desktop') && $user_level < qa_opt('pt_q2a_ad_head_desktop_level')) {
				

				
				if (isset($_COOKIE['premium_user'])){
					 
					 	
//                            $appreklamturu=qa_opt('pt_q2a_ad_head_desktop_app_level');
//			if ($appreklamturu=="0") {if (!isset($_COOKIE['appuserrek'])){$this->adoutput(qa_opt('pt_q2a_ad_head_desktop_codebox'));}} //Reklam Yok
//                            else if ($appreklamturu=="1") $this->adoutput(qa_opt('pt_q2a_ad_head_desktop_codebox'));
//                            else if ($appreklamturu=="2") 
//                            {
//                                //echo($this->appicinreklamdurdur());
//                                if($this->appicinreklamdurdur()==true)
//                                {
//
//                                }
//                                else
//                                {
//                                $this->output(qa_opt("pt_q2a_ad_head_desktop_codebox"));
//                                } 
//                            }
						
				 } 
				else {
                    
                            $appreklamturu=qa_opt('pt_q2a_ad_head_desktop_app_level');
			if ($appreklamturu=="0") {if (!isset($_COOKIE['appuserrek'])){$this->adoutput(qa_opt('pt_q2a_ad_head_desktop_codebox'));}} //Reklam Yok
                            else if ($appreklamturu=="1") $this->adoutput(qa_opt('pt_q2a_ad_head_desktop_codebox'));
                            else if ($appreklamturu=="2") 
                            {
                                if($this->appicinreklamdurdur()==true)
                                    {

                                    }
                                else
                                    {
                                    $this->output(qa_opt("pt_q2a_ad_head_desktop_codebox"));
                                    } 
                            }
				}
	
			}
	
		}	
					qa_html_theme_base::head_title();

	}
	
	function ucretlikullanicimi()
	{
		if (isset($_COOKIE['premium_user'])){
					 
					 	return true;
				 }
		else return false;
	}
	function appicinreklamdurdur()
	{ 
		if (isset($_COOKIE['appuserrek'])){
            //echo($_SESSION['appuserrek'].'<br>');
            //echo(time());
			
			if ($_COOKIE['appuserrek'] + (qa_opt('pt_q2a_ad_app_reklam_suresi')*60) > time())
				{
                 //echo('durdur<br>'. (time() - $_COOKIE['appuserrek']) . "<br>");
				return true;
			}
			else {
                 //echo('-1<br>');
				return false;
			}
			
		}
		else { return false;}
		
	}
	function appicinreklamdurdursifirlamali()
	{
		if (isset($_COOKIE['appuserrek'])){
			
			if ($_COOKIE['appuserrek'] + (qa_opt('pt_q2a_ad_app_reklam_suresi')*60) > time())
				{
				//echo("user var rek kes <br>". (time() - $_COOKIE['appuserrek']) . "<br>");
				return true;
				
				
			}
			else {
				//echo("user reklam geldi <br>");
				//$_SESSION['appuserrek'] = time(); //////////////////////////////////////////////////////////////////////////////////////////////////////
                 //setcookie("appuserrek",time(),time()+86400);
                setcookie("appuserrek",time(),time()+86400,"/");
               
				return false;
				
			}
			
		}
		else return false;
		
	}
	

	function adoutput($adcode)
	{

	
	 if ($this->ucretlikullanicimi())
		 {
			//echo("-");
		 }
	 else
		 {
			if($this->disabledcategory()) return;
         
			$this->output ('<div class="adcode">'.$adcode.'</div>');
         //$this->output ('<div class="adcode">'.reklam_code_replace($adcode,randomyazi()).'</div>');
		 }
	}
	
    
    function randomyazi(){
        $harf = 'ABCDEFGHIJKLMNOPRSTUVYZ';
        $harf_sayisi = mb_strlen($harf);
        for ($i = 0; $i < 10; $i++){
            $secilen_harf_konumu = mt_rand(0,$harf_sayisi - 1);
            $kod .= mb_substr($harf, $secilen_harf_konumu, 1).rand(0,9);
        }
        return mb_substr($kod, 0, 6); 
    }
	
	function isMobileDevice() 
	{
		return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
	}
	
	
	function disabledcategory()
	{

		if($this->template === 'register' || $this -> template === 'login') return true;
		//if($this->template !== 'question' && $this->template !== 'questions' && $this->template !=='custom' && qa_is_logged_in()) return true;
		if(isset($this->content['q_view']))
		{
			$categoryid = $this->content['q_view']['raw']['categoryid'];
			$cats = explode(",",qa_opt('pt_q2a_ad_hide_categories'));
			if(in_array($categoryid, $cats))
				return true;
		}
		return false;

	}
	//ad after question, just before answers
	function q_view($q_view)
	{
		$user_level = qa_get_logged_in_level();
		if (qa_opt('pt_q2a_ad_before_question') && $user_level <  qa_opt('pt_q2a_ad_before_question_level')) 
		{
            $appreklamturu=qa_opt('pt_q2a_ad_before_question_app_level');
            
			if ($appreklamturu=="0") {if (!isset($_COOKIE['appuserrek'])){$this->adoutput(qa_opt('pt_q2a_ad_before_question_codebox'));}} //Reklam Yok
            else if ($appreklamturu=="1") $this->adoutput(qa_opt('pt_q2a_ad_before_question_codebox'));
            else if ($appreklamturu=="2") 
            { 
                if($this->appicinreklamdurdur()==true)
                    {

                    }
                else
                    {
                    
                    $this->adoutput(qa_opt('pt_q2a_ad_before_question_codebox'));
                    }
            }
            
		}                     
		qa_html_theme_base::q_view($q_view);
		if (qa_opt('pt_q2a_ad_after_question') && $user_level <  qa_opt('pt_q2a_ad_after_question_level')) 
		{
            
            $appreklamturu=qa_opt('pt_q2a_ad_after_question_app_level');
			if ($appreklamturu=="0") {if (!isset($_COOKIE['appuserrek'])){$this->adoutput(qa_opt('pt_q2a_ad_after_question_codebox'));}} //Reklam Yok
            else if ($appreklamturu=="1") $this->adoutput(qa_opt('pt_q2a_ad_after_question_codebox'));
            else if ($appreklamturu=="2") 
            {
                if($this->appicinreklamdurdur()==true)
					{
						
					}
				else
					{
					$this->adoutput(qa_opt('pt_q2a_ad_after_question_codebox'));
					}
            }
            

		}                     
	}
	// End of q_view()


	function head_css()
	{
		$this->output('<style type="text/css">'.qa_opt('pt_q2a_ad_css').' </style>');
		$user_level = qa_get_logged_in_level();
		if (qa_opt('pt_q2a_ad_autoad') && $user_level < qa_opt('pt_q2a_ad_autoad_level')) 
        {
			$appreklamturu=qa_opt('pt_q2a_ad_autoad_app_level');
			if ($appreklamturu=="0") {if (!isset($_COOKIE['appuserrek'])){$this->adoutput(qa_opt('pt_q2a_ad_autoad_codebox'));}} //Reklam Yok
            else if ($appreklamturu=="1") $this->adoutput(qa_opt('pt_q2a_ad_autoad_codebox'));
            else if ($appreklamturu=="2") 
            {
                if($this->appicinreklamdurdur()==true)
                    {

                    }
                else
                    {
                    $this->adoutput(qa_opt("pt_q2a_ad_autoad_codebox"));
                    }
            }
        }
			
		qa_html_theme_base::head_css();
	}
	
	
	
	
	
	
	
	
	function body_footer()
	
	{
		qa_html_theme_base::body_footer();
		
		$user_level = qa_get_logged_in_level();
		
		if($this->isMobileDevice()){
			
			if (qa_opt('pt_q2a_ad_body_mobil') && $user_level < qa_opt('pt_q2a_ad_body_mobil_level')) {
				$appreklamturu=qa_opt('pt_q2a_ad_body_mobil_app_level');
			if ($appreklamturu=="0") {if (!isset($_COOKIE['appuserrek'])){$this->adoutput(qa_opt('pt_q2a_ad_body_mobil_codebox'));}} //Reklam Yok
            else if ($appreklamturu=="1") $this->adoutput(qa_opt('pt_q2a_ad_body_mobil_codebox'));
            else if ($appreklamturu=="2") 
                {
                    if($this->appicinreklamdurdur()==true)
                        {

                        }
                    else
                        {
                        $this->adoutput(qa_opt("pt_q2a_ad_body_mobil_codebox"));
                        }
                }
            }	
		}
		else
		{
			
			if (qa_opt('pt_q2a_ad_body_desktop') && $user_level < qa_opt('pt_q2a_ad_body_desktop_level')) {
				
					$appreklamturu=qa_opt('pt_q2a_ad_body_desktop_app_level');
			if ($appreklamturu=="0") {if (!isset($_COOKIE['appuserrek'])){$this->adoutput(qa_opt('pt_q2a_ad_body_desktop_codebox'));}} //Reklam Yok
                    else if ($appreklamturu=="1") $this->adoutput(qa_opt('pt_q2a_ad_body_desktop_codebox'));
                    else if ($appreklamturu=="2") 
                    {
                            if($this->appicinreklamdurdur()==true)
                                {

                                }
                            else
                                {
                                $this->adoutput(qa_opt("pt_q2a_ad_body_desktop_codebox"));	
                                }
                    }
                
            }
		}	
		$this->appicinreklamdurdursifirlamali(); //user sessioın time sıfırlamak için eklendi			

	}
	

	function header()
	{
        
		$user_level = qa_get_logged_in_level();
		qa_html_theme_base::header();
        if($this -> template === 'ask' && qa_opt('pt_q2a_ad_hideaskpage'))
			return;
        
        
		require_once QA_INCLUDE_DIR.'app/posts.php';
		if($this->isMobileDevice()){
   				if (qa_opt('pt_q2a_ad_ust_mobil') && $user_level < qa_opt('pt_q2a_ad_ust_mobil_level')) 
					{
                        $appreklamturu=qa_opt('pt_q2a_ad_ust_mobil_app_level');
			if ($appreklamturu=="0") {if (!isset($_COOKIE['appuserrek'])){$this->adoutput(qa_opt('pt_q2a_ad_ust_mobil_codebox'));}} //Reklam Yok
                        else if ($appreklamturu=="1") $this->adoutput(qa_opt('pt_q2a_ad_ust_mobil_codebox'));
                        else if ($appreklamturu=="2") 
                        {
                            if($this->appicinreklamdurdur()==true)
                                {
                                    //if(qa_opt('pt_q2a_ad_ust_mobil_app_ok')==true)$this->adoutput(qa_opt('pt_q2a_ad_ust_mobil_codebox'));
                                }
                            else
                                {
                                $this->adoutput(qa_opt('pt_q2a_ad_ust_mobil_codebox'));	
                                }	
                        }

					}
		}
		else 	
		{
            
            
            
            
				if (qa_opt('pt_q2a_ad_ust_desktop') && $user_level < qa_opt('pt_q2a_ad_ust_desktop_level')) 
					{
                        $appreklamturu=qa_opt('pt_q2a_ad_ust_desktop_app_level');
			             if ($appreklamturu=="0") {if (!isset($_COOKIE['appuserrek'])){$this->adoutput(qa_opt('pt_q2a_ad_ust_desktop_codebox'));}} //Reklam Yok
                        else if ($appreklamturu=="1") $this->adoutput(qa_opt('pt_q2a_ad_ust_desktop_codebox'));
                        else if ($appreklamturu=="2") 
                        {
                            if($this->appicinreklamdurdur()==true)
                                {
                                    //if(qa_opt('pt_q2a_ad_ust_desktop_app_ok')==true)$this->adoutput(qa_opt('pt_q2a_ad_ust_desktop_codebox'));
                                }
                            else
                                {
                                $this->adoutput(qa_opt('pt_q2a_ad_ust_desktop_codebox'));	
                                }
                        }
					
					
					
					} 
            
                if (qa_opt('pt_q2a_ad_leftside') &&  $user_level < qa_opt('pt_q2a_ad_leftside_level')) 
					{
                        $appreklamturu=qa_opt('pt_q2a_ad_ust_desktop_app_level');
			             if ($appreklamturu=="0") {if (!isset($_COOKIE['appuserrek'])){$this->adoutput('<div class = "sidebar-ad">'.qa_opt("pt_q2a_ad_leftside_codebox"). '</div>');}} //Reklam Yok
                        else if ($appreklamturu=="1") $this->adoutput('<div class = "sidebar-ad">'.qa_opt("pt_q2a_ad_leftside_codebox"). '</div>');
                        else if ($appreklamturu=="2") 
                        {
                            if($this->appicinreklamdurdur()==true)
                                {
                                    //if(qa_opt('pt_q2a_ad_ust_desktop_app_ok')==true)$this->adoutput(qa_opt('pt_q2a_ad_ust_desktop_codebox'));
                                }
                            else
                                {
                                $this->adoutput('<div class = "sidebar-ad">'.qa_opt("pt_q2a_ad_leftside_codebox"). '</div>');
                                }
                        }
					
					} 
   			
		}                   
	}
	
	
	


	function a_list_items($a_items)
	{
		$first = true;
        $reklam_id = 0;
        $reklam_tekrar = qa_opt('pt_q2a_ad_after_first_answer_loop');
        $sayi=$reklam_tekrar+1;
        $appreklamturu=qa_opt('pt_q2a_ad_after_first_answer_app_level');
   
            if($this->isMobileDevice())
                { 
                    foreach ($a_items as $a_item)
                      {
                        $reklam_id = uniqid();
                        $this->a_list_item($a_item);
                        $user_level = qa_get_logged_in_level();
                        if ($first && qa_opt('pt_q2a_ad_after_first_answer') && $user_level < qa_opt('pt_q2a_ad_after_first_answer_level') && (count($a_items) > 1 || (!qa_opt('pt_q2a_ad_after_all_answers') || $user_level >= qa_opt('pt_q2a_ad_after_all_answers_level')))) 
                        {
                            {

                                        if( $sayi == $reklam_tekrar + 1)
                                        {
                                            if ($appreklamturu=="0") {if (!isset($_COOKIE['appuserrek'])){$this->adoutput(qa_opt('pt_q2a_ad_after_first_answer_codebox_1'));}} //Reklam Yok
                                            else if ($appreklamturu=="1") $this->adoutput(qa_opt('pt_q2a_ad_after_first_answer_codebox_1'));
                                            else if ($appreklamturu=="2") 
                                            {
                                                if($this->appicinreklamdurdur()==true)
                                                    {

                                                    }
                                                else
                                                    {
                                                    $this->adoutput(qa_opt('pt_q2a_ad_after_first_answer_codebox_1'));
                                                    }
                                            }
                                        }
                                        else if( $sayi == $reklam_tekrar + 3)
                                        {
                                            if ($appreklamturu=="0") {if (!isset($_COOKIE['appuserrek'])){$this->adoutput(qa_opt('pt_q2a_ad_after_first_answer_codebox_3'));}} //Reklam Yok
                                            //else if ($appreklamturu=="1") $this->adoutput(qa_opt('pt_q2a_ad_after_first_answer_codebox_3'));
                                            
                                            else if ($appreklamturu=="1") 
                                            {
                                                if($this->appicinreklamdurdur()==true)
                                                    {

                                                    }
                                                else
                                                    {
                                                    $this->adoutput(qa_opt('pt_q2a_ad_after_first_answer_codebox_3'));
                                                    }
                                            }
                                            
                                            else if ($appreklamturu=="2") 
                                            {
                                                if($this->appicinreklamdurdur()==true)
                                                    {

                                                    }
                                                else
                                                    {
                                                    $this->adoutput(qa_opt('pt_q2a_ad_after_first_answer_codebox_3'));
                                                    }
                                            }
                                        }
                                        else if( $sayi % $reklam_tekrar ==0 && $sayi > $reklam_tekrar + $reklam_tekrar  )
                                        {
                                            
                                            if ($appreklamturu=="0") {if (!isset($_COOKIE['appuserrek'])){$this->adoutput($this->reklam_code_replace(qa_opt('pt_q2a_ad_after_first_answer_codebox'),$reklam_id));}} //Reklam Yok
                                            else if ($appreklamturu=="1") $this->adoutput($this->reklam_code_replace(qa_opt('pt_q2a_ad_after_first_answer_codebox'),$reklam_id));
                                            else if ($appreklamturu=="2") 
                                            {
                                                if($this->appicinreklamdurdur()==true)
                                                    {

                                                    }
                                                else
                                                    {
                                                    $this->adoutput($this->reklam_code_replace(qa_opt('pt_q2a_ad_after_first_answer_codebox'),$reklam_id));
                                                    }
                                            }
                                             //$reklam_id++;
                                        }



                            }
                            $sayi++;
                        }
                     }
                }
            else 
                {
                    foreach ($a_items as $a_item)
                      {
                    $this->a_list_item($a_item);
                    $user_level = qa_get_logged_in_level();
                    if ($first && qa_opt('pt_q2a_ad_after_first_answer') && $user_level < qa_opt('pt_q2a_ad_after_first_answer_level') && (count($a_items) > 1 || (!qa_opt('pt_q2a_ad_after_all_answers') || $user_level >= qa_opt('pt_q2a_ad_after_all_answers_level')))) 
                        {

                            {
                                if( $sayi == $reklam_tekrar + 1)
                                { 
                                    if ($appreklamturu=="0") {if (!isset($_COOKIE['appuserrek'])){$this->adoutput(qa_opt('pt_q2a_ad_after_first_answer_codebox_1_d'));}} //Reklam Yok
                                    else if ($appreklamturu=="1") $this->adoutput(qa_opt('pt_q2a_ad_after_first_answer_codebox_1_d'));
                                    else if ($appreklamturu=="2") 
                                    {
                                        if($this->appicinreklamdurdur()==true)
                                            {

                                            }
                                        else
                                            {
                                            $this->adoutput(qa_opt('pt_q2a_ad_after_first_answer_codebox_1_d'));
                                            }
                                    }
                                }
                                else if( $sayi % $reklam_tekrar ==0 && $sayi > $reklam_tekrar + $reklam_tekrar -1 )
                                {
                                    if ($appreklamturu=="0") {if (!isset($_COOKIE['appuserrek'])){$this->adoutput($this->reklam_code_replace(qa_opt('pt_q2a_ad_after_first_answer_codebox_des'),$reklam_id));}} //Reklam Yok
                                    else if ($appreklamturu=="1") $this->adoutput($this->reklam_code_replace(qa_opt('pt_q2a_ad_after_first_answer_codebox_des'),$reklam_id));
                                    else if ($appreklamturu=="2") 
                                    {
                                        if($this->appicinreklamdurdur()==true)
                                            {

                                            }
                                        else
                                            {
                                            $this->adoutput($this->reklam_code_replace(qa_opt('pt_q2a_ad_after_first_answer_codebox_des'),$reklam_id));
                                            }
                                    }
                                    $reklam_id++;
                                }


                            } 
                            $sayi++;
                        }
                    }
                }

	}

    function reklam_code_replace($reklamKodu,$sayi)
	{
		return str_replace('xxxxxx', $sayi, $reklamKodu);
	}

	//ad after all answers, just before related questions		
	function a_list($a_list)
	{
		qa_html_theme_base::a_list($a_list);

		$user_level = qa_get_logged_in_level();
		if($this -> template === 'ask' && qa_opt('pt_q2a_ad_hideaskpage'))
			return;
		if (qa_opt('pt_q2a_ad_after_all_answers') && $user_level < qa_opt('pt_q2a_ad_after_all_answers_level')) 
		{
            $appreklamturu=qa_opt('pt_q2a_ad_after_all_answers_app_level');
			if ($appreklamturu=="0") {if (!isset($_COOKIE['appuserrek'])){$this->adoutput(qa_opt('pt_q2a_ad_after_all_answers_codebox'));}} //Reklam Yok
            else if ($appreklamturu=="1") $this->adoutput(qa_opt('pt_q2a_ad_after_all_answers_codebox'));
            else if ($appreklamturu=="2") 
            {
                if($this->appicinreklamdurdur()==true)
                    {

                    }
                else
                    {
                    $this->adoutput(qa_opt('pt_q2a_ad_after_all_answers_codebox'));
                    }
            }
			
		}  
		
		                 
	}
	// end of a_list()

	//ad after all questions
	
	
	function q_list_and_form($q_list)
	{
		$appreklamturu=qa_opt('pt_q2a_ad_before_all_questions_app_level');
			if ($appreklamturu=="0") {if (!isset($_COOKIE['appuserrek'])){$this->adoutput(qa_opt('pt_q2a_ad_before_all_questions_codebox'));}} //Reklam Yok
        else if ($appreklamturu=="1") $this->adoutput(qa_opt('pt_q2a_ad_before_all_questions_codebox'));
        else if ($appreklamturu=="2") 
        {		
            if($this->appicinreklamdurdur()==true)
                {

                }
            else
                {
                    $this->adoutput(qa_opt('pt_q2a_ad_before_all_questions_codebox'));
                }
        }
		
		qa_html_theme_base::q_list_and_form($q_list);
		                   
	}
	
	
	function suggest_next()
	
	{
		
		qa_html_theme_base::suggest_next();
		if($this -> template === 'ask' && qa_opt('pt_q2a_ad_hideaskpage'))
			return;

		$user_level = qa_get_logged_in_level();
		if (qa_opt('pt_q2a_ad_after_all_questions') && $user_level < qa_opt('pt_q2a_ad_after_all_questions_level')) 
		{
            $appreklamturu=qa_opt('pt_q2a_ad_after_all_questions_app_level');
			if ($appreklamturu=="0") {if (!isset($_COOKIE['appuserrek'])){$this->adoutput(qa_opt('pt_q2a_ad_after_all_questions_codebox'));}} //Reklam Yok
            else if ($appreklamturu=="1") $this->adoutput(qa_opt('pt_q2a_ad_after_all_questions_codebox'));
            else if ($appreklamturu=="2") 
            {		
                if($this->appicinreklamdurdur()==true)
                    {
                        //if(qa_opt('pt_q2a_ad_after_all_questions_app_ok')==true)$this->adoutput(qa_opt('pt_q2a_ad_after_all_questions_codebox'));
                    }
                else
                    {
                        $this->adoutput(qa_opt('pt_q2a_ad_after_all_questions_codebox'));
                    }
            }
			
		}     
		            
	}	
	
	

	function sidebar()
	{
		qa_html_theme_base::sidebar();
		if($this -> template === 'ask' && qa_opt('pt_q2a_ad_hideaskpage'))
			return;

		$user_level = qa_get_logged_in_level();
		if (qa_opt('pt_q2a_ad_sidebar') && $user_level < qa_opt('pt_q2a_ad_sidebar_level')) 
		{
            $appreklamturu=qa_opt('pt_q2a_ad_sidebar_app_level');
			if ($appreklamturu=="0") {if (!isset($_COOKIE['appuserrek'])){$this->adoutput(qa_opt('pt_q2a_ad_sidebar_codebox'));}} //Reklam Yok
            else if ($appreklamturu=="1") $this->adoutput(qa_opt('pt_q2a_ad_sidebar_codebox'));
            else if ($appreklamturu=="2") 
            {
				if($this->appicinreklamdurdur()==true)
					{

					}
				else
					{
					$this->adoutput(qa_opt('pt_q2a_ad_sidebar_codebox'));
					}
            }
			
		}                     
	}  

	
	function nav_link($navlink, $class)
	{
	$reklamsiz_ek="";
		if (isset($_COOKIE['premium_user']))
		{
			
			 if (isset($_COOKIE['premium_user']) && !stristr($navlink['url'], 'annelertoplandik.com') === false) $reklamsiz_ek="?ref=TWc9PSZ4dXF2VmQ1amhCZ0V6Ykh6d05QSDl";
			 
			 else if (isset($_COOKIE['appuserrek']) && !stristr($navlink['url'], 'annelertoplandik.com') === false) $reklamsiz_ek="?ref=appuser";
			
		}
		else if (isset($_COOKIE['appuserrek']) && !stristr($navlink['url'], 'annelertoplandik.com') === false) $reklamsiz_ek="?ref=appuser";
		
		
	
		if (isset($navlink['url'])) {
			$this->output(
				'<a href="' . $navlink['url'] . $reklamsiz_ek . '" class="qa-' . $class . '-link' .
				(@$navlink['selected'] ? (' qa-' . $class . '-selected') : '') .
				(@$navlink['favorited'] ? (' qa-' . $class . '-favorited') : '') .
				'"' . (strlen(@$navlink['popup']) ? (' title="' . $navlink['popup'] . '"') : '') .
				(isset($navlink['target']) ? (' target="' . $navlink['target'] . '"') : '') . '>' . $navlink['label'] .
				'</a>'
			);
		} else {
			$this->output(
				'<span class="qa-' . $class . '-nolink' . (@$navlink['selected'] ? (' qa-' . $class . '-selected') : '') .
				(@$navlink['favorited'] ? (' qa-' . $class . '-favorited') : '') . '"' .
				(strlen(@$navlink['popup']) ? (' title="' . $navlink['popup'] . '"') : '') .
				'>' . $navlink['label'] . '</span>'
			);
		}

		if (strlen(@$navlink['note']))
			$this->output('<span class="qa-' . $class . '-note">' . $navlink['note'] . '</span>');
	}
}
/*
   Omit PHP closing tag to help avoid accidental output
 */