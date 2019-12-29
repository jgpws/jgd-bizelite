<?php get_header(); ?>

	<div class="texture">
	
	<div id="main">
		
		<div id="container">
		
			<div id="content">
			<!-- see http://themeshaper.com/2009/06/29/wordpress-theme-index-template-tutorial/ -->
			
			<?php the_post_navigation(); ?>

			<?php get_template_part( 'loop', 'single' ); ?>

			</div><!-- #content -->
		
		</div><!-- #container -->
		
		<?php get_sidebar(); ?>
		
	</div><!-- #main -->

	</div><!-- .texture div -->
	
	<?php get_footer(); ?>
