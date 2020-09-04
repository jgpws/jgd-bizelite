<?php get_header( 'nomenu' ); ?>

	<div id="main" class="texture">

		<div class="woo-content-container">
			<?php woocommerce_breadcrumb(); ?>
			<?php woocommerce_content(); ?>
		</div>

		<?php jgd_bizelite_wc_sidebar_switcher(); ?>

	</div><!-- #main -->

<?php get_footer(); ?>
