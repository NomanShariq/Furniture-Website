<?php
/**
 * Shopexcel Single Post Setting
 *
 * @package Shopexcel
 */
if ( ! function_exists( 'shopexcel_customize_register_singlepost_settings' ) ) : 

function shopexcel_customize_register_singlepost_settings( $wp_customize ) {
    $defaults      = shopexcel_get_general_defaults();

    $wp_customize->add_section(
        'singlepost_settings',
        array(
            'title'      => __( 'Single Post', 'shopexcel' ),
            'priority'   => 55,
        )
    );

    /** Show Featured Image */
    $wp_customize->add_setting( 
        'ed_post_featured_image', 
        array(
            'default'           => $defaults['ed_post_featured_image'],
            'sanitize_callback' => 'shopexcel_sanitize_checkbox'
        ) 
    );
    
    $wp_customize->add_control(
		new Shopexcel_Toggle_Control( 
			$wp_customize,
			'ed_post_featured_image',
			array(
				'section'     => 'singlepost_settings',
				'label'	      => __( 'Show Featured Image', 'shopexcel' )
			)
		)
	);
    
    /** Crop Feature Image */
    $wp_customize->add_setting(
        'post_crop_image',
        array(
            'default'           => $defaults['post_crop_image'],
            'sanitize_callback' => 'shopexcel_sanitize_checkbox'
        )
    );
    
    $wp_customize->add_control(
		new Shopexcel_Toggle_Control( 
			$wp_customize,
			'post_crop_image',
			array(
				'section'     => 'singlepost_settings',
				'label'       => __( 'Crop Featured Image', 'shopexcel' ),
				'description' => __( 'This setting crops the featured image to recommended size. If set to false, it displays the image exactly as uploaded.', 'shopexcel' )
            )
		)
	);

    /** Meta Order */
    $wp_customize->add_setting(
		'post_meta_order', 
		array(
			'default'           => $defaults['post_meta_order'], 
			'sanitize_callback' => 'shopexcel_sanitize_sortable',
		)
	);

	$wp_customize->add_control(
		new Shopexcel_Sortable_Control(
			$wp_customize,
			'post_meta_order',
			array(
				'section' => 'singlepost_settings',
				'label'   => __( 'Post Meta Settings', 'shopexcel' ),
				'choices' => array(
                    'author'       => __( 'Author', 'shopexcel' ),
                    'date'         => __( 'Date', 'shopexcel' ),
                    'comment'      => __( 'Comment', 'shopexcel' ),
                    'reading-time' => __( 'Reading Time', 'shopexcel' )
                ),
			)
		)
    );

    $wp_customize->add_setting( 
        'read_words_per_minute', 
        array(
            'default'           => $defaults['read_words_per_minute'],
            'sanitize_callback' => 'shopexcel_sanitize_number_absint'
        ) 
    );
    
    $wp_customize->add_control(
        new Shopexcel_Range_Slider_Control( 
            $wp_customize,
            'read_words_per_minute',
            array(
                'label'       => __( 'Read Words Per Minute', 'shopexcel' ),
                'section'     => 'singlepost_settings',
                'description' => __( 'Blog Posts Content Words Reading Speed Per Minute.', 'shopexcel' ),
                'settings'      => array(
                    'desktop'   => 'read_words_per_minute'
                ),
                'choices'     => array(
                    'desktop' => array(
                        'min'   => 100,
                        'max'   => 1000,
                        'step'  => 10,
                        'edit'  => true,
                        'unit'  => ''
                    )
                    ),                 
                'active_callback' => 'shopexcel_read_words_per_min_ac'
            )
        )
    );
    
    /** Show Post Category */
    $wp_customize->add_setting( 
        'ed_post_category', 
        array(
            'default'           => $defaults['ed_post_category'],
            'sanitize_callback' => 'shopexcel_sanitize_checkbox',
        ) 
    );
    
    $wp_customize->add_control(
		new Shopexcel_Toggle_Control(
			$wp_customize,
			'ed_post_category',
			array(
				'section'	  => 'singlepost_settings',
				'label'       => __( 'Show Category', 'shopexcel' )
			)
		)
	);

    /** Post Tags */
    $wp_customize->add_setting(
        'ed_post_tags',
        array(
            'default'           => $defaults['ed_post_tags'],
            'sanitize_callback' => 'shopexcel_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
		new Shopexcel_Toggle_Control( 
			$wp_customize,
			'ed_post_tags',
			array(
				'section' => 'singlepost_settings',
				'label'   => __( 'Show Post Tags', 'shopexcel' ),
			)
		)
	);

    /** Show Post Pagination */
    $wp_customize->add_setting( 
        'ed_post_pagination', 
        array(
            'default'           => $defaults['ed_post_pagination'],
            'sanitize_callback' => 'shopexcel_sanitize_checkbox',
        ) 
    );
    
    $wp_customize->add_control(
		new Shopexcel_Toggle_Control(
			$wp_customize,
			'ed_post_pagination',
			array(
				'section'	  => 'singlepost_settings',
				'label'       => __( 'Show Pagination', 'shopexcel' )
			)
		)
	);
    
    /** Show Author Section */
    $wp_customize->add_setting( 
        'ed_author', 
        array(
            'default'           => $defaults['ed_author'],
            'sanitize_callback' => 'shopexcel_sanitize_checkbox'
        ) 
    );
    
    $wp_customize->add_control(
		new Shopexcel_Toggle_Control( 
			$wp_customize,
			'ed_author',
			array(
				'section'     => 'singlepost_settings',
				'label'	      => __( 'Show Author Box', 'shopexcel' )
			)
		)
	);
    
    /** Author Section title */
    $wp_customize->add_setting(
        'author_title',
        array(
            'default'           => $defaults['author_title'],
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage' 
        )
    );

    $wp_customize->add_control(
        'author_title',
        array(
            'type'            => 'text',
            'section'         => 'singlepost_settings',
            'label'           => __( 'Author Section Title', 'shopexcel' ),
            'active_callback' => 'shopexcel_author_section_ac'
        )
    );
    
    $wp_customize->selective_refresh->add_partial( 'author_title', array(
        'selector' => '.author-section .sub-title',
        'render_callback' => 'shopexcel_get_author_title',
    ) );

    /** Note */
    $wp_customize->add_setting(
        'related_post_title_text',
        array(
            'default'           => '',
            'sanitize_callback' => 'wp_kses_post' 
        )
    );
    
    $wp_customize->add_control(
        new Shopexcel_Note_Control( 
			$wp_customize,
			'related_post_title_text',
			array(
				'section' => 'singlepost_settings',
				'label'   => sprintf(__( '%1$sRelated Post Settings%2$s', 'shopexcel' ), '<span class="shply-customizer-title">', '</span>'),
			)
		)
    );

    /** Show Related Posts */
    $wp_customize->add_setting( 
        'ed_related', 
        array(
            'default'           => $defaults['ed_related'],
            'sanitize_callback' => 'shopexcel_sanitize_checkbox'
        ) 
    );
    
    $wp_customize->add_control(
		new Shopexcel_Toggle_Control( 
			$wp_customize,
			'ed_related',
			array(
				'section'     => 'singlepost_settings',
				'label'	      => __( 'Show Related Posts', 'shopexcel' ),
			)
		)
	);
    
    /** Related Posts section title */
    $wp_customize->add_setting(
        'related_post_title',
        array(
            'default'           => $defaults['related_post_title'],
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage' 
        )
    );
    
    $wp_customize->add_control(
        'related_post_title',
        array(
            'type'            => 'text',
            'section'         => 'singlepost_settings',
            'label'           => __( 'Related Posts Section Title', 'shopexcel' ),
            'active_callback' => 'shopexcel_related_post_ac'
        )
    );
    
    $wp_customize->selective_refresh->add_partial( 'related_post_title', array(
        'selector' => '.single-post .related-posts .title',
        'render_callback' => 'shopexcel_get_related_title',
    ) );

    /** Number of Posts */
    $wp_customize->add_setting(
        'no_of_posts_rp',
        array(
            'default'           => $defaults['no_of_posts_rp'],
            'sanitize_callback' => 'shopexcel_sanitize_empty_absint',
        )
    );

    $wp_customize->add_control(
        new Shopexcel_Range_Slider_Control(
            $wp_customize,
            'no_of_posts_rp',
            array(
                'label'           => __( 'Number of Posts', 'shopexcel' ),
                'section'         => 'singlepost_settings',
                'active_callback' => 'shopexcel_related_post_ac',
                'settings'        => array(  'desktop' => 'no_of_posts_rp' ),
                'choices'         => array(
                    'desktop' => array(
                        'min'  => 4,
                        'max'  => 12,
                        'step' => 4,
                        'edit' => false,
                        'unit' => '',
                    ),
                ),
            )
        )
    );

    /** Note */
    $wp_customize->add_setting(
        'comment_title_text',
        array(
            'default'           => '',
            'sanitize_callback' => 'wp_kses_post' 
        )
    );

    $wp_customize->add_control(
        new Shopexcel_Note_Control( 
            $wp_customize,
            'comment_title_text',
            array(
                'section' => 'singlepost_settings',
                'label'   => sprintf(__( '%1$sComment Settings%2$s', 'shopexcel' ), '<span class="shply-customizer-title">', '</span>'),
            )
        )
    );

    $wp_customize->add_setting(
        'ed_post_comments',
        array(
            'default'           => $defaults['ed_post_comments'],
            'sanitize_callback' => 'shopexcel_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
		new Shopexcel_Toggle_Control( 
			$wp_customize,
			'ed_post_comments',
			array(
				'section' => 'singlepost_settings',
				'label'   => __( 'Show Comments', 'shopexcel' ),
			)
		)
	);

    /** Comment Form */    
    $wp_customize->add_setting( 
        'single_comment_form', 
        array(
            'default'           => $defaults['single_comment_form'],
            'sanitize_callback' => 'shopexcel_sanitize_radio'
        ) 
    );
    
    $wp_customize->add_control(
		new Shopexcel_Radio_Buttonset_Control(
			$wp_customize,
			'single_comment_form',
			array(
				'section' => 'singlepost_settings',
				'label'   => __( 'Comment Form', 'shopexcel' ),
				'choices' => array(
					'above' => __( 'Above', 'shopexcel' ),
					'below' => __( 'Below', 'shopexcel' ),
				),
                'description'     => __( 'Move the comment form above or below the comments.', 'shopexcel' ),
                'active_callback' => 'shopexcel_post_comment_ac'
			)
		)
	);

    /** Comments Below Post Content */
    $wp_customize->add_setting(
        'toggle_comments',
        array(
            'default'           => $defaults['toggle_comments'],
            'sanitize_callback' => 'shopexcel_sanitize_radio',
        )
    );
    
    $wp_customize->add_control(
		new Shopexcel_Radio_Buttonset_Control(
			$wp_customize,
			'toggle_comments',
			array(
				'section'	  => 'singlepost_settings',
				'label'       => __( 'Comment Location', 'shopexcel' ),
				'choices'	  => array(
					'below-post' => __( 'Below Post', 'shopexcel' ),
					'end-post'   => __( 'At End', 'shopexcel' ),
				),
				'active_callback' => 'shopexcel_post_comment_ac'
			)
		)
	);
    /** Posts(Blog) & Pages Settings Ends */
}
endif;
add_action( 'customize_register', 'shopexcel_customize_register_singlepost_settings' );