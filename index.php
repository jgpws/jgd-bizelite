<?php get_header();
$mag_choices = get_theme_mod( 'jgd_bizelite_mag_choices', 'blog' );
?>

	<div id="main" class="texture">

		<div id="container">

			<div id="content">
			<?php get_template_part( 'navigation' ); ?>

			<?php
			//$mag_choices = get_theme_mod( 'jgd_bizelite_mag_choices', 'blog' );
			if ( $mag_choices  == 'magazine_2' ) {
				get_template_part( 'loop', 'featured' );
			} else {
				get_template_part( 'loop' );
			} ?>

			</div><!-- #content -->

		</div><!-- #container -->

		<?php get_sidebar(); ?>

	</div><!-- #main -->

<?php get_footer(); ?>
