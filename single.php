<?php get_header(); ?>

	<main id="main" class="main texture">

	  <section id="content" class="content">
			<!-- see http://themeshaper.com/2009/06/29/wordpress-theme-index-template-tutorial/ -->

			<?php the_post_navigation(); ?>

			<?php get_template_part( 'template-parts/loop', 'single' ); ?>

		</section><!-- #content -->

		<?php get_sidebar(); ?>

	</main><!-- #main -->

<?php get_footer(); ?>
