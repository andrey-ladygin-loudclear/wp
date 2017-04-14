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
				<div class="image">
					<figure>
						<a href="<?php the_permalink(); ?>" title="Suspendisse">
							<?php set_post_thumbnail_size(230, 230, TRUE); ?>
							<?php the_post_thumbnail(); ?>
						</a>
					</figure>
				</div>
				<div class="single-post-content">
					<h3 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
					<div class="entry-summary">
						<?php the_content(); ?>
					</div>
					<div class="read-btn">
						<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">Read more</a>
					</div>
				</div>
			</div>
			
		<?php } ?>
		
		
		<!--div class="single-post tg-one-half tg-one-half-last">
			<div class="image">
				<figure><a href="https://demo.themegrill.com/ample/2015/02/09/mauris-eu-mollis/" title="Mauris eu mollis"><img width="230" height="230" src="https://demo.themegrill.com/ample/wp-content/uploads/sites/16/2015/02/light-230x230.jpg" class="attachment-ample-featured-blog-small size-ample-featured-blog-small wp-post-image" alt="Mauris eu mollis" title="Mauris eu mollis" srcset="https://demo.themegrill.com/ample/wp-content/uploads/sites/16/2015/02/light-230x230.jpg 230w, https://demo.themegrill.com/ample/wp-content/uploads/sites/16/2015/02/light-150x150.jpg 150w, https://demo.themegrill.com/ample/wp-content/uploads/sites/16/2015/02/light-330x330.jpg 330w" sizes="(max-width: 230px) 100vw, 230px"></a></figure>
			</div>
			<div class="single-post-content">
				<h3 class="entry-title"><a href="https://demo.themegrill.com/ample/2015/02/09/mauris-eu-mollis/" title="Mauris eu mollis">Mauris eu mollis</a></h3>
				<div class="entry-summary">
					<p>Mauris eu mollis enim, sollicitudin egestas libero. Sed tristique, felis eu pellentesque iaculis, dolor est consequat sapien, vitae vulputate magna sem non eros. Ut faucibus eros sit amet posuere aliquet. Nam sagittis dignissim odio, sed cursus sapien consectetur sit amet.</p>
				</div>
				<div class="read-btn">
					<a href="https://demo.themegrill.com/ample/2015/02/09/mauris-eu-mollis/" title="Mauris eu mollis">Read more</a>
				</div>
			</div>
		</div>
		<div class="single-post tg-one-half tg-featured-posts-clearfix">
			<div class="image">
				<figure><a href="https://demo.themegrill.com/ample/2015/02/09/donec-ornare/" title="Donec ornare"><img width="230" height="230" src="https://demo.themegrill.com/ample/wp-content/uploads/sites/16/2015/02/iphone-230x230.jpg" class="attachment-ample-featured-blog-small size-ample-featured-blog-small wp-post-image" alt="Donec ornare" title="Donec ornare" srcset="https://demo.themegrill.com/ample/wp-content/uploads/sites/16/2015/02/iphone-230x230.jpg 230w, https://demo.themegrill.com/ample/wp-content/uploads/sites/16/2015/02/iphone-150x150.jpg 150w, https://demo.themegrill.com/ample/wp-content/uploads/sites/16/2015/02/iphone-330x330.jpg 330w" sizes="(max-width: 230px) 100vw, 230px"></a></figure>
			</div>
			<div class="single-post-content">
				<h3 class="entry-title"><a href="https://demo.themegrill.com/ample/2015/02/09/donec-ornare/" title="Donec ornare">Donec ornare</a></h3>
				<div class="entry-summary">
					<p>Donec ornare mattis tortor, ut posuere turpis faucibus sed. Nunc eu euismod euismod nisl quis sagittis. Donec congue velit et metus dapibus, sed accumsan mauris fringilla. Quisque euismod risus erat, eget ullamcorper sapien consectetur non. Sed non consectetur quam. Vivamus</p>
				</div>
				<div class="read-btn">
					<a href="https://demo.themegrill.com/ample/2015/02/09/donec-ornare/" title="Donec ornare">Read more</a>
				</div>
			</div>
		</div>
		<div class="single-post tg-one-half tg-one-half-last">
			<div class="image">
				<figure><a href="https://demo.themegrill.com/ample/2015/02/09/quisque-iaculis/" title="Quisque iaculis"><img width="230" height="230" src="https://demo.themegrill.com/ample/wp-content/uploads/sites/16/2015/02/reed-230x230.jpg" class="attachment-ample-featured-blog-small size-ample-featured-blog-small wp-post-image" alt="Quisque iaculis" title="Quisque iaculis" srcset="https://demo.themegrill.com/ample/wp-content/uploads/sites/16/2015/02/reed-230x230.jpg 230w, https://demo.themegrill.com/ample/wp-content/uploads/sites/16/2015/02/reed-150x150.jpg 150w, https://demo.themegrill.com/ample/wp-content/uploads/sites/16/2015/02/reed-330x330.jpg 330w" sizes="(max-width: 230px) 100vw, 230px"></a></figure>
			</div>
			<div class="single-post-content">
				<h3 class="entry-title"><a href="https://demo.themegrill.com/ample/2015/02/09/quisque-iaculis/" title="Quisque iaculis">Quisque iaculis</a></h3>
				<div class="entry-summary">
					<p>Quisque iaculis orci eu lorem eleifend mattis. Integer ultricies interdum diam, et aliquet est blandit sed. Pellentesque eget dui at urna viverra vehicula a eget enim. Sed non egestas eros, sit amet facilisis orci. Morbi suscipit dui erat, id ullamcorper</p>
				</div>
				<div class="read-btn">
					<a href="https://demo.themegrill.com/ample/2015/02/09/quisque-iaculis/" title="Quisque iaculis">Read more</a>
				</div>
			</div>
		</div-->
	</div>

</div>