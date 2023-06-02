<?php
/**
 * Shopexcel BlogPage Setting
 *
 * @package Shopexcel
 */
if ( ! function_exists( 'shopexcel_customize_register_blogpage_settings' ) ) : 

function shopexcel_customize_register_blogpage_settings( $wp_customize ) {
    $defaults      = shopexcel_get_general_defaults();

    $wp_customize->add_section(
        'blogpage_settings',
        array(
            'title'      => __( 'Blog Page', 'shopexcel' ),
            'priority'   => 50,
        )
    );

    /** Note */
    $wp_customize->add_setting(
        'blogpage_title_text',
        array(
            'default'           => '',
            'sanitize_callback' => 'wp_kses_post' 
        )
    );
    
    $wp_customize->add_control(
        new Shopexcel_Note_Control( 
			$wp_customize,
			'blogpage_title_text',
			array(
				'section' => 'blogpage_settings',
				'label'   => sprintf(__( '%1$sPage Title%2$s', 'shopexcel' ), '<span class="shply-customizer-title">', '</span>'),
			)
		)
    );

    /** Page Title */
    $wp_customize->add_setting(
        'ed_blog_title',
        array(
            'default'           => $defaults['ed_blog_title'],
            'sanitize_callback' => 'shopexcel_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
		new Shopexcel_Toggle_Control( 
			$wp_customize,
			'ed_blog_title',
			array(
				'section' => 'blogpage_settings',
				'label'   => __( 'Show Title', 'shopexcel' ),
			)
		)
	);

    /** Blog Page description */
    $wp_customize->add_setting(
        'ed_blog_desc',
        array(
            'default'           => $defaults['ed_blog_desc'],
            'sanitize_callback' => 'shopexcel_sanitize_checkbox'
        )
    );
    
    $wp_customize->add_control(
		new Shopexcel_Toggle_Control( 
			$wp_customize,
			'ed_blog_desc',
			array(
				'section' => 'blogpage_settings',
				'label'   => __( 'Show Description', 'shopexcel' )
			)
		)
	);

    /** Page title alignment */
    $wp_customize->add_setting( 
        'blog_alignment', 
        array(
            'default'           => $defaults['blog_alignment'],
            'sanitize_callback' => 'shopexcel_sanitize_radio',
            'transport'         => 'postMessage'
        ) 
    );
    
    $wp_customize->add_control(
		new Shopexcel_Radio_Buttonset_Control(
			$wp_customize,
			'blog_alignment',
			array(
				'section'	  => 'blogpage_settings',
				'label'       => __( 'Horizontal Alignment', 'shopexcel' ),
				'choices'	  => array(
					'left'   => __( 'Left', 'shopexcel' ),
					'center' => __( 'Center', 'shopexcel' ),
					'right'  => __( 'Right', 'shopexcel' ),
				),
			)
		)
	);

    /** Crop Feature Image */
    $wp_customize->add_setting(
        'blog_crop_image',
        array(
            'default'           => $defaults['blog_crop_image'],
            'sanitize_callback' => 'shopexcel_sanitize_checkbox'
        )
    );
    
    $wp_customize->add_control(
		new Shopexcel_Toggle_Control( 
			$wp_customize,
			'blog_crop_image',
			array(
				'section'     => 'blogpage_settings',
				'label'       => __( 'Crop Featured Image', 'shopexcel' ),
				'description' => __( 'This setting crops the featured image to recommended size. If set to false, it displays the image exactly as uploaded.', 'shopexcel' )
            )
		)
	);

    /** Note */
    $wp_customize->add_setting(
        'blogpage_post_set_text',
        array(
            'default'           => '',
            'sanitize_callback' => 'wp_kses_post' 
        )
    );
    
    $wp_customize->add_control(
        new Shopexcel_Note_Control( 
			$wp_customize,
			'blogpage_post_set_text',
			array(
				'section' => 'blogpage_settings',
				'label'   => sprintf(__( '%1$sPosts Settings%2$s', 'shopexcel' ), '<span class="shply-customizer-title">', '</span>'),
			)
		)
    );

    /** Blog Excerpt */
    $wp_customize->add_setting( 
        'blog_content', 
        array(
            'default'           => $defaults['blog_content'],
            'sanitize_callback' => 'shopexcel_sanitize_radio'
        ) 
    );
    
    $wp_customize->add_control(
		new Shopexcel_Radio_Buttonset_Control( 
			$wp_customize,
			'blog_content',
			array(
				'section'     => 'blogpage_settings',
				'label'	      => __( 'Enable Blog Excerpt', 'shopexcel' ),
                'choices'	  => array(
					'excerpt' => __( 'Excerpt', 'shopexcel' ),
					'content' => __( 'Full Content', 'shopexcel' )
				),
			)
		)
	);
    
    /** Excerpt Length */
    $wp_customize->add_setting( 
        'excerpt_length', 
        array(
            'default'           => $defaults['excerpt_length'],
            'sanitize_callback' => 'shopexcel_sanitize_number_absint'
        ) 
    );
    
    $wp_customize->add_control(
		new Shopexcel_Range_Slider_Control( 
			$wp_customize,
			'excerpt_length',
			array(
				'section'	  => 'blogpage_settings',
				'label'		  => __( 'Excerpt Length', 'shopexcel' ),
				'description' => __( 'Automatically generated excerpt length (in words).', 'shopexcel' ),
                'settings'      => array(
                    'desktop' => 'excerpt_length',
                ),
                'choices'	  => array(
                    'desktop' => array(
                        'min' 	=> 10,
                        'max' 	=> 100,
                        'step'	=> 5,
                        'edit'  => true,
                        'unit'  => ''
                    )
				)                 
			)
		)
	);
    
    /** Meta Order */
    $wp_customize->add_setting(
		'blog_meta_order', 
		array(
			'default'           => $defaults['blog_meta_order'], 
			'sanitize_callback' => 'shopexcel_sanitize_sortable',
		)
	);

	$wp_customize->add_control(
		new Shopexcel_Sortable_Control(
			$wp_customize,
			'blog_meta_order',
			array(
				'section' => 'blogpage_settings',
				'label'   => __( 'Meta Order', 'shopexcel' ),
				'choices' => array(
                    'author'       => __( 'Author', 'shopexcel' ),
                    'date'         => __( 'Date', 'shopexcel' ),
                    'comment'      => __( 'Comment', 'shopexcel' ),
                    'reading-time' => __( 'Reading Time', 'shopexcel' )
                ),
			)
		)
    );

    /** Read More Text */
    $wp_customize->add_setting(
        'read_more_text',
        array(
            'default'           => $defaults['read_more_text'],
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage' 
        )
    );

    $wp_customize->add_control(
        'read_more_text',
        array(
            'type'    => 'text',
            'section' => 'blogpage_settings',
            'label'   => __( 'Read More Label', 'shopexcel' ),
        )
    );
    
    $wp_customize->selective_refresh->add_partial( 'read_more_text', array(
        'selector' => '.entry-footer .btn-tertiary',
        'render_callback' => 'shopexcel_get_read_more',
    ) );
}
endif;
add_action( 'customize_register', 'shopexcel_customize_register_blogpage_settings' );