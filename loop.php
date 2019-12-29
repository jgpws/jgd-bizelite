<!-- begins the loop -->
<?php if(have_posts()) : while ( have_posts() ) : the_post(); ?>

<!-- opens post div -->
<div id="post-<?php the_id(); ?>" <?php post_class(); ?>>
<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
<?php get_template_part( 'entry', 'meta' ); ?>

	<!-- opens entry div -->
	<div class="entry clearfix">
	<?php
	if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
		if( 	get_theme_mod( 'layout_choices' ) == '2cr-mag' ||
				get_theme_mod( 'layout_choices' ) == '3cr-mag' ||
				get_theme_mod( 'layout_choices' ) == '2cl-mag' ||
				get_theme_mod( 'layout_choices' ) == '3cl-mag' ) {
			the_post_thumbnail( 'full' );
		} else {
			the_post_thumbnail( 'medium' );
		}
	}
	?>
	<?php 
	if( is_home() ) {
		the_content( __( 'Continue Reading...', 'jgd-bizelite' ) );
	} else if( ( is_author() || is_archive() ) ) {
		the_excerpt();
	} else {
		the_content();
	} ?>
	</div>
	<!-- closes entry div -->

</div>
<!-- closes post div -->

<?php endwhile; else: ?>
<p><?php _e('Sorry, no posts yet. Would you like to create one?', 'jgd-bizelite'); ?></p>
<?php endif; ?>
<!-- ends the loop -->