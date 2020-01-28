<?php get_header(); ?>
<?php global $post; ?>

	<div id="main" class="texture">

		<div id="container">

			<div id="content">
			<!-- see http://themeshaper.com/2009/06/29/wordpress-theme-index-template-tutorial/ -->

			<p class="post-parent-return"><?php _e( 'Return to:', 'jgd-bizelite' ); ?> <a href="<?php echo esc_url( get_permalink( $post->post_parent ) ); ?>" title="<?php printf( __( 'Return to %s', 'jgd-bizelite' ), esc_html( get_the_title( $post->post_parent ), 1 ) ); ?>" rev="attachment"><?php echo get_the_title( $post->post_parent ); ?></a></p>

			<!-- begins the loop- single page -->
			<?php if(have_posts()) : while ( have_posts() ) : the_post(); ?>

			<!-- opens post div -->
			<div id="post-<?php the_id(); ?>" <?php post_class(); ?>>
			<h1 class="entry-title"><?php the_title(); ?></a></h1>
			<p class="index-meta"><strong><?php _e( 'By: ', 'jgd-bizelite' ); ?></strong><?php the_author_posts_link(); ?> <?php jgd_bizelite_hide_postdate_switcher_customizer(); ?><?php jgd_bizelite_hide_commentslink_switcher_customizer(); ?><span><?php edit_post_link(); ?></span></p>

				<!-- opens entry div -->
				<div class="entry clearfix">
				<?php echo wp_get_attachment_image( get_the_ID(), 'large' ); ?>
				<?php $attachment_metadata = wp_get_attachment_metadata( get_the_ID() );
				echo "<p><strong>Width:</strong> " . $attachment_metadata['width'] . "px<br />";
				echo "<strong>Height:</strong> " . $attachment_metadata['height'] . "px</p>"; ?>
				<?php the_content(); ?>
				<?php wp_link_pages('before=<p class="page-links">' . __( 'Page: ', 'jgd-bizelite' ) . '&after=</p>'); ?>

				<?php jgd_bizelite_disable_comments_switcher_customizer(); ?>
				</div>
				<!-- closes entry div -->

			</div>
			<!-- closes post div -->

			<?php endwhile; else: ?>
			<p><?php _e( 'Sorry, no posts yet. Would you like to create one?', 'jgd-bizelite' ); ?></p>
			<?php endif; ?>
			<!-- ends the loop- single page -->

			</div><!-- #content -->

		</div><!-- #container -->

		<?php get_sidebar(); ?>

	</div><!-- #main -->

	<?php get_footer(); ?>
