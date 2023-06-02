<?php
/**
 * Shopexcel Single Page Setting
 *
 * @package Shopexcel
 */
if ( ! function_exists( 'shopexcel_customize_register_singlepage_settings' ) ) : 

function shopexcel_customize_register_singlepage_settings( $wp_customize ) {
    $defaults      = shopexcel_get_general_defaults();

    $wp_customize->add_section(
        'singlepage_settings',
        array(
            'title'      => __( 'Page', 'shopexcel' ),
            'priority'   => 60,
        )
    );

    /** Page Title */
    $wp_customize->add_setting(
        'ed_page_title',
        array(
            'default'           => $defaults['ed_page_title'],
            'sanitize_callback' => 'shopexcel_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
		new Shopexcel_Toggle_Control( 
			$wp_customize,
			'ed_page_title',
			array(
				'section' => 'singlepage_settings',
				'label'   => __( 'Page Title', 'shopexcel' ),
			)
		)
	);

    /** Page title alignment */
    $wp_customize->add_setting( 
        'pagetitle_alignment', 
        array(
            'default'           => $defaults['pagetitle_alignment'],
            'sanitize_callback' => 'shopexcel_sanitize_radio',
            'transport'         => 'postMessage'
        ) 
    );
    
    $wp_customize->add_control(
		new Shopexcel_Radio_Buttonset_Control(
			$wp_customize,
			'pagetitle_alignment',
			array(
				'section'	  => 'singlepage_settings',
				'label'       => __( 'Title Alignment', 'shopexcel' ),
				'choices'	  => array(
					'left'   => __( 'Left', 'shopexcel' ),
					'center' => __( 'Center', 'shopexcel' ),
					'right'  => __( 'Right', 'shopexcel' ),
				),
			)
		)
	);

    /** Show Featured Image */
    $wp_customize->add_setting( 
        'ed_page_featured_image', 
        array(
            'default'           => $defaults['ed_page_featured_image'],
            'sanitize_callback' => 'shopexcel_sanitize_checkbox'
        ) 
    );
    
    $wp_customize->add_control(
		new Shopexcel_Toggle_Control( 
			$wp_customize,
			'ed_page_featured_image',
			array(
				'section'     => 'singlepage_settings',
				'label'	      => __( 'Show Featured Image', 'shopexcel' )
			)
		)
	);

    $wp_customize->add_setting(
        'ed_page_comments',
        array(
            'default'           => $defaults['ed_page_comments'],
            'sanitize_callback' => 'shopexcel_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
		new Shopexcel_Toggle_Control( 
			$wp_customize,
			'ed_page_comments',
			array(
				'section' => 'singlepage_settings',
				'label'   => __( 'Show Comments', 'shopexcel' ),
			)
		)
	);
}
endif;
add_action( 'customize_register', 'shopexcel_customize_register_singlepage_settings' );