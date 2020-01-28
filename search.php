<?php get_header(); ?>

	<div id="main" class="texture">

		<div id="container">

			<div id="content">
			<?php get_template_part( 'navigation' ); ?>

			<h3><?php _e( 'Search results for: ', 'jgd-bizelite' ); ?></h3>
			<h1 class="subtitle-margin hr"><?php the_search_query(); ?></h1>

			<?php get_template_part( 'loop', 'search' ); ?>

			</div><!-- #content -->

		</div><!-- #container -->

		<?php get_sidebar(); ?>

	</div><!-- #main -->

	<?php get_footer(); ?>
