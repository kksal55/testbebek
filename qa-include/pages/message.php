<?php
/*
	Question2Answer by Gideon Greenspan and contributors
	http://www.question2answer.org/

	Description: Controller for private messaging page


	This program is free software; you can redistribute it and/or
	modify it under the terms of the GNU General Public License
	as published by the Free Software Foundation; either version 2
	of the License, or (at your option) any later version.

	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.

	More about this license: http://www.question2answer.org/license.php
*/

if (!defined('QA_VERSION')) { // don't allow this page to be requested directly from browser
	header('Location: ../../');
	exit;
}

require_once QA_INCLUDE_DIR . 'db/selects.php';
require_once QA_INCLUDE_DIR . 'app/users.php';
require_once QA_INCLUDE_DIR . 'app/format.php';
require_once QA_INCLUDE_DIR . 'app/limits.php';

$handle = qa_request_part(1);
$loginuserid = qa_get_logged_in_userid();
$fromhandle = qa_get_logged_in_handle();

$qa_content = qa_content_prepare();


// Check we have a handle, we're not using Q2A's single-sign on integration and that we're logged in

if (QA_FINAL_EXTERNAL_USERS)
	qa_fatal_error('User accounts are handled by external code');

if (!strlen($handle))
	qa_redirect('users');

if (!isset($loginuserid)) {
	$qa_content['error'] = qa_insert_login_links(qa_lang_html('misc/message_must_login'), qa_request());
	return $qa_content;
}

if ($handle === $fromhandle) {
	// prevent users sending messages to themselves
	$qa_content['error'] = qa_lang_html('users/no_permission');
	return $qa_content;
}


// Find the user profile and their recent private messages

list($toaccount, $torecent, $fromrecent) = qa_db_select_with_pending(
	qa_db_user_account_selectspec($handle, false),
	qa_db_recent_messages_selectspec($loginuserid, true, $handle, false),
	qa_db_recent_messages_selectspec($handle, false, $loginuserid, true)
);


// Check the user exists and work out what can and can't be set (if not using single sign-on)

if (!qa_opt('allow_private_messages') || !is_array($toaccount))
	return include QA_INCLUDE_DIR . 'qa-page-not-found.php';

//  Check the target user has enabled private messages and inform the current user in case they haven't

//if ($toaccount['flags'] & QA_USER_FLAGS_NO_MESSAGES) {
if (($toaccount['flags'] & QA_USER_FLAGS_NO_MESSAGES) && qa_get_logged_in_level() < QA_USER_LEVEL_MODERATOR) {
	$qa_content['error'] = qa_lang_html_sub(
		'profile/user_x_disabled_pms',
		sprintf('<a href="%s">%s</a>', qa_path_html('user/' . $handle), qa_html($handle))
	);
	return $qa_content;
}

// Check that we have permission and haven't reached the limit, but don't quit just yet

switch (qa_user_permit_error(null, QA_LIMIT_MESSAGES)) {
	case 'limit':
		$pageerror = qa_lang_html('misc/message_limit');
		break;

	case false:
		break;

	default:
		$pageerror = qa_lang_html('users/no_permission');
		break;
}


// Process sending a message to user

// check for messages or errors
$state = qa_get_state();
$messagesent = $state == 'message-sent';
if ($state == 'email-error')
	$pageerror = qa_lang_html('main/email_error');

if (qa_post_text('domessage')) {
	$inmessage = qa_post_text('message');

	if (isset($pageerror)) {
		// not permitted to post, so quit here
		$qa_content['error'] = $pageerror;
		return $qa_content;
	}

	if (!qa_check_form_security_code('message-' . $handle, qa_post_text('code')))
		$pageerror = qa_lang_html('misc/form_security_again');

	else {
		if (empty($inmessage))
			$errors['message'] = qa_lang('misc/message_empty');

		if (empty($errors)) {
			require_once QA_INCLUDE_DIR . 'db/messages.php';
			require_once QA_INCLUDE_DIR . 'app/emails.php';

			if (qa_opt('show_message_history'))
				$messageid = qa_db_message_create($loginuserid, $toaccount['userid'], $inmessage, '', false);
			else
				$messageid = null;

			$canreply = !(qa_get_logged_in_flags() & QA_USER_FLAGS_NO_MESSAGES);

			$more = strtr(qa_lang($canreply ? 'emails/private_message_reply' : 'emails/private_message_info'), array(
				'^f_handle' => $fromhandle,
				'^url' => qa_path_absolute($canreply ? ('message/' . $fromhandle) : ('user/' . $fromhandle)),
			));

			$subs = array(
				'^message' => $inmessage,
				'^f_handle' => $fromhandle,
				'^f_url' => qa_path_absolute('user/' . $fromhandle),
				'^more' => $more,
				'^a_url' => qa_path_absolute('account'),
			);

			if (qa_send_notification($toaccount['userid'], $toaccount['email'], $toaccount['handle'],
				qa_lang('emails/private_message_subject'), qa_lang('emails/private_message_body'), $subs))
				$messagesent = true;

			qa_report_event('u_message', $loginuserid, qa_get_logged_in_handle(), qa_cookie_get(), array(
				'userid' => $toaccount['userid'],
				'handle' => $toaccount['handle'],
				'messageid' => $messageid,
				'message' => $inmessage,
			));

			// show message as part of general history
			if (qa_opt('show_message_history'))
				qa_redirect(qa_request(), array('state' => ($messagesent ? 'message-sent' : 'email-error')));
		}
	}
}


// Prepare content for theme

$hideForm = !empty($pageerror) || $messagesent;

$qa_content['title'] = qa_lang_html('misc/private_message_title');

$qa_content['error'] = @$pageerror;

//Otomatik mesaj i??in haz??rlanan k??s??m. haziruyarimesaji isimli field de eklenecek 
$m_hatalibaslik='Hesab??n??z??n ask??ya al??nmamas?? i??in;
Soru ba??l??klar??n?? belirlerken l??tfen a??a????daki kurallara uyunuz. Soru ba??l??????n?? belirlerken sorunuzu k??saca ??zetleyen bir c??mle yazmaya ??al??????n??z. Kurallara uymayan sorular??n??z?? acilen d??zenleyiniz.

AKS?? TAKT??RDE HESABINIZ OTOMAT??K OLARAK  S??STEM TARAFINDAN ASKIYA ALINAB??L??R.

Ba??l??k belirlerken;
-Bir bakar m??s??n??z, 
-K??zlar bir bak??n, 
-Acil cevap verin, 
-L??tfen yard??mc?? olun 
gibi c??mleler KULLANMAYINIZ. Sorunuzu sormadan ??nce benzer sorular olup olmad??????n?? l??tfen kontrol ediniz.

Soru ba??l??????nda ve soru detay??nda imla kurallar??na dikkat edelim. Dikkat edelim ki di??er annelerimizde bu platformdan en iyi ??ekilde faydalans??n. Buras?? senin,benim hepimizin platformu......
--------';
$m_siddet = "De??erli kullan??c??m??z,
Hakl?? veya haks??z platformda kaba s??z i??eren veya tahrik edici i??erik payla??mak yasakt??r. Aksi taktirde yapt??r??mla kar????la??mak zorunda kal??rs??n??z. E??er kurallara ayk??r?? mesaj yaz??lm????sa uyar?? butonuna basarak bizlere bildirmeniz yeterli. Zaten g??n i??erisinde uyar?? alan cevaplar??n kontrol??nu sa??l??yoruz.";
$m_multihesap="De??erli kullan??c??m??z,
Bir kullan??c??n??n sadece bir hesab?? olabilir. Birden fazla hesap a????lmas?? hesaplar??n k??s??tlanmas??na neden olmaktad??r.";
$m_tekrarkonu="De??erli kullan??c??m??z,
Ayn?? sorunun tekrar tekrar payla????lmas?? yasakt??r. Sorunuzu payl??at??ktan sonra cevaplanmas?? i??in beklemeniz grekmektedir.";
$gorunsunmu="";
if (qa_get_logged_in_level() >= QA_USER_LEVEL_EDITOR) {
$haziruyarimesaji =  array(
            'id' => 'otomesajf',
			'label' => '<i style="font-size:11px;color:gray;">Otomatik Uyar?? Mesaj??:</i>',
			'type' => 'select',
			//'tags' => 'NAME="otomesaj" ID="otomesaj" style="font-size:11px;color:gray;"',
			'tags' => 'NAME="otomesaj" ID="otomesaj" style="font-size:11px;color:gray;'.$gorunsunmu.'"',
			'options' => array(
                                '' => "Se??iniz",
                                $m_hatalibaslik => "Hatal?? ba??l??k se??imi",
                                $m_siddet => "??iddet i??erikli payla????m",
                                $m_tekrarkonu => "Tekrarlayan soru",
                                $m_multihesap=> "Multi hesap",
                                ),
		);
}else {$haziruyarimesaji = array(
            'type' => 'custom',
            'html' => '',
			
		);}

//Otomatik mesaj i??in haz??rlanan k??s??m. haziruyarimesaji isimli field de eklenecek 

$qa_content['form_message'] = array(
	'tags' => 'method="post" action="' . qa_self_html() . '"',

	'style' => 'tall',

	'ok' => $messagesent ? qa_lang_html('misc/message_sent') : null,

	'fields' => array(
        'haziruyarimesaji' =>  $haziruyarimesaji ,
		'message' => array(
			'type' => $hideForm ? 'static' : '',
			'label' => qa_lang_html_sub('misc/message_for_x', qa_get_one_user_html($handle, false)),
			'tags' => 'name="message" id="message"',
			'value' => qa_html(@$inmessage, $messagesent),
			'rows' => 8,
			'note' => qa_lang_html_sub('misc/message_explanation', qa_html(qa_opt('site_title'))),
			'error' => qa_html(@$errors['message']),
		),
	),

	'buttons' => array(
		'send' => array(
			'tags' => 'onclick="qa_show_waiting_after(this, false);"',
			'label' => qa_lang_html('main/send_button'),
		),
	),

	'hidden' => array(
		'domessage' => '1',
		'code' => qa_get_form_security_code('message-' . $handle),
	),
);

$qa_content['custom'] = '<script> $("#otomesaj").on("change", function () {   document.getElementById("message").value = document.getElementById("otomesaj").value;})</script>';
$qa_content['focusid'] = 'message';

if ($hideForm) {
	unset($qa_content['form_message']['buttons']);

	if (qa_opt('show_message_history'))
		unset($qa_content['form_message']['fields']['message']);
	else {
		unset($qa_content['form_message']['fields']['message']['note']);
		unset($qa_content['form_message']['fields']['message']['label']);
	}
}


// If relevant, show recent message history

if (qa_opt('show_message_history')) {
	$recent = array_merge($torecent, $fromrecent);

	qa_sort_by($recent, 'created');

	$showmessages = array_slice(array_reverse($recent, true), 0, QA_DB_RETRIEVE_MESSAGES);

	if (count($showmessages)) {
		$qa_content['message_list'] = array(
			'title' => qa_lang_html_sub('misc/message_recent_history', qa_html($toaccount['handle'])),
		);

		$options = qa_message_html_defaults();

		foreach ($showmessages as $message)
			$qa_content['message_list']['messages'][] = qa_message_html_fields($message, $options);
	}

	$qa_content['navigation']['sub'] = qa_user_sub_navigation($fromhandle, 'messages', true);
}


$qa_content['raw']['account'] = $toaccount; // for plugin layers to access

return $qa_content;
