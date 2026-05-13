<!DOCTYPE html>

<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ) ?>" />
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<!-- http://themeshaper.com/2009/06/24/creating-wordpress-theme-html-structure-tutorial/ -->
<?php if ( function_exists( 'wp_body_open' ) ) {
	wp_body_open();
} else {
	do_action( 'wp_body_open' );
} ?>
<div id="wrapper" class="wrapper hfeed">
	<header id="header" class="header">
    <a class="screen-reader-text skip-link" href="#content"><?php echo __( 'Skip to content', 'jgd-bizelite' ); ?></a>
      <nav id="access" class="access">
				<h1 class="blog-title blog-title-landing"><a href="<?php echo esc_url( home_url('/') ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
				<ul class="menubar">
					<li class="menubar-list-item">
					<h3 id="menubar-title-one" class="menubar-title">
					<?php jgd_bizelite_menutitle_one_customizer(); ?>
					</h3>
					<?php wp_nav_menu(
						array(
							'theme_location' => 'header_one',
              'container_id' => 'menu-one',
							'container_class' => 'pagemenu pagemenu-vertical is-zero-height',
							'fallback_cb' => 'jgd_bizelite_pages_default'
						)
					); ?>
					</li>
					<li class="menubar-list-item">
					<h3 id="menubar-title-two" class="menubar-title">
					<?php jgd_bizelite_menutitle_two_customizer(); ?>
					</h3>
					<?php wp_nav_menu(
						array(
							'theme_location' => 'header_two',
              'container_id' => 'menu-two',
							'container_class' => 'pagemenu pagemenu-vertical is-zero-height',
							'fallback_cb' => 'jgd_bizelite_cats_default'
							)
					); ?>
					</li>

				</ul>
				<?php get_template_part( 'template-parts/menu', 'social' ); ?>
			</nav><!-- #access -->
	</header><!-- #header -->
