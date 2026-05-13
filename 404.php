<?php get_header(); ?>

	<main id="main" class="main texture">

		<section id="content" class="content">

			<h2 class="entry-title"><?php esc_html_e( 'Page Not Found', 'jgd-bizelite'); ?></h2>
			<!-- opens .entry -->
			<div class="entry clearfix">
				<p class="large-text"><strong><?php esc_html_e( 'Error 404', 'jgd-bizelite' ); ?></strong></p>
				<p><?php esc_html_e( 'We apologize, but the page you requested was not found.', 'jgd-bizelite' ); ?></p>
				<p>
					<?php /* translators: %1$s is <strong> html tag; %2$s is </strong> tag */ echo sprintf( esc_html__( '%1$sWhat to do?%2$s', 'jgd-bizelite'), '<strong>', '</strong>' ); ?>
        </p>
        <hr>
        <p><?php get_search_form(); ?></p>
        <hr>
        <p><?php esc_html_e( 'Go back to the', 'jgd-bizelite' ); ?> <a href="<?php echo esc_url( home_url('/') ); ?>"><?php esc_html_e( 'Home Page', 'jgd-bizelite' ); ?></a>.</p>
        <hr>
			</div>
			<!-- closes .entry -->

		</section><!-- #content -->

		<?php get_sidebar(); ?>

	</main><!-- #main -->

<?php get_footer(); ?>
