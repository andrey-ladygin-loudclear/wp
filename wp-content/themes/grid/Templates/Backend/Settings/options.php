<form method="post">
	
	<pre>
		<?php
        print_r($options);
        ?>
	</pre>
    
    <div class="form-group">
        <h4>Add grid layout to post types:</h4>
        
        <?php foreach(get_post_types('', 'names') as $post_type) { ?>
            <?php if(in_array($post_type, GL_Grid_Layout::$exclude_post_types)) continue; ?>
            <label class="checkbox-inline">
                <input type="checkbox" name="meta_box[<?= $post_type; ?>]" value="1" <?= !empty($options['meta_box'][$post_type]) ? 'checked' : ''; ?>> <?= $post_type; ?>
            </label>
        <?php } ?>
        <!--label class="checkbox-inline">
			<input type="checkbox" name="pages_meta_box" value="1" <?= !empty($options['pages_meta_box']) ? 'checked' : ''; ?>> Pages
		</label>
		<label class="checkbox-inline">
			<input type="checkbox" name="posts_meta_box" value="1" <?= !empty($options['posts_meta_box']) ? 'checked' : ''; ?>> Posts
		</label-->
        <span class="help-block">You should also enable <span class="label label-default">the_content</span> method for this post types</span>
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