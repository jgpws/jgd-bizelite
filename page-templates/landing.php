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

	<main id="main" class="main texture">

	  <section id="content" class="content">

			<?php get_template_part( 'template-parts/loop', 'landing' ); ?>

		</section><!-- #content -->

	</main><!-- #main -->

<?php get_footer( 'landing' ); ?>
