<?php get_header(); ?>

	<div id="main" class="texture">

		<div id="container">

			<div id="content">
			<?php get_template_part( 'template-parts/navigation' ); ?>

			<h3 class="archive-title"><?php esc_html_e( 'Search results for: ', 'jgd-bizelite' ); ?></h3>
			<h1 class="search-subtitle"><?php the_search_query(); ?></h1>
			<hr>

			<?php get_template_part( 'template-parts/loop', 'search' ); ?>

			</div><!-- #content -->

		</div><!-- #container -->

		<?php get_sidebar(); ?>

	</div><!-- #main -->

	<?php get_footer(); ?>
