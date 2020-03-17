<div id="sidebar" class="sidebar">
	<div class="primary widget-area">
		<?php if ( is_active_sidebar( 'primary_widget_area' ) ) : ?>
		<!-- begins widgetized area -->
		<ul class="xoxo">
			<?php dynamic_sidebar( 'primary_widget_area' ); ?>
		</ul>
		<?php
		else:

		$widgetposts = new WP_Query( array(
			'posts_per_page' => absint(5),
		));
		?>
		<ul class="xoxo">
			<li id="recent-posts" class="widget widget_recent_entries">
				<h3 class="widgettitle"><?php esc_html_e( 'Recent Posts', 'jgd-bizelite' ); ?></h3>
				<ul>
					<?php
					if ( $widgetposts->have_posts()) : while ( $widgetposts->have_posts() ) : $widgetposts->the_post(); ?>
					<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
					<?php
					endwhile;
					endif;
					?>
				</ul>
			</li>
			<li id="archives" class="widget widget_archives">
				<h3 class="widgettitle"><?php esc_html_e( 'Archives', 'jgd-bizelite'); ?></h3>
				<ul>
				<?php wp_get_archives(); ?>
				</ul>
			</li>
			<li class="widget log-in-out">
				<h3 class="widgettitle"><?php esc_html_e( 'My Account', 'jgd-bizelite' ) ?></h3>
					<ul>
					<?php if(is_user_logged_in()) { ?>
					<li><span class="login-message"><?php esc_html_e( 'Welcome ', 'jgd-bizelite'); ?><?php echo esc_html( get_the_author_meta( 'display_name' ) ); ?>:</span></li>
					<?php wp_register('<li>', sprintf( /* translators: %1$s = </li> */ esc_html__(' (Edit Site)%1$s', 'jgd-bizelite' ), '</li>' ) );
					} // ends if is user logged in
					?>
					<li><?php wp_loginout(); ?></li>
				</ul>
			</li>
		</ul>
		<?php endif; ?><!-- ends widgetized area -->
	</div><!-- .widget-area -->

	<div class="secondary widget-area">
		<?php if ( is_active_sidebar( 'secondary_widget_area' ) ) : ?>
			<ul class="xoxo">
				<?php dynamic_sidebar( 'secondary_widget_area' ); ?>
			</ul>
		<?php endif; ?>
	</div><!-- .widget-area -->
</div><!-- #sidebar -->
