<?php get_header(); ?>

	<div class="texture">
	
	<div id="main">
		
		<div id="container">
		
			<div id="content">
			<?php get_template_part( 'navigation' ); ?>
			
			<h1 class="subtitle-margin hr"><?php the_archive_title(); ?></h1>

			<?php get_template_part( 'loop' ); ?>

			</div><!-- #content -->
		
		</div><!-- #container -->
		
		<?php get_sidebar(); ?>
		
	</div><!-- #main -->

	</div><!-- .texture div -->
	
	<?php get_footer(); ?>
