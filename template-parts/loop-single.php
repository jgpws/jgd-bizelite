<!-- begins the loop- single page -->
<?php if(have_posts()) : while ( have_posts() ) : the_post(); ?>

<!-- opens post div -->
<div id="post-<?php the_id(); ?>" <?php post_class(); ?>>
	<h1 class="entry-title"><?php the_title(); ?></a></h1>
	<?php get_template_part( 'template-parts/entry', 'meta' ); ?>

		<!-- opens entry div -->
		<div class="entry clearfix">
			<?php
			if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
				the_post_thumbnail('medium');
			}
			?>
			<?php the_content(); ?>
			<?php wp_link_pages( 'before=<p class="page-links">' . __( 'Page: ', 'jgd-bizelite' ) . '&after=</p>' ); ?>

			<?php jgd_bizelite_disable_comments_switcher_customizer(); ?>
		</div>
		<!-- closes entry div -->

</div>
<!-- closes post div -->

<?php endwhile; else: ?>
<p><?php esc_html_e( 'Sorry, no posts yet. Would you like to create one?', 'jgd-bizelite' ); ?></p>
<?php endif; ?>
<!-- ends the loop- single page -->
