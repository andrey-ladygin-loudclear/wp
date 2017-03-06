<?php get_header() ?>
<main class="main-content search-results">
	<?php $count = $wp_query->found_posts ?>
	<h1><strong><?php echo $count ?> search result<?php if ($count == 0 || $count > 1) echo 's' ?> for:</strong> <?php echo get_search_query() == '' ? '(blank)' : get_search_query() ?></h1>
	<?php if (have_posts()): ?>
		<ol>
			<?php while (have_posts()): the_post() ?>
				<li>
				    <article id="post-<?php the_ID() ?>" <?php post_class() ?>>
				        <h2><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h2>
				        <?php the_excerpt() ?>
				    </article>
				</li>
			<?php endwhile ?>
		</ol>
		<?php
			the_posts_pagination(array(
				'prev_text'	=> __('Previous page', 'griffith'),
				'next_text'	=> __('Next page', 'griffith')
			));
		?>
	<?php else: ?>
	    <p>Sorry, nothing to display.</p>
	<?php endif ?>
</main>
<?php get_footer() ?>