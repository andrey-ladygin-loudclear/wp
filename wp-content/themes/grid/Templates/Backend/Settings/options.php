<?php
use GL\Classes\Templates;
?>
<form method="post">
	
	<pre>
		<?php
        
        print_r($options);
        ?>
	</pre>
    
    <div class="form-group">
        <h4>Add grid layout to post types:</h4>
        
        <?php foreach(Templates::getPostTypes() as $post_type) { ?>
            <label class="checkbox-inline">
                <input type="checkbox" name="templates[<?= $post_type; ?>]" value="1" <?= !empty($options['templates'][$post_type]) ? 'checked' : ''; ?>> <?= $post_type; ?>
            </label>
        <?php } ?>
        <!--span class="help-block">You should also enable <span class="label label-default">the_content</span> method for this post types</span-->
    </div>
    
    <div class="form-group">
        <h4>Grid system:</h4>
        <div class="checkbox">
            <label class="checkbox-inline">
                <input type="checkbox" name="use_the_content_filter" value="1" <?= !empty($options['use_the_content_filter']) ? 'checked' : ''; ?>>
                Use <span class="label label-default">the_content</span> filter for post, pages to output grid system
            </label>
        </div>
        <div class="checkbox">
            <label class="checkbox-inline">
                <input type="checkbox" name="use_shortcode" value="1" <?= !empty($options['use_shortcode']) ? 'checked' : ''; ?>>
                Use <span class="label label-default">gl-grid-tag</span> shortcode to output grid system
            </label>
        </div>
    </div>
    
    <!--div class="form-group">
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
    </div-->
    <div class="form-group">
        <input type="submit" class="btn btn-success" value="Save">
    </div>
</form>