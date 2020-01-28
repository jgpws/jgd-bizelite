<!-- begins the loop -->
<?php if(have_posts()) : while ( have_posts() ) : the_post();

$mag_choices = get_theme_mod( 'jgd_bizelite_mag_choices', 'blog' );
?>

<!-- opens post div -->
<div id="post-<?php the_id(); ?>" <?php post_class(); ?>>
	<?php if ( $mag_choices == 'magazine_2' ) { ?>
	<div class="entry-header">
	<?php
		if( has_post_thumbnail() ) {
			the_post_thumbnail( 'full' );
		}
	} ?>
		<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
		<?php $meta_info = ( $mag_choices == 'magazine_2' ) ? get_template_part( 'entry', 'meta-featured' ) : get_template_part( 'entry', 'meta' );
		if ( $mag_choices == 'magazine_2' ) { ?>
	</div>
	<?php
	} ?>

	<!-- opens entry div -->
	<div class="entry clearfix">
	<?php
	if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
		if( $mag_choices != 'magazine_2' ) {
			$post_tn = ( $mag_choices == 'magazine_1' ) ? the_post_thumbnail( 'full' ) : the_post_thumbnail( 'medium' );
		}
	}
	?>
	<?php
	if( is_home() ) {
		the_content( esc_html__( 'Continue Reading...', 'jgd-bizelite' ) );
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
