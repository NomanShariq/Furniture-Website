<?php
/**
 * Shopexcel Archive Page Setting
 *
 * @package Shopexcel
 */
if ( ! function_exists( 'shopexcel_customize_register_archive_settings' ) ) : 

function shopexcel_customize_register_archive_settings( $wp_customize ) {
    $defaults      = shopexcel_get_general_defaults();

    $wp_customize->add_section(
        'archivepage_settings',
        array(
            'title'      => __( 'Archive', 'shopexcel' ),
            'priority'   => 65,
        )
    );

    /** Archive Header Image */
    $wp_customize->add_setting(
        'header_bg_img',
        array(
            'default'           => $defaults['header_bg_img'],
            'sanitize_callback' => 'shopexcel_sanitize_number_absint',
        )
    );
    
    $wp_customize->add_control(
        new WP_Customize_Cropped_Image_Control(
            $wp_customize,
            'header_bg_img',
            array(
                'label'   => __( 'Header Background Image', 'shopexcel' ),
                'section' => 'archivepage_settings',
                'flex_width'  => true,
                'flex_height' => true,
                'width'       => 1920,
                'height'      => 350
            )
        )
    );

    /** Page Title */
    $wp_customize->add_setting(
        'ed_archive_title',
        array(
            'default'           => $defaults['ed_archive_title'],
            'sanitize_callback' => 'shopexcel_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
		new Shopexcel_Toggle_Control( 
			$wp_customize,
			'ed_archive_title',
			array(
				'section' => 'archivepage_settings',
				'label'   => __( 'Page Title', 'shopexcel' ),
			)
		)
	);

    /** Blog Page description */
    $wp_customize->add_setting(
        'ed_archive_desc',
        array(
            'default'           => $defaults['ed_archive_desc'],
            'sanitize_callback' => 'shopexcel_sanitize_checkbox'
        )
    );
    
    $wp_customize->add_control(
		new Shopexcel_Toggle_Control( 
			$wp_customize,
			'ed_archive_desc',
			array(
				'section' => 'archivepage_settings',
				'label'   => __( 'Show Description', 'shopexcel' )
			)
		)
	);

    /** Prefix Archive Page */
    $wp_customize->add_setting( 
        'ed_prefix_archive', 
        array(
            'default'           => $defaults['ed_prefix_archive'],
            'sanitize_callback' => 'shopexcel_sanitize_checkbox'
        ) 
    );
    
    $wp_customize->add_control(
		new Shopexcel_Toggle_Control( 
			$wp_customize,
			'ed_prefix_archive',
			array(
				'section'     => 'archivepage_settings',
				'label'	      => __( 'Hide Archive Prefix', 'shopexcel' )
			)
		)
	);

    /** Show counts */
    $wp_customize->add_setting( 
        'ed_archive_post_count', 
        array(
            'default'           => $defaults['ed_archive_post_count'],
            'sanitize_callback' => 'shopexcel_sanitize_checkbox'
        ) 
    );
    
    $wp_customize->add_control(
        new Shopexcel_Toggle_Control( 
            $wp_customize,
            'ed_archive_post_count',
            array(
                'section'     => 'archivepage_settings',
                'label'	      => __( 'Show Counts', 'shopexcel' )
            )
        )
    );

    /** Page title alignment */
    $wp_customize->add_setting( 
        'archivetitle_alignment', 
        array(
            'default'           => $defaults['archivetitle_alignment'],
            'sanitize_callback' => 'shopexcel_sanitize_radio',
            'transport'         => 'postMessage'
        ) 
    );
    
    $wp_customize->add_control(
		new Shopexcel_Radio_Buttonset_Control(
			$wp_customize,
			'archivetitle_alignment',
			array(
				'section'	  => 'archivepage_settings',
				'label'       => __( 'Title Alignment', 'shopexcel' ),
				'choices'	  => array(
					'left'   => __( 'Left', 'shopexcel' ),
					'center' => __( 'Center', 'shopexcel' ),
					'right'  => __( 'Right', 'shopexcel' ),
				),
			)
		)
	);
}
endif;
add_action( 'customize_register', 'shopexcel_customize_register_archive_settings' );