<?php get_header(); ?>

	<div id="main" class="texture">

		<div id="container">

			<div id="content">
			<?php get_template_part( 'navigation' ); ?>

			<?php get_template_part( 'loop' ); ?>

			</div><!-- #content -->

		</div><!-- #container -->

		<?php get_sidebar(); ?>

	</div><!-- #main -->

<?php get_footer(); ?>
