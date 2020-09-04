<!-- begins the loop- page -->
<?php

// This loop works well with templates that don't require any blog specific data, such as shop checkout pages.

if(have_posts()) : while ( have_posts() ) : the_post(); ?>

<!-- opens post div -->
<div id="post-<?php the_id(); ?>" <?php post_class(); ?>>

	<!-- opens entry div -->
	<div class="entry clearfix">
		<?php the_content(); ?>
	</div>
	<!-- closes entry div -->

</div>
<!-- closes post div -->

<?php endwhile; else: ?>
<p><?php esc_html_e( 'Sorry, no pages yet. Would you like to create one?', 'jgd-bizelite' ); ?></p>
<?php endif; ?>
<!-- ends the loop- page -->
