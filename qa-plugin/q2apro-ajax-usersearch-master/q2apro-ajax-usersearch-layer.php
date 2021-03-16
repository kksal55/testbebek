<?php

/*
	Plugin Name: q2apro-ajax-usersearch
	Plugin URI: http://www.q2apro.com/plugins/usersearch
*/


	class qa_html_theme_layer extends qa_html_theme_base {
		
		function head_script() {
			qa_html_theme_base::head_script();
			
			if(qa_opt('q2apro_ajax_usersearch_enabled')) {
				if($this->template=='users') {
					// $this->output('<link rel="stylesheet" type="text/css" href="'.QA_HTML_THEME_LAYER_URLTOROOT.'styles.css">');
					// $this->output('<script src="'.QA_HTML_THEME_LAYER_URLTOROOT.'script.js"></script>');
					
					$this->output('
						<script type="text/javascript">
							$(document).ready(function(){
								$(".q2apro_us_progress").hide();
								
								$("#q2apro_usersearch").keyup( function() { 
									var us_username = $(this).val();
									
									if(us_username!="") {
										q2apro_ajaxsearch(us_username);
									}
									else {
										$("#q2apro_ajaxsearch_results").hide();
									}
								});
								
								function q2apro_ajaxsearch(us_username) { 
									$(".q2apro_us_progress").show();
									$.ajax({
										 type: "POST",
										 url: "'.qa_path('q2apro_usersearch').'",
										 data: { ajax:us_username },
										 error: function() { 
											console.log("server: ajax error");
											$("#q2apro_ajaxsearch_results").html("bad bad server...");
											$(".q2apro_us_progress").hide();
										 },
										 success: function(htmldata) {
											if(htmldata=="") {
												htmldata = "'.qa_lang('q2apro_ajax_usersearch_lang/no_user_found').'";
											}
											$("#q2apro_ajaxsearch_results").show();
											$(".q2apro_us_progress").hide();
											$("#q2apro_ajaxsearch_results").html( htmldata );
										 }
									});
								} // q2apro_ajaxsearch
							});
						</script>
					');
					
					// some CSS
					$this->output('
						<style type="text/css">
							.q2apro_usersearch_box {
								margin-bottom:30px;
								background: #f4f4f4;
							}
							#q2apro_usersearchlabel {
								margin-right:10px;
							}
							input#q2apro_usersearch {
								padding:5px;
								border:2px solid #18af91;
								width: 95%;
							}
							.q2apro_usersearch_resultfield {
								display:inline-block;
								margin:10px 10px 0 0;
								width:'.(int)(qa_opt('q2apro_ajax_usersearch_imgsize')+2).'px;
								vertical-align:top;
							}
							.q2apro_us_avatar img {
								border:1px solid #e0e4e5;
							}
							.q2apro_us_link {
								word-wrap:break-word;
							}

							/* CSS spinner by lea.verou.me/2013/11/cleanest-css-spinner-ever/ */
							@keyframes spin {
								to { transform: rotate(1turn); }
							}
							.q2apro_us_progress {
								position: relative;
								display: inline-block;
								width: 5em;
								height: 5em;
								margin: 0 .5em;
								text-indent: 999em;
								overflow: hidden;
								animation: spin 1s infinite steps(8);
								font-size: 3px;
							}
							.q2apro_us_progress:before, .q2apro_us_progress:after, .q2apro_us_progress > div:before, .q2apro_us_progress > div:after {
								content: "";
								position: absolute;
								top: 0;
								left: 2.25em;
								width: .5em;
								height: 1.5em;
								border-radius: .2em;
								background: #eee;
								box-shadow: 0 3.5em #eee; /* container height - part height */
								transform-origin: 50% 2.5em; /* container height / 2 */
							}
							.q2apro_us_progress:before {
								background: #555;
							}
							.q2apro_us_progress:after {
								transform: rotate(-45deg);
								background: #777;
							}
							.q2apro_us_progress > div:before {
								transform: rotate(-90deg);
								background: #999;
							}
							.q2apro_us_progress > div:after {
								transform: rotate(-135deg);
								background: #bbb;
							}
	</style>
					');
				}
			} // end q2apro_ajax_usersearch_enabled
		}
		
		function page_title_error() {
		
			qa_html_theme_base::page_title_error();
			
			if(qa_opt('q2apro_ajax_usersearch_enabled')) {
				if($this->template=='users') {
					$this->output('
					<div class="q2apro_usersearch_box">
						<span id="q2apro_usersearchlabel">'.qa_lang('q2apro_ajax_usersearch_lang/searchlabel').'</span> 
						<input type="text" placeholder="'.qa_lang('q2apro_ajax_usersearch_lang/input_placeholder').'" id="q2apro_usersearch" name="q2apro_usersearch" autofocus /> 
						<div class="q2apro_us_progress"><div>Loading…</div></div>
						<div id="q2apro_ajaxsearch_results"></div>
					</div>');
				}
			} // end q2apro_ajax_usersearch_enabled
			
		}

	} // end qa_html_theme_layer
	

/*
	Omit PHP closing tag to help avoid accidental output
*/
