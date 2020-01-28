<!-- search form -->
<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label class="screen-reader-text" for="s"><?php _e( 'Search:', 'jgd-bizelite' ); ?></label>
		<input type="search"  class="search-input" placeholder="<?php esc_attr_e( 'Enter search term&hellip;', 'jgd-bizelite' ); ?>" value="<?php the_search_query(); ?>" name="s">
		<button type="submit" class="search-submit" title="<?php esc_attr_e( 'Search', 'jgd-bizelite' ); ?>"></button>
</form>
