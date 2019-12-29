<?php get_header(); ?>
	
	<div class="texture">
	
	<div id="main">
		<div id="container">
		
			<div id="content">
			<?php get_template_part( 'navigation' ); ?>

			<?php get_template_part( 'loop' ); ?>

			</div><!-- #content -->
		
		</div><!-- #container -->
		
		<?php get_sidebar(); ?>
		
	</div><!-- #main -->

	</div><!-- .texture div -->
	
<?php get_footer(); ?>
