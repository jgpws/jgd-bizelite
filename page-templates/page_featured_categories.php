<?php 
/*
 * Template Name: Featured Categories Page
 * Description: Full width page with content area and the most recent post from up to six categories. It doesn't include sidebars or comments.
 * @package WordPress
 * @subpackage JGD-BizElite
 * @since JGD-BizElite 1.3
 */

get_header(); ?>

	<div class="texture">
	
	<div id="main">
		
		<div id="container">
		
			<div id="content">
			
			<?php get_template_part( 'loop', 'page' );
			
			// Begin parameters and display of category posts
			$args = array(
				'cat' => intval( get_theme_mod( 'jgd_bizelite_cat_dropdown_1' ) ),
				'posts_per_page' => 3,
			);
			
			$args2 = array(
				'cat' => intval( get_theme_mod( 'jgd_bizelite_cat_dropdown_2' ) ),
				'posts_per_page' => 3,
			);
			
			$args3 = array(
				'cat' => intval( get_theme_mod( 'jgd_bizelite_cat_dropdown_3' ) ),
				'posts_per_page' => 3,
			);
			
			$cat_query1 = new WP_Query( $args );
			$cat_query2 = new WP_Query( $args2 );
			$cat_query3 = new WP_Query( $args3 ); ?>

				<div class="featured-cat-container">
				<h2 class="hr"><?php jgd_bizelite_cat_section_title_customizer(); ?></h2><?php
				
				if( $cat_query1->have_posts() ) : ?>
				<h3 class="featured-cat-title"><?php echo get_cat_name( intval( get_theme_mod( 'jgd_bizelite_cat_dropdown_1' ) ) ); ?></h3>
				<div class="featured-cat-panel">
				<?php
					while( $cat_query1->have_posts() ) : $cat_query1->the_post(); ?>
					<div id="post-<?php the_id(); ?>" class="featured-cat-post">
						<div class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></div>
						<p class="meta"><?php jgd_bizelite_author_icon(); ?><?php the_author_posts_link(); ?> <?php jgd_bizelite_hide_postdate_switcher_customizer(); ?></p>
						<div class="entry">
						<?php if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
							the_post_thumbnail( 'medium' ); 
						} else { ?>
							<div class="ti-image"></div>
						<?php
						} the_excerpt(); ?>
						</div>
					</div>
					<?php
					endwhile;
					
					wp_reset_postdata(); ?>
				</div><?php
				endif;
				
				if( $cat_query2->have_posts() ) : ?>
				<h3 class="featured-cat-title"><?php echo get_cat_name( intval( get_theme_mod( 'jgd_bizelite_cat_dropdown_2' ) ) ); ?></h3>
				<div class="featured-cat-panel">
				<?php
					while( $cat_query2->have_posts() ) : $cat_query2->the_post(); ?>
					<div id="post-<?php the_id(); ?>" class="featured-cat-post">
						<div class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></div>
						<p class="meta"><?php jgd_bizelite_author_icon(); ?><?php the_author_posts_link(); ?> <?php jgd_bizelite_hide_postdate_switcher_customizer(); ?></p>
						<div class="entry">
						<?php if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
							the_post_thumbnail( 'medium' ); 
						} else { ?>
							<div class="ti-image"></div>
						<?php
						} the_excerpt(); ?>
						</div>
					</div>
					<?php
					endwhile;
					
					wp_reset_postdata(); ?>
				</div><?php
				endif;
				
				if( $cat_query3->have_posts() ) : ?>
				<h3 class="featured-cat-title"><?php echo get_cat_name( intval( get_theme_mod( 'jgd_bizelite_cat_dropdown_3' ) ) ); ?></h3>
				<div class="featured-cat-panel">
				<?php
					while( $cat_query3->have_posts() ) : $cat_query3->the_post(); ?>
					<div id="post-<?php the_id(); ?>" class="featured-cat-post">
						<div class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></div>
						<p class="meta"><?php jgd_bizelite_author_icon(); ?><?php the_author_posts_link(); ?> <?php jgd_bizelite_hide_postdate_switcher_customizer(); ?></p>
						<div class="entry">
						<?php if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
							the_post_thumbnail( 'medium' ); 
						} else { ?>
							<div class="ti-image"></div>
						<?php 
						} the_excerpt(); ?>
						</div>
					</div>
					<?php
					endwhile;
					
					wp_reset_postdata(); ?>
				</div><?php
				endif;
				?>
				</div><!-- .featured-cat-container -->
			</div><!-- #content -->
		
		</div><!-- #container -->
		
	</div><!-- #main -->

	</div><!-- .texture div -->
	
	<?php get_footer(); ?>
