<?php
/**
 * Education Zone functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Education_Zone
 */

$education_zone_theme_data = wp_get_theme();
if( ! defined( 'EDUCATION_ZONE_THEME_VERSION' ) ) define( 'EDUCATION_ZONE_THEME_VERSION', $education_zone_theme_data->get( 'Version' ) );
if( ! defined( 'EDUCATION_ZONE_THEME_NAME' ) ) define( 'EDUCATION_ZONE_THEME_NAME', $education_zone_theme_data->get( 'Name' ) );
if( ! defined( 'EDUCATION_ZONE_THEME_TEXTDOMAIN' ) ) define( 'EDUCATION_ZONE_THEME_TEXTDOMAIN', $education_zone_theme_data->get( 'TextDomain' ) );

if ( ! function_exists( 'education_zone_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function education_zone_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Education Zone, use a find and replace
	 * to change 'education-zone' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'education-zone', get_template_directory() . '/languages' );

    // Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary'   => esc_html__( 'Primary', 'education-zone' ),
		'secondary' => esc_html__( 'Secondary', 'education-zone' ),		
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'gallery',
		'caption',
	) );

	add_theme_support( 'post-formats', array( 'image', 'link', 'aside', 'status' ) );



	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'education_zone_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
    
    /* Custom Logo */
    add_theme_support( 'custom-logo', array(    	
    	'header-text' => array( 'site-title', 'site-description' ),
    ) );
    
    //Custom Image Sizes
    add_image_size( 'education-zone-banner', 1920, 692, true);
    add_image_size( 'education-zone-image-full', 1140, 458, true);
    add_image_size( 'education-zone-image', 750, 458, true);
    add_image_size( 'education-zone-recent-post', 70, 70, true);
    add_image_size( 'education-zone-search-result', 246, 246, true);
    add_image_size( 'education-zone-featured-course', 276, 276, true);
    add_image_size( 'education-zone-testimonial', 125, 125, true);
    add_image_size( 'education-zone-blog-full', 848, 480, true);
    add_image_size( 'education-zone-schema', 600, 60, true);
    
}
endif;
add_action( 'after_setup_theme', 'education_zone_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function education_zone_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'education_zone_content_width', 750 );
}
add_action( 'after_setup_theme', 'education_zone_content_width', 0 );

/**
* Adjust content_width value according to template.
*
* @return void
*/
function education_zone_template_redirect_content_width() {

	// Full Width in the absence of sidebar.
	if( is_page() ){
	   $sidebar_layout = education_zone_sidebar_layout_class();
       if( ( $sidebar_layout == 'no-sidebar' ) || ! ( is_active_sidebar( 'right-sidebar' ) ) ) $GLOBALS['content_width'] = 1140;
        
	}elseif ( ! ( is_active_sidebar( 'right-sidebar' ) ) ) {
		$GLOBALS['content_width'] = 1140;
	}

}
add_action( 'template_redirect', 'education_zone_template_redirect_content_width' );

/**
 * Query WooCommerce activation
 */
function education_zone_is_woocommerce_activated() {
    return class_exists( 'woocommerce' ) ? true : false;
}
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function education_zone_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Right Sidebar', 'education-zone' ),
		'id'            => 'right-sidebar',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

    register_sidebar( array(
		'name'          => esc_html__( 'Footer One', 'education-zone' ),
		'id'            => 'footer-one',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

    register_sidebar( array(
		'name'          => esc_html__( 'Footer Two', 'education-zone' ),
		'id'            => 'footer-two',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
		
    register_sidebar( array(
		'name'          => esc_html__( 'Footer Three', 'education-zone' ),
		'id'            => 'footer-three',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	
}
add_action( 'widgets_init', 'education_zone_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function education_zone_scripts() {
	
    $build  = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '/build' : '';
    $suffix = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';
	
	wp_enqueue_style( 'owl-carousel', get_template_directory_uri(). '/css' . $build . '/owl.carousel' . $suffix . '.css' );
    wp_enqueue_style( 'owl-theme-default', get_template_directory_uri(). '/css' . $build . '/owl.theme.default' . $suffix . '.css' );
    wp_enqueue_style( 'education-zone-google-fonts', education_zone_fonts_url() );
    wp_enqueue_style( 'education-zone-style', get_stylesheet_uri(), array(), EDUCATION_ZONE_THEME_VERSION );
	wp_enqueue_style( 'bootstrap', get_template_directory_uri(). '/css/bootstrap.min.css' );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri().'/css/font-awesome.min.css' );
	wp_enqueue_style( 'home', get_template_directory_uri().'/css/home.css' );
	wp_enqueue_style( 'flaticon', get_template_directory_uri().'/css/flaticon.min.css' );
	wp_enqueue_style( 'flaticon', get_template_directory_uri().'/css/animate.min.css' );
	
	if(is_search()){
		wp_enqueue_style( 'search-results-simple', get_template_directory_uri().'/css/search-results-simple.css' );
	}


	
	if( is_archive() ){
	    wp_enqueue_style( 'category', get_template_directory_uri().'/css/category.css' );
    }

    if ( is_page_template( 'templates/template-compare.php' ) ) {
    	wp_enqueue_style( 'compare', get_template_directory_uri().'/css/compare.css' );
    }
	wp_enqueue_style( 'magnific', get_template_directory_uri().'/css/magnific-popup.css' );

    if ( is_page_template( 'templates/template-catalog.php' ) ) {
    	wp_enqueue_style( 'catalog', get_template_directory_uri().'/css/catalog.css' );
    }

	if( education_zone_is_woocommerce_activated() )
    wp_enqueue_style( 'education-zone-woocommerce-style', get_template_directory_uri(). '/css' . $build . '/woocommerce' . $suffix . '.css', EDUCATION_ZONE_THEME_VERSION );
  
    wp_enqueue_script( 'owl-carousel', get_template_directory_uri() . '/js' . $build . '/owl.carousel' . $suffix . '.js', array('jquery'), '2.2.1', true );
    wp_enqueue_script( 'owlcarousel2-a11ylayer', get_template_directory_uri() . '/js' . $build . '/owlcarousel2-a11ylayer' . $suffix . '.js', array('owl-carousel'), '0.2.1', true );
	wp_enqueue_script( 'waypoint', get_template_directory_uri() . '/js' . $build . '/waypoint' . $suffix . '.js', array('jquery'), '2.0.3', true );
	wp_enqueue_script( 'jquery-counterup', get_template_directory_uri() . '/js' . $build . '/jquery.counterup' . $suffix . '.js', array('jquery', 'waypoint'), '1.0', true );
	wp_enqueue_script( 'all', get_template_directory_uri() . '/js' . $build . '/all' . $suffix . '.js', array( 'jquery' ), '5.6.3', true );
    wp_enqueue_script( 'v4-shims', get_template_directory_uri() . '/js' . $build . '/v4-shims' . $suffix . '.js', array( 'jquery' ), '5.6.3', true );
	
	wp_register_script( 'education-zone-custom', get_template_directory_uri() . '/js' . $build . '/custom' . $suffix . '.js', array('jquery'), EDUCATION_ZONE_THEME_VERSION, true );
    
	$custom_array = array('rtl' => is_rtl(), );
	
	wp_localize_script( 'education-zone-custom', 'education_zone_data', $custom_array );
	wp_enqueue_script( 'education-zone-custom' );
    
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	wp_enqueue_script( 'popper', get_template_directory_uri() . '/js/popper.min.js');
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js');
	wp_enqueue_script( 'jquery-cookie', get_template_directory_uri() . '/js/jquery.cookie.js');
	wp_enqueue_script( 'magnific', get_template_directory_uri() . '/js/jquery.magnific-popup.js');
	if ( is_page_template( 'dealer.php' ) ) {
		wp_enqueue_script('dealer', get_template_directory_uri() . '/js/dealer.js');
	}

}
add_action( 'wp_enqueue_scripts', 'education_zone_scripts' );

if( ! function_exists( 'education_zone_customize_scripts' ) ) :
/**
 * Enqueue admin scripts and styles.
*/
function education_zone_customize_scripts() {
	wp_enqueue_style( 'education-zone-customize-style',get_template_directory_uri().'/inc/css/customize.css', '', EDUCATION_ZONE_THEME_VERSION );
	wp_enqueue_script( 'education-zone-customize-js', get_template_directory_uri().'/inc/js/customize.js', array( 'jquery' ), EDUCATION_ZONE_THEME_VERSION, true );
}
endif;
add_action( 'customize_controls_enqueue_scripts', 'education_zone_customize_scripts' );

if( ! function_exists( 'education_zone_admin_scripts' ) ) :
/**
 * Enqueue admin scripts and styles.
*/
function education_zone_admin_scripts(){
    wp_enqueue_style( 'education-zone-admin', get_template_directory_uri() . '/inc/css/admin.css', '', EDUCATION_ZONE_THEME_VERSION );
}
endif; 
add_action( 'admin_enqueue_scripts', 'education_zone_admin_scripts' );

if( ! function_exists( 'education_zone_admin_notice' ) ) :
/**
 * Addmin notice for getting started page
*/
function education_zone_admin_notice(){
    global $pagenow;
    $theme_args      = wp_get_theme();
    $meta            = get_option( 'education_zone_admin_notice' );
    $name            = $theme_args->__get( 'Name' );
    $current_screen  = get_current_screen();
    
    if( 'themes.php' == $pagenow && !$meta ){
        
        if( $current_screen->id !== 'dashboard' && $current_screen->id !== 'themes' ){
            return;
        }

        if( is_network_admin() ){
            return;
        }

        if( ! current_user_can( 'manage_options' ) ){
            return;
        } ?>

        <div class="welcome-message notice notice-info">
            <div class="notice-wrapper">
                <div class="notice-text">
                    <h3><?php esc_html_e( 'Congratulations!', 'education-zone' ); ?></h3>
                    <p><?php printf( __( '%1$s is now installed and ready to use. Click below to see theme documentation, plugins to install and other details to get started.', 'education-zone' ), esc_html( $name ) ); ?></p>
                    <p><a href="<?php echo esc_url( admin_url( 'themes.php?page=education-zone-getting-started' ) ); ?>" class="button button-primary"><?php esc_html_e( 'Go to the getting started.', 'education-zone' ); ?></a></p>
                    <p class="dismiss-link"><strong><a href="?education_zone_admin_notice=1"><?php esc_html_e( 'Dismiss', 'education-zone' ); ?></a></strong></p>
                </div>
            </div>
        </div>
    <?php }
}
endif;
add_action( 'admin_notices', 'education_zone_admin_notice' );

if( ! function_exists( 'education_zone_update_admin_notice' ) ) :
/**
 * Updating admin notice on dismiss
*/
function education_zone_update_admin_notice(){
    if ( isset( $_GET['education_zone_admin_notice'] ) && $_GET['education_zone_admin_notice'] = '1' ) {
        update_option( 'education_zone_admin_notice', true );
    }
}
endif;
add_action( 'admin_init', 'education_zone_update_admin_notice' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Custom functions for meta box.
 */
require get_template_directory() . '/inc/metabox.php';

/**
 * Recent Post Widget.
*/ 
require get_template_directory() . '/inc/widget-recent-post.php';

/**
 * Popular Post Widget.
*/ 
require get_template_directory() . '/inc/widget-popular-post.php';

/**
 * Social Links Widget.
*/ 
require get_template_directory() . '/inc/widget-social-links.php';

/**
 * Getting Started
*/
require get_template_directory() . '/inc/getting-started/getting-started.php';

/**
 * Info Section
 */
require get_template_directory() . '/inc/info.php';

/**
 * WooCommerce Related funcitons
*/
if( education_zone_is_woocommerce_activated() )
require get_template_directory() . '/inc/woocommerce-functions.php';

/**
 * Plugin Recommendation
*/
require get_template_directory() . '/inc/tgmpa/recommended-plugins.php';


//add_filter( 'wpm_post_post_config', '__return_null' );

/* hidden add to card button */
//	remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart');
//remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );

add_action( 'wp_enqueue_scripts', 'addcssAndScripts');
function addcssAndScripts()
{
	if ( is_front_page() )
	{
		wp_enqueue_script( 'slick-js', get_template_directory_uri() . '/slick/slick.js', true );

		wp_enqueue_style( 'slick-css', get_template_directory_uri().'/slick/slick.css' );
		wp_enqueue_style( 'slick-theme-css', get_template_directory_uri().'/slick/slick-theme.css' );

	}
}

/* custom admin menu bar */
function add_retailer_sendout_admin_menu() {
	$slug = 'post.php?post=249&action=edit';

	add_menu_page( 'About Makita Vietnam', 'About Makita Vietnam', 'edit_pages', $slug,
		'', 'dashicons-admin-page', 25   );
}
add_action( 'admin_menu', 'add_retailer_sendout_admin_menu' );

remove_filter( 'sanitize_title', 'sanitize_title_with_dashes' );

add_action('admin_menu', 'policy_menu');
function policy_menu(){
	$slug_1 = 'post.php?post=405&action=edit';
	$slug_2 = 'post.php?post=408&action=edit';
	$title_1 = get_the_title(405);
	$title_2 = get_the_title(408);
	$main_icon_url = get_template_directory_uri().'/images/privacy-policy-20.png';
    add_menu_page(__('Warranty Policy','education-zone'), __('Warranty Policy','education-zone'), 'edit_pages', $slug_1, '',$main_icon_url,25 );
    add_submenu_page($slug_1, $title_1, $title_1, 'manage_options', $slug_1 );
    add_submenu_page($slug_1, $title_1, $title_2, 'manage_options', $slug_2 );
}
/*custom category subsidiaries */

function subsidiary_taxonomy() {
 
        /* Biến $label chứa các tham số thiết lập tên hiển thị của Taxonomy
         */
        $labels = array(
                'name' => 'Subsidiary categories',
                'singular' => 'Subsidiary category',
                'menu_name' => 'Subsidiary categories'
        );
 
        /* Biến $args khai báo các tham số trong custom taxonomy cần tạo
         */
        $args = array(
                'labels'                     => $labels,
                'hierarchical'               => true,
                'public'                     => true,
                'show_ui'                    => true,
                'show_admin_column'          => true,
                'show_in_nav_menus'          => true,
                'show_tagcloud'              => true,
        );
 
        /* Hàm register_taxonomy để khởi tạo taxonomy
         */
        register_taxonomy('subsidiary-category', 'subsidiary', $args);
 
}
 
// Hook into the 'init' action
add_action( 'init', 'subsidiary_taxonomy', 0 );

/*custom category Dealers */

function dealer_taxonomy() {
 
        /* Biến $label chứa các tham số thiết lập tên hiển thị của Taxonomy
         */
        $labels = array(
                'name' => 'Dealer Region',
                'singular' => 'Dealer Region',
                'menu_name' => 'Dealer Region',
                
        );
 
        /* Biến $args khai báo các tham số trong custom taxonomy cần tạo
         */
        $args = array(
                'labels'                     => $labels,
                'hierarchical'               => true,
                'public'                     => true,
                'show_ui'                    => true,
                'show_admin_column'          => true,
                'show_in_nav_menus'          => true,
                'show_tagcloud'              => true,
        );
 
        /* Hàm register_taxonomy để khởi tạo taxonomy
         */
        register_taxonomy('dealer-region-category', 'dealer', $args);


        /* Biến $label chứa các tham số thiết lập tên hiển thị của Taxonomy
         */
        $labels_type = array(
                'name' => 'Dealer type',
                'singular' => 'Dealer type',
                'menu_name' => 'Dealer type'
        );
 
        /* Biến $args khai báo các tham số trong custom taxonomy cần tạo
         */
        $args_type = array(
                'labels'                     => $labels_type,
                'hierarchical'               => true,
                'public'                     => true,
                'show_ui'                    => true,
                'show_admin_column'          => true,
                'show_in_nav_menus'          => true,
                'show_tagcloud'              => true,
        );
 
        /* Hàm register_taxonomy để khởi tạo taxonomy
         */
        register_taxonomy('dealer-type-category', 'dealer', $args_type);
 
}
 
// Hook into the 'init' action
add_action( 'init', 'dealer_taxonomy' );


add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}

//add custom thumnail size
add_image_size('news-size',300,120, array('center','center'));

//get distance between 2 location

function distance($lat1, $lon1, $lat2, $lon2) {

	$pi80 = M_PI / 180;
	$lat1 *= $pi80;
	$lon1 *= $pi80;
	$lat2 *= $pi80;
	$lon2 *= $pi80;

	$r = 6371 ;//6372.797; // mean radius of Earth in km
	$dlat = $lat2 - $lat1;
	$dlon = $lon2 - $lon1;
	$a = sin($dlat / 2) * sin($dlat / 2) + cos($lat1) * cos($lat2) * sin($dlon / 2) * sin($dlon / 2);
	$c = 2 * atan2(sqrt($a), sqrt(1 - $a));
	$km = $r * $c;

	//echo '<br/>'.$km;
	return round($km);
}

// Ham tao phan trang
function ct_pagination($pages = '', $range = 2)
{
	$showitems = ($range * 2)+1;
	global $paged;
	if(empty($paged)) $paged = 1;
	if($pages == '')
	{
		global $wp_query;
		$pages = $wp_query->max_num_pages;
		if(!$pages)
		{
			$pages = 1;
		}
	}
	if(1 != $pages)
	{
		echo "<nav aria-label='Page navigation'>  <ul class='pagination m-0 justify-content-center '>";
		// if($paged > 1 && $paged > $range+1 && $showitems < $pages)
		// 	echo "<li class='page-item'><a class='page-link' href='".get_pagenum_link(1)."'><i class=\"fa fa-angle-double-left\" aria-hidden=\"true\"></i></a></li>";
			
		if($paged > 1 && $showitems < $pages){
			echo "<li class='page-item'><a class='page-link' href='".get_pagenum_link(1)."'><i class=\"fa fa-angle-double-left\" aria-hidden=\"true\"></i></a></li>";
			echo "<li class='page-item'><a class='page-link' href='".get_pagenum_link($paged - 1)."'><i class=\"fa fa-angle-left\" aria-hidden=\"true\"></i></a></li>";
		}
		for ($i=1; $i <= $pages; $i++)
		{
			if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
			{
				echo ($paged == $i)? "<li class=\"page-item active\"><a class='page-link'>".$i."</a></li>":"<li class='page-item'> <a href='".get_pagenum_link($i)."' class=\"page-link\">".$i."</a></li>";
			}
		}
		if ($paged < $pages && $showitems < $pages){
			echo " <li class='page-item'><a class='page-link' href=\"".get_pagenum_link($paged + 1)."\"><i class=\"fa fa-angle-right\" aria-hidden=\"true\"></i></a></li>";
		echo " <li class='page-item'><a class='page-link' href='".get_pagenum_link($pages)."'><i class=\"fa fa-angle-double-right\" aria-hidden=\"true\"></i></a></li>";
		echo "</ul></nav>\n";
		} 
		// if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo " <li class='page-item'><a class='page-link' href='".get_pagenum_link($pages)."'><i class=\"fa fa-angle-double-right\" aria-hidden=\"true\"></i></a></li>";
		// echo "</ul></nav>\n";
	}
}
add_filter( 'relevanssi_block_one_letter_searches', '__return_false' );

function my_easymail_add_subscriber ( $cf7 ) {
	$submission = WPCF7_Submission::get_instance();
	$data = $submission->get_posted_data();

	$fields['email'] = $data["email-newsletter"];
	if ( function_exists ('alo_em_add_subscriber') && is_email( $fields['email'] ) )
	{
		alo_em_add_subscriber( $fields, 1, alo_em_get_language(true) );
	}
	return $cf7;
}
add_action( 'wpcf7_before_send_mail', 'my_easymail_add_subscriber' );




//translate accessory admin
add_filter( 'post_type_labels_accessory', 'accessory_rename_labels' );

/**
* Rename default post type to accessory
*
* @param object $labels
* @hooked post_type_labels_post
* @return object $labels
*/
function accessory_rename_labels( $labels )
{
    # Labels
    $labels->name = __('Accessory','education-zone');
    $labels->singular_name = __('Accessory','education-zone');
    $labels->add_new = __('Add Accessory','education-zone');
    $labels->add_new_item = __('Add Accessory','education-zone');
    $labels->edit_item = __('Edit Accessory','education-zone');
    $labels->new_item = __('New Accessory','education-zone');
    $labels->view_item = __('View Accessory','education-zone');
    $labels->view_items = __('View Accessory','education-zone');
    $labels->search_items = __('Search Accessory','education-zone');
    $labels->not_found = __('No Accessory found.','education-zone');
    $labels->not_found_in_trash = __('No Accessory found in Trash.','education-zone');
    $labels->parent_item_colon = __('Parent Accessory','education-zone'); // Not for "post"
    $labels->archives = __('Accessory Archives','education-zone');
    $labels->attributes = __('Accessory Attributes','education-zone');
    $labels->insert_into_item = __('Insert into Accessory','education-zone');
    $labels->uploaded_to_this_item = __('Uploaded to this Accessory','education-zone');
    $labels->featured_image = __('Featured Image','education-zone');
    $labels->set_featured_image = __('Set featured image','education-zone');
    $labels->remove_featured_image = __('Remove featured image','education-zone');
    $labels->use_featured_image = __('Use as featured image','education-zone');
    $labels->filter_items_list = __('Filter Accessory list','education-zone');
    $labels->items_list_navigation = __('Accessory list navigation','education-zone');
    $labels->items_list = __('Accessory list','education-zone');

    # Menu
    $labels->menu_name = __('Accessories','education-zone');
    $labels->all_items = __('All Accessories','education-zone');
    $labels->name_admin_bar = __('Accessory','education-zone');

    return $labels;
}


//translate branch admin
add_filter( 'post_type_labels_branch', 'branch_rename_labels' );

/**
* Rename default post type to branch
*
* @param object $labels
* @hooked post_type_labels_post
* @return object $labels
*/
function branch_rename_labels( $labels )
{
    # Labels
    $labels->name = __('Branch','education-zone');
    $labels->singular_name = __('Branch','education-zone');
    $labels->add_new = __('Add Branch','education-zone');
    $labels->add_new_item = __('Add Branch','education-zone');
    $labels->edit_item = __('Edit Branch','education-zone');
    $labels->new_item = __('New Branch','education-zone');
    $labels->view_item = __('View Branch','education-zone');
    $labels->view_items = __('View Branch','education-zone');
    $labels->search_items = __('Search Branch','education-zone');
    $labels->not_found = __('No Branch found.','education-zone');
    $labels->not_found_in_trash = __('No Branch found in Trash.','education-zone');
    $labels->parent_item_colon = __('Parent Branch','education-zone'); // Not for "post"
    $labels->archives = __('Branch Archives','education-zone');
    $labels->attributes = __('Branch Attributes','education-zone');
    $labels->insert_into_item = __('Insert into Branch','education-zone');
    $labels->uploaded_to_this_item = __('Uploaded to this Branch','education-zone');
    $labels->featured_image = __('Featured Image','education-zone');
    $labels->set_featured_image = __('Set featured image','education-zone');
    $labels->remove_featured_image = __('Remove featured image','education-zone');
    $labels->use_featured_image = __('Use as featured image','education-zone');
    $labels->filter_items_list = __('Filter Branch list','education-zone');
    $labels->items_list_navigation = __('Branch list navigation','education-zone');
    $labels->items_list = __('Branch list','education-zone');

    # Menu
    $labels->menu_name = __('Branches','education-zone');
    $labels->all_items = __('All Branches','education-zone');
    $labels->name_admin_bar = __('Branch','education-zone');

    return $labels;
}


//translate catalog admin
add_filter( 'post_type_labels_catalog', 'catalog_rename_labels' );

/**
* Rename default post type to catalog
*
* @param object $labels
* @hooked post_type_labels_post
* @return object $labels
*/
function catalog_rename_labels( $labels )
{
    # Labels
    $labels->name = __('Catalog','education-zone');
    $labels->singular_name = __('Catalog','education-zone');
    $labels->add_new = __('Add Catalog','education-zone');
    $labels->add_new_item = __('Add Catalog','education-zone');
    $labels->edit_item = __('Edit Catalog','education-zone');
    $labels->new_item = __('New Catalog','education-zone');
    $labels->view_item = __('View Catalog','education-zone');
    $labels->view_items = __('View Catalog','education-zone');
    $labels->search_items = __('Search Catalog','education-zone');
    $labels->not_found = __('No Catalog found.','education-zone');
    $labels->not_found_in_trash = __('No Catalog found in Trash.','education-zone');
    $labels->parent_item_colon = __('Parent Catalog','education-zone'); // Not for "post"
    $labels->archives = __('Catalog Archives','education-zone');
    $labels->attributes = __('Catalog Attributes','education-zone');
    $labels->insert_into_item = __('Insert into Catalog','education-zone');
    $labels->uploaded_to_this_item = __('Uploaded to this Catalog','education-zone');
    $labels->featured_image = __('Featured Image','education-zone');
    $labels->set_featured_image = __('Set featured image','education-zone');
    $labels->remove_featured_image = __('Remove featured image','education-zone');
    $labels->use_featured_image = __('Use as featured image','education-zone');
    $labels->filter_items_list = __('Filter Catalog list','education-zone');
    $labels->items_list_navigation = __('Catalog list navigation','education-zone');
    $labels->items_list = __('Catalog list','education-zone');

    # Menu
    $labels->menu_name = __('Catalogs','education-zone');
    $labels->all_items = __('All Catalogs','education-zone');
    $labels->name_admin_bar = __('Catalog','education-zone');

    return $labels;
}


//translate dealer admin
add_filter( 'post_type_labels_dealer', 'dealer_rename_labels' );

/**
* Rename default post type to dealer
*
* @param object $labels
* @hooked post_type_labels_post
* @return object $labels
*/
function dealer_rename_labels( $labels )
{
    # Labels
    $labels->name = __('Dealer','education-zone');
    $labels->singular_name = __('Dealer','education-zone');
    $labels->add_new = __('Add Dealer','education-zone');
    $labels->add_new_item = __('Add Dealer','education-zone');
    $labels->edit_item = __('Edit Dealer','education-zone');
    $labels->new_item = __('New Dealer','education-zone');
    $labels->view_item = __('View Dealer','education-zone');
    $labels->view_items = __('View Dealer','education-zone');
    $labels->search_items = __('Search Dealer','education-zone');
    $labels->not_found = __('No Dealer found.','education-zone');
    $labels->not_found_in_trash = __('No Dealer found in Trash.','education-zone');
    $labels->parent_item_colon = __('Parent Dealer','education-zone'); // Not for "post"
    $labels->archives = __('Dealer Archives','education-zone');
    $labels->attributes = __('Dealer Attributes','education-zone');
    $labels->insert_into_item = __('Insert into Dealer','education-zone');
    $labels->uploaded_to_this_item = __('Uploaded to this Dealer','education-zone');
    $labels->featured_image = __('Featured Image','education-zone');
    $labels->set_featured_image = __('Set featured image','education-zone');
    $labels->remove_featured_image = __('Remove featured image','education-zone');
    $labels->use_featured_image = __('Use as featured image','education-zone');
    $labels->filter_items_list = __('Filter Dealer list','education-zone');
    $labels->items_list_navigation = __('Dealer list navigation','education-zone');
    $labels->items_list = __('Dealer list','education-zone');

    # Menu
    $labels->menu_name = __('Dealers','education-zone');
    $labels->all_items = __('All Dealers','education-zone');
    $labels->name_admin_bar = __('Dealer','education-zone');

    return $labels;
}


//translate news admin
add_filter( 'post_type_labels_news', 'news_rename_labels' );

/**
* Rename default post type to news
*
* @param object $labels
* @hooked post_type_labels_post
* @return object $labels
*/
function news_rename_labels( $labels )
{
    # Labels
    $labels->name = __('News','education-zone');
    $labels->singular_name = __('News','education-zone');
    $labels->add_new = __('Add News','education-zone');
    $labels->add_new_item = __('Add News','education-zone');
    $labels->edit_item = __('Edit News','education-zone');
    $labels->new_item = __('New News','education-zone');
    $labels->view_item = __('View News','education-zone');
    $labels->view_items = __('View News','education-zone');
    $labels->search_items = __('Search News','education-zone');
    $labels->not_found = __('No News found.','education-zone');
    $labels->not_found_in_trash = __('No News found in Trash.','education-zone');
    $labels->parent_item_colon = __('Parent News','education-zone'); // Not for "post"
    $labels->archives = __('News Archives','education-zone');
    $labels->attributes = __('News Attributes','education-zone');
    $labels->insert_into_item = __('Insert into News','education-zone');
    $labels->uploaded_to_this_item = __('Uploaded to this News','education-zone');
    $labels->featured_image = __('Featured Image','education-zone');
    $labels->set_featured_image = __('Set featured image','education-zone');
    $labels->remove_featured_image = __('Remove featured image','education-zone');
    $labels->use_featured_image = __('Use as featured image','education-zone');
    $labels->filter_items_list = __('Filter News list','education-zone');
    $labels->items_list_navigation = __('News list navigation','education-zone');
    $labels->items_list = __('News list','education-zone');

    # Menu
    $labels->menu_name = __('List of News','education-zone');
    $labels->all_items = __('All List of News','education-zone');
    $labels->name_admin_bar = __('News','education-zone');

    return $labels;
}


//translate product admin
add_filter( 'post_type_labels_product', 'product_rename_labels' );

/**
* Rename default post type to product
*
* @param object $labels
* @hooked post_type_labels_post
* @return object $labels
*/
function product_rename_labels( $labels )
{
    # Labels
    $labels->name = __('Product','education-zone');
    $labels->singular_name = __('Product','education-zone');
    $labels->add_new = __('Add Product','education-zone');
    $labels->add_new_item = __('Add Product','education-zone');
    $labels->edit_item = __('Edit Product','education-zone');
    $labels->new_item = __('New Product','education-zone');
    $labels->view_item = __('View Product','education-zone');
    $labels->view_items = __('View Product','education-zone');
    $labels->search_items = __('Search Product','education-zone');
    $labels->not_found = __('No Product found.','education-zone');
    $labels->not_found_in_trash = __('No Product found in Trash.','education-zone');
    $labels->parent_item_colon = __('Parent Product','education-zone'); // Not for "post"
    $labels->archives = __('Product Archives','education-zone');
    $labels->attributes = __('Product Attributes','education-zone');
    $labels->insert_into_item = __('Insert into Product','education-zone');
    $labels->uploaded_to_this_item = __('Uploaded to this Product','education-zone');
    $labels->featured_image = __('Featured Image','education-zone');
    $labels->set_featured_image = __('Set featured image','education-zone');
    $labels->remove_featured_image = __('Remove featured image','education-zone');
    $labels->use_featured_image = __('Use as featured image','education-zone');
    $labels->filter_items_list = __('Filter Product list','education-zone');
    $labels->items_list_navigation = __('Product list navigation','education-zone');
    $labels->items_list = __('Product list','education-zone');

    # Menu
    $labels->menu_name = __('Products','education-zone');
    $labels->all_items = __('All Products','education-zone');
    $labels->name_admin_bar = __('Product','education-zone');

    return $labels;
}


//translate popular product admin
add_filter( 'post_type_labels_product_popular', 'popular_product_rename_labels' );

/**
* Rename default post type to popular product
*
* @param object $labels
* @hooked post_type_labels_post
* @return object $labels
*/
function popular_product_rename_labels( $labels )
{
    # Labels
    $labels->name = __('Popular Product','education-zone');
    $labels->singular_name = __('Popular Product','education-zone');
    $labels->add_new = __('Add Popular Product','education-zone');
    $labels->add_new_item = __('Add Popular Product','education-zone');
    $labels->edit_item = __('Edit Popular Product','education-zone');
    $labels->new_item = __('New Popular Product','education-zone');
    $labels->view_item = __('View Popular Product','education-zone');
    $labels->view_items = __('View Popular Product','education-zone');
    $labels->search_items = __('Search Popular Product','education-zone');
    $labels->not_found = __('No Popular Product found.','education-zone');
    $labels->not_found_in_trash = __('No Popular Product found in Trash.','education-zone');
    $labels->parent_item_colon = __('Parent Popular Product','education-zone'); // Not for "post"
    $labels->archives = __('Popular Product Archives','education-zone');
    $labels->attributes = __('Popular Product Attributes','education-zone');
    $labels->insert_into_item = __('Insert into Popular Product','education-zone');
    $labels->uploaded_to_this_item = __('Uploaded to this Popular Product','education-zone');
    $labels->featured_image = __('Featured Image','education-zone');
    $labels->set_featured_image = __('Set featured image','education-zone');
    $labels->remove_featured_image = __('Remove featured image','education-zone');
    $labels->use_featured_image = __('Use as featured image','education-zone');
    $labels->filter_items_list = __('Filter Popular Product list','education-zone');
    $labels->items_list_navigation = __('Popular Product list navigation','education-zone');
    $labels->items_list = __('Popular Product list','education-zone');

    # Menu
    $labels->menu_name = __('Popular Products','education-zone');
    $labels->all_items = __('All Popular Products','education-zone');
    $labels->name_admin_bar = __('Popular Product','education-zone');

    return $labels;
}


//translate subsidiary admin
add_filter( 'post_type_labels_subsidiary', 'subsidiary_rename_labels' );

/**
* Rename default post type to subsidiary
*
* @param object $labels
* @hooked post_type_labels_post
* @return object $labels
*/
function subsidiary_rename_labels( $labels )
{
    # Labels
    $labels->name = __('Subsidiary','education-zone');
    $labels->singular_name = __('Subsidiary','education-zone');
    $labels->add_new = __('Add Subsidiary','education-zone');
    $labels->add_new_item = __('Add Subsidiary','education-zone');
    $labels->edit_item = __('Edit Subsidiary','education-zone');
    $labels->new_item = __('New Subsidiary','education-zone');
    $labels->view_item = __('View Subsidiary','education-zone');
    $labels->view_items = __('View Subsidiary','education-zone');
    $labels->search_items = __('Search Subsidiary','education-zone');
    $labels->not_found = __('No Subsidiary found.','education-zone');
    $labels->not_found_in_trash = __('No Subsidiary found in Trash.','education-zone');
    $labels->parent_item_colon = __('Parent Subsidiary','education-zone'); // Not for "post"
    $labels->archives = __('Subsidiary Archives','education-zone');
    $labels->attributes = __('Subsidiary Attributes','education-zone');
    $labels->insert_into_item = __('Insert into Subsidiary','education-zone');
    $labels->uploaded_to_this_item = __('Uploaded to this Subsidiary','education-zone');
    $labels->featured_image = __('Featured Image','education-zone');
    $labels->set_featured_image = __('Set featured image','education-zone');
    $labels->remove_featured_image = __('Remove featured image','education-zone');
    $labels->use_featured_image = __('Use as featured image','education-zone');
    $labels->filter_items_list = __('Filter Subsidiary list','education-zone');
    $labels->items_list_navigation = __('Subsidiary list navigation','education-zone');
    $labels->items_list = __('Subsidiary list','education-zone');

    # Menu
    $labels->menu_name = __('Subsidiaries','education-zone');
    $labels->all_items = __('All Subsidiaries','education-zone');
    $labels->name_admin_bar = __('Subsidiary','education-zone');

    return $labels;
}


//translate technology admin
add_filter( 'post_type_labels_technology', 'technology_rename_labels' );

/**
* Rename default post type to technology
*
* @param object $labels
* @hooked post_type_labels_post
* @return object $labels
*/
function technology_rename_labels( $labels )
{
    # Labels
    $labels->name = __('Technology','education-zone');
    $labels->singular_name = __('Technology','education-zone');
    $labels->add_new = __('Add Technology','education-zone');
    $labels->add_new_item = __('Add Technology','education-zone');
    $labels->edit_item = __('Edit Technology','education-zone');
    $labels->new_item = __('New Technology','education-zone');
    $labels->view_item = __('View Technology','education-zone');
    $labels->view_items = __('View Technology','education-zone');
    $labels->search_items = __('Search Technology','education-zone');
    $labels->not_found = __('No Technology found.','education-zone');
    $labels->not_found_in_trash = __('No Technology found in Trash.','education-zone');
    $labels->parent_item_colon = __('Parent Technology','education-zone'); // Not for "post"
    $labels->archives = __('Technology Archives','education-zone');
    $labels->attributes = __('Technology Attributes','education-zone');
    $labels->insert_into_item = __('Insert into Technology','education-zone');
    $labels->uploaded_to_this_item = __('Uploaded to this Technology','education-zone');
    $labels->featured_image = __('Featured Image','education-zone');
    $labels->set_featured_image = __('Set featured image','education-zone');
    $labels->remove_featured_image = __('Remove featured image','education-zone');
    $labels->use_featured_image = __('Use as featured image','education-zone');
    $labels->filter_items_list = __('Filter Technology list','education-zone');
    $labels->items_list_navigation = __('Technology list navigation','education-zone');
    $labels->items_list = __('Technology list','education-zone');

    # Menu
    $labels->menu_name = __('Technologies','education-zone');
    $labels->all_items = __('All Technologies','education-zone');
    $labels->name_admin_bar = __('Technology','education-zone');

    return $labels;
}

function dealer_region_change_cat_object() {
    global $wp_taxonomies;
    $labels = &$wp_taxonomies['dealer-region-category']->labels;
    $labels->name = __('Dealer Region','education-zone');
    $labels->singular_name = __('Dealer Region','education-zone');
    $labels->add_new = __('Add Dealer Region','education-zone');
    $labels->add_new_item = __('Add Dealer Region','education-zone');
    $labels->edit_item = __('Edit Dealer Region','education-zone');
    $labels->new_item = __('Dealer Region','education-zone');
    $labels->view_item = __('View Dealer Region','education-zone');
    $labels->search_items = __('Search Dealer Regions','education-zone');
    $labels->not_found = __('No Dealer Regions found','education-zone');
    $labels->not_found_in_trash = __('No Dealer Regions found in Trash.','education-zone');
    $labels->all_items = __('All Dealer Regions','education-zone');
    $labels->menu_name = __('Dealer Regions','education-zone');
    $labels->name_admin_bar = __('Dealer Regions','education-zone');
}
add_action( 'init', 'dealer_region_change_cat_object' );

function dealer_type_change_cat_object() {
    global $wp_taxonomies;
    $labels = &$wp_taxonomies['dealer-type-category']->labels;
    $labels->name = __('Dealer Type','education-zone');
    $labels->singular_name = __('Dealer Type','education-zone');
    $labels->add_new = __('Add Dealer Type','education-zone');
    $labels->add_new_item = __('Add Dealer Type','education-zone');
    $labels->edit_item = __('Edit Dealer Type','education-zone');
    $labels->new_item = __('Dealer Type','education-zone');
    $labels->view_item = __('View Dealer Type','education-zone');
    $labels->search_items = __('Search Dealer Types','education-zone');
    $labels->not_found = __('No Dealer Types found','education-zone');
    $labels->not_found_in_trash = __('No Dealer Types found in Trash.','education-zone');
    $labels->all_items = __('All Dealer Types','education-zone');
    $labels->menu_name = __('Dealer Types','education-zone');
    $labels->name_admin_bar = __('Dealer Types','education-zone');
}
add_action( 'init', 'dealer_type_change_cat_object' );


function subsidiary_change_cat_object() {
    global $wp_taxonomies;
    $labels = &$wp_taxonomies['subsidiary-category']->labels;
    $labels->name = __('Subsidiary category','education-zone');
    $labels->singular_name = __('Subsidiary category','education-zone');
    $labels->add_new = __('Add Subsidiary category','education-zone');
    $labels->add_new_item = __('Add Subsidiary category','education-zone');
    $labels->edit_item = __('Edit Subsidiary category','education-zone');
    $labels->new_item = __('Subsidiary category','education-zone');
    $labels->view_item = __('View Subsidiary category','education-zone');
    $labels->search_items = __('Search Subsidiary categories','education-zone');
    $labels->not_found = __('No Subsidiary categories found','education-zone');
    $labels->not_found_in_trash = __('No Subsidiary categories found in Trash.','education-zone');
    $labels->all_items = __('All Subsidiary categories','education-zone');
    $labels->menu_name = __('Subsidiary categories','education-zone');
    $labels->name_admin_bar = __('Subsidiary categories','education-zone');
}
add_action( 'init', 'subsidiary_change_cat_object' );