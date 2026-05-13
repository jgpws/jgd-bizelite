<?php
/*
 * Template Name: Full Width, No Menu
 * Description: Full width page. It has no main menu, sidebars or comments, but includes a header and footer.
 * @package WordPress
 * @subpackage JGD-BizElite
 * @since JGD-BizElite 1.5
 */
?>

<?php get_header( 'nomenu' ); ?>

	<main id="main" class="main texture">

	  <section id="content" class="content">

			<?php get_template_part( 'template-parts/loop', 'plain' ); ?>

		</section><!-- #content -->

	</main><!-- #main -->

<?php get_footer(); ?>
