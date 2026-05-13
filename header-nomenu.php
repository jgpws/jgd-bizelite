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
<?php if ( function_exists( 'wp_body_open' ) ) {
	wp_body_open();
} else {
	do_action( 'wp_body_open' );
} ?>
<!-- http://themeshaper.com/2009/06/24/creating-wordpress-theme-html-structure-tutorial/ -->
<div id="wrapper" class="wrapper hfeed">
  <header id="header" class="header">
    <a class="screen-reader-text skip-link" href="#content"><?php echo __( 'Skip to content', 'jgd-bizelite' ); ?></a>
    <div class="branding">
      <div class="logo-title-group">
		    <?php if ( function_exists( 'the_custom_logo' ) ) {
  			  the_custom_logo();
        } ?>
      <?php if ( display_header_text() ) { ?>
		    <div class="site-title-block">
		      <h1 class="blog-title"><a href="<?php echo esc_url( home_url('/') ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
		    <?php if( get_bloginfo( 'description' ) ) { ?>
			    <p class="subtitle"><?php bloginfo( 'description' ); ?></p>
		    <?php } // ends if is_home()... ?>
        </div><!-- #site-title-block -->
      <?php } // ends display_header_text ?>
      </div><!-- .logo-title-group -->
      <?php the_custom_header_markup(); ?>
		</div><!-- .branding -->

		<nav id="access" class="access">
			<?php get_template_part( 'template-parts/menu', 'social' ); ?>
		</nav><!-- #access -->
	</header><!-- #header -->
