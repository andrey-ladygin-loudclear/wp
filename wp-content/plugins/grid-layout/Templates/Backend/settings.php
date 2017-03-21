<h1>Settings</h1>

<?php /* foreach(get_post_types('', 'names') as $post_type) { ?>
	<label class="checkbox-inline">
		<input type="checkbox" id="inlineCheckbox3" value="option3"> <?= $post_type; ?>
	</label>
<?php } */ ?>

<div class="form-group">
	<label class="checkbox-inline">
		<input type="checkbox" id="pages" value="1"> Pages
	</label>
	<label class="checkbox-inline">
		<input type="checkbox" id="posts" value="1"> Posts
	</label>
	<span class="help-block">You should also enable <span class="label label-default">the_content</span> method for this post types</span>
</div>

<div class="checkbox">
	<label>
		<input type="checkbox" value="">
		Option one is this and that&mdash;be sure to include why it's great
	</label>
</div>
<div class="checkbox disabled">
	<label>
		<input type="checkbox" value="" disabled>
		Option two is disabled
	</label>
</div>