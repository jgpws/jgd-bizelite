<div id="sidebar" class="sidebar">
	<div class="wc-widget-area widget-area">
		<?php if ( is_active_sidebar( 'wc_widget_area' ) ) : ?>
		<!-- begins widgetized area -->
		<ul class="xoxo">
			<?php dynamic_sidebar( 'wc_widget_area' ); ?>
		</ul>
		<?php
			else: ?>
		<p>Add your WooCommerce widgets here.</p>
		<?php endif; ?><!-- ends widgetized area -->
	</div><!-- .widget-area -->
</div><!-- #sidebar -->
