<?php
if(get_post_type() == 'post') { ?>
	<?php get_header() ?>
	<?php include __DIR__ . '/components/generic-news-page.php'; ?>
	<?php get_footer() ?>
<?php } else { ?>
	<?php get_header() ?>
	<?php include __DIR__ . '/components/breadcrumbs.php' ?>
	<?php include __DIR__ . '/components/generic-page.php'; ?>
	<?php get_footer() ?>
<?php } ?>