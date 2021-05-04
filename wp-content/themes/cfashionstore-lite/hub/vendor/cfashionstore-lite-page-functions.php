<?php
if ( ! isset( $content_width ) ) $content_width = 900;

add_action( 'admin_menu', 'cfashionstore_lite_pros');
function cfashionstore_lite_pros() {    	
	add_theme_page( esc_html__('CFashionStore Lite Details', 'cfashionstore-lite'), esc_html__('CFashionStore Lite Details', 'cfashionstore-lite'), 'edit_theme_options', 'cfashionstore_lite_pro', 'cfashionstore_lite_pro_details');   
} 

function cfashionstore_lite_pro_details() { 	
?>
<div class="wrap">
	<h1><?php esc_html_e( 'CFashion Store Lite', 'cfashionstore-lite' ); ?></h1>
	<p><strong> <?php esc_html_e( 'Description: ', 'cfashionstore-lite' ); ?></strong><?php esc_html_e( 'CFashioStore WordPress theme is used for all type of business. That business includes online shopping system software. This theme covered market in all the area like online marketing, online shopping, online medical selling, online selling virtual products, online sell game and software stuff, Online traveling booking, online food stuff selling, Online restaurants, online cake selling, online cloth selling, online cloth shopping stuff for men, women, child and all other type of online business etc. please check theme demo link https://www.themescave.com/demo/cfashionstore-pro/ and theme documentation https://www.themescave.com/documentation/cfashionstore-pro/', 'cfashionstore-lite' ); ?></p>
<a class="button button-primary button-large" href="<?php echo esc_url( cfashionstore_lite_THEMEURL ); ?>" target="_blank"><?php esc_html_e('Theme Url', 'cfashionstore-lite'); ?></a>	
<a class="button button-primary button-large" href="<?php echo esc_url( cfashionstore_lite_PROURL ); ?>" target="_blank"><?php esc_html_e('Purchase To Pro', 'cfashionstore-lite'); ?></a>
<a class="button button-primary button-large" href="<?php echo esc_url( cfashionstore_lite_DOCURL ); ?>" target="_blank"><?php esc_html_e('Documentation', 'cfashionstore-lite'); ?></a>
 </div> 
</div>
<?php }?>
<?php
add_action('customize_register', 'cfashionstore_lite_customize_register');
define('cfashionstore_lite_PROURL', 'http://www.themescave.com/themes/wordpress-fashion-ecommerce-cfashionstore-pro/');
define('cfashionstore_lite_THEMEURL', 'https://www.themescave.com/themes/free-wordpress-fashion-ecommerce-cfashionstore-lite/');
define('cfashionstore_lite_DOCURL', 'http://www.themescave.com/documentation/cfashionstore-pro');
?>