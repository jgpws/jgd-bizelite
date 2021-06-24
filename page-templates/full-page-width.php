<?php
/*
 * Template Name: Full Page Width, No Menu
 * Description: Full width without the bounding box. It has no main menu, sidebars or comments, but includes a header and footer. This is ideal for use with a page builder.
 */
get_header( 'nomenu' ); ?>

	<div id="main" class="texture">

		<div id="container">

			<div id="content">

			<?php get_template_part( 'template-parts/loop', 'landing' ); ?>

			</div><!-- #content -->

		</div><!-- #container -->

	</div><!-- #main -->

<?php get_footer(); ?>
