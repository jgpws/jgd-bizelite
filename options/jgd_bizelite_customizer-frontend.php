<?php
function jgd_bizelite_logo_align_switcher() {
	$logo_layout = get_theme_mod( 'jgd_bizelite_logo_options' );
	$custom_logo_id = get_theme_mod( 'custom_logo' );
	/* https://developer.wordpress.org/themes/functionality/custom-logo/ */
	$logo = wp_get_attachment_image_src( $custom_logo_id, 'full' );
	
	if( $logo_layout == 'center' ) {
		if( has_custom_logo() ) {
			$logo_center = '
.custom-logo-link {
	width: ' . $logo[1] . 'px;
}

.custom-logo-link,
.custom-logo-link img {
	display: block;
	margin: 20px auto;
}

.custom-logo-link img {
	float: none;
}

.custom-logo-link + #site-title-block {
	position: absolute;
	left: -9999px;
	top: 0px;
}';
		} else { // if a logo is not set
			$logo_center = '
#site-title-block {
	margin: 0px auto;
	position: static;
	text-align: center;
}';
		}
		wp_add_inline_style( 'jgd-bizelite-main-stylesheet', $logo_center );
	} elseif( $logo_layout == 'right' ) {
		if( has_custom_logo() ) {
			$logo_right = '
.custom-logo-link img {
	float: right;
}

@media screen and (min-width: 48em) {
	.custom-logo-link + #site-title-block {
		margin-left: 25%;
	}
}

@media screen and (min-width: 64.063em) {
	.custom-logo-link + #site-title-block {
		margin-left: 50%;
	}
}';
			if( 'blank' == esc_attr( get_header_textcolor() ) ) {
				$logo_right .= '
.custom-logo-link + #site-title-block {
	background-color: transparent;
	border-bottom: transparent;
}';
			}
		} elseif( !has_custom_logo() && 'blank' == esc_attr( get_header_textcolor() ) ) {
				$logo_right = '
#site-title-block {
	background-color: transparent;
	border-bottom: transparent;
}';
			
		} else {
			$logo_right = '
@media screen and (min-width: 48em) {
	#site-title-block {
		margin-left: 25%;
	}
}

@media screen and (min-width: 64.063em) {
	#site-title-block {
		margin-left: 50%;
	}
}';
		}
		wp_add_inline_style( 'jgd-bizelite-main-stylesheet', $logo_right );
	} else {
		if( has_custom_logo() && 'blank' == esc_attr( get_header_textcolor() ) ) { // if header text is hidden and if a logo is displayed
			$logo_left = '
#site-title-block {
	background-color: transparent;
	border-bottom: transparent;
}';
		}
		if( !has_custom_logo() && 'blank' == esc_attr( get_header_textcolor() ) ) {
			$logo_left = '
#site-title-block {
	background-color: transparent;
	border-bottom: transparent;
}';
		}
		wp_add_inline_style( 'jgd-bizelite-main-stylesheet', $logo_left );
	}
}
add_action( 'wp_enqueue_scripts', 'jgd_bizelite_logo_align_switcher' );

function jgd_bizelite_header_align_switcher() {
	$header_align = get_theme_mod( 'jgd_bizelite_header_alignment' );
	if( $header_align === 'left' ) {
		return 'left';
	} else if( $header_align === 'right' ) {
		return 'right';
	} else {
		return 'center';
	}
}
add_action( 'wp_enqueue_scripts', 'jgd_bizelite_header_align_switcher' );

function jgd_bizelite_layout_switcher_customizer() { // begins jgd bizelite layout switcher function
	$layouts = get_theme_mod( 'jgd_bizelite_layout_choices' );
	
	switch ( $layouts ) {
		case __( '2cr-mag', 'jgd-bizelite' ):
			wp_register_style( 'jgd-bizelite-2cr-mag', get_template_directory_uri() . '/layouts/2-column-right-magazine.css', array( 'jgd-bizelite-main-stylesheet' ) );
			wp_enqueue_style( 'jgd-bizelite-2cr-mag' );
		break;
		case __( '3cr', 'jgd-bizelite' ):
			wp_register_style( 'jgd-bizelite-3cr', get_template_directory_uri() . '/layouts/3-column-right.css', array( 'jgd-bizelite-main-stylesheet' ) );
			wp_enqueue_style( 'jgd-bizelite-3cr' );
		break;
		case __( '3cr-mag', 'jgd-bizelite' ):
			wp_register_style( 'jgd-bizelite-3cr-mag', get_template_directory_uri() . '/layouts/3-column-right-magazine.css', array( 'jgd-bizelite-main-stylesheet' ) );
			wp_enqueue_style( 'jgd-bizelite-3cr-mag' );
		break;
		case __( '2cl', 'jgd-bizelite' ):
			wp_register_style( 'jgd-bizelite-2cl', get_template_directory_uri() . '/layouts/2-column-left.css', array( 'jgd-bizelite-main-stylesheet' ) );
			wp_enqueue_style( 'jgd-bizelite-2cl' );
		break;
		case __( '2cl-mag', 'jgd-bizelite' ):
			wp_register_style( 'jgd-bizelite-2cl-mag', get_template_directory_uri() . '/layouts/2-column-left-magazine.css', array( 'jgd-bizelite-main-stylesheet' ) );
			wp_enqueue_style( 'jgd-bizelite-2cl-mag' );
		break;
		case __( '3cl', 'jgd-bizelite' ):
			wp_register_style( 'jgd-bizelite-3cl', get_template_directory_uri() . '/layouts/3-column-left.css', array( 'jgd-bizelite-main-stylesheet' ) );
			wp_enqueue_style( 'jgd-bizelite-3cl' );
		break;
		case __( '3cl-mag', 'jgd-bizelite' ):
			wp_register_style( 'jgd-bizelite-3cl-mag', get_template_directory_uri() . '/layouts/3-column-left-magazine.css', array( 'jgd-bizelite-main-stylesheet' ) );
			wp_enqueue_style( 'jgd-bizelite-3cl-mag' );
		break;
		default:
			echo '';
	}
} // ends  jgd bizelite layout switcher function

// Functions for each color scheme, that include added semi transparent backgrounds behind the header when a custom header image is chosen
function jgd_bizelite_enqueue_blue() {
	wp_register_style( 'jgd-bizelite-blue', get_template_directory_uri() . '/styles/blue.css', array( 'jgd-bizelite-main-stylesheet' ) );
	wp_enqueue_style( 'jgd-bizelite-blue' );
	if( has_header_image() && display_header_text() ) {
		$blue = '
#site-title-block {
	background-color: rgba(0, 0, 83, 0.50);
	border-bottom: 2px solid rgba(255, 255, 255, 0.25);
}';
		wp_add_inline_style( 'jgd-bizelite-blue', $blue );
	}
}

function jgd_bizelite_enqueue_green() {
	wp_register_style( 'jgd-bizelite-green', get_template_directory_uri() . '/styles/green.css', array( 'jgd-bizelite-main-stylesheet' ) );
	wp_enqueue_style( 'jgd-bizelite-green' );
	if( has_header_image() && display_header_text() ) {
		$green = '
#site-title-block {
	background-color: rgba(11, 61, 11, 0.50);
	border-bottom: 2px solid rgba(255, 255, 255, 0.25);
}';
		wp_add_inline_style( 'jgd-bizelite-green', $green );
	}
}

function jgd_bizelite_enqueue_red() {
	wp_register_style( 'jgd-bizelite-red', get_template_directory_uri() . '/styles/red.css', array( 'jgd-bizelite-main-stylesheet' ) );
	wp_enqueue_style( 'jgd-bizelite-red' );
	if( has_header_image() && display_header_text() ) {
		$red = '
#site-title-block {
	background-color: rgba(90, 0, 0, 0.50);
	border-bottom: 2px solid rgba(255, 255, 255, 0.25);
}';
		wp_add_inline_style( 'jgd-bizelite-red', $red );
	}
}

function jgd_bizelite_enqueue_silver() {
	wp_register_style( 'jgd-bizelite-silver', get_template_directory_uri() . '/styles/silver.css', array( 'jgd-bizelite-main-stylesheet' ) );
	wp_enqueue_style( 'jgd-bizelite-silver' );
	if( has_header_image() && display_header_text() ) {
		$silver = '
#site-title-block {
	background-color: rgba(128, 128, 128, 0.50);
	border-bottom: 2px solid rgba(255, 255, 255, 0.25);
}';
		wp_add_inline_style( 'jgd-bizelite-silver', $silver );
	}
}

function jgd_bizelite_enqueue_olive() {
	wp_register_style( 'jgd-bizelite-olive', get_template_directory_uri() . '/styles/olive.css', array( 'jgd-bizelite-main-stylesheet' ) );
	wp_enqueue_style( 'jgd-bizelite-olive' );
	if( has_header_image() && display_header_text() ) {
		$olive = '
#site-title-block {
	background-color: rgba(83, 83, 0, 0.50);
	border-bottom: 2px solid rgba(255, 255, 255, 0.25);
}';
		wp_add_inline_style( 'jgd-bizelite-olive', $olive );
	}
}

function jgd_bizelite_enqueue_black() {
	if( has_header_image() && display_header_text() ) {
		$black = '
#site-title-block {
	background-color: rgba(0, 0, 0, 0.50);
	border-bottom: 2px solid rgba(255, 255, 255, 0.25);
}';
		wp_add_inline_style( 'jgd-bizelite-main-stylesheet', $black );
	}
}

function jgd_bizelite_style_switcher_customizer() { // begins the jgd bizelite style switcher function
	$style = get_theme_mod( 'jgd_bizelite_style_choices' );
	
	switch( $style ) {
		case __( 'none', 'jgd-bizelite' ):
			jgd_bizelite_enqueue_black();
		break;
		case __( 'blue', 'jgd-bizelite' ):
			jgd_bizelite_enqueue_blue();
		break;
		case __( 'green', 'jgd-bizelite' ):
			jgd_bizelite_enqueue_green();
		break;
		case __( 'red', 'jgd-bizelite' ):
			jgd_bizelite_enqueue_red();
		break;
		case __( 'silver', 'jgd-bizelite' ):
			jgd_bizelite_enqueue_silver();
		break;
		case __( 'olive', 'jgd-bizelite' ):
			jgd_bizelite_enqueue_olive();
		break;
		default:
			echo '';
	}
} // ends jgd bizelite style switcher function

add_action( 'wp_enqueue_scripts', 'jgd_bizelite_layout_switcher_customizer' );
add_action( 'wp_enqueue_scripts', 'jgd_bizelite_style_switcher_customizer' );

function jgd_bizelite_style_customizations() {
	$content_bg = esc_html( get_theme_mod( 'jgd_bizelite_content_sidebar_bgcolor' ) );
	$hide_bg_texture = get_theme_mod( 'jgd_bizelite_hide_bg_texture' );
	$content_bg_css = '';
	
	if( $content_bg != '' ) {
		$content_bg_css = '
.texture {
	background-color: ' . $content_bg . ';
}';
	}
	
	if( $hide_bg_texture == 1 ) {
		$content_bg_css .= '
.texture {
	background-image: none;
}';
	}
	wp_add_inline_style( 'jgd-bizelite-main-stylesheet', $content_bg_css );
}

add_action( 'wp_enqueue_scripts', 'jgd_bizelite_style_customizations' );

function jgd_bizelite_light_text_customizer() {
	if( get_theme_mod( 'jgd_bizelite_light_text' ) == 1 ) {
		wp_register_style( 'jgd-bizelite-dark-bg', get_template_directory_uri() . '/styles/dark-bg.css', array( 'jgd-bizelite-main-stylesheet' ) );
		wp_enqueue_style( 'jgd-bizelite-dark-bg' );
	}
}
add_action( 'wp_enqueue_scripts', 'jgd_bizelite_light_text_customizer' );

function jgd_bizelite_hide_decorations_customizer() {
	if( get_theme_mod( 'jgd_bizelite_hide_decorations' ) == 1 ) {
		wp_register_style( 'jgd-bizelite-no-decs', get_template_directory_uri() . '/styles/no-decorations.css', array( 'jgd-bizelite-main-stylesheet' ) );
		wp_enqueue_style( 'jgd-bizelite-no-decs' );
	}
}
add_action( 'wp_enqueue_scripts', 'jgd_bizelite_hide_decorations_customizer' );

function jgd_bizelite_hide_postdate_switcher_customizer() {
	$hide_postdate = get_theme_mod( 'jgd_bizelite_hide_postdate' );
	if( $hide_postdate == 1 ) {
		echo '';
	} else { ?>
		| <?php jgd_bizelite_postdate_icon() ?><?php echo get_the_date(); ?>
	<?php
	}
}

function jgd_bizelite_edit_icon() {
	$use_icons = get_theme_mod( 'jgd_bizelite_use_icons' );
	if( $use_icons == 1 ) {
		edit_post_link( __( 'Edit This', 'jgd-bizelite' ), '<span class="ti-pencil"></span><div>', '</div>' );
	} else {
		edit_post_link( __( 'Edit This', 'jgd-bizelite' ), '<div>', '</div>' );
	}
}

function jgd_bizelite_author_icon() {
	$use_icons = get_theme_mod( 'jgd_bizelite_use_icons' );
	if( $use_icons == 1 ) { ?>
		<strong><span class="ti-user" title="<?php esc_attr_e( 'By:', 'jgd-bizelite' ); ?>"><span class="screen-reader-text"><?php _e( 'By:', 'jgd-bizelite' ); ?></span></span> : </strong>
	<?php
	} else { ?>
		<strong><?php _e( 'By: ', 'jgd-bizelite' ); ?></strong>
	<?php
	}
}

function jgd_bizelite_postdate_icon() {
	$use_icons = get_theme_mod( 'jgd_bizelite_use_icons' );
	if( $use_icons == 1 ) { ?>
		<strong><span class="ti-calendar" title="<?php esc_attr_e( 'Post date:', 'jgd-bizelite' ) ?>"><span class="screen-reader-text"><?php _e( 'Post date:', 'jgd-bizelite' ); ?></span></span> :</strong>
	<?php
	} else { ?>
		<strong><?php _e( 'Post date: ', 'jgd-bizelite' ); ?></strong>
	<?php
	}
}

function jgd_bizelite_disable_comments_switcher_customizer() {
	$disable_comments = get_theme_mod( 'jgd_bizelite_disable_comments' );
	if( $disable_comments == 1 || is_page_template( array( 'page-templates/page_landing.php', 'page-templates/page_featured_categories.php' ) ) ) {
		echo '';
	} elseif( $disable_comments == '' ) {
		comments_template();
	}
}

function jgd_bizelite_hide_commentslink_switcher_customizer() {
	$hide_commentslink = get_theme_mod( 'jgd_bizelite_hide_comments_link' );
	if( $hide_commentslink == 1 ) {
		echo '';
	} else { ?>
		| <?php jgd_bizelite_comments_icon(); ?><a href="<?php comments_link(); ?>"><?php comments_number(); ?></a>
	<?php 
	}
}

function jgd_bizelite_comments_icon() {
	$use_icons = get_theme_mod( 'jgd_bizelite_use_icons' );
	if( $use_icons == 1 ) { ?>
		<strong><span class="ti-comments" title="<?php esc_attr_e( 'Comments:', 'jgd-bizelite' ); ?>"><span class="screen-reader-text"><?php _e( 'Comments:', 'jgd-bizelite' ); ?></span></span> :</strong>
	<?php
	} else { ?>
		<strong><?php _e( 'Comments: ' , 'jgd-bizelite' ); ?></strong>
	<?php
	}
}

function jgd_bizelite_hide_cats_switcher_customizer() {
	$hide_cats = get_theme_mod( 'jgd_bizelite_hide_categories' );
	if( $hide_cats == 1 ) {
		echo '';
	} else { ?>
		<p class="category-meta"><?php jgd_bizelite_category_icon(); ?><?php the_category(', '); ?></p>
	<?php
	}
}

function jgd_bizelite_category_icon() {
	$use_icons = get_theme_mod( 'jgd_bizelite_use_icons' );
	if( $use_icons == 1 ) { ?>
		<strong><span class="ti-folder" title="<?php esc_attr_e( 'Posted in categories:', 'jgd-bizelite' ); ?>"><span class="screen-reader-text"><?php _e( 'Posted in categories:', 'jgd-bizelite' ); ?></span></span> :</strong>
	<?php
	} else { ?>
		<strong><?php _e( 'Posted in categories: ', 'jgd-bizelite' ); ?></strong><?php the_category(', '); ?>
	<?php
	}
}

function jgd_bizelite_hide_tags_switcher_customizer() {
	$hide_tags = get_theme_mod( 'jgd_bizelite_hide_tags' );
	if( $hide_tags == 1 ) {
		echo '';
	} else {
		jgd_bizelite_tags_icon();
	}
}

function jgd_bizelite_tags_icon() {
	$use_icons = get_theme_mod( 'jgd_bizelite_use_icons' );
	if( $use_icons == 1 ) {
		the_tags( '<p class="tags-meta"><strong><span class="ti-tag" title="' . esc_attr__( 'Tags:', 'jgd-bizelite' ) . '"><span class="screen-reader-text">' . __( 'Tags:', 'jgd-bizelite' ) . '</span></span> : </strong>', ', ', '</p>' );
	} else {
		the_tags( '<p class="tags-meta"><strong>' . __( 'Tags: ', 'jgd-bizelite' ) . '</strong>', ', ', '</p>' );
	}
}

function jgd_bizelite_menutitle_one_customizer() {
	$menutitle_one = esc_html( get_theme_mod( 'jgd_bizelite_menutitle_one', __( 'Pages', 'jgd-bizelite' ) ) );
	if( $menutitle_one != '' ) {
		echo $menutitle_one;
	} else {
		echo __( 'Pages', 'jgd-bizelite' );
	}
}

function jgd_bizelite_menutitle_two_customizer() {
	$menutitle_two = esc_html( get_theme_mod( 'jgd_bizelite_menutitle_two', __( 'Categories', 'jgd-bizelite' ) ) );
	if( $menutitle_two != '' ) {
		echo $menutitle_two;
	} else {
		echo __( 'Categories', 'jgd-bizelite' );
	}
}

function jgd_bizelite_footer_info_customizer() {
	$footer_default = sprintf( __( '%1$s %2$s %3$s %4$s', 'jgd-bizelite' ), '&copy;', date_i18n(__( 'Y', 'jgd-bizelite' ) ), esc_html( get_bloginfo( 'name' ) ), ' | Theme: <a href="http://www.jasong-designs.com/2012/02/17/jgd-bizelite/">JGD-BizElite</a>' );
	$footer_info = wp_kses_post( get_theme_mod( 'jgd_bizelite_footer_info', $footer_default ) );
	if( $footer_info != '' ) {
		echo $footer_info;
	} else {
		echo $footer_default;
	}
}

function jgd_bizelite_cat_section_title_customizer() {
	$cat_section_title = esc_html( get_theme_mod( 'jgd_bizelite_cat_section_title', __( 'Latest Posts', 'jgd-bizelite' ) ) );
	if( $cat_section_title != '' ) {
		echo $cat_section_title;
	} else {
		echo __( 'Latest Posts', 'jgd-bizelite' );
	}
}
?>