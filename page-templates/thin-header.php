<?php
/*
 * Template Name: Thin Header
 * Description: Full width page with no sidebars, no comments. It has a thin header with only the dropdown menus.
 * @package WordPress
 * @subpackage JGD-BizElite
 * @since JGD-BizElite 1.4
 */
?>

<?php get_header( 'thin' ); ?>

	<div id="main" class="texture">

		<div id="container">

			<div id="content">

			<?php get_template_part( 'template-parts/loop', 'page' ); ?>

			</div><!-- #content -->

		</div><!-- #container -->

	</div><!-- #main -->

<?php get_footer(); ?>
