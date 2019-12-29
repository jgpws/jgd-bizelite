<?php
/*
 * Template Name: Landing Page
 * Description: Full width page ideal for a landing page. It has no sidebars, no comments and a thin header with only the dropdown menus.
 * @package WordPress
 * @subpackage JGD-BizElite
 * @since JGD-BizElite 1.1
 */
?>

<?php get_header( 'landing' ); ?>

	<div class="texture">
	
	<div id="main">
		
		<div id="container">
		
			<div id="content">
			
			<?php get_template_part( 'loop', 'page' ); ?>

			</div><!-- #content -->
		
		</div><!-- #container -->
		
	</div><!-- #main -->

	</div><!-- .texture div -->
	
<?php get_footer(); ?>
