<?php get_header(); ?>

  <main id="main" class="main texture">

	  <section id="content" class="content">

			<?php get_template_part( 'template-parts/navigation' ); ?>

			<h1 class="archive-title"><?php esc_html_e( 'Archive:', 'jgd-bizelite' ); ?></h1>
			<h2 class="archive-title"><?php the_archive_title(); ?></h2>
			<hr>

			<?php get_template_part( 'template-parts/loop' ); ?>

		</section><!-- #content -->

		<?php get_sidebar(); ?>

	</main><!-- #main -->

	<?php get_footer(); ?>
