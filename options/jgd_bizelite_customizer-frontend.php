<?php
function jgd_bizelite_logo_align_switcher() {
	$logo_layout = get_theme_mod( 'jgd_bizelite_logo_options' );
	$custom_logo_id = get_theme_mod( 'custom_logo' );
	/* https://developer.wordpress.org/themes/functionality/custom-logo/ */
	$logo = wp_get_attachment_image_src( $custom_logo_id, 'full' );

	if( $logo_layout == 'center' ) {
		$logo_center = '';
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

.custom-logo-link + .site-title-block {
	position: absolute;
	left: -9999px;
	top: 0px;
}';
		} else { // if a logo is not set
			$logo_center = '
.site-title-block {
	margin: 0px auto;
	position: static;
	text-align: center;
}';
		}
		wp_add_inline_style( 'jgd-bizelite-main-stylesheet', $logo_center );
	} elseif( $logo_layout == 'right' ) {
		$logo_right = '';
		if( has_custom_logo() ) {
			$logo_right .= '
.custom-logo-link img {
	float: right;
}

@media screen and (min-width: 48em) {
	.custom-logo-link + .site-title-block {
		margin-left: 25%;
	}
}

@media screen and (min-width: 64.063em) {
	.custom-logo-link + .site-title-block {
		margin-left: 50%;
	}

	#menu-social {
		left: 0;
	}
}';
			if( 'blank' == esc_attr( get_header_textcolor() ) ) {
				$logo_right .= '
.custom-logo-link + .site-title-block {
	background-color: transparent;
	border-bottom: transparent;
}';
			}
		} elseif( !has_custom_logo() && 'blank' == esc_attr( get_header_textcolor() ) ) {
				$logo_right = '
.site-title-block {
	background-color: transparent;
	border-bottom: transparent;
}';

		} else {
			$logo_right = '
@media screen and (min-width: 48em) {
	.site-title-block {
		margin-left: 25%;
	}
}

@media screen and (min-width: 64.063em) {
	.site-title-block {
		margin-left: 50%;
	}

	#menu-social {
		left: 0;
	}
}';
		}
		wp_add_inline_style( 'jgd-bizelite-main-stylesheet', $logo_right );
	} else {
		$logo_left = '';
		if( has_custom_logo() && 'blank' == esc_attr( get_header_textcolor() ) ) { // if header text is hidden and if a logo is displayed
			$logo_left = '
.custom-header .site-title-block,
.blue.custom-header .site-title-block,
.green.custom-header .site-title-block,
.red.custom-header .site-title-block,
.silver.custom-header .site-title-block,
.olive.custom-header .site-title-block {
	background-color: transparent;
	border-bottom: transparent;
}';
		}
		if( !has_custom_logo() && 'blank' == esc_attr( get_header_textcolor() ) ) {
			$logo_left = '
.custom-header .site-title-block,
.blue.custom-header .site-title-block,
.green.custom-header .site-title-block,
.red.custom-header .site-title-block,
.silver.custom-header .site-title-block,
.olive.custom-header .site-title-block {
	background-color: transparent;
	border-bottom: transparent;
}';
		}
		wp_add_inline_style( 'jgd-bizelite-main-stylesheet', $logo_left );
	}
}
add_action( 'wp_enqueue_scripts', 'jgd_bizelite_logo_align_switcher' );

function jgd_bizelite_content_sidebar_bgcolor_css() {
	$content_sidebar_bg = get_theme_mod( 'jgd_bizelite_content_sidebar_bgcolor', '#ededed' );
	if ( $content_sidebar_bg != '' ) {
		$content_sidebar_bg_css = '
#main.texture {
	background-color: ' . $content_sidebar_bg . ';
}';
		wp_add_inline_style( 'jgd-bizelite-main-stylesheet', $content_sidebar_bg_css );
	}
}
add_action( 'wp_enqueue_scripts', 'jgd_bizelite_content_sidebar_bgcolor_css' );

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

function jgd_bizelite_hide_postdate_switcher_customizer() {
	$hide_postdate = get_theme_mod( 'jgd_bizelite_hide_postdate', 0 );
	if( $hide_postdate == 1 ) {
		echo '';
	} else { ?>
		<span class="hide-post-date">	| <?php jgd_bizelite_postdate_icon() ?><?php echo get_the_date(); ?></span>
	<?php
	}
}

function jgd_bizelite_edit_icon() {
	$use_icons = get_theme_mod( 'jgd_bizelite_use_icons' );
	if( $use_icons == 1 ) {
		edit_post_link( __( 'Edit This', 'jgd-bizelite' ), '<span class="ti-pencil"></span><div>', '</div>', null, 'post-edit-link button-primary' );
	} else {
		edit_post_link( __( 'Edit This', 'jgd-bizelite' ), '<div>', '</div>', null, 'post-edit-link button-primary' );
	}
}

function jgd_bizelite_author_icon() {
	$use_icons = get_theme_mod( 'jgd_bizelite_use_icons' );
	if( $use_icons == 1 ) { ?>
		<strong><span class="ti-user" title="<?php esc_attr_e( 'By:', 'jgd-bizelite' ); ?>"><span class="screen-reader-text"><?php esc_html_e( 'By:', 'jgd-bizelite' ); ?></span></span> : </strong>
	<?php
	} else { ?>
		<strong><?php esc_html_e( 'By: ', 'jgd-bizelite' ); ?></strong>
	<?php
	}
}

function jgd_bizelite_postdate_icon() {
	$use_icons = get_theme_mod( 'jgd_bizelite_use_icons' );
	if( $use_icons == 1 ) { ?>
		<strong><span class="ti-calendar" title="<?php esc_attr_e( 'Post date:', 'jgd-bizelite' ) ?>"><span class="screen-reader-text"><?php esc_html_e( 'Post date:', 'jgd-bizelite' ); ?></span></span> :</strong>
	<?php
	} else { ?>
		<strong><?php esc_html_e( 'Post date: ', 'jgd-bizelite' ); ?></strong>
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
		<span class="hide-comments">	| <?php jgd_bizelite_comments_icon(); ?><a href="<?php comments_link(); ?>"><?php comments_number(); ?></a></span>
	<?php
	}
}

function jgd_bizelite_comments_icon() {
	$use_icons = get_theme_mod( 'jgd_bizelite_use_icons' );
	if( $use_icons == 1 ) { ?>
		<strong><span class="ti-comments" title="<?php esc_attr_e( 'Comments:', 'jgd-bizelite' ); ?>"><span class="screen-reader-text"><?php esc_html_e( 'Comments:', 'jgd-bizelite' ); ?></span></span> :</strong>
	<?php
	} else { ?>
		<strong><?php esc_html_e( 'Comments: ' , 'jgd-bizelite' ); ?></strong>
	<?php
	}
}

function jgd_bizelite_hide_cats_switcher_customizer() {
	$hide_cats = get_theme_mod( 'jgd_bizelite_hide_categories' );
	if( $hide_cats == 1 ) {
		echo '';
	} else { ?>
		<p class="category-meta"><?php jgd_bizelite_category_icon(); ?></p>
	<?php
	}
}

function jgd_bizelite_category_icon() {
	$use_icons = get_theme_mod( 'jgd_bizelite_use_icons' );
	if( $use_icons == 1 ) { ?>
		<strong><span class="ti-folder" title="<?php esc_attr_e( 'Posted in categories:', 'jgd-bizelite' ); ?>"><span class="screen-reader-text"><?php esc_html_e( 'Posted in categories:', 'jgd-bizelite' ); ?></span></span> :</strong><?php the_category(', '); ?>
	<?php
	} else { ?>
		<strong><?php esc_html_e( 'Posted in categories: ', 'jgd-bizelite' ); ?></strong><?php the_category(', '); ?>
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
		the_tags( '<p class="tags-meta"><strong>' . esc_html__( 'Tags: ', 'jgd-bizelite' ) . '</strong>', ', ', '</p>' );
	}
}

function jgd_bizelite_menutitle_one_customizer() {
	$menutitle_one = esc_html( get_theme_mod( 'jgd_bizelite_menutitle_one', esc_html__( 'Pages', 'jgd-bizelite' ) ) );
	if( $menutitle_one != '' ) {
		echo esc_html( $menutitle_one );
	} else {
		esc_html_e( 'Pages', 'jgd-bizelite' );
	}
}

function jgd_bizelite_menutitle_two_customizer() {
	$menutitle_two = esc_html( get_theme_mod( 'jgd_bizelite_menutitle_two', esc_html__( 'Categories', 'jgd-bizelite' ) ) );
	if( $menutitle_two != '' ) {
		echo esc_html( $menutitle_two );
	} else {
		esc_html_e( 'Categories', 'jgd-bizelite' );
	}
}

function jgd_bizelite_footer_info_customizer() {
	$footer_default = /* translators: %1$s = Copyright symbol, %2$s = Year, %3$s = Blog title, %4$s = Theme: JGD-BizElite and link to home page */ sprintf( esc_html__( '%1$s %2$s %3$s %4$s', 'jgd-bizelite' ), '&copy;', date_i18n(__( 'Y', 'jgd-bizelite' ) ), esc_html( get_bloginfo( 'name' ) ), ' | Theme: <a href="http://www.jasong-designs.com/2012/02/17/jgd-bizelite/">JGD-BizElite</a>' );
	$footer_info = get_theme_mod( 'jgd_bizelite_footer_info', $footer_default );
	if( $footer_info != '' ) {
		echo wp_kses_post( $footer_info );
	} else {
		echo wp_kses_post( $footer_default );
	}
}

function jgd_bizelite_cat_section_title_customizer() {
	$cat_section_title = get_theme_mod( 'jgd_bizelite_cat_section_title', esc_html__( 'Latest Posts', 'jgd-bizelite' ) );
	if( $cat_section_title != '' ) {
		echo esc_html( $cat_section_title );
	} else {
		esc_html_e( 'Latest Posts', 'jgd-bizelite' );
	}
}
?>
