<?php
/**
 * Header Social Media Setting
 *
 * @package Shopexcel
 */
if ( ! function_exists( 'shopexcel_customize_register_header_social_media' ) ) : 

function shopexcel_customize_register_header_social_media( $wp_customize ) {    
    
    $defaults = shopexcel_get_general_defaults();

    /** Social Media Settings */
    $wp_customize->add_section(
        'social_media_settings',
        array(
            'title'    => __( 'Social Media Settings', 'shopexcel' ),
            'priority' => 20,
            'panel'    => 'main_header_settings',
        )
    );
    
    /** Enable Social Links */
    $wp_customize->add_setting( 
        'ed_social_links', 
        array(
            'default'           => $defaults['ed_social_links'],
            'sanitize_callback' => 'shopexcel_sanitize_checkbox'
        ) 
    );
    
    $wp_customize->add_control(
		new Shopexcel_Toggle_Control( 
			$wp_customize,
			'ed_social_links',
			array(
				'section'     => 'social_media_settings',
				'label'	      => __( 'Show Social Media', 'shopexcel' )
			)
		)
	);
    
    $wp_customize->add_setting( 
        'ed_social_links_new_tab', 
        array(
            'default'           => $defaults['ed_social_links_new_tab'],
            'sanitize_callback' => 'shopexcel_sanitize_checkbox'
        ) 
    );
    
    $wp_customize->add_control(
		new Shopexcel_Toggle_Control( 
			$wp_customize,
			'ed_social_links_new_tab',
			array(
				'section'         => 'social_media_settings',
				'label'           => __( 'Open in a new tab', 'shopexcel' ),
				'active_callback' => 'shopexcel_social_media_ac'
			)
		)
	);

    $wp_customize->add_setting(
		'social_media_order', 
		array(
			'default'           => $defaults['social_media_order'], 
			'sanitize_callback' => 'shopexcel_sanitize_sortable',
		)
	);

	$wp_customize->add_control(
		new Shopexcel_Sortable_Control(
			$wp_customize,
			'social_media_order',
			array(
				'section'     => 'social_media_settings',
				'label'       => __( 'Social Media', 'shopexcel' ),
				'choices'     => array(
                    'shply_facebook'    => __( 'Facebook', 'shopexcel'),
                    'shply_twitter'     => __( 'Twitter', 'shopexcel'),
                    'shply_instagram'   => __( 'Instagram', 'shopexcel'),
                    'shply_pinterest'   => __( 'Pinterest', 'shopexcel'),
                    'shply_youtube'     => __( 'Youtube', 'shopexcel'),
                    'shply_tiktok'      => __( 'TikTok', 'shopexcel'),
                    'shply_linkedin'    => __( 'LinkedIn', 'shopexcel'),
                    'shply_whatsapp'    => __( 'WhatsApp', 'shopexcel'),
                    'shply_viber'       => __( 'Viber', 'shopexcel'),
                    'shply_telegram'    => __( 'Telegram', 'shopexcel')
                ),
                'active_callback' => 'shopexcel_social_media_ac'
			)
		)
    );

    $wp_customize->add_setting(
        'header_social_media_text',
        array(
            'default'           => '',
            'sanitize_callback' => 'wp_kses_post' 
        )
    );
    
    $wp_customize->add_control(
        new Shopexcel_Note_Control( 
            $wp_customize,
            'header_social_media_text',
            array(
                'section'         => 'social_media_settings',
                'description'     => sprintf(__( 'You can add links to your social media profiles %1$s here. %2$s', 'shopexcel' ), '<span class="text-inner-link social_media_text">', '</span>'),
                'active_callback' => 'shopexcel_social_media_ac'
            )
        )
    );

    /** Social Media Settings Ends */
}
endif;
add_action( 'customize_register', 'shopexcel_customize_register_header_social_media' );