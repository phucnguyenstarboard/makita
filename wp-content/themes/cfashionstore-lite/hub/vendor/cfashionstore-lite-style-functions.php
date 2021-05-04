<?php 
 function cfashionstore_lite_style()
 {
    wp_enqueue_style( 'cfashionstore-lite-basic-style', get_stylesheet_uri() );
    wp_enqueue_style( 'cfashionstore-lite-style', get_template_directory_uri() .'/skin/css/cfashionstore-lite-main.css');
    wp_enqueue_style( 'cfashionstore-lite-responsive', get_template_directory_uri() .'/skin/css/cfashionstore-lite-responsive.css');
    wp_enqueue_style( 'font-awesome', get_template_directory_uri() .'/skin/css/font-awesome.css');
    wp_enqueue_script( 'cfashionstore-lite-toggle', get_template_directory_uri() . '/skin/js/cfashionstore-lite-toggle.js', array('jquery'));
 }
 add_action( 'wp_enqueue_scripts', 'cfashionstore_lite_style' );
?>
<?php
function cfashionstore_lite_header_style() {
	$cfashionstore_lite_header_text_color = get_header_textcolor();
	if ( get_theme_support( 'custom-header', 'default-text-color' ) === $cfashionstore_lite_header_text_color ) {
		return;
	}
	echo '<style id="cfashionstore-lite-custom-header-styles" type="text/css">';
	if ( 'blank' !== $cfashionstore_lite_header_text_color ) 
	{
		echo '.header_top .logo a
			 {
				color: #'.esc_attr( $cfashionstore_lite_header_text_color ).'
			}';
	}	
	echo '</style>';	
}