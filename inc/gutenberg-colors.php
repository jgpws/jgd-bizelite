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
						'color' => '#999999',
					),
					array(
						'name' => esc_html__( 'Medium Gray', 'jgd-bizelite' ),
						'slug' => 'medium-gray',
						'color' => '#666666',
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
						'color' => '#7070db',
					),
					array(
						'name' => esc_html__( 'Medium Blue', 'jgd-bizelite' ),
						'slug' => 'medium-blue',
						'color' => '#1717cf',
					),
					array(
						'name' => esc_html__( 'Blue', 'jgd-bizelite' ),
						'slug' => 'blue',
						'color' => '#000080',
					),
					array(
						'name' => esc_html__( 'Dark Blue', 'jgd-bizelite' ),
						'slug' => 'dark-blue',
						'color' => '#00004d',
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
						'color' => '#7bd17b',
					),
					array(
						'name' => esc_html__( 'Medium Green', 'jgd-bizelite' ),
						'slug' => 'medium-green',
						'color' => '#3caa3c',
					),
					array(
						'name' => esc_html__( 'Green', 'jgd-bizelite' ),
						'slug' => 'green',
						'color' => '#215e21',
					),
					array(
						'name' => esc_html__( 'Dark Green', 'jgd-bizelite' ),
						'slug' => 'dark-green',
						'color' => '#143914',
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
						'color' => '#dd7878',
					),
					array(
						'name' => esc_html__( 'Medium Red', 'jgd-bizelite' ),
						'slug' => 'medium-red',
						'color' => '#d81818',
          ),
          array(
            'name' => esc_html__( 'Red', 'jgd-bizelite' ),
            'slug' => 'red',
            'color' => '#8b0000'
          ),
					array(
						'name' => esc_html__( 'Dark Red', 'jgd-bizelite' ),
						'slug' => 'dark-red',
						'color' => '#570000',
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
						'color' => '#d4d4d4',
					),
					array(
						'name' => esc_html__( 'Silver', 'jgd-bizelite' ),
						'slug' => 'silver',
						'color' => '#cccccc',
					),
					array(
						'name' => esc_html__( 'Medium Silver', 'jgd-bizelite' ),
						'slug' => 'medium-silver',
						'color' => '#a0a0a0',
					),
					array(
						'name' => esc_html__( 'Dark Silver', 'jgd-bizelite' ),
						'slug' => 'dark-silver',
						'color' => '#6e6e6e',
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
						'color' => '#dbdb70',
					),
					array(
						'name' => esc_html__( 'Medium Olive', 'jgd-bizelite' ),
						'slug' => 'medium-olive',
						'color' => '#cfcf17',
					),
					array(
						'name' => esc_html__( 'Olive', 'jgd-bizelite' ),
						'slug' => 'olive',
						'color' => '#808000',
					),
					array(
						'name' => esc_html__( 'Dark Olive', 'jgd-bizelite' ),
						'slug' => 'dark-olive',
						'color' => '#4d4d00',
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
