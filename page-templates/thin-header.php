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

	<main id="main" class="main texture">

	  <section id="content" class="content">

			<?php get_template_part( 'template-parts/loop', 'page' ); ?>

		</section><!-- #content -->

	</main><!-- #main -->

<?php get_footer(); ?>
