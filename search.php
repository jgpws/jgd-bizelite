<?php get_header(); ?>

<main id="main" class="main texture">

	<section id="content" class="content">
		<?php get_template_part( 'template-parts/navigation' ); ?>

		<p class="archive-title"><?php esc_html_e( 'Search results for: ', 'jgd-bizelite' ); ?></p>
		<h2 class="search-subtitle"><?php the_search_query(); ?></h2>
		<hr>

		<?php get_template_part( 'template-parts/loop', 'search' ); ?>


	</section><!-- #content -->

	<?php get_sidebar(); ?>

</main><!-- #main -->

<?php get_footer(); ?>
