<?php   
/**
 * @package cfashionstore Lite
 */
 require_once get_template_directory()."/hub/customizer/cfashionstore-lite-customization.php";
 require_once get_template_directory()."/hub/vendor/cfashionstore-lite-footer-widget-functions.php";
 require_once get_template_directory()."/hub/vendor/cfashionstore-lite-style-functions.php";
 require_once get_template_directory()."/hub/vendor/cfashionstore-lite-setup-functions.php";
 require_once get_template_directory()."/hub/vendor/cfashionstore-lite-page-functions.php";

add_filter('wp_nav_menu_items','cfashionstore_lite_menucart', 10, 2);
function cfashionstore_lite_menucart($menu, $args) {
	if ( !in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) || 'topmenu' !== $args->theme_location )
		return $menu;

	ob_start();
		global $woocommerce;
		$viewing_cart = esc_attr__('View your shopping cart', 'cfashionstore-lite');
		$start_shopping = esc_attr__('Start shopping', 'cfashionstore-lite');
		$cart_url = $woocommerce->cart->get_cart_url();
		$shop_page_url = get_permalink( wc_get_page_id( 'shop' ) );
		$cart_contents_count = $woocommerce->cart->cart_contents_count;
		/* translators: %d: item counts */
		$cart_contents = sprintf(_n('%d item', '%d items', $cart_contents_count, 'cfashionstore-lite'), number_format_i18n($cart_contents_count));
		$cart_total = $woocommerce->cart->get_cart_total();
			if ($cart_contents_count == 0) {
				$menu_item = '<li class="right"><a class="wcmenucart-contents" href="'. esc_url($shop_page_url) .'" title="'. $start_shopping .'">';
			} else {
				$menu_item = '<li class="right"><a class="wcmenucart-contents" href="'. esc_url($cart_url) .'" title="'. $viewing_cart .'">';
			}

			$menu_item .= '<i class="fa fa-shopping-cart"></i> ';

			$menu_item .= $cart_contents.' - '. $cart_total;
			$menu_item .= '</a></li>';		
	return $menu . $menu_item;
}
// Change number or products per row to 3
add_filter('loop_shop_columns', 'cfashionstore_lite_loop_columns');
if (!function_exists('cfashionstore_lite_loop_columns')) {
function cfashionstore_lite_loop_columns() {
return 4; // 3 products per row
}
}
?>