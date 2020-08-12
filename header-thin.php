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
<div id="wrapper" class="hfeed">
	<div id="header">
			<div id="access">
				<?php if (is_home() || is_front_page()) { ?>
					<h1 class="blog-title blog-title-landing"><a href="<?php echo esc_url( home_url('/') ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
				<?php } else { ?>
					<h4 class="blog-title blog-title-landing"><a href="<?php echo esc_url( home_url('/') ); ?>"><?php bloginfo( 'name' ); ?></a></h4>
	<?php } ?>
				<ul class="menubar">
					<li class="menubar-pages-list-item">
					<h3 class="menubar-title">
					<?php jgd_bizelite_menutitle_one_customizer(); ?>
					</h3>
					<?php wp_nav_menu(
						array(
							'theme_location' => 'header_one',
							'container_class' => 'pagemenu pagemenu-vertical is-zero-height',
							'fallback_cb' => 'jgd_bizelite_pages_default'
						)
					); ?>
					</li>
					<li class="menubar-cats-list-item">
					<h3 class="menubar-title">
					<?php jgd_bizelite_menutitle_two_customizer(); ?>
					</h3>
					<?php wp_nav_menu(
						array(
							'theme_location' => 'header_two',
							'container_class' => 'pagemenu pagemenu-vertical is-zero-height',
							'fallback_cb' => 'jgd_bizelite_cats_default'
							)
					); ?>
					</li>

				</ul>
				<?php get_template_part( 'template-parts/menu', 'social' ); ?>
			</div><!-- #access -->
	</div><!-- #header -->
