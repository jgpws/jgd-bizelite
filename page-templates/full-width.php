<?php
/*
 * Template Name: Full Width, No Menu
 * Description: Full width page. It has no main menu, sidebars or comments, but includes a header and footer.
 * @package WordPress
 * @subpackage JGD-BizElite
 * @since JGD-BizElite 1.4
 */
?>

<?php get_header( 'nomenu' ); ?>

	<div id="main" class="texture">

		<div id="container">

			<div id="content">

			<?php get_template_part( 'template-parts/loop', 'plain' ); ?>

			</div><!-- #content -->

		</div><!-- #container -->

	</div><!-- #main -->

<?php get_footer(); ?>
