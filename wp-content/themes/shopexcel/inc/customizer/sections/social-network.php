<?php
/**
 * Social Media Settings
 *
 * @package Shopexcel
*/
if ( ! function_exists( 'shopexcel_customize_register_social_network' ) ) : 

function shopexcel_customize_register_social_network( $wp_customize ){

    $defaults = shopexcel_get_general_defaults();

    /** Social Media */
    $wp_customize->add_section( 
        'social_network_section',
        array(
            'priority' => 31,
            'title'    => __( 'Social Media', 'shopexcel' ),
        ) 
    );

    $wp_customize->add_setting(
        'social_network_text',
        array(
            'default'           => '',
            'sanitize_callback' => 'wp_kses_post' 
        )
    );
    
    $wp_customize->add_control(
        new Shopexcel_Note_Control( 
            $wp_customize,
            'social_network_text',
            array(
                'section'     => 'social_network_section',
                'label'       => 'Social Media Accounts',
                'description' => __( 'Add the links to your social media accounts and display them across your site.', 'shopexcel' ),
            )
        )
    );

    /** Facebook */
    $wp_customize->add_setting(
        'shply_facebook',
        array(
            'default'           => $defaults['shply_facebook'],
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    
    $wp_customize->add_control(
        'shply_facebook',
        array(
            'section'         => 'social_network_section',
            'label'           => __( 'Facebook', 'shopexcel' ),
            'type'            => 'text'
        )
	);

    /** Twitter */
    $wp_customize->add_setting(
        'shply_twitter',
        array(
            'default'           => $defaults['shply_twitter'],
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    
    $wp_customize->add_control(
        'shply_twitter',
        array(
            'type'            => 'text',
            'section'         => 'social_network_section',
            'label'           => __( 'Twitter', 'shopexcel' ),
        )
	);

     /** Instagram */
     $wp_customize->add_setting(
        'shply_instagram',
        array(
            'default'           => $defaults['shply_instagram'],
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    
    $wp_customize->add_control(
        'shply_instagram',
        array(
            'type'            => 'text',
            'section'         => 'social_network_section',
            'label'           => __( 'Instagram', 'shopexcel' ),
        )
	);

    /** Pinterest */
    $wp_customize->add_setting(
        'shply_pinterest',
        array(
            'default'           => $defaults['shply_pinterest'],
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    
    $wp_customize->add_control(
        'shply_pinterest',
        array(
            'type'            => 'text',
            'section'         => 'social_network_section',
            'label'           => __( 'Pinterest', 'shopexcel' ),
        )
	);

    /** YouTube  */
    $wp_customize->add_setting(
        'shply_youtube',
        array(
            'default'           => $defaults['shply_youtube'],
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    
    $wp_customize->add_control(
        'shply_youtube',
        array(
            'type'            => 'text',
            'section'         => 'social_network_section',
            'label'           => __( 'YouTube', 'shopexcel' ),
        )
	);

    /** TikTok  */
    $wp_customize->add_setting(
        'shply_tiktok',
        array(
            'default'           => $defaults['shply_tiktok'],
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    
    $wp_customize->add_control(
        'shply_tiktok',
        array(
            'type'            => 'text',
            'section'         => 'social_network_section',
            'label'           => __( 'TikTok', 'shopexcel' ),
        )
	);

    /** Linkedin */
    $wp_customize->add_setting(
        'shply_linkedin',
        array(
            'default'           => $defaults['shply_linkedin'],
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    
    $wp_customize->add_control(
        'shply_linkedin',
        array(
            'type'            => 'text',
            'section'         => 'social_network_section',
            'label'           => __( 'Linkedin', 'shopexcel' ),
        )
	);

    /** Whatsapp */
    $wp_customize->add_setting(
        'shply_whatsapp',
        array(
            'default'           => $defaults['shply_whatsapp'],
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    
    $wp_customize->add_control(
        'shply_whatsapp',
        array(
            'type'            => 'text',
            'section'         => 'social_network_section',
            'label'           => __( 'Whatsapp', 'shopexcel' ),
        )
	);

    /** Viber */
    $wp_customize->add_setting(
        'shply_viber',
        array(
            'default'           => $defaults['shply_viber'],
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    
    $wp_customize->add_control(
        'shply_viber',
        array(
            'type'            => 'text',
            'section'         => 'social_network_section',
            'label'           => __( 'Viber', 'shopexcel' ),
        )
	);

    /** Telegram */
    $wp_customize->add_setting(
        'shply_telegram',
        array(
            'default'           => $defaults['shply_telegram'],
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    
    $wp_customize->add_control(
        'shply_telegram',
        array(
            'type'            => 'text',
            'section'         => 'social_network_section',
            'label'           => __( 'Telegram', 'shopexcel' ),
        )
	);

}
endif;
add_action( 'customize_register', 'shopexcel_customize_register_social_network' );