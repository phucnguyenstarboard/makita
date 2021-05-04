<?php
function cfashionstore_lite_customize_register($wp_customize){
     $wp_customize->add_section('cfashionstore_lite_banner', array(
        'title'    => esc_html__('cfashionstore Lite Home banner Text', 'cfashionstore-lite'),
        'description' => esc_html__('add home banner text here.','cfashionstore-lite'),
        'priority' => 35,
    ));

	$wp_customize->add_section('cfashionstore_lite_footer', array(
        'title'    => esc_html__('cfashionstore Lite Footer', 'cfashionstore-lite'),
        'description' => '',
        'priority' => 36,
    ));

     $wp_customize->add_section('cfashionstore_lite_social', array(
        'title'    => esc_html__('CFashionStore Lite Footer Social Link', 'cfashionstore-lite'),
        'description' => '',
        'priority' => 37,
    ));
 
    //  =============================
    //  = Text Input phone number                =
    //  =============================
    $wp_customize->add_setting('cfashionstore_lite_phone', array(
        'default'        => '',
		'sanitize_callback' => 'sanitize_text_field'
    ));
 
    $wp_customize->add_control('cfashionstore_lite_phone', array(
        'label'      => esc_html__('Phone Number', 'cfashionstore-lite'),
        'section'    => 'cfashionstore_lite_header',
        'setting'   => 'cfashionstore_lite_phone',
		'type'    => 'number'
    ));
	
		
	//  =============================
    //  = Text Input facebook                =
    //  =============================
    $wp_customize->add_setting('cfashionstore_lite_fb', array(
        'default'        => '',
		'sanitize_callback' => 'esc_url_raw'
    ));
 
    $wp_customize->add_control('cfashionstore_lite_fb', array(
        'label'      => esc_html__('Facebook', 'cfashionstore-lite'),
        'section'    => 'cfashionstore_lite_social',
        'setting'   => 'cfashionstore_lite_fb',
    ));
	//  =============================
    //  = Text Input Twitter                =
    //  =============================
    $wp_customize->add_setting('cfashionstore_lite_twitter', array(
        'default'        => '',
		'sanitize_callback' => 'esc_url_raw'
    ));
 
    $wp_customize->add_control('cfashionstore_lite_twitter', array(
        'label'      => esc_html__('Twitter', 'cfashionstore-lite'),
        'section'    => 'cfashionstore_lite_social',
        'setting'   => 'cfashionstore_lite_twitter',
    ));
	//  =============================
    //  = Text Input googleplus                =
    //  =============================
    $wp_customize->add_setting('cfashionstore_lite_youtube', array(
        'default'        => '',
		'sanitize_callback' => 'esc_url_raw'
    ));
 
    $wp_customize->add_control('cfashionstore_lite_youtube', array(
        'label'      => esc_html__('Youtube', 'cfashionstore-lite'),
        'section'    => 'cfashionstore_lite_social',
        'setting'   => 'cfashionstore_lite_youtube',
    ));
	//  =============================
    //  = Text Input linkedin                =
    //  =============================
    $wp_customize->add_setting('cfashionstore_lite_in', array(
        'default'        => '',
		'sanitize_callback' => 'esc_url_raw'
    ));
 
    $wp_customize->add_control('cfashionstore_lite_in', array(
        'label'      => esc_html__('Linkedin', 'cfashionstore-lite'),
        'section'    => 'cfashionstore_lite_social',
        'setting'   => 'cfashionstore_lite_in',
    ));
	
	//  =============================
    //  = slider section              =
    //  =============================
   
// Banner heading Text
    $wp_customize->add_setting('banner_heading',array(
            'default'   => null,
            'sanitize_callback' => 'sanitize_text_field'    
    ));
    
    $wp_customize->add_control('banner_heading',array( 
            'type'  => 'text',
            'label' => esc_html__('Add Banner heading here','cfashionstore-lite'),
            'section'   => 'cfashionstore_lite_banner',
            'setting'   => 'banner_heading'
    )); // Banner heading Text

    // Banner heading Text
    $wp_customize->add_setting('banner_sub_heading',array(
            'default'   => null,
            'sanitize_callback' => 'sanitize_text_field'    
    ));
    
    $wp_customize->add_control('banner_sub_heading',array( 
            'type'  => 'text',
            'label' => esc_html__('Add Banner sub heading here','cfashionstore-lite'),
            'section'   => 'cfashionstore_lite_banner',
            'setting'   => 'banner_sub_heading'
    )); // Banner heading Text

    //banner shop text
    $wp_customize->add_setting('banner_readmore_text',array(
            'default'   => null,
            'sanitize_callback' => 'sanitize_text_field'    
    ));
    
    $wp_customize->add_control('banner_readmore_text',array( 
            'type'  => 'text',
            'label' => esc_html__('Add Read More text here','cfashionstore-lite'),
            'section'   => 'cfashionstore_lite_banner',
            'setting'   => 'banner_readmore_text'
    )); // Banner shop text

    //banner shop link
     $wp_customize->add_setting('banner_read_more_link', array(
        'default'        => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
 
    $wp_customize->add_control('banner_read_more_link', array(
        'label'      => esc_html__('Add Read More link here', 'cfashionstore-lite'),
        'section'    => 'cfashionstore_lite_banner',
        'setting'   => 'banner_read_more_link',
    ));

  //  =============================
    //  = Footer              =
    //  =============================
	
	// Footer design and developed
	 $wp_customize->add_setting('cfashionstore_lite_design', array(
        'default'        => '',
		'sanitize_callback' => 'sanitize_textarea_field'
    ));
 
    $wp_customize->add_control('cfashionstore_lite_design', array(
        'label'      => esc_html__('Design and developed', 'cfashionstore-lite'),
        'section'    => 'cfashionstore_lite_footer',
        'setting'   => 'cfashionstore_lite_design',
		'type'	   =>'textarea'
    ));
	// Footer copyright
	 $wp_customize->add_setting('cfashionstore_lite_copyright', array(
        'default'        => '',
		'sanitize_callback' => 'sanitize_textarea_field'       
    ));
 
    $wp_customize->add_control('cfashionstore_lite_copyright', array(
        'label'      => esc_html__('Copyright', 'cfashionstore-lite'),
        'section'    => 'cfashionstore_lite_footer',
        'setting'   => 'cfashionstore_lite_copyright',
		'type'	   =>'textarea'
    ));	
}
add_action('customize_register', 'cfashionstore_lite_customize_register');
?>