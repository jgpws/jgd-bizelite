<?php
/*
 * Colors for the Block Editor
 */

function jgd_bizelite_gutenberg_colors() {
	$color_choices = get_theme_mod( 'jgd_bizelite_style_choices', 'none' );
	switch ( $color_choices ) {
		case 'none':
			add_theme_support(
				'editor-color-palette', array(
					array(
						'name' => esc_html__( 'White', 'jgd-bizelite' ),
						'slug' => 'white',
						'color' => '#ffffff',
					),
					array(
						'name' => esc_html__( 'Light Gray', 'jgd-bizelite' ),
						'slug' => 'light-gray',
						'color' => '#ededed',
					),
					array(
						'name' => esc_html__( 'Medium Gray', 'jgd-bizelite' ),
						'slug' => 'medium-gray',
						'color' => '#808080',
					),
					array(
						'name' => esc_html__( 'Dark Gray', 'jgd-bizelite' ),
						'slug' => 'dark-gray',
						'color' => '#333333',
					),
					array(
						'name' => esc_html__( 'Black', 'jgd-bizelite' ),
						'slug' => 'black',
						'color' => '#000000',
					),
				)
			);
			break;
		case 'blue':
			add_theme_support(
				'editor-color-palette', array(
					array(
						'name' => esc_html__( 'White', 'jgd-bizelite' ),
						'slug' => 'white',
						'color' => '#ffffff',
					),
					array(
						'name' => esc_html__( 'Light Blue', 'jgd-bizelite' ),
						'slug' => 'light-blue',
						'color' => '#aaaae0',
					),
					array(
						'name' => esc_html__( 'Medium Blue', 'jgd-bizelite' ),
						'slug' => 'medium-blue',
						'color' => '#5656c0',
					),
					array(
						'name' => esc_html__( 'Blue', 'jgd-bizelite' ),
						'slug' => 'blue',
						'color' => '#000080',
					),
					array(
						'name' => esc_html__( 'Dark Blue', 'jgd-bizelite' ),
						'slug' => 'dark-blue',
						'color' => '#000053',
					),
					array(
						'name' => esc_html__( 'Black', 'jgd-bizelite' ),
						'slug' => 'black',
						'color' => '#000000',
					),
				)
			);
			break;
		case 'green':
			add_theme_support(
				'editor-color-palette', array(
					array(
						'name' => esc_html__( 'White', 'jgd-bizelite' ),
						'slug' => 'white',
						'color' => '#ffffff',
					),
					array(
						'name' => esc_html__( 'Light Green', 'jgd-bizelite' ),
						'slug' => 'light-green',
						'color' => '#b8d8b8',
					),
					array(
						'name' => esc_html__( 'Medium Green', 'jgd-bizelite' ),
						'slug' => 'medium-green',
						'color' => '#71b071',
					),
					array(
						'name' => esc_html__( 'Green', 'jgd-bizelite' ),
						'slug' => 'green',
						'color' => '#215e21',
					),
					array(
						'name' => esc_html__( 'Dark Green', 'jgd-bizelite' ),
						'slug' => 'dark-green',
						'color' => '#0b3d0b',
					),
					array(
						'name' => esc_html__( 'Black', 'jgd-bizelite' ),
						'slug' => 'black',
						'color' => '#000000',
					),
				)
			);
			break;
		case 'red':
			add_theme_support(
				'editor-color-palette', array(
					array(
						'name' => esc_html__( 'White', 'jgd-bizelite' ),
						'slug' => 'white',
						'color' => '#ffffff',
					),
					array(
						'name' => esc_html__( 'Light Red', 'jgd-bizelite' ),
						'slug' => 'light-red',
						'color' => '#daadad',
					),
					array(
						'name' => esc_html__( 'Medium Red', 'jgd-bizelite' ),
						'slug' => 'medium-red',
						'color' => '#c55959',
					),
					array(
						'name' => esc_html__( 'Dark Red', 'jgd-bizelite' ),
						'slug' => 'dark-red',
						'color' => '#5a0000',
					),
					array(
						'name' => esc_html__( 'Black', 'jgd-bizelite' ),
						'slug' => 'black',
						'color' => '#000000',
					),
				)
			);
			break;
		case 'silver':
			add_theme_support(
				'editor-color-palette', array(
					array(
						'name' => esc_html__( 'White', 'jgd-bizelite' ),
						'slug' => 'white',
						'color' => '#ffffff',
					),
					array(
						'name' => esc_html__( 'Light Silver', 'jgd-bizelite' ),
						'slug' => 'light-silver',
						'color' => '#e0e0e0',
					),
					array(
						'name' => esc_html__( 'Silver', 'jgd-bizelite' ),
						'slug' => 'silver',
						'color' => '#c0c0c0',
					),
					array(
						'name' => esc_html__( 'Medium Gray', 'jgd-bizelite' ),
						'slug' => 'medium-gray',
						'color' => '#808080',
					),
					array(
						'name' => esc_html__( 'Medium Dark Gray', 'jgd-bizelite' ),
						'slug' => 'medium-dark-gray',
						'color' => '#404040',
					),
					array(
						'name' => esc_html__( 'Black', 'jgd-bizelite' ),
						'slug' => 'black',
						'color' => '#000000',
					),
				)
			);
			break;
		case 'olive':
			add_theme_support(
				'editor-color-palette', array(
					array(
						'name' => esc_html__( 'White', 'jgd-bizelite' ),
						'slug' => 'white',
						'color' => '#ffffff',
					),
					array(
						'name' => esc_html__( 'Light Olive', 'jgd-bizelite' ),
						'slug' => 'light-olive',
						'color' => '#e0e0aa',
					),
					array(
						'name' => esc_html__( 'Medium Olive', 'jgd-bizelite' ),
						'slug' => 'medium-olive',
						'color' => '#c0c056',
					),
					array(
						'name' => esc_html__( 'Olive', 'jgd-bizelite' ),
						'slug' => 'olive',
						'color' => '#808000',
					),
					array(
						'name' => esc_html__( 'Dark Olive', 'jgd-bizelite' ),
						'slug' => 'dark-olive',
						'color' => '#535300',
					),
					array(
						'name' => esc_html__( 'Black', 'jgd-bizelite' ),
						'slug' => 'black',
						'color' => '#000000',
					),
				)
			);
			break;
	}
}
