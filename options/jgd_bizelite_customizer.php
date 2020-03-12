<?php
/* Customizer controls and sanitization callbacks */

function jbe_customize_register( WP_Customize_Manager $wp_customize ) {
	require_once get_stylesheet_directory() . '/options/dropdown-category.php';

	// For already existing sections
	$wp_customize->add_setting(
		'jgd_bizelite_logo_options', array(
			'type' => 'theme_mod',
			'capability' => 'edit_theme_options',
			'default' => 'left',
			'transport' => 'refresh',
			'sanitize_callback' => 'jgd_bizelite_sanitize_logo_choices',
		)
	);

	$wp_customize->add_control(
		'jgd_bizelite_logo_options', array(
			'type' => 'radio',
			'label' => __( 'Logo/Title Alignment*', 'jgd-bizelite' ),
			'description' => sprintf(__( '%1$s* = refeshes the page%2$s%1$s** = The title and subtitle are not displayed in Center logo alignment.%2$s', 'jgd-bizelite' ), '<p>', '</p>' ),
			'section' => 'title_tagline',
			'choices' => array(
				'left' => __( 'Left (default)', 'jgd-bizelite' ),
				'center' => __( 'Center**', 'jgd-bizelite' ),
				'right' => __( 'Right', 'jgd-bizelite' ),
			),
		)
	);

	// Rename Colors section
	$wp_customize->get_section( 'colors' )->title = esc_html__( 'Colors/Color Schemes', 'jgd-bizelite' );

	// for Color Schemes
	$wp_customize->add_setting(
		'jgd_bizelite_style_choices', array(
			'default' => 'none',
			'transport' => 'postMessage',
			'sanitize_callback' => 'jgd_bizelite_sanitize_style_choices',
		)
	);
	$wp_customize->add_control(
		'jgd_bizelite_style_choices', array(
			'type' => 'radio',
			'priority' => 20,
			'label' => esc_html__( 'Color Schemes', 'jgd-bizelite' ),
			'section' => 'colors',
			'choices' => array(
				'none' => esc_html__( 'Black (default)', 'jgd-bizelite' ),
				'blue' => esc_html__( 'Blue', 'jgd-bizelite' ),
				'green' => esc_html__( 'Green', 'jgd-bizelite' ),
				'red' => esc_html__( 'Red', 'jgd-bizelite' ),
				'silver' => esc_html__( 'Silver', 'jgd-bizelite' ),
				'olive' => esc_html__( 'Olive', 'jgd-bizelite' )
			),
		)
	);

	$wp_customize->add_setting(
		'jgd_bizelite_content_sidebar_bgcolor', array(
			'default' => '#ededed',
			'transport' => 'postMessage',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control (
			$wp_customize,
			'jgd_bizelite_content_sidebar_bgcolor',
				array(
					'label' => esc_html__( 'Content and Sidebar background color', 'jgd-bizelite' ),
					'section' => 'colors',
					'priority' => 30,
					'settings' => 'jgd_bizelite_content_sidebar_bgcolor'
				)
		)
	);

	$wp_customize->add_setting(
		'jgd_bizelite_light_text', array(
			'default' => 0,
			'transport' => 'postMessage',
			'sanitize_callback' => 'jgd_bizelite_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'jgd_bizelite_light_text', array(
			'type' => 'checkbox',
			'section' => 'colors',
			'priority' => 40,
			'label' => __( 'Use light text for dark background', 'jgd-bizelite' ),
		)
	);

	$wp_customize->add_setting(
		'jgd_bizelite_hide_bg_texture', array(
			'default' => 0,
			'transport' => 'postMessage',
			'sanitize_callback' => 'jgd_bizelite_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'jgd_bizelite_hide_bg_texture', array(
			'type' => 'checkbox',
			'section' => 'colors',
			'priority' => 50,
			'label' => __( 'Hide background texture behind content', 'jgd-bizelite' ),
		)
	);

	$wp_customize->add_setting(
		'jgd_bizelite_hide_decorations', array(
			'default' => 0,
			'transport' => 'postMessage',
			'sanitize_callback' => 'jgd_bizelite_sanitize_checkbox',
		)
	);
	$wp_customize->add_control(
		'jgd_bizelite_hide_decorations', array(
			'type' => 'checkbox',
			'section' => 'colors',
			'priority' => 60,
			'label' => __( 'Hide Decorations', 'jgd-bizelite' ),
		)
	);

	// for the Custom Header
	$wp_customize->add_setting(
		'jgd_bizelite_header_alignment', array(
			'type' => 'theme_mod',
			'capability' => 'edit_theme_options',
			'default' => 'center',
			'transport' => 'refresh',
			'sanitize_callback' => 'jgd_bizelite_sanitize_headerchoices',
		)
	);

	$wp_customize->add_control(
		'jgd_bizelite_header_alignment', array(
			'type' => 'radio',
			'section' => 'header_image',
			'label' => __( 'Align the header background image if it is smaller than the recommended size.', 'jgd-bizelite' ),
			'choices' => array(
				'left' => __( 'Left', 'jgd-bizelite' ),
				'center' => __( 'Center (default)', 'jgd-bizelite' ),
				'right' => __( 'Right', 'jgd-bizelite' ),
			),
		)
	);

	// for Layouts
	$wp_customize->add_section(
		'jgd_bizelite_layout', array(
			'title' => __( 'Layout', 'jgd-bizelite' ),
			'description' => sprintf( esc_html__( '%1$sSelect from four column layouts and five layout styles.%2$s%1$s* Refreshes the page%2$s', 'jgd-bizelite' ), '<p>', '</p>' ),
			'priority' => 45,
			'capability' => 'edit_theme_options',
			'theme_supports' => ''
		)
	);

	$wp_customize->add_setting(
		'jgd_bizelite_layout_choices', array(
			'default' => 'none',
			'transport' => 'postMessage',
			'sanitize_callback' => 'jgd_bizelite_sanitize_layout_choices',
		)
	);

	$wp_customize->add_control(
		'jgd_bizelite_layout_choices', array(
			'type' => 'radio',
			'priority' => 10,
			'label' => esc_html__( 'Column Layouts', 'jgd-bizelite' ),
			'section' => 'jgd_bizelite_layout',
			'choices' => array(
				'none' => esc_html__( '2-column right (default)', 'jgd-bizelite' ),
				'3cr' => esc_html__('3-column right', 'jgd-bizelite'),
				'2cl' => esc_html__('2-column left', 'jgd-bizelite'),
				'3cl' => esc_html__('3-column left', 'jgd-bizelite'),
			)
		)
	);

	$wp_customize->add_setting(
		'jgd_bizelite_mag_choices', array(
			'default' => 'blog',
			'sanitize_callback' => 'jgd_bizelite_sanitize_mag_choices',
		)
	);

	$wp_customize->add_control(
		'jgd_bizelite_mag_choices', array(
			'type' => 'radio',
			'priority' => 20,
			'label' => esc_html__( 'Layout Styles *', 'jgd-bizelite' ),
			'section' => 'jgd_bizelite_layout',
			'choices' => array(
				'blog' => esc_html__( 'Blog Layout (default)', 'jgd-bizelite' ),
				'blog_wide' => esc_html__( 'Blog Layout (Wide)', 'jgd-bizelite' ),
				'magazine_1' => esc_html__( 'Magazine (Grid Style)', 'jgd-bizelite' ),
				'magazine_2' => esc_html__( 'Magazine (Featured Articles Style)', 'jgd-bizelite' ),
			),
		)
	);

	// Display Options
	$wp_customize->add_section(
		'jgd_bizelite_display_options', array(
			'title' => __( 'Display Options', 'jgd-bizelite' ),
			'description' => sprintf(__( '%1$sIn this section, you can add and/or subtract content from your website or blog.%2$s%3$s* Refreshes the page%4$s', 'jgd-bizelite' ), '<p>', '</p>', '<p>', '</p>' ),
			'priority' => 85,
			'capability' => 'edit_theme_options',
			'theme_supports' => ''
		)
	);

	$wp_customize->add_setting(
		'jgd_bizelite_hide_postdate', array(
			'default' => 0,
			'transport' => 'postMessage',
			'sanitize_callback' => 'jgd_bizelite_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'jgd_bizelite_hide_postdate', array(
			'label' => esc_html__( 'Hide the post date', 'jgd-bizelite' ),
			'description' => esc_html__( '*Note: post date still displays on archive pages.', 'jgd-bizelite' ),
			'section' => 'jgd_bizelite_display_options',
			'priority' => 10,
			'active_callback' => 'jgd_bizelite_notpage_callback',
			'type' => 'checkbox'
		)
	);

	$wp_customize->add_setting(
		'jgd_bizelite_disable_comments', array(
			'default' => 0,
			'transport' => 'postMessage',
			'sanitize_callback' => 'jgd_bizelite_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'jgd_bizelite_disable_comments', array(
			'label' => esc_html__( 'Disable comments', 'jgd-bizelite' ),
			'section' => 'jgd_bizelite_display_options',
			'priority' => 20,
			'active_callback' => 'jgd_bizelite_single_callback',
			'type' => 'checkbox'
		)
	);

	$wp_customize->add_setting(
		'jgd_bizelite_hide_comments_link', array(
			'default' => 0,
			'transport' => 'postMessage',
			'sanitize_callback' => 'jgd_bizelite_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'jgd_bizelite_hide_comments_link', array(
			'label' => __( 'Hide the comments link', 'jgd-bizelite' ),
			'description' => sprintf(__( 'Use this with %1$sDisable comments%2$s to remove comment references on the index and single post pages.', 'jgd-bizelite' ), '<strong>', '</strong>' ),
			'section' => 'jgd_bizelite_display_options',
			'priority' => 30,
			'active_callback' => 'jgd_bizelite_notpage_callback',
			'type' => 'checkbox'
		)
	);

	$wp_customize->add_setting(
		'jgd_bizelite_hide_categories', array(
			'default' => 0,
			'transport' => 'postMessage',
			'sanitize_callback' => 'jgd_bizelite_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'jgd_bizelite_hide_categories', array(
			'label' => __( 'Hide category links', 'jgd-bizelite' ),
			'section' => 'jgd_bizelite_display_options',
			'priority' => 40,
			'active_callback' => 'jgd_bizelite_notpage_callback',
			'type' => 'checkbox'
		)
	);

	$wp_customize->add_setting(
		'jgd_bizelite_hide_tags', array(
			'default' => 0,
			'transport' => 'postMessage',
			'sanitize_callback' => 'jgd_bizelite_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'jgd_bizelite_hide_tags', array(
			'label' => __( 'Hide tag links', 'jgd-bizelite' ),
			'description' => sprintf(__( '%1$s*Warning:%2$s when hiding tag links on every page, your website will no longer have links to tag pages.', 'jgd-bizelite' ), '<strong>', '</strong>' ),
			'section' => 'jgd_bizelite_display_options',
			'priority' => 50,
			'active_callback' => 'jgd_bizelite_notpage_callback',
			'type' => 'checkbox'
		)
	);

	$wp_customize->add_setting(
		'jgd_bizelite_use_icons', array(
			'type' => 'theme_mod',
			'capability' => 'edit_theme_options',
			'default' => 0,
			'transport' => 'refresh',
			'sanitize_callback' => 'jgd_bizelite_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'jgd_bizelite_use_icons', array(
			'label' => __( 'Use icons in place of and next to titles*', 'jgd-bizelite' ),
			'section' => 'jgd_bizelite_display_options',
			'priority' => 55,
			'type' => 'checkbox',
		)
	);

	$wp_customize->add_setting(
		'jgd_bizelite_menutitle_one', array(
			'default' => esc_html__( 'Pages', 'jgd-bizelite' ),
			'transport' => 'postMessage',
			'sanitize_callback' => 'sanitize_text_field',
			'sanitize_js_callback' => 'sanitize_text_field'
		)
	);

	$wp_customize->add_control(
		'jgd_bizelite_menutitle_one', array(
			'label' => __( 'Replace the Pages title in the menu bar', 'jgd-bizelite' ),
			'section' => 'jgd_bizelite_display_options',
			'priority' => 60,
			'type' => 'text'
		)
	);

	$wp_customize->add_setting(
		'jgd_bizelite_menutitle_two', array(
			'type' => 'theme_mod',
			'capability' => 'edit_theme_options',
			'theme_supports' => '',
			'default' => 'Categories',
			'transport' => 'postMessage',
			'sanitize_callback' => 'sanitize_text_field',
			'sanitize_js_callback' => 'sanitize_text_field'
		)
	);

	$wp_customize->add_control(
		'jgd_bizelite_menutitle_two', array(
			'label' => __( 'Replace the Categories title in the menu bar', 'jgd-bizelite' ),
			'section' => 'jgd_bizelite_display_options',
			'priority' => 70,
			'type' => 'text'
		)
	);

	$wp_customize->add_setting(
		'jgd_bizelite_footer_info', array(
			'type' => 'theme_mod',
			'capability' => 'edit_theme_options',
			'theme_supports' => '',
			'default' => '',
			'transport' => 'postMessage',
			'sanitize_callback' => 'jgd_bizelite_sanitize_html',
			'sanitize_js_callback' => 'jgd_bizelite_sanitize_html'
		)
	);

	$wp_customize->add_control(
		'jgd_bizelite_footer_info', array(
			'label' => __( 'Change the footer information', 'jgd-bizelite' ),
			'description' => sprintf(__( '%1$s* Supports HTML%2$s%3$sTo retrieve the web address of this theme, see %5$sTheme web address%6$s in this theme\'s readme.txt file.%4$s', 'jgd-bizelite' ), '<p>', '</p>', '<p>', '</p>', '<strong>', '</strong>' ),
			'section' => 'jgd_bizelite_display_options',
			'priority' => 80,
			'type' => 'textarea'
		)
	);

	$wp_customize->add_panel(
		'jgd_bizelite_page_templates', array(
			'title' => __( 'Page Template Customizations', 'jgd-bizelite' ),
			'priority' => 125,
			'description' => __( 'In this section are customizations for some of the page templates that can be applied to a custom home page.', 'jgd-bizelite' ),
			'active_callback' => 'jgd_bizelite_page_callback',
		)
	);

	$wp_customize->add_section(
		'jgd_bizelite_cats_template', array(
			'title' => __( 'Featured Categories', 'jgd-bizelite' ),
			'priority' => 125,
			'description' => __( 'Customize the Featured Categories page template.', 'jgd-bizelite' ),
			'panel' => 'jgd_bizelite_page_templates',
			'active_callback' => 'jgd_bizelite_page_callback',
		)
	);

	$wp_customize->add_setting(
		'jgd_bizelite_cat_dropdown_1', array(
			'type' => 'theme_mod',
			'default' => 0,
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control( new JGD_BizElite_Category_Control( $wp_customize,
		'jgd_bizelite_cat_dropdown_1', array(
			'section' => 'jgd_bizelite_cats_template',
			'label' => __( 'Display Category 1', 'jgd-bizelite' ),
			'dropdown_args' => array(
				'id' => 'cat-1',
			),
		)
	) );

	$wp_customize->add_setting(
		'jgd_bizelite_cat_dropdown_2', array(
			'type' => 'theme_mod',
			'default' => 0,
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control( new JGD_BizElite_Category_Control( $wp_customize,
		'jgd_bizelite_cat_dropdown_2', array(
			'section' => 'jgd_bizelite_cats_template',
			'label' => __( 'Display Category 2', 'jgd-bizelite' ),
			'dropdown_args' => array(
				'id' => 'cat-2',
			),
		)
	) );

	$wp_customize->add_setting(
		'jgd_bizelite_cat_dropdown_3', array(
			'type' => 'theme_mod',
			'default' => 0,
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control( new JGD_BizElite_Category_Control( $wp_customize,
		'jgd_bizelite_cat_dropdown_3', array(
			'section' => 'jgd_bizelite_cats_template',
			'label' => __( 'Display Category 3', 'jgd-bizelite' ),
			'dropdown_args' => array(
				'id' => 'cat-3',
			),
		)
	) );

	$wp_customize->add_setting(
		'jgd_bizelite_cat_section_title', array(
			'type' => 'theme_mod',
			'default' => 'Latest Posts',
			'transport' => 'postMessage',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'jgd_bizelite_cat_section_title', array(
			'label' => __( 'Replace the Latest Posts title above the featured category posts.', 'jgd-bizelite' ),
			'type' => 'text',
			'section' => 'jgd_bizelite_cats_template',
		)
	);

	// Use post transport on included settings
	$wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	$wp_customize->get_setting( 'background_color' )->transport = 'postMessage';

	// Partials
	if( !isset( $wp_customize->selective_refresh ) ) {
		return;
	}

	$wp_customize->selective_refresh->add_partial( 'jgd_bizelite_menutitle_one', array(
		'selector' => '.menubar-pages-list-item .menubar-title',
		'container_inclusive' => false,
		'render_callback' => 'jgd_bizelite_menutitle_one_customizer',
	) );

	$wp_customize->selective_refresh->add_partial( 'jgd_bizelite_menutitle_two', array(
		'selector' => '.menubar-cats-list-item .menubar-title',
		'container_inclusive' => false,
		'render_callback' => 'jgd_bizelite_menutitle_two_customizer',
	) );

	$wp_customize->selective_refresh->add_partial( 'jgd_bizelite_cat_section_title', array(
		'selector' => '.featured-cat-container h2.hr',
		'container_inclusive' => false,
		'render_callback' => 'jgd_bizelite_cat_section_title_customizer',
	) );

	$wp_customize->selective_refresh->add_partial( 'jgd_bizelite_hide_postdate', array(
		'selector' => '.hide-post-date',
		'container_inclusive' => false,
		'render_callback' => 'jgd_bizelite_hide_postdate_switcher_customizer',
	) );

	$wp_customize->selective_refresh->add_partial( 'jgd_bizelite_hide_comments_link', array(
		'selector' => '.hide-comments',
		'container_inclusive' => false,
		'render_callback' => 'jgd_bizelite_hide_commentslink_switcher_customizer',
	) );

	$wp_customize->selective_refresh->add_partial( 'jgd_bizelite_disable_comments', array(
		'selector' => '.comments-container',
		'container_inclusive' => false,
		'render_callback' => 'jgd_bizelite_disable_comments_switcher_customizer',
	) );

	$wp_customize->selective_refresh->add_partial( 'jgd_bizelite_hide_categories', array(
		'selector' => '.category-meta',
		'container_inclusive' => true,
		'render_callback' => 'jgd_bizelite_hide_cats_switcher_customizer',
	) );

	$wp_customize->selective_refresh->add_partial( 'jgd_bizelite_hide_tags', array(
		'selector' => '.tags-meta',
		'container_inclusive' => true,
		'render_callback' => 'jgd_bizelite_hide_tags_switcher_customizer',
	) );
}
add_action( 'customize_register', 'jbe_customize_register' );

/* Active Callbacks- display sections or controls only when certain pages are active */
function jgd_bizelite_single_callback() {
	return is_single() || is_page();
}

function jgd_bizelite_notpage_callback() {
	if( !is_page() ) {
		return true;
	}
}

function jgd_bizelite_page_callback() {
	return is_page();
}

/* Sanitization callbacks */
function jgd_bizelite_sanitize_logo_choices( $value ) {
	if( !in_array( $value, array( 'left', 'center', 'right' ) ) ) {
		$value = 'left';
	}

	return $value;
}

function jgd_bizelite_sanitize_headerchoices( $value ) {
	if( !in_array( $value, array( 'left', 'center', 'right' ) ) ) {
		$value = 'center';
	}

	return $value;
}

function jgd_bizelite_sanitize_layout_choices( $value ) {
	if( ! in_array( $value, array( 'none', '3cr', '2cl', '3cl' ) ) ) {
		$value = 'none';
	}

	return $value;
}

function jgd_bizelite_sanitize_mag_choices( $value ) {
	if( ! in_array( $value, array( 'blog', 'blog_wide', 'magazine_1', 'magazine_2' ) ) ) {
		$value = 'blog';
	}

	return $value;
}

function jgd_bizelite_sanitize_style_choices( $value ) {
	if( ! in_array( $value, array( 'none', 'blue', 'green', 'red', 'silver', 'olive' ) ) ) {
		$value = 'none';
	}

	return $value;
}

function jgd_bizelite_sanitize_html( $input ) {
	return wp_filter_post_kses( force_balance_tags( $input ) );
};

function jgd_bizelite_sanitize_checkbox( $checked ) {
	return ( ( isset( $checked ) && true == $checked ) ? true : false );
}

/* call postMessage javascript */
function jgd_bizelite_preview_js() {
	wp_enqueue_script( 'jgd-bizelite-custom-css-preview', get_template_directory_uri() . '/scripts/jbe-customizer-preview.js', array( 'jquery', 'customize-preview' ), '', true );
	$args = array(
		'color_styles' => get_theme_mod( 'jgd_bizelite_style_choices' ),
		'logo_alignment' => get_theme_mod( 'jgd_bizelite_logo_options' ),
	);
	wp_localize_script( 'jgd-bizelite-custom-css-preview', 'jbeCustomizer', $args );
}
add_action( 'customize_preview_init', 'jgd_bizelite_preview_js' );
?>
