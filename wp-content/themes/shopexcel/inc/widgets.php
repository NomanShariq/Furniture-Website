<?php
/**
 * Shopexcel Widget Areas
 * 
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 * @package Shopexcel
 */
if ( ! function_exists('shopexcel_widgets_init') ) :

function shopexcel_widgets_init(){    
    $sidebars = array(
        'sidebar'   => array(
            'name'        => __( 'Sidebar', 'shopexcel' ),
            'id'          => 'sidebar', 
            'description' => __( 'Default Sidebar', 'shopexcel' ),
        ),
        'footer-one'=> array(
            'name'        => __( 'Footer One', 'shopexcel' ),
            'id'          => 'footer-one', 
            'description' => __( 'Add footer one widgets here.', 'shopexcel' ),
        ),
        'footer-two'=> array(
            'name'        => __( 'Footer Two', 'shopexcel' ),
            'id'          => 'footer-two', 
            'description' => __( 'Add footer two widgets here.', 'shopexcel' ),
        ),
        'footer-three'=> array(
            'name'        => __( 'Footer Three', 'shopexcel' ),
            'id'          => 'footer-three', 
            'description' => __( 'Add footer three widgets here.', 'shopexcel' ),
        ),
        'footer-four'=> array(
            'name'        => __( 'Footer Four', 'shopexcel' ),
            'id'          => 'footer-four', 
            'description' => __( 'Add footer four widgets here.', 'shopexcel' ),
        )
    );
    
    foreach( $sidebars as $sidebar ){
        register_sidebar( array(
            'name'          => esc_html( $sidebar['name'] ),
            'id'            => esc_attr( $sidebar['id'] ),
            'description'   => esc_html( $sidebar['description'] ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title" itemprop="name">',
            'after_title'   => '</h2>',
        ) );
    }
}
endif;
add_action( 'widgets_init', 'shopexcel_widgets_init' );