<?php

class qa_html_theme_layer extends qa_html_theme_base
{

	/*function search() 
	{ 
		if(qa_opt('gsearch_plugin_code') === '')
			qa_html_theme_base::search();
		else{
			$this->output('<div class="gsearch-box">'.qa_opt('gsearch_plugin_code')."</div>");

		}
	}
	
	

	function head_custom()
	{
		 qa_html_theme_base::head_custom();
                $this->output('<style type="text/css">'.qa_opt('gsearch_plugin_css').'</style>');
	}
	*/
	
	
	function search_field($search)
	{
		//$this->output('<input type="text" ' .'placeholder="' . $search['button_label'] . '..." ' . $search['field_tags'] . ' value="' . @$search['value'] . '" class="qa-search-field"/>');
						$this->output('<input type="text" ' .'placeholder="' . $search['button_label'] . '..."  name="text" value="' . @$search['value'] . '" class="qa-search-field"/>'
						.'<input type="hidden" name="searchid" value="2439873"/>'
						);
	}
	
	 function search()
	{
		$search = $this->content['search'];
		$this->output(
			'<div class="qa-search">',
			'<form method="get" action="/arama">'
		);
		$this->search_field($search);
		$this->search_button($search);
		$this->output(
			'</form>',
			'</div>'
		);
	}
}

?>
