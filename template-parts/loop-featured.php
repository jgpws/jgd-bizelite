<?php
// begins first loop

$args = array(
	'post_type' => 'post',
	'posts_per_page' => 1,
	'ignore_sticky_posts' => 1,
);
$first_query = new WP_query( $args );

if( $first_query->have_posts() ) : while ( $first_query->have_posts() ) : $first_query->the_post(); ?>
	<!-- opens post div -->
	<div id="post-<?php the_id(); ?>" <?php post_class(); ?>>
		<div class="entry-header">
		<?php
			if( has_post_thumbnail() ) {
				the_post_thumbnail( 'full' );
			} ?>
			<div class="entry-title-block">
				<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
				<?php get_template_part( 'template-parts/entry', 'meta-featured' ); ?>
			</div>
		</div>

		<!-- opens entry div -->
		<div class="entry clearfix">
		<?php the_excerpt(); ?>
		</div>
		<!-- closes entry div -->

	</div>
	<!-- closes post div -->
	<?php
	endwhile;
else: ?>
<p><?php esc_html_e( 'Sorry, no posts yet. Would you like to create one?', 'jgd-bizelite' ); ?></p>
<?php endif;
wp_reset_postdata();
// ends first loop ?>

<?php
// begins second loop

if( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<!-- opens post div -->
	<div id="post-<?php the_id(); ?>" <?php post_class(); ?>>
		<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
			<?php get_template_part( 'template-parts/entry', 'meta-featured' ); ?>

		<!-- opens entry div -->
		<div class="entry clearfix">
		<?php
		if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
			the_post_thumbnail( 'medium' );
		} ?>
		<?php the_excerpt(); ?>
		</div>
		<!-- closes entry div -->

	</div>
	<!-- closes post div -->
	<?php
 endwhile;
 wp_reset_postdata();
else: ?>
<p><?php esc_html_e('Sorry, no posts yet. Would you like to create one?', 'jgd-bizelite'); ?></p>
<?php endif;
wp_reset_postdata();
// ends second loop ?>
