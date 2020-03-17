<?php get_header(); ?>

	<div id="main" class="texture">

		<div id="container">

			<div id="content">
			<?php get_template_part( 'template-parts/navigation' ); ?>
			<?php
			// current author info
			$curauth = ( isset( $_GET['author_name'] ) ) ? get_user_by( 'slug', $author_name ) : get_userdata( intval( $author ) ); ?>
			<div class="author-box clearfix">
				<h1 class="archive-title"><?php the_archive_title(); ?></h1>
				<hr>
				<?php if( $curauth->user_url ) { ?>
				<div class="author-meta">
					<?php echo get_avatar( get_the_author_meta( 'ID' ). 32 ); ?>
					<?php /* translators: %1$s = <h2>; %2$s = </h2> */ echo sprintf( esc_html__( '%1$sWebsite:%2$s', 'jgd-bizelite' ), '<h2>', '</h2>' ); ?>
					<p><a href="<?php echo esc_url( $curauth->user_url ); ?>"><?php echo esc_url ( $curauth->user_url ); ?></a></p>
					<h2><?php esc_html_e( 'About this author:', 'jgd-bizelite' ); ?></h2>
					<?php the_archive_description( '<p class="author-description">', '</p>' ); ?>
				</div>
				<?php } ?>
			</div>
			<hr class="author-sep">

			<!-- the loop -->
			<?php if(have_posts()) : while ( have_posts() ) : the_post(); ?>

			<!-- opens post div -->
			<div id="post-<?php the_id(); ?>" <?php post_class(); ?>>
			<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
			<?php get_template_part( 'entry', 'meta' ); ?>

				<!-- opens entry div -->
				<div class="entry">
				<?php the_excerpt(); ?>
				</div>

			<!-- closes entry div -->

			</div>
			<!-- closes post div -->

			<?php endwhile; else: ?>
			<p><?php esc_html_e('Sorry, no posts yet. Would you like to create one?', 'jgd-bizelite'); ?></p>
			<?php endif; ?>

			</div><!-- #content -->

		</div><!-- #container -->

		<?php get_sidebar(); ?>

	</div><!-- #main -->

	<?php get_footer(); ?>
