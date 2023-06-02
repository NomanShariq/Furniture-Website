<?php
/**
 * Customizer Settings Defaults 
 * 
 * @package Shopexcel
 */

if( ! function_exists( 'shopexcel_get_site_defaults' ) ) :
/**
 * Site Defaults
 * 
 * @return array
 */
function shopexcel_get_site_defaults(){

    $defaults = array(
        'hide_title'        => false,
        'hide_tagline'      => true,
        'logo_width'        => '64',
        'tablet_logo_width' => '64',
        'mobile_logo_width' => '64',
    );

    return apply_filters( 'shopexcel_site_options_defaults', $defaults );
}
endif;

if( ! function_exists( 'shopexcel_get_typography_defaults' ) ) :
/**
 * Typography Defaults
 * 
 * @return array
 */
function shopexcel_get_typography_defaults(){
    $defaults = array(   
        'primary_font' => array(
            'family'         => 'Inter',
            'variants'       => '',
            'category'       => '',
            'weight'         => '400',
            'transform'      => 'none',
            'desktop' => array(
                'font_size'      => 16,
                'line_height'    => 1.75,
                'letter_spacing' => 0,
            ),
            'tablet' => array(
                'font_size'      => 16,
                'line_height'    => 1.75,
                'letter_spacing' => 0,
            ),
            'mobile' => array(
                'font_size'      => 16,
                'line_height'    => 1.75,
                'letter_spacing' => 0,
            )
        ),
        'site_title' => array(
            'family'    => 'Default Family',
            'variants'  => '',
            'category'  => '',
            'weight'    => 'bold',
            'transform' => 'none',
            'desktop' => array(
                'font_size'      => 28,
                'line_height'    => 1.4,
                'letter_spacing' => 0
            ),
            'tablet' => array(
                'font_size'      => 28,
                'line_height'    => 1.4,
                'letter_spacing' => 0,
            ),
            'mobile' => array(
                'font_size'      => 28,
                'line_height'    => 1.4,
                'letter_spacing' => 0,
            )
        ),
        'button' => array(
            'family'         => 'Default Family',
            'variants'       => '',
            'category'       => '',
            'weight'         => '400',
            'transform'      => 'none',
            'desktop' => array(
                'font_size'      => 16,
                'line_height'    => 1.5,
                'letter_spacing' => 0,
            ),
            'tablet' => array(
                'font_size'      => 16,
                'line_height'    => 1.5,
                'letter_spacing' => 0,
            ),
            'mobile' => array(
                'font_size'      => 16,
                'line_height'    => 1.5,
                'letter_spacing' => 0,
            )
        ),
        'heading_one' => array(
            'family'      => 'Prata',
            'variants'    => '',
            'category'    => '',
            'weight'      => '400',
            'transform'   => 'none',
            'desktop' => array(
                'font_size'      => 48,
                'line_height'    => 1.3,
                'letter_spacing' => 0,
            ),
            'tablet' => array(
                'font_size'      => 40,
                'line_height'    => 1.3,
                'letter_spacing' => 0,
            ),
            'mobile' => array(
                'font_size'      => 36,
                'line_height'    => 1.3,
                'letter_spacing' => 0,
            )
        ),
        'heading_two' => array(
            'family'      => 'Prata',
            'variants'    => '',
            'category'    => '',
            'weight'      => '400',
            'transform'   => 'none',
            'desktop' => array(
                'font_size'      => 40,
                'line_height'    => 1.3,
                'letter_spacing' => 0,
            ),
            'tablet' => array(
                'font_size'      => 32,
                'line_height'    => 1.3,
                'letter_spacing' => 0,
            ),
            'mobile' => array(
                'font_size'      => 30,
                'line_height'    => 1.3,
                'letter_spacing' => 0,
            )
        ),
        'heading_three' => array(
            'family'      => 'Prata',
            'variants'    => '',
            'category'    => '',
            'weight'      => '400',
            'transform'   => 'none',
            'desktop' => array(
                'font_size'      => 32,
                'line_height'    => 1.3,
                'letter_spacing' => 0,
            ),
            'tablet' => array(
                'font_size'      => 26,
                'line_height'    => 1.3,
                'letter_spacing' => 0,
            ),
            'mobile' => array(
                'font_size'      => 24,
                'line_height'    => 1.3,
                'letter_spacing' => 0,
            )
        ),
        'heading_four' => array(
            'family'      => 'Prata',
            'variants'    => '',
            'category'    => '',
            'weight'      => '400',
            'transform'   => 'none',
            'desktop' => array(
                'font_size'      => 26,
                'line_height'    => 1.4,
                'letter_spacing' => 0,
            ),
            'tablet' => array(
                'font_size'      => 22,
                'line_height'    => 1.4,
                'letter_spacing' => 0,
            ),
            'mobile' => array(
                'font_size'      => 20,
                'line_height'    => 1.4,
                'letter_spacing' => 0,
            )
        ),
        'heading_five' => array(
            'family'      => 'Prata',
            'variants'    => '',
            'category'    => '',
            'weight'      => '400',
            'transform'   => 'none',
            'desktop' => array(
                'font_size'      => 20,
                'line_height'    => 1.4,
                'letter_spacing' => 0,
            ),
            'tablet' => array(
                'font_size'      => 18,
                'line_height'    => 1.5,
                'letter_spacing' => 0,
            ),
            'mobile' => array(
                'font_size'      => 18,
                'line_height'    => 1.5,
                'letter_spacing' => 0,
            )
        ),
        'heading_six' => array(
            'family'      => 'Prata',
            'variants'    => '',
            'category'    => '',
            'weight'      => '400',
            'transform'   => 'none',
            'desktop' => array(
                'font_size'      => 16,
                'line_height'    => 1.75,
                'letter_spacing' => 0,
            ),
            'tablet' => array(
                'font_size'      => 16,
                'line_height'    => 1.75,
                'letter_spacing' => 0,
            ),
            'mobile' => array(
                'font_size'      => 16,
                'line_height'    => 1.75,
                'letter_spacing' => 0,
            )
        )
    );

    return apply_filters( 'shopexcel_typography_options_defaults', $defaults ); 
}
endif;

if( ! function_exists( 'shopexcel_get_color_defaults' ) ) :
/**
 * Color Defaults
 * 
 * @return array
 */
function shopexcel_get_color_defaults(){
    $defaults = array(
        'primary_color'                     => '#FF8887',
        'body_font_color'                   => '#333333',
        'heading_color'                     => '#1A1818',
        'section_bg_color'                  => '#FFFAF7',
        'site_bg_color'                     => '#FFFFFF',
        'site_title_color'                  => '#000000',
        'site_tagline_color'                => '#333333',
        'btn_text_color_initial'            => '#ffffff',
        'btn_text_color_hover'              => '#FF8887',
        'btn_bg_color_initial'              => '#FF8887',
        'btn_bg_color_hover'                => 'rgba(255,255,255,0)',
        'btn_border_color_initial'          => '#FF8887',
        'btn_border_color_hover'            => '#FF8887',
        'foot_text_color'                   => 'rgba(255,255,255,0.9)',
        'foot_bg_color'                     => '#0D0C0C',
        'foot_widget_heading_color'         => '#FFFFFF',
    );

    return apply_filters( 'shopexcel_color_options_defaults', $defaults );
}
endif;

if( ! function_exists( 'shopexcel_get_button_defaults' ) ) :
/**
 * Button Defaults
 * 
 * @return array
 */
function shopexcel_get_button_defaults(){

    $defaults = array(
        'button_roundness' => array(
            'top'    => 0,
            'right'  => 0,
            'bottom' => 0,
            'left'   => 0,
        ),
        'button_padding'   => array(
            'top'    => 16,
            'right'  => 32,
            'bottom' => 16,
            'left'   => 32,
        )
    );

    return apply_filters( 'shopexcel_button_options_defaults', $defaults );
}
endif;

if( ! function_exists( 'shopexcel_get_general_defaults' ) ) :
/**
 * General Defaults
 * 
 * @return array
 */
function shopexcel_get_general_defaults(){

    $defaults = array(
        'container_width'               => 1170,
        'tablet_container_width'        => 992,
        'mobile_container_width'        => 420,
        'fullwidth_centered'            => 780,
        'tablet_fullwidth_centered'     => 780,
        'mobile_fullwidth_centered'     => 780,
        'sidebar_width'                 => 31.6,
        'widgets_spacing'               => 32,
        'tablet_widgets_spacing'        => 32,
        'mobile_widgets_spacing'        => 20,
        'ed_last_widget_sticky'         => false,
        'ed_scroll_top'                 => true,
        'scroll_top_size'               => 20,
        'tablet_scroll_top_size'        => 20,
        'mobile_scroll_top_size'        => 20,
        'ed_localgoogle_fonts'          => false,
        'ed_preload_local_fonts'        => false,
        'page_sidebar_layout'           => 'right-sidebar',
        'post_sidebar_layout'           => 'right-sidebar',
        'layout_style'                  => 'right-sidebar',
        'ed_header_search'              => true,
        'ed_woo_account'                => true,
        'ed_woo_wishlist'               => true,
        'ed_woo_cart'                   => true,
        'header_phone_label'            => '',
        'header_phone'                  => '',
        'ed_social_links'               => false,
        'ed_social_links_new_tab'       => true,
        'social_media_order'            => array( 'shply_facebook', 'shply_twitter', 'shply_instagram'),
        'footer_phone_label'            => '',
        'footer_phone'                  => '',
        'footer_email_label'            => '',
        'footer_email'                  => '',
        'opening_hour_label'            => '',
        'opening_hour'                  => '',
        'shply_facebook'                => '#',
        'shply_twitter'                 => '#',
        'shply_instagram'               => '#',
        'shply_pinterest'               => '',
        'shply_youtube'                 => '',
        'shply_tiktok'                  => '',
        'shply_linkedin'                => '',
        'shply_whatsapp'                => '',
        'shply_viber'                   => '',
        'shply_telegram'                => '',
        'footer_copyright'              => '',
        'payment_image'                 => '',
        'ed_breadcrumb'                 => true,
        'home_text'                     => __( 'Home', 'shopexcel' ),
        'separator_icon'                => 'one',
        'ed_post_update_date'           => true,
        'ed_instagram'                  => false,
        'ed_blog_title'                 => true,
        'ed_blog_desc'                  => false,
        'blog_alignment'                => 'center',
        'blog_crop_image'               => true,
        'blog_content'                  => 'excerpt',
        'excerpt_length'                => 20,
        'read_more_text'                => __( 'Read More', 'shopexcel' ),
        'blog_meta_order'               => array( 'author', 'date' ),
        'ed_post_featured_image'        => true,
        'post_crop_image'               => true,
        'post_meta_order'               => array( 'date', 'reading-time' ),
        'read_words_per_minute'         => 200,
        'ed_post_tags'                  => true,
        'ed_post_category'              => true,
        'ed_post_pagination'            => true,
        'ed_author'                     => true,
        'author_title'                  => __( 'About Author', 'shopexcel' ),
        'ed_related'                    => true,
        'related_post_title'            => __( 'You may also like...', 'shopexcel' ),
        'no_of_posts_rp'                => 4,
        'ed_post_comments'              => true,
        'single_comment_form'           => 'below',
        'toggle_comments'               => 'end-post',
        'ed_page_title'                 => true,
        'pagetitle_alignment'           => 'center',
        'ed_page_featured_image'        => true,
        'ed_page_comments'              => false,
        'ed_archive_title'              => true,
        'ed_archive_desc'               => true,
        'archivetitle_alignment'        => 'center',
        'ed_archive_post_count'         => true,
        'ed_prefix_archive'             => true,
        'header_bg_img'                 => ''
    );
    return apply_filters( 'shopexcel_general_defaults', $defaults );
}
endif;