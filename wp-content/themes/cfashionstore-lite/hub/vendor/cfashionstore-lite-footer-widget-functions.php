<?php
function cfashionstore_lite_widgets_init_footer() {    
    register_sidebar( array(
        'name'          => esc_html__( 'Footer Widget 1', 'cfashionstore-lite' ),
        'description'   => esc_html__( 'Appears on footer', 'cfashionstore-lite' ),
        'id'            => 'footer-1',
        'before_widget' => '<aside id="%1$s" class="cols-4 widget-column-1 %2$s footercont">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>',
    ) );
    
    register_sidebar( array(
        'name'          => esc_html__( 'Footer Widget 2', 'cfashionstore-lite' ),
        'description'   => esc_html__( 'Appears on footer', 'cfashionstore-lite' ),
        'id'            => 'footer-2',
        'before_widget' => '<aside id="%1$s" class="cols-4 widget-column-2 %2$s footercont">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>',
    ) );
    
    register_sidebar( array(
        'name'          => esc_html__( 'Footer Widget 3', 'cfashionstore-lite' ),
        'description'   => esc_html__( 'Appears on footer', 'cfashionstore-lite' ),
        'id'            => 'footer-3',
        'before_widget' => '<aside id="%1$s" class="cols-4 widget-column-3 %2$s footercont">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>',
    ) ); 
    
    register_sidebar( array(
        'name'          => esc_html__( 'Sidebar', 'cfashionstore-lite' ),
        'description'   => esc_html__( 'Appears on sidebar', 'cfashionstore-lite' ),
        'id'            => 'sidebar-1',
        'before_widget' => '',      
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3><aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
    ) );      
}
add_action( 'widgets_init', 'cfashionstore_lite_widgets_init_footer' );
?>