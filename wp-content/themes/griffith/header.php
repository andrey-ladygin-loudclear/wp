<!doctype html>
<html <?php language_attributes() ?>>
	<?php include 'components/head.php' ?>
	<body <?php body_class() ?>>
		<?php include 'components/tracking.php' ?>
		<?php include 'components/browser-warning.php' ?>
		<header id="header">
			<a class="logo" href="https://www.griffith.edu.au/" target="_blank"><img src="<?php echo get_template_directory_uri() ?>/images/griffith-university-logo.svg" alt="Griffith University logo" /></a>
			<nav id="nav">
				<button class="toggle" title="Toggle menu" aria-label="Toggle menu"></button>
				<div class="menu">
					<?php echo GriffithNavs::get('main') ?>
					<form class="search" method="get" action="<?php echo home_url(); ?>" role="search">
						<button type="submit" title="Search" aria-label="Search"></button><input type="search" name="s" placeholder="Search" />
					</form>
				</div>
			</nav>
		</header>
		<?php include 'components/form.php' ?>
		<div id="content">