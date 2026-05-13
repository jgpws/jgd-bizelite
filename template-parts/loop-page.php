<!-- begins the loop- page -->
<?php if(have_posts()) : while ( have_posts() ) : the_post(); ?>

<h2 class="entry-title"><?php the_title(); ?></h2>
<!-- opens #post -->
<article id="post-<?php the_id(); ?>" <?php post_class(); ?>>
<?php get_template_part( 'template-parts/entry', 'meta' ); ?>

	<!-- opens .entry -->
	<div class="entry clearfix">
	<?php
	if ( has_post_thumbnail() ) {
		the_post_thumbnail( 'medium' );
	} ?>
	<?php the_content(); ?>
	<?php wp_link_pages( 'before=<p class="page-links">' . esc_html__( 'Page: ', 'jgd-bizelite' ) . '&after=</p>' ); ?>

	<?php jgd_bizelite_disable_comments_switcher_customizer(); ?>
	</div>
	<!-- closes .entry -->

</article>
<!-- closes #post -->

<?php endwhile; else: ?>
<article id="post">
  <div class="entry">
    <p><?php esc_html_e( 'Sorry, no pages yet. Would you like to create one?', 'jgd-bizelite' ); ?></p>
  </div>
</article>
<?php endif; ?>
<!-- ends the loop- page -->
