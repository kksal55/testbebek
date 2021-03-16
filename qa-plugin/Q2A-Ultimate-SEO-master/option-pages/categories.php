<h2 class="heading">Category Optimization</h2>
<div class="useo-option-header-content"> Category Optimization feature let's you Title to category links and category description for each category page.</div>
<div class="useo-option-header-content"> To show category description and edit both title and description, visit "Admin > Layout" page in your admin panel and add "Ultimate SEO Category Descriptions" Widget to anywhere you like.</div>
<h3 class="heading">Tooltips</h3>
<div class="useo-option-container">
	<div class="useo-option-detail">
		Allow Tooltips(link title) for category links in question lists
	</div>
	<div class="useo-option-content">
		<div class="useo-checkbox-container">
		<input name="useo_cat_title_qlist_enable" id="useo_cat_title_qlist_enable" <?php echo (qa_opt('useo_cat_title_qlist_enable') ? ' checked="" ' : ''); ?> type="checkbox" class="useo-checkbox" value="1">
		<label for="useo_cat_title_qlist_enable"></label>
		</div>
	</div>
</div>
<div class="useo-option-container">
	<div class="useo-option-detail">
		Allow Tooltips(link title) for Category List(navigation widget)
	</div>
	<div class="useo-option-content">
		<div class="useo-checkbox-container">
		<input name="useo_cat_title_nav_enable" id="useo_cat_title_nav_enable" <?php echo (qa_opt('useo_cat_title_nav_enable') ? ' checked="" ' : ''); ?> type="checkbox" class="useo-checkbox" value="1">
		<label for="useo_cat_title_nav_enable"></label>
		</div>
	</div>
</div>
<div class="useo-option-container">
	<div class="useo-option-detail">
		Link Title Length
	</div>
	<div class="useo-option-content">
		<div class="useo-text-container">
			<input value="<?php echo (int)qa_opt('useo_cat_desc_max_len'); ?>" type="text" id="" class="useo-text" name="useo_cat_desc_max_len">
			<div class="useo-option-suffix"> characters </div>
		</div>
		<div class="useo-option-header-content"> Category link's tooltip(link's "title" attribute) Lentgh </div>
		<div class="useo-option-recommended"> Recommended title length between 50 to 250 characters </div>
	</div>
</div>
<hr>
<h3 class="heading">Description Content</h3>
<div class="useo-option-container">
	<div class="useo-option-detail">
		Enable HTML formatting for description texts
	</div>
	<div class="useo-option-content">
		<div class="useo-checkbox-container">
		<input name="useo_cat_desc_format" id="useo_cat_desc_format" <?php echo (qa_opt('useo_cat_desc_format') ? ' checked="" ' : ''); ?> type="checkbox" class="useo-checkbox" value="1">
		<label for="useo_cat_desc_format"></label>
		</div>
	</div>
</div>
<hr>
<h3 class="heading">Editing Permissions</h3>
<div class="useo-option-container">
	<div class="useo-option-detail">
		Allow this user groups to edit Category descriptions
	</div>
	<div class="useo-option-content">
		<div class="useo-text-container">
<?php
		$permitoptions=qa_admin_permit_options(QA_PERMIT_USERS, QA_PERMIT_SUPERS, false, false);
		echo '<select class="qa-form-tall-select" name="useo_cat_desc_permit_edit">';
		foreach($permitoptions as $level => $user_group)
			echo '<option ' . (($level==qa_opt('useo_cat_desc_permit_edit')) ? ' selected ' : '') . 'value="' . $level . '">' . $user_group . '</option>';
		echo '</select>';
?>
		</div>
	</div>
</div>
<hr>
<div class="useo-option-container">
	<div class="useo-option-detail">
		Add canonical links to category pages to prevent duplicate content
	</div>
	<div class="useo-option-content">
		<div class="useo-checkbox-container">
		<input name="useo_cat_canonical_enable" id="useo_cat_canonical_enable" <?php echo (qa_opt('useo_cat_canonical_enable') ? ' checked="" ' : ''); ?> type="checkbox" class="useo-checkbox" value="1">
		<label for="useo_cat_canonical_enable"></label>
		</div>
		<div class="useo-option-recommended"> * Recommended </div>
	</div>
</div>