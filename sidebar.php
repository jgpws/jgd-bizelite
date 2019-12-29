<div id="primary" class="widget-area">
	<ul class="xoxo">
	<?php if ( dynamic_sidebar( 'primary_widget_area' ) ) : else : ?>
	<!-- begins widgetized area -->
	<?php 
	$widgetposts = new WP_Query( array(
		'posts_per_page' => 5,
	));
	?> 
		<li id="recent-posts" class="widget widget_recent_entries">
			<h3 class="widgettitle"><?php _e( 'Recent Posts', 'jgd-bizelite' ); ?></h3>
			<ul>
				<?php 
				if ($widgetposts->have_posts()) : while ($widgetposts->have_posts()) : $widgetposts->the_post(); ?>
				<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
				<?php 
				endwhile;
				endif; 
				?>
			</ul>
		</li>
		<li id="archives" class="widget widget_archives">
		<h3 class="widgettitle"><?php _e('Archives', 'jgd-bizelite') ?></h3>
			<ul>
			<?php wp_get_archives(); ?>
			</ul>
		</li>
		<li class="log-in-out">
			<h3 class="widgettitle"><?php _e( 'My Account', 'jgd-bizelite' ) ?></h3>
				<ul>
				<?php if(is_user_logged_in()) { ?>
				<li><span class="login-message"><?php _e( 'Welcome ', 'jgd-bizelite'); ?><?php echo esc_html( get_the_author_meta( 'display_name' ) ); ?>:</span></li>
				<?php wp_register('<li>', sprintf( __(' (Edit Site)%1$s', 'jgd-bizelite' ), '</li>' ) ); 
				} // ends if is user logged in
				?>
				<li><?php wp_loginout(); ?></li>
			</ul>
		</li>
	<?php endif; ?><!-- ends widgetized area -->
	</ul>
</div><!-- #primary .widget-area -->
		
<div id="secondary" class="widget-area">
	<ul class="xoxo">
	<?php if ( dynamic_sidebar( 'secondary_widget_area' ) ) : else : endif; ?>
	</ul>
</div><!-- #secondary .widget-area -->
