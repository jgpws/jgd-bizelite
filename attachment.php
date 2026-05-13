<?php get_header(); ?>
<?php 
  global $post;
  $parent_id = wp_get_post_parent_id( $post->ID );
?>
    
	<main id="main" class="main texture">

		<section id="content" class="content">
		<!-- see http://themeshaper.com/2009/06/29/wordpress-theme-index-template-tutorial/ -->

      <p class="post-parent-return">
      <?php 
        if ( $parent_id && $parent_id !== $post->ID ) {
          esc_html_e( 'Parent post:', 'jgd-bizelite' ); ?>           <a href="<?php echo esc_url( get_permalink( $post->post_parent ) ); ?>" title="<?php /* translators: %s = Post parent title */ printf( esc_attr__( 'Return to %s', 'jgd-bizelite' ), esc_html( get_the_title( $post->post_parent ), 1 ) ); ?>" rev="attachment"><?php echo esc_html( get_the_title( $post->post_parent ) ); ?></a>
      <?php } else {
        esc_html_e( 'Parent post: Unattached to a post', 'jgd-bizelite' );
      } ?>
      </p>

			<!-- begins the loop- single page -->
			<?php if(have_posts()) : while ( have_posts() ) : the_post(); ?>

			<!-- opens post div -->
			<article id="post-<?php the_id(); ?>" <?php post_class(); ?>>
			<h1 class="entry-title"><?php the_title(); ?></a></h1>
      <div class="index-meta">
        <?php jgd_bizelite_edit_icon(); ?>
        <p class="meta">
          <strong><?php esc_html_e( 'By: ', 'jgd-bizelite' ); ?></strong><?php the_author_posts_link(); ?> <?php jgd_bizelite_hide_postdate_switcher_customizer(); ?><?php jgd_bizelite_hide_commentslink_switcher_customizer(); ?>
        </p>
      </div>

				<!-- opens entry div -->
				<div class="entry clearfix">
				<?php echo wp_get_attachment_image( get_the_ID(), 'large' ); ?>
				<?php $attachment_metadata = wp_get_attachment_metadata( get_the_ID() );
				echo '<p><strong>' . esc_html__( 'Width:', 'jgd-bizelite' ) . '</strong> ' . esc_html( $attachment_metadata['width'] ) . "px<br />";
				echo '<strong>' . esc_html__( 'Height:', 'jgd-bizelite' ) . '</strong> ' . esc_html( $attachment_metadata['height'] ) . "px</p>"; ?>
				<?php the_content(); ?>
				<?php wp_link_pages('before=<p class="page-links">' . __( 'Page: ', 'jgd-bizelite' ) . '&after=</p>'); ?>

				<?php jgd_bizelite_disable_comments_switcher_customizer(); ?>
				</div>
				<!-- closes entry div -->

			</article>
			<!-- closes post div -->

			<?php endwhile; else: ?>
			<p><?php esc_html_e( 'Sorry, no posts yet. Would you like to create one?', 'jgd-bizelite' ); ?></p>
			<?php endif; ?>
			<!-- ends the loop- single page -->


		</section><!-- #content -->

		<?php get_sidebar(); ?>

	</main><!-- #main -->

	<?php get_footer(); ?>
