<?php 
 if ( ! function_exists( 'cfashionstore_lite_setup' ) ) :
function cfashionstore_lite_setup() {   
	add_theme_support( 'automatic-feed-links' );
	add_theme_support('woocommerce');
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'custom-header' );
	add_theme_support( 'title-tag' );
	register_nav_menus( array(
		'topmenu' => esc_html__( 'Top Account Menu', 'cfashionstore-lite' ),
		'primary' => esc_html__( 'Primary Menu', 'cfashionstore-lite' ),
		'footer' => esc_html__( 'Footer Menu', 'cfashionstore-lite' ),
	) );
	add_theme_support( 'custom-background', array(
		'default-color' => 'ffffff'
	) );	

			$defaults = array(
			'default-image'          => get_template_directory_uri() .'/images/slider.jpg',
			'default-text-color' => 'ffffff',
			'width'                  => 1400,
			'height'                 => 500,
			'uploads'                => true,
			'wp-head-callback'   => 'cfashionstore_lite_header_style',			
		);
		add_theme_support( 'custom-header', $defaults );
} 
endif; // cfashionstore_lite_setup
add_action( 'after_setup_theme', 'cfashionstore_lite_setup' );
?>