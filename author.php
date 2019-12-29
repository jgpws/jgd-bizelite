<?php get_header(); ?>

	<div class="texture">
	
	<div id="main">
		
		<div id="container">
		
			<div id="content">
			<?php get_template_part( 'navigation' ); ?>
			<?php
			// current author info
			$curauth = ( isset( $_GET['author_name'] ) ) ? get_user_by( 'slug', $author_name ) : get_userdata( intval( $author ) ); ?>
			<div class="author-box hr">
				<h1 class="author hr"><?php the_archive_title(); ?></h1>
				<?php if( $curauth->user_url ) { ?>
				<div class="author-meta">
					<?php echo get_avatar( get_the_author_meta( 'ID' ). 32 ); ?>
					<?php echo sprintf( __( '%1$sWebsite:%2$s', 'jgd-bizelite' ), '<h2>', '</h2>' ); ?>
					<p><a href="<?php echo esc_url( $curauth->user_url ); ?>"><?php echo esc_url ( $curauth->user_url ); ?></a></p>
					<h2><?php _e( 'About this author:', 'jgd-bizelite' ); ?></h2>
					<?php the_archive_description( '<p class="author-description">', '</p>' ); ?>
				</div>
				<?php } ?>
			</div>

			<!-- the loop -->
			<?php if(have_posts()) : while ( have_posts() ) : the_post(); ?>

			<!-- opens post div -->
			<div id="post-<?php the_id(); ?>" <?php post_class(); ?>>
			<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
			<p class="index-meta"><strong><?php _e( 'By: ', 'jgd-bizelite' ); ?></strong><?php the_author_posts_link(); ?> | <strong><?php _e( 'Post date: ', 'jgd-bizelite' ); ?></strong><?php echo get_the_date(); ?> <?php jgd_bizelite_hide_commentslink_switcher_customizer(); ?><span><?php edit_post_link(); ?></span><br />
			<?php jgd_bizelite_hide_cats_switcher_customizer(); ?>
			<?php jgd_bizelite_hide_tags_switcher_customizer(); ?></p>

				<!-- opens entry div -->
				<div class="entry">
				<?php the_excerpt(); ?>
				</div>
				
			<!-- closes entry div -->

			</div>
			<!-- closes post div -->

			<?php endwhile; else: ?>
			<p><?php _e('Sorry, no posts yet. Would you like to create one?', 'jgd-bizelite'); ?></p>
			<?php endif; ?>

			</div><!-- #content -->
		
		</div><!-- #container -->
		
		<?php get_sidebar(); ?>
		
	</div><!-- #main -->

	</div><!-- .texture div -->
	
	<?php get_footer(); ?>
