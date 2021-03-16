<?php

/*
*	Q2AM Simple Adverts
*
*	Adds element to the template file
*
*	@author			Q2A Market
*	@category		Plugin
*	@Version: 		1.3
*
*	@Q2A Version	1.7
*
*	Do not modify this file unless you know what you are doing
 *
 * @TODO: Add more places for advert such as above and below answer, nth answers, admin sub pages etc.
*/

class qa_html_theme_layer extends qa_html_theme_base
{

	/**
	 * Add css for advert
	 */
	function head_custom()
	{
		parent::head_custom();
		$this->output('
<style>
	div.q2am-advert{
		width:100%;
		text-align:center;
	}
	div.q2am-advert img{
		max-width:100%;
		height:auto;
	}
	.qa-main h1:first-of-type{
		margin-bottom: 5px
	}
	.q2am-page-advert{
		margin-bottom: 5px
	}
	.q2am-page-advert img{
		max-width: 100%;
		height: auto;
	}
</style>
        ');
	}

	/**
	 * Override core function to add adverts
	 * @param $q_list
	 */
	function q_list($q_list)
	{
        $user_level = qa_get_logged_in_level();
		$reklamvarmi=true;
        $reklam_id = 0;
//		if (isset($_SESSION['reklam']))	if ($_SESSION['reklam'] + 12 * 60 * 60 > time()) $reklamvarmi=false;
//		if (isset($_SESSION['appuserrek'])) if ($_SESSION['appuserrek'] + (qa_opt('pt_q2a_ad_app_reklam_suresi')*60) > time()) $reklamvarmi=false;
        if (isset($_COOKIE['reklam'])) $reklamvarmi=false;
		if (isset($_COOKIE['appuserrek'])) if ($_COOKIE['appuserrek'] + (qa_opt('pt_q2a_ad_app_reklam_suresi')*60) > time()) $reklamvarmi=false;
		if ( $user_level > qa_opt('pt_q2a_ad_autoad_level')) $reklamvarmi=false;
		$template = ($this->template == 'qa') ? 'home' : $this->template;

		if (qa_opt('q2am_enable_adverts') && $reklamvarmi) {

			if (isset($q_list['qs'])) {
				$this->output('<DIV CLASS="qa-q-list">', '');
				$count = 1;
                $dongusayaci = 1;
				foreach ($q_list['qs'] as $q_item) {
                    $reklam_id = uniqid();
					$this->q_list_item($q_item);
					if ($count  == 5) 
                    {
						$this->output('<div class="qa-q-list-item ' . $template . '">');
						if (qa_opt('q2am_google_adsense')) {
                            if($this->isMobileDevice()){
                                $this->output(qa_opt('q2am_google_adsense_codebox_1'));
                            }else {
                                $this->output(qa_opt('q2am_google_adsense_codebox_des_1'));
                            }

						} elseif (qa_opt('q2am_image_advert')) {
							$this->output('<a href="' . qa_opt('q2am_advert_destination_link') . '" >');
							$this->output('<img src="' . qa_opt('q2am_advert_image_url') . '" alt="q2a-market-advert" />');
							$this->output('</a>');
						}

						$this->output('</div>');
                        $dongusayaci = 1; //loop reklamlar bundan sonra hesalanmaya başlansın diye
					}
                    else if ($dongusayaci % qa_opt('q2am_after_every') == 0) 
                    {
						$this->output('<div class="qa-q-list-item ' . $template . '">');
						if (qa_opt('q2am_google_adsense')) {
                            if($this->isMobileDevice()){
                               // $this->output(qa_opt('q2am_google_adsense_codebox'));
                                $this->output( $this->reklam_code_replace(qa_opt('q2am_google_adsense_codebox'),$reklam_id) );

                            }else {
                                $this->output( $this->reklam_code_replace(qa_opt('q2am_google_adsense_codebox_desktop'),$reklam_id) );
                            }

						} elseif (qa_opt('q2am_image_advert')) {
							$this->output('<a href="' . qa_opt('q2am_advert_destination_link') . '" >');
							$this->output('<img src="' . qa_opt('q2am_advert_image_url') . '" alt="q2a-market-advert" />');
							$this->output('</a>');
						}

						$this->output('</div>');
                        //$reklam_id++;
					}
					$count++;
                    $dongusayaci++;
				}
				$this->output('</DIV> <!-- END qa-q-list -->', '');
			}
		} else {

			parent::q_list($q_list);
		}
	}

    function reklam_code_replace($reklamKodu,$sayi)
	{
		return str_replace('xxxxxx', $sayi, $reklamKodu);
	}
	/**
	 * Override core function to add page advert
	 */
	function page_title_error()
	{
		parent::page_title_error();
		$this->page_advert();
	}

    function isMobileDevice() 
	{
		return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
	}
    
	/**
	 * This method will populate advert dynamically based on set option for the plugin
	 */
	function page_advert()
	{
		$template = ($this->template == 'qa') ? 'home' : $this->template;
		$advert = qa_opt('q2am_' . $template . '_advert_image_url');

		if ((qa_opt('q2am_' . $template . '_enable_adverts')) && (!empty($advert))) {
			$html = '
<div class="q2am-page-advert ' . $template . '">
	<a href="' . qa_opt('q2am_' . $template . '_advert_destination_link') . '" >
		<img src="' . qa_opt('q2am_' . $template . '_advert_image_url') . '" alt="q2a-market-' . $template . '-advert" />
	</a>
</div>
            ';

			$this->output($html);
		}
	}
}
