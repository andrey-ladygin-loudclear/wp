<?php

add_action('wp_ajax_news_ajax_append', 'news_ajax_append');
add_action('wp_ajax_nopriv_news_ajax_append', 'news_ajax_append');

add_action('wp_footer', 'news_ajax_append_javascript', 99);

function news_ajax_append_javascript() {
	?>
	<script type="text/javascript" >
		jQuery(document).ready(function($) {
			
			$('.news-categories').each(function() {
				update_news($(this).data('cat'));
			});
			
			$('.categories a').click(function() {
				if($(this).parent().hasClass('active')) return;
				var cat_id = $(this).data('cat');
				
				$('.news-categories').hide();
				$('.categories .active').removeClass('active');
				
				$('.news-cat' + (cat_id || '0')).show();
				$(this).parent().addClass('active');
			});
			
			$('.upload-more-news').click(function() {
				var cat_id = $(this).closest('.news-categories').data('cat');
				update_news(cat_id);
			});
			
			function getCatNode(cat_id) {
				return new function () {
					this.node = $('.news-cat' + cat_id);
					this.preloader = this.node.find('.preloader');
					this.button = this.node.find('.upload-more-news');
					this.template = this.node.find('.news-template');
				};
			}
			
			function getShowedIds(currentCatNode) {
				var ids = [];
				currentCatNode.find('li').each(function() {
					ids.push($(this).data('id'));
				});
				return ids;
			}
			
			function update_news(cat_id) {
				var currentCatNode = getCatNode(cat_id);
				var ids = getShowedIds(currentCatNode.node);
				var data = {
					action: 'news_ajax_append',
					ids: ids
				};
				
				data.cat = cat_id;
				
				currentCatNode.preloader.show();
				currentCatNode.button.hide();
				
				jQuery.post('/wp-admin/admin-ajax.php', data, function(response) {
					currentCatNode.template.append(response);
					currentCatNode.preloader.hide();
					
					if($(response).length) {
						currentCatNode.button.show();
					}
					
				}, 'html');
			}
		});
	</script>
	<?php
}

function news_ajax_append() {
	$args = array(
		'category' 			=> $_POST['cat'],
		'posts_per_page'	=> 6,
		'post_type'			=> 'post',
		'post__not_in' 		=> $_POST['ids'],
		'post_status'		=> 'publish'
	);
	
	ob_start();
	foreach (get_posts($args) as $post) {
		get_news_content($post);
	}
	$html = ob_get_contents();
	ob_end_clean();
	
	echo $html;
	wp_die();
}

function get_news_content($post) {
	$thumbnail = get_the_post_thumbnail($post->ID);
	$categories = [];
	
	foreach(get_the_category($post->ID) as $category) {
		$categories[$category->cat_ID] = $category->name;
	}
	
	if (!$thumbnail) {
		$thumbnail = get_field('thumbnail', $post->ID);
	}
	$thumbnailURL = $thumbnail['sizes']['program-thumbnail'];
	?>
	<li itemscope itemtype="http://schema.org/EducationEvent" data-id="<?= $post->ID; ?>">
		<?php if(!empty($thumbnailURL)) { ?>
			<a itemprop="url" href="<?= get_permalink($post->ID) ?>">
				<img src="<?= $thumbnailURL; ?>" alt="">
			</a>
		<?php } ?>
		
		<p>
			<span class="date"><?= current($categories) . ' / ' . date('F d, Y', strtotime($post->post_modified)) ?></span>
			<span class="name"><?= $post->post_title ?></span>
			<a itemprop="url" class="link" href="<?= get_permalink($post->ID) ?>">Read more ></a>
		</p>
	</li>
	<?php
}