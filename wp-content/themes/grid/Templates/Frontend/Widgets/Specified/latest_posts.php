<?php
/**
 * @var $widget GL\Widgets\Specified\Latest_posts
 * @var $posts array
 * @var $before string
 * @var $after string
 * @var $wp_query WP_Query
 */
?>

<div class="clearfix latest_posts widget <?= $widget->getClass(); ?>">
	<div class="widget-header">
		<h3 class="widget-title"><?= $widget->getOption('title'); ?></h3>
		<div class="widget-description">
			<p><?= $widget->getOption('description'); ?></p>
		</div>
	</div>
	
	<div class="widget-posts clearfix">
		
		<?php $k=0; ?>
		<?php while(have_posts()) { ?>
			<?php $k++; ?>
			<?php the_post(); ?>
			<div class="single-post tg-one-half <?= $k%2==0 ? 'tg-one-half-last' : ' tg-featured-posts-clearfix'; ?>">
				<?php if(has_post_thumbnail()) { ?>
					<div class="image">
						<figure>
							<a href="<?php the_permalink(); ?>" title="Suspendisse">
								<?php set_post_thumbnail_size(230, 230, TRUE); ?>
								<?php the_post_thumbnail(); ?>
							</a>
						</figure>
					</div>
				<?php } ?>
				<div class="single-post-content">
					<h3 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
					<div class="entry-summary">
						<?php the_content(false); ?>
					</div>
					<div class="read-btn">
						<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">Read more</a>
					</div>
				</div>
			</div>
			
		<?php } ?>
	</div>

</div>