<?php
use GL\Facades\WidgetCompositionFacade;
?>
<footer id="colophon" class="site-footer" role="contentinfo">
	
	<?php
	$composition = WidgetCompositionFacade::buildStructure(NULL, 'footer');
	$composition->draw();
	?>
	
	<?php /* if ( has_nav_menu( 'primary' ) ) : ?>
		<nav class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Footer Primary Menu', 'twentysixteen' ); ?>">
			<?php
				wp_nav_menu( array(
					'theme_location' => 'primary',
					'menu_class'     => 'primary-menu',
				 ) );
			?>
		</nav><!-- .main-navigation -->
	<?php endif; ?>

	<?php if ( has_nav_menu( 'social' ) ) : ?>
		<nav class="social-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Footer Social Links Menu', 'twentysixteen' ); ?>">
			<?php
				wp_nav_menu( array(
					'theme_location' => 'social',
					'menu_class'     => 'social-links-menu',
					'depth'          => 1,
					'link_before'    => '<span class="screen-reader-text">',
					'link_after'     => '</span>',
				) );
			?>
		</nav><!-- .social-navigation -->
	<?php endif; ?>

	<div class="site-info">
		<?php
			do_action( 'twentysixteen_credits' );
		?>
		<span class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></span>
		<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'twentysixteen' ) ); ?>"><?php printf( __( 'Proudly powered by %s', 'twentysixteen' ), 'WordPress' ); ?></a>
	</div> */ ?>
</footer>

<?php wp_footer(); ?>