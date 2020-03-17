<?php
/**
 *
 * Meta information for posts and pages, including Author, Post date, Categories and Tags
 *
 * @package WordPress
 * @subpackage JGD-BizElite
 * @since JGD-BizElite 1.3
*/ ?>

<div class="index-meta">
<?php jgd_bizelite_edit_icon(); ?>
<p class="meta">
<?php 
if( is_page() ) {
	// Author only on pages
	jgd_bizelite_author_icon(); // In jgd_bizelite_customizer-frontend.php ?><?php the_author_posts_link();
} else { 
	jgd_bizelite_author_icon(); // In jgd_bizelite_customizer-frontend.php ?><?php the_author_posts_link(); ?> 
	<?php if( is_date() ) { ?>
	 | <?php jgd_bizelite_postdate_icon(); // In jgd_bizelite_customizer-frontend.php ?><?php echo get_the_date(); ?><?php
	} else {
		jgd_bizelite_hide_postdate_switcher_customizer(); 
	} ?><?php jgd_bizelite_hide_commentslink_switcher_customizer(); ?></p>
	
	<?php jgd_bizelite_hide_cats_switcher_customizer(); // In jgd_bizelite_customizer-frontend.php ?>
	<?php jgd_bizelite_hide_tags_switcher_customizer(); // In jgd_bizelite_customizer-frontend.php 
} ?>
</div>