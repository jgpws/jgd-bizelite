<!-- begins the loop- page -->
<?php if(have_posts()) : while ( have_posts() ) : the_post(); ?>

<!-- opens post div -->
<div id="post-<?php the_id(); ?>" <?php post_class(); ?>>

	<!-- opens entry div -->
	<div class="entry clearfix">
	<?php
	if ( has_post_thumbnail() ) {
		the_post_thumbnail( 'medium' );
	} ?>
	<?php the_content(); ?>
	<?php wp_link_pages( 'before=<p class="page-links">' . esc_html__( 'Page: ', 'jgd-bizelite' ) . '&after=</p>' ); ?>

	<?php jgd_bizelite_disable_comments_switcher_customizer(); ?>
	</div>
	<!-- closes entry div -->

</div>
<!-- closes post div -->

<?php endwhile; else: ?>
<p><?php esc_html_e( 'Sorry, no pages yet. Would you like to create one?', 'jgd-bizelite' ); ?></p>
<?php endif; ?>
<!-- ends the loop- page -->
