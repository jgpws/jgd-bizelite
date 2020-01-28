<?php get_header(); ?>

	<div id="main" class="texture">

		<div id="container">

			<div id="content">
			<?php get_template_part( 'navigation' ); ?>

			<h1 class="archive-title"><?php _e( 'Archive:', 'jgd-bizelite' ); ?></h1>
			<h2 class="archive-title"><?php the_archive_title(); ?></h2>
			<hr>

			<?php get_template_part( 'loop' ); ?>

			</div><!-- #content -->

		</div><!-- #container -->

		<?php get_sidebar(); ?>

	</div><!-- #main -->

	<?php get_footer(); ?>
