<?php get_header(); ?>

	<div class="texture">
	
	<div id="main">
		
		<div id="container">
		
			<div id="content">

				<h2><?php _e( 'Page Not Found', 'jgd-bizelite'); ?></h2>
				<p><strong><?php _e( 'Error 404', 'jgd-bizelite' ); ?></strong></p>
				<p><?php _e( 'We apologize, but the page you requested was not found.', 'jgd-bizelite' ); ?></p>
				<p><?php echo sprintf( __( '%1$sWhat to do?%2$s', 'jgd-bizelite'), '<strong>', '</strong>' ); ?></p>
				<p><?php get_search_form(); ?></p>
			<p><?php _e( 'Go back to the', 'jgd-bizelite' ); ?> <a href="<?php echo esc_url( home_url('/') ); ?>"><?php _e( 'Home Page', 'jgd-bizelite' ); ?></a>.</p>

			</div><!-- #content -->
		
		</div><!-- #container -->
		
		<?php get_sidebar(); ?>
		
	</div><!-- #main -->

	</div><!-- .texture div -->
	
<?php get_footer(); ?>
