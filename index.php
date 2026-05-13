<?php get_header();
$mag_choices = get_theme_mod( 'jgd_bizelite_mag_choices', 'blog' );
?>

  <main id="main" class="main texture">

	  <section id="content" class="content">

			<?php get_template_part( 'template-parts/navigation' ); ?>

			<?php
			if ( $mag_choices  == 'magazine_2' ) {
				get_template_part( 'template-parts/loop', 'featured' );
			} else {
				get_template_part( 'template-parts/loop' );
			} ?>

		</section><!-- #content -->

		<?php get_sidebar(); ?>

	</main><!-- #main -->

<?php get_footer(); ?>
