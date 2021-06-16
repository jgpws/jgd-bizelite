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
			'description' => sprintf( /* translators: %1$s = <p>, %2$s = </p> */ esc_html__( '%1$s* = refeshes the page%2$s%1$s** = The title and subtitle are not displayed in Center logo alignment.%2$s', 'jgd-bizelite' ), '<p>', '</p>' ),
			'section' => 'title_tagline',
			'choices' => array(
				'left' => esc_html__( 'Left (default)', 'jgd-bizelite' ),
				'center' => esc_html__( 'Center**', 'jgd-bizelite' ),
				'right' => esc_html__( 'Right', 'jgd-bizelite' ),
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
		new WP_Customize_Color_Control ( $wp_customize, 'jgd_bizelite_content_sidebar_bgcolor',
			array(
				'label' => esc_html__( 'Content and Sidebar background color', 'jgd-bizelite' ),
				'section' => 'colors',
				'priority' => 30,
				'settings' => 'jgd_bizelite_content_sidebar_bgcolor'
			)
		)
	);

	$wp_customize->add_setting(
		'jgd_bizelite_social_icon_color', array(
			'default' => 'white',
			'sanitize_callback' => 'jgd_bizelite_sanitize_social_icon_choices',
		)
	);

	$wp_customize->add_control(
		'jgd_bizelite_social_icon_color', array(
			'label' => esc_html__( 'Social Icons color *', 'jgd-bizelite' ),
			'description' => sprintf( /* translators: %1$s = <p>, %2$s = </p> */ esc_html__( '%1$sChange the color of the Social Media badges in the Header when using a Custom Header image. Scheme color is based on the preset color scheme.%2$s%1$s* Refreshes the page%2$s', 'jgd-bizelite' ), '<p>', '</p>' ),
			'type' => 'radio',
			'section' => 'colors',
			'priority' => 35,
			'settings' => 'jgd_bizelite_social_icon_color',
			'choices' => array(
				'white' => esc_html__( 'White', 'jgd-bizelite' ),
				'theme_color' => esc_html__( 'Scheme Color', 'jgd-bizelite' ),
			),
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
			'label' => esc_html__( 'Use light text for dark background', 'jgd-bizelite' ),
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
			'label' => esc_html__( 'Hide background texture behind content', 'jgd-bizelite' ),
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
			'label' => esc_html__( 'Hide Decorations', 'jgd-bizelite' ),
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
			'label' => esc_html__( 'Align the header background image if it is smaller than the recommended size.', 'jgd-bizelite' ),
			'choices' => array(
				'left' => esc_html__( 'Left', 'jgd-bizelite' ),
				'center' => esc_html__( 'Center (default)', 'jgd-bizelite' ),
				'right' => esc_html__( 'Right', 'jgd-bizelite' ),
			),
		)
	);

	// for Layouts
	$wp_customize->add_section(
		'jgd_bizelite_layout', array(
			'title' => esc_html__( 'Layout', 'jgd-bizelite' ),
			'description' => sprintf( /* translators: %1$s = <p>, %2$s = </p> */ esc_html__( '%1$sSelect from four column layouts and five layout styles.%2$s%1$s* Refreshes the page%2$s', 'jgd-bizelite' ), '<p>', '</p>' ),
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

	// for Header/Footer Gradients
	$wp_customize->add_section(
		'jgd_bizelite_gradients', array(
			'title' => esc_html__( 'Header/Footer Gradients', 'jgd-bizelite' ),
			'description' => esc_html__( 'Add a gradient of two colors to the Header or Footer.', 'jgd-bizelite' ),
			'priority' => 47,
		),
	);

	$wp_customize->add_setting(
		'jgd_bizelite_header_gradient_1', array(
			'default' => '#000000',
			'sanitize_callback' => 'sanitize_hex_color',
		),
	);

	$wp_customize->add_control(
		'jgd_bizelite_header_gradient_1', array(
			'label' => esc_html__( 'Header Gradient Color 1', 'jgd-bizelite' ),
			'section' => 'jgd_bizelite_gradients',
			'type' => 'color',
		),
	);

	$wp_customize->add_setting(
		'jgd_bizelite_header_gradient_2', array(
			'default' => '#000000',
			'sanitize_callback' => 'sanitize_hex_color',
		),
	);

	$wp_customize->add_control(
		'jgd_bizelite_header_gradient_2', array(
			'label' => esc_html__( 'Header Gradient Color 2', 'jgd-bizelite' ),
			'section' => 'jgd_bizelite_gradients',
			'type' => 'color',
		),
	);

	$wp_customize->add_setting(
		'jgd_bizelite_header_gradient_angle', array(
			'default' => 0,
			'sanitize_callback' => 'absint',
		),
	);

	$wp_customize->add_control(
		'jgd_bizelite_header_gradient_angle', array(
			'label' => esc_html__( 'Header Gradient Angle', 'jgd-bizelite' ),
			'description' => esc_html__( 'Enter a number to change the angle by degree. For example, 45 degrees would rotate the gradient clockwise.', 'jgd-bizelite' ),
			'section' => 'jgd_bizelite_gradients',
			'type' => 'text',
		)
	);

	$wp_customize->add_setting(
		'jgd_bizelite_footer_gradient_1', array(
			'default' => '#000000',
			'sanitize_callback' => 'sanitize_hex_color',
		),
	);

	$wp_customize->add_control(
		'jgd_bizelite_footer_gradient_1', array(
			'label' => esc_html__( 'Footer Gradient Color 1', 'jgd-bizelite' ),
			'section' => 'jgd_bizelite_gradients',
			'type' => 'color',
		),
	);

	$wp_customize->add_setting(
		'jgd_bizelite_footer_gradient_2', array(
			'default' => '#000000',
			'sanitize_callback' => 'sanitize_hex_color',
		),
	);

	$wp_customize->add_control(
		'jgd_bizelite_footer_gradient_2', array(
			'label' => esc_html__( 'Footer Gradient Color 2', 'jgd-bizelite' ),
			'section' => 'jgd_bizelite_gradients',
			'type' => 'color',
		),
	);

	$wp_customize->add_setting(
		'jgd_bizelite_footer_gradient_angle', array(
			'default' => 0,
			'sanitize_callback' => 'absint',
		),
	);

	$wp_customize->add_control(
		'jgd_bizelite_footer_gradient_angle', array(
			'label' => esc_html__( 'Footer Gradient Angle', 'jgd-bizelite' ),
			'description' => esc_html__( 'Enter a number to change the angle by degree. For example, 45 degrees would rotate the gradient clockwise.' ),
			'section' => 'jgd_bizelite_gradients',
			'type' => 'text',
		)
	);

	// Display Options
	$wp_customize->add_section(
		'jgd_bizelite_display_options', array(
			'title' => esc_html__( 'Display Options', 'jgd-bizelite' ),
			'description' => sprintf( /* translators: %1$s = <p>, %2$s = </p> */ esc_html__( '%1$sIn this section, you can add and/or subtract content from your website or blog.%2$s%1$s* Refreshes the page%2$s', 'jgd-bizelite' ), '<p>', '</p>' ),
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
			'label' => esc_html__( 'Hide the comments link', 'jgd-bizelite' ),
			'description' => sprintf( /* translators: %1$s = </strong>, %2$s = </strong> */ esc_html__( 'Use this with %1$sDisable comments%2$s to remove comment references on the index and single post pages.', 'jgd-bizelite' ), '<strong>', '</strong>' ),
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
			'label' => esc_html__( 'Hide category links', 'jgd-bizelite' ),
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
			'label' => esc_html__( 'Hide tag links', 'jgd-bizelite' ),
			'description' => sprintf( /* translators: %1$s = <strong>, %2$s = </strong> */ esc_html__( '%1$s*Warning:%2$s when hiding tag links on every page, your website will no longer have links to tag pages.', 'jgd-bizelite' ), '<strong>', '</strong>' ),
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
			'label' => esc_html__( 'Use icons in place of and next to titles*', 'jgd-bizelite' ),
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
			'label' => esc_html__( 'Replace the Pages title in the menu bar', 'jgd-bizelite' ),
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
			'label' => esc_html__( 'Replace the Categories title in the menu bar', 'jgd-bizelite' ),
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
			'label' => esc_html__( 'Change the footer information', 'jgd-bizelite' ),
			'description' => sprintf( /* translators: %1$s = <p>, %2$s = </p>, %3$s = <strong>, %4$s = </strong> */ esc_html__( '%1$s* Supports HTML%2$s%1$sTo retrieve the web address of this theme, see %3$sTheme web address%4$s in this theme\'s readme.txt file.%2$s', 'jgd-bizelite' ), '<p>', '</p>', '<strong>', '</strong>' ),
			'section' => 'jgd_bizelite_display_options',
			'priority' => 80,
			'type' => 'textarea'
		)
	);

	// For Page Templates
	$wp_customize->add_panel(
		'jgd_bizelite_page_templates', array(
			'title' => esc_html__( 'Page Template Customizations', 'jgd-bizelite' ),
			'priority' => 125,
			'description' => esc_html__( 'In this section are customizations for some of the page templates that can be applied to a custom home page.', 'jgd-bizelite' ),
			'active_callback' => 'jgd_bizelite_page_callback',
		)
	);

	// Featured Categories
	$wp_customize->add_section(
		'jgd_bizelite_cats_template', array(
			'title' => esc_html__( 'Featured Categories', 'jgd-bizelite' ),
			'priority' => 125,
			'description' => esc_html__( 'Customize the Featured Categories page template.', 'jgd-bizelite' ),
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
			'label' => esc_html__( 'Display Category 1', 'jgd-bizelite' ),
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
			'label' => esc_html__( 'Display Category 2', 'jgd-bizelite' ),
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
			'label' => esc_html__( 'Display Category 3', 'jgd-bizelite' ),
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
			'label' => esc_html__( 'Replace the Latest Posts title above the featured category posts.', 'jgd-bizelite' ),
			'type' => 'text',
			'section' => 'jgd_bizelite_cats_template',
		)
	);

	// Landing Page
	$wp_customize->add_section(
		'jgd_bizelite_landing', array(
			'title' => esc_html__( 'Landing Page', 'jgd-bizelite' ),
			'priority' => 130,
			'description' => sprintf( esc_html__( '%1$sCustomize pages using the Landing Page template.%2$s%1$s* Use these features to preview the landing page colors in the block editor.%2$s%1$s%3$sDisable (uncheck) these features after finishing customizations to the landing page, as they show on every page.%4$s%2$s', 'jgd-bizelite' ), '<p>', '</p>', '<strong>', '</strong>' ),
			'panel' => 'jgd_bizelite_page_templates',
			'active_callback' => 'jgd_bizelite_page_callback',
		)
	);

	// Landing Page
	$wp_customize->add_setting(
		'jgd_bizelite_select_landing_page', array(
			'type' => 'theme_mod',
			'default' => 'select_page',
			'sanitize_callback' => 'jgd_bizelite_sanitize_lp_choices',
		)
	);

	$wp_customize->add_control(
		'jgd_bizelite_select_landing_page', array(
			'label' => esc_html__( 'Select a Landing Page', 'jgd-bizelite' ),
			'type' => 'select',
			'section' => 'jgd_bizelite_landing',
			'choices' => array(
				'select_page' => esc_html__( 'Select a Landing Page', 'jgd-bizelite' ),
				'lp_one' => esc_html__( 'Landing Page 1', 'jgd-bizelite' ),
				'lp_two' => esc_html__( 'Landing Page 2', 'jgd-bizelite' ),
				'lp_three' => esc_html__( 'Landing Page 3', 'jgd-bizelite' ),
			),
		)
	);

	// Array for each Customizer setting/control
	for ( $counter = 1; $counter <= 3; $counter++ ) {

		$wp_customize->add_setting(
			'jgd_bizelite_apply_landing_page_' . $counter , array(
				'type' => 'theme_mod',
				'default' => 0,
				'sanitize_callback' => 'absint',
			)
		);

		$wp_customize->add_control(
			'jgd_bizelite_apply_landing_page_' . $counter, array(
				'label' => esc_html__( 'Apply Customizations to the selected page' , 'jgd-bizelite' ),
				'description' => esc_html__( 'The selected page must have the Landing Page template applied.', 'jgd-bizelite' ),
				'type' => 'dropdown-pages',
				'section' => 'jgd_bizelite_landing',
			)
		);

		$wp_customize->add_setting(
			'jgd_bizelite_landing_bg_' . $counter, array(
				'type' => 'theme_mod',
				'default' => '#ffffff',
				'transport' => 'postMessage',
				'sanitize_callback' => 'sanitize_hex_color',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Color_Control( $wp_customize, 'jgd_bizelite_landing_bg_' . $counter,
				array(
					'label' => esc_html__( 'Background Color', 'jgd-bizelite' ),
					'description' => esc_html__( 'Change the background color of the Landing Page independent of the theme background color.', 'jgd-bizelite' ),
					'type' => 'color',
					'section' => 'jgd_bizelite_landing',
				)
			)
		);

		$wp_customize->add_setting(
			'jgd_bizelite_show_landing_bg_gutenberg_' . $counter , array(
				'type' => 'theme_mod',
				'default' => 0,
				'transport' => 'postMessage',
				'sanitize_callback' => 'jgd_bizelite_sanitize_checkbox',
			)
		);

		$wp_customize->add_control(
			'jgd_bizelite_show_landing_bg_gutenberg_' . $counter , array(
				'type' => 'checkbox',
				'label' => esc_html__( 'Show Landing Page background color in the Block Editor. *', 'jgd-bizelite' ),
				'section' => 'jgd_bizelite_landing',
			)
		);

		$wp_customize->add_setting(
			'jgd_bizelite_landing_light_text_' . $counter , array(
				'type' => 'theme_mod',
				'default' => 0,
				'transport' => 'postMessage',
				'sanitize_callback' => 'jgd_bizelite_sanitize_checkbox',
			)
		);

		$wp_customize->add_control(
			'jgd_bizelite_landing_light_text_' . $counter , array(
				'type' => 'checkbox',
				'label' => esc_html__( 'Use light text for dark background *', 'jgd-bizelite' ),
				'section' => 'jgd_bizelite_landing',
			)
		);

	}
	//

	// WooCommerce store
	$wp_customize->add_section(
		'jgd_bizelite_store_section', array(
			'title' => esc_html__( 'Store Options', 'jgd-bizelite' ),
			'description' => esc_html__( 'Customize your WooCommerce store.', 'jgd-bizelite' ),
			'priority' => 127,
			//'active_callback' => 'jgd_bizelite_wc_page_callback',
		)
	);

	$wp_customize->add_setting(
		'jgd_bizelite_woocommerce_sidebar', array(
			'type' => 'theme_mod',
			'default' => 'default_sidebar',
			'sanitize_callback' => 'jgd_bizelite_sanitize_wc_sidebar_choices',
		)
	);

	$wp_customize->add_control(
		'jgd_bizelite_woocommerce_sidebar', array(
			'type' => 'radio',
			'label' => esc_html__( 'Use a different sidebar on WooCommerce shop pages.', 'jgd-bizelite' ),
			'section' => 'jgd_bizelite_store_section',
			'choices' => array(
				'default_sidebar' => esc_html__( 'Default Sidebar', 'jgd-bizelite' ),
				'wc_sidebar' => esc_html__( 'WooCommerce Widgets Sidebar', 'jgd-bizelite' ),
			)
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

function jgd_bizelite_wc_page_callback() {
	if ( is_woocommerce_activated() ) {
		return true;
	}
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

function jgd_bizelite_sanitize_social_icon_choices( $value ) {
	if( ! in_array( $value, array( 'white', 'theme_color' ) ) ) {
		$value = 'white';
	}

	return $value;
}

function jgd_bizelite_sanitize_wc_sidebar_choices( $value ) {
	if( ! in_array( $value, array( 'default_sidebar', 'wc_sidebar' ) ) ) {
		$value = 'default_sidebar';
	}

	return $value;
}

function jgd_bizelite_sanitize_lp_choices( $value ) {
	if ( ! in_array( $value, array( 'select_page', 'lp_one', 'lp_two', 'lp_three' ) ) ) {
		$value = 'select_page';
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

/* for Customizer controls */
function jgd_bizelite_customizer_controls() {
	wp_enqueue_script( 'jgd-bizelite-customizer-controls', get_template_directory_uri() . '/scripts/jbe-customize-controls.js', array( 'jquery' ), '', true );
}
add_action( 'customize_controls_enqueue_scripts', 'jgd_bizelite_customizer_controls' );
