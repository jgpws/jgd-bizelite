<?php
function jgd_bizelite_setup() {
	/* for theme localization */
	load_theme_textdomain( 'jgd-bizelite' );
	
	/* WordPress page/post title tags */
	add_theme_support( 'title-tag' );
	
	/* Post thumbnails */
	add_theme_support( 'post-thumbnails' );

	/* content width */
	if ( ! isset( $content_width ) ) $content_width = 600;

	/* automatic feed links */
	add_theme_support( 'automatic-feed-links' );
	
	/* Editor style that matches front end */
	// see editor-style.css
	add_editor_style();
	
	/* Custom menus */
	register_nav_menus(
		array(
			'header_one' => __( 'Header First Menu', 'jgd-bizelite' ),
			'header_two' => __( 'Header Second Menu', 'jgd-bizelite' ),
			'social_profiles' => __( 'Social Profiles', 'jgd-bizelite' ),
		)
	);
	
	/* Custom Background */
	$args = array(
		'default-color' => '#333333'
	);
	add_theme_support( 'custom-background', $args );
	
	/* Custom Header */
	// gets included in the site header
	// also see the function jgd_bizelite_header_style, below
	$args = array(
		'default-image' => get_template_directory_uri() . '/images/waves-bg-large.png',
		'width' => 1280,
		'height' => 240,
		'uploads' => true,
		'header-text' => true,
		'default-text-color' => 'ffffff'
	);
	add_theme_support( 'custom-header', $args );
	
	$defaults = array(
		'flex-height' => true,
		'flex-width' => true,
	);
	add_theme_support( 'custom-logo', $defaults );
	
	$header_images = array(
		'waves' => array(
			'url' => get_template_directory_uri() . '/images/waves-bg-large.png',
			'thumbnail_url' => get_template_directory_uri() . '/images/waves-bg-large-thumbnail.png',
			'description' => 'Waves',
		),
	);
	register_default_headers( $header_images );
}
add_action( 'after_setup_theme', 'jgd_bizelite_setup' );

/* widgetizing for the sidebars */
// Primary sidebar
function jgd_bizelite_primary_sidebar_init() {
	register_sidebar( array (
	'name' => __( 'Primary Widgets', 'jgd-bizelite' ),
	'id' => 'primary_widget_area', 
	'before_title' => '<h3 class="widgettitle">',
	'after_title' => '</h3>'
	) );
}

// Secondary sidebar
function jgd_bizelite_secondary_sidebar_init() {
	register_sidebar( array (
	'name' => __( 'Secondary Widgets', 'jgd-bizelite' ),
	'id' => 'secondary_widget_area',
	'before_title' => '<h3 class="widgettitle">',
	'after_title' => '</h3>'
	) );
}
add_action( 'widgets_init', 'jgd_bizelite_primary_sidebar_init' );
add_action( 'widgets_init', 'jgd_bizelite_secondary_sidebar_init' );

/* enqueue all styles */
function jgd_bizelite_enqueue_styles() {
	wp_register_style(
		'jgd-bizelite-basic-reset', get_template_directory_uri() . '/basic_reset.css'
	);
	wp_enqueue_style( 'jgd-bizelite-basic-reset' );
	
	wp_register_style(
		'jgd-bizelite-main-stylesheet', get_stylesheet_uri(), array( 'jgd-bizelite-basic-reset' )
	);
	wp_enqueue_style( 'jgd-bizelite-main-stylesheet' );
	wp_enqueue_style( 'jgd-bizelite-icons', get_template_directory_uri() . '/css/themify-icons.css' );
}

/* enqueue JavaScripts necessary for this theme */
function jgd_bizelite_enqueue_scripts() {
	wp_register_script(
		'jgd-bizelite-script',
		get_template_directory_uri() . '/scripts/jgd-bizelite-scripts.js',
		array('jquery'),
      '1.0', true
	);
	
	$params = array(
		'templateDir' => get_template_directory_uri(),
	);
	wp_localize_script( 'jgd-bizelite-script', 'jgd_bizelite_ScriptParams', $params );
	//enqueue the script
	wp_enqueue_script( 'jgd-bizelite-script' );
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	
	wp_register_script(
		'jgd-bizelite-gallery-nobr',
		get_template_directory_uri() . '/scripts/gallery-nobr.js',
		array('jquery'),
		'1.0',
		true
	);
	wp_enqueue_script('jgd-bizelite-gallery-nobr');
}

add_action( 'wp_enqueue_scripts', 'jgd_bizelite_enqueue_styles' );
add_action( 'wp_enqueue_scripts', 'jgd_bizelite_enqueue_scripts' );

function jgd_bizelite_header_style() {
	if( get_header_image() ) {
		$header_style = '
#branding {
	background: url(' . esc_url( get_header_image() ) . ') no-repeat ' . jgd_bizelite_header_align_switcher() . ' center;
	width: 100%;
	max-width: 1280px;
	background-size: auto 100%;
}

@media screen and (min-width: 40.063em) { /* 40.063em = 641px */
	#branding {
		height: 180px;
	}
}

@media screen and (min-width: 64.063em) { /* 64.063em = 1025px */
	#branding {
		height: ' . esc_attr( get_custom_header()->height ) . 'px;
	}
}

.blog-title a:visited,
.blog-title a:link {
	color: #' . esc_attr( get_header_textcolor() ) . ';
}

.subtitle {
	color: #' . esc_attr( get_header_textcolor() ) . ';
}';
		if( !has_custom_logo() && 'blank' == esc_attr( get_header_textcolor() ) ) {
			$header_style .= '
#site-title-block {
	padding: 0;
}

.blog-title a:link,
.blog-title a:visited {
	display: block;
	width: ' . esc_attr( get_custom_header()->width ) . 'px;
	height: ' . esc_attr( get_custom_header()->height ) . 'px;
	text-indent: -9999px;
}
		
.subtitle {
	text-indent: -9999px;
}';
		}
		if( has_custom_logo() && 'blank' == esc_attr( get_header_textcolor() ) ) {
			$header_style .= '
.custom-logo-link + #site-title-block {
	position: absolute;
	left: -9999px;
	top: 0px;
}			
';
		}
		wp_add_inline_style( 'jgd-bizelite-main-stylesheet', $header_style );
	}
}
add_action( 'wp_enqueue_scripts', 'jgd_bizelite_header_style' );

/* Jetpack Responsive Videos- Requires the Jetpack plugin to be installed and activated */
function jgd_bizelite_responsive_videos_setup() {
	add_theme_support( 'jetpack-responsive-videos' );
}
add_action( 'after_setup_theme', 'jgd_bizelite_responsive_videos_setup' );

/* Functions for the Customizer */
function jgd_bizelite_pages_default() {
	wp_page_menu( 'menu_class=pagemenu' );
}

function jgd_bizelite_cats_default() { ?>
	<div class="catmenu">
		<ul>
			<?php wp_list_categories('title_li='); ?>
		</ul>
	</div><!-- .catmenu -->
<?php
}

/* Remove inline styling in gallery code when a gallery is displayed, so the code validates */
add_filter( 'use_default_gallery_style', '__return_false' );

/* Remove 10px to the right of captions */
function jgd_bizelite_remove_caption_padding( $width ) {
	return $width - 10;
}
add_filter( 'img_caption_shortcode_width', 'jgd_bizelite_remove_caption_padding' );

/* load external theme options file */
include ( get_template_directory() . '/options/jgd_bizelite_customizer.php' );

include ( get_template_directory() . '/options/jgd_bizelite_customizer-frontend.php');
?>
