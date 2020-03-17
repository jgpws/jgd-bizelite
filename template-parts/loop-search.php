<!-- begins the loop- search -->
<?php if(have_posts()) : while ( have_posts() ) : the_post(); ?>

<!-- opens post div -->
<div id="post-<?php the_id(); ?>" <?php post_class(); ?>>
<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
<!-- about php if ( $post->post_type == 'post' ) , see http://themeshaper.com/2009/07/02/wordpress-theme-search-page-template-tutorial/ by Ian Stewart -->
<div class="index-meta">
<?php jgd_bizelite_edit_icon(); ?>
<p><?php jgd_bizelite_author_icon(); ?><?php the_author_posts_link(); ?><?php if ( $post->post_type == 'post' ) { jgd_bizelite_hide_postdate_switcher_customizer(); jgd_bizelite_hide_commentslink_switcher_customizer(); } ?> </p>
<?php if ( $post->post_type == 'post' ) { jgd_bizelite_hide_cats_switcher_customizer(); } ?>
<?php if ( $post->post_type == 'post' ) { jgd_bizelite_hide_tags_switcher_customizer(); } ?>
</div>

	<!-- opens entry div -->
	<div class="entry clearfix">
	<?php
	if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
		the_post_thumbnail( 'medium' );
	} ?>
	<?php the_excerpt(); ?>
	<?php wp_link_pages( 'before=<p class="page-links">' . __( 'Page: ', 'jgd-bizelite' ) . '&after=</p>' ); ?>
	</div>
	<!-- closes entry div -->

</div>
<!-- closes post div -->

<?php endwhile; else: ?>
<p><?php esc_html_e( 'The search term you entered was not found. Would you like to enter another search term?', 'jgd-bizelite' ); ?></p>
<?php get_search_form(); ?>
<?php endif; ?>
<!-- end the loop- search -->
