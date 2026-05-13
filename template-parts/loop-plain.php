<!-- begins the loop- page -->
<?php

// This loop works well with templates that don't require any blog specific data, such as shop checkout pages.

if(have_posts()) : while ( have_posts() ) : the_post(); ?>

<h1 class="entry-title"><?php the_title(); ?></a></h1>
<!-- opens #post -->
<article id="post-<?php the_id(); ?>" <?php post_class(); ?>>
	<div class="index-meta">
		<?php jgd_bizelite_edit_icon(); ?>
	</div>

	<!-- opens .entry -->
	<div class="entry clearfix">
		<?php the_content(); ?>
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
