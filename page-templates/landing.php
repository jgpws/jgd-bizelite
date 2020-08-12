<?php
/*
 * Template Name: Landing Page
 * Description: Full width page ideal for a landing page. It has no header, footer or sidebars, comments or page title.
 * @package WordPress
 * @subpackage JGD-BizElite
 * @since JGD-BizElite 1.4
 */
?>

<?php get_header( 'landing' ); ?>

	<div id="main" class="texture">

		<div id="container">

			<div id="content">

			<?php get_template_part( 'template-parts/loop', 'landing' ); ?>

			</div><!-- #content -->

		</div><!-- #container -->

	</div><!-- #main -->

<?php get_footer( 'landing' ); ?>
