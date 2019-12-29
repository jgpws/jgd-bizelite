<?php

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
	$wp_customize->get_section( 'colors' )->title = __( 'Colors/Color Schemes', 'jgd-bizelite' );
	
	// for Color Schemes
	$wp_customize->add_setting(
		'jgd_bizelite_style_choices', array(
			'type' => 'theme_mod',
			'capability' => 'edit_theme_options',
			'theme_supports' => '',
			'default' => 'none',
			'transport' => 'refresh',
			'sanitize_callback' => 'jgd_bizelite_sanitize_style_choices',
			'sanitize_js_callback' => 'jgd_bizelite_sanitize_style_choices'
		)
	);
	$wp_customize->add_control(
		'jgd_bizelite_style_choices', array(
			'type' => 'radio',
			'priority' => 20,
			'label' => __( 'Color Schemes*', 'jgd-bizelite' ),
			'description' => __( '* = refreshes the page', 'jgd-bizelite' ),
			'section' => 'colors',
			'choices' => array(
				'none' => __( 'Black (default)', 'jgd-bizelite' ),
				'blue' => __( 'Blue', 'jgd-bizelite' ),
				'green' => __( 'Green', 'jgd-bizelite' ),
				'red' => __( 'Red', 'jgd-bizelite' ),
				'silver' => __( 'Silver', 'jgd-bizelite' ),
				'olive' => __( 'Olive', 'jgd-bizelite' )
			),
		)
	);
	
	$wp_customize->add_setting(
		'jgd_bizelite_content_sidebar_bgcolor', array(
			'type' => 'theme_mod',
			'capability' => 'edit_theme_options',
			'theme_supports' => '',
			'default' => '#ededed',
			'transport' => 'postMessage',
			'sanitize_callback' => 'sanitize_hex_color',
			'sanitize_js_callback' => 'sanitize_hex_color'
		)
	);
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control (
			$wp_customize,
			'jgd_bizelite_content_sidebar_bgcolor', 
				array(
					'label' => __( 'Content and Sidebar background color', 'jgd-bizelite' ),
					'section' => 'colors',
					'priority' => 30,
					'settings' => 'jgd_bizelite_content_sidebar_bgcolor'
				)
		)
	);
	
	$wp_customize->add_setting(
		'jgd_bizelite_light_text', array(
			'type' => 'theme_mod',
			'capability' => 'edit_theme_options',
			'theme_supports' => '',
			'default' => 0,
			'transport' => 'refresh',
			'sanitize_callback' => 'jgd_bizelite_sanitize_checkbox',
			'sanitize_js_callback' => 'jgd_bizelite_sanitize_checkbox'
		)
	);
	
	$wp_customize->add_control(
		'jgd_bizelite_light_text', array(
			'type' => 'checkbox',
			'section' => 'colors',
			'priority' => 40,
			'label' => __( 'Use light text for dark background*', 'jgd-bizelite' ),
		)
	);
	
	$wp_customize->add_setting(
		'jgd_bizelite_hide_bg_texture', array(
			'type' => 'theme_mod',
			'capability' => 'edit_theme_options',
			'theme_supports' => '',
			'default' => 0,
			'transport' => 'refresh',
			'sanitize_callback' => 'jgd_bizelite_sanitize_checkbox',
			'sanitize_js_callback' => 'jgd_bizelite_sanitize_checkbox'
		)
	);
	
	$wp_customize->add_control(
		'jgd_bizelite_hide_bg_texture', array(
			'type' => 'checkbox',
			'section' => 'colors',
			'priority' => 50,
			'label' => __( 'Hide background texture behind content*', 'jgd-bizelite' ),
		)
	);
	
	$wp_customize->add_setting(
		'jgd_bizelite_hide_decorations', array(
			'type' => 'theme_mod',
			'capability' => 'edit_theme_options',
			'theme_supports' => '',
			'default' => 0,
			'transport' => 'refresh',
			'sanitize_callback' => 'jgd_bizelite_sanitize_checkbox',
			'sanitize_js_callback' => 'jgd_bizelite_sanitize_checkbox'
		)
	);
	$wp_customize->add_control(
		'jgd_bizelite_hide_decorations', array(
			'type' => 'checkbox',
			'section' => 'colors',
			'priority' => 60,
			'label' => __( 'Hide Decorations*', 'jgd-bizelite' ),
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
			'description' => sprintf(__( '%1$sSelect from eight layout options.%2$s%3$s* = refreshes the page%4$s', 'jgd-bizelite' ), '<p>', '</p>', '<p>', '</p>' ),
			'priority' => 45,
			'capability' => 'edit_theme_options',
			'theme_supports' => ''
		)
	);
	
	$wp_customize->add_setting(
		'jgd_bizelite_layout_choices', array(
			'type' => 'theme_mod',
			'capability' => 'edit_theme_options',
			'theme_supports' => '',
			'default' => 'none',
			'transport' => 'refresh',
			'sanitize_callback' => 'jgd_bizelite_sanitize_layout_choices',
			'sanitize_js_callback' => 'jgd_bizelite_sanitize_layout_choices'
		)	
	);
	
	$wp_customize->add_control(
		'jgd_bizelite_layout_choices', array(
			'type' => 'radio',
			'priority' => 10,
			'label' => __( 'Layouts*', 'jgd-bizelite' ),
			'section' => 'jgd_bizelite_layout',
			'choices' => array(
				'none' => __( '2-column right(default)', 'jgd-bizelite' ),
				'2cr-mag' => __('2-column right magazine', 'jgd-bizelite'),
				'3cr' => __('3-column right', 'jgd-bizelite'),
				'3cr-mag' => __('3-column right magazine', 'jgd-bizelite'),
				'2cl' => __('2-column left', 'jgd-bizelite'),
				'2cl-mag' => __('2-column left magazine', 'jgd-bizelite'),
				'3cl' => __('3-column left', 'jgd-bizelite'),
				'3cl-mag' => __('3-column left magazine', 'jgd-bizelite')
			)
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
			'type' => 'theme_mod',
			'capability' => 'edit_theme_options',
			'theme_supports' => '',
			'default' => 0,
			'transport' => 'refresh',
			'sanitize_callback' => 'jgd_bizelite_sanitize_checkbox',
			'sanitize_js_callback' => 'jgd_bizelite_sanitize_checkbox'
		)
	);
	
	$wp_customize->add_control(
		'jgd_bizelite_hide_postdate', array(
			'label' => __( 'Hide the post date*', 'jgd-bizelite' ),
			'description' => __( '*Note: post date still displays on archive pages.', 'jgd-bizelite' ),
			'section' => 'jgd_bizelite_display_options',
			'priority' => 10,
			'active_callback' => 'jgd_bizelite_notpage_callback',
			'type' => 'checkbox'
		)
	);
	
	$wp_customize->add_setting(
		'jgd_bizelite_disable_comments', array(
			'type' => 'theme_mod',
			'capability' => 'edit_theme_options',
			'theme_supports' => '',
			'default' => 0,
			'transport' => 'refresh',
			'sanitize_callback' => 'jgd_bizelite_sanitize_checkbox',
			'sanitize_js_callback' => 'jgd_bizelite_sanitize_checkbox'
		)
	);
	
	$wp_customize->add_control(
		'jgd_bizelite_disable_comments', array(
			'label' => __( 'Disable comments*', 'jgd-bizelite' ),
			'section' => 'jgd_bizelite_display_options',
			'priority' => 20,
			'active_callback' => 'jgd_bizelite_single_callback',
			'type' => 'checkbox'
		)
	);
	
	$wp_customize->add_setting(
		'jgd_bizelite_hide_comments_link', array(
			'type' => 'theme_mod',
			'capability' => 'edit_theme_options',
			'theme_supports' => '',
			'default' => 0,
			'transport' => 'refresh',
			'sanitize_callback' => 'jgd_bizelite_sanitize_checkbox',
			'sanitize_js_callback' => 'jgd_bizelite_sanitize_checkbox'
		)
	);
	
	$wp_customize->add_control(
		'jgd_bizelite_hide_comments_link', array(
			'label' => __( 'Hide the comments link*', 'jgd-bizelite' ),
			'description' => sprintf(__( 'Use this with %1$sDisable comments%2$s to remove comment references on the index and single post pages.', 'jgd-bizelite' ), '<strong>', '</strong>' ),
			'section' => 'jgd_bizelite_display_options',
			'priority' => 30,
			'active_callback' => 'jgd_bizelite_notpage_callback',
			'type' => 'checkbox'
		)
	);
	
	$wp_customize->add_setting(
		'jgd_bizelite_hide_categories', array(
			'type' => 'theme_mod',
			'capability' => 'edit_theme_options',
			'theme_supports' => '',
			'default' => 0,
			'transport' => 'refresh',
			'sanitize_callback' => 'jgd_bizelite_sanitize_checkbox',
			'sanitize_js_callback' => 'jgd_bizelite_sanitize_checkbox'
		)
	);
	
	$wp_customize->add_control(
		'jgd_bizelite_hide_categories', array(
			'label' => __( 'Hide category links*', 'jgd-bizelite' ),
			'section' => 'jgd_bizelite_display_options',
			'priority' => 40,
			'active_callback' => 'jgd_bizelite_notpage_callback',
			'type' => 'checkbox'
		)
	);
	
	$wp_customize->add_setting(
		'jgd_bizelite_hide_tags', array(
			'type' => 'theme_mod',
			'capability' => 'edit_theme_options',
			'theme_supports' => '',
			'default' => 0,
			'transport' => 'refresh',
			'sanitize_callback' => 'jgd_bizelite_sanitize_checkbox',
			'sanitize_js_callback' => 'jgd_bizelite_sanitize_checkbox'
		)
	);
	
	$wp_customize->add_control(
		'jgd_bizelite_hide_tags', array(
			'label' => __( 'Hide tag links*', 'jgd-bizelite' ),
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
			'type' => 'theme_mod',
			'capability' => 'edit_theme_options',
			'theme_supports' => '',
			'default' => 'Pages',
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
		'selector' => '#menubar-pages',
		'container_inclusive' => false,
		'render_callback' => 'jgd_bizelite_menutitle_one_customizer',
	) );
	
	$wp_customize->selective_refresh->add_partial( 'jgd_bizelite_menutitle_two', array(
		'selector' => '#menubar-cats',
		'container_inclusive' => false,
		'render_callback' => 'jgd_bizelite_menutitle_two_customizer',
	) );
	
	$wp_customize->selective_refresh->add_partial( 'jgd_bizelite_cat_section_title', array(
		'selector' => '.featured-cat-container h2.hr',
		'container_inclusive' => false,
		'render_callback' => 'jgd_bizelite_cat_section_title_customizer',
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
	if( ! in_array( $value, array( 'none', '2cr-mag', '3cr', '3cr-mag', '2cl', '2cl-mag', '3cl', '3cl-mag' ) ) ) {
		$value = 'none';
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