<?php
/**
 * Active Callback
 * 
 * @package Shopexcel
*/

if ( ! function_exists( 'shopexcel_blog_view_all_ac' ) ) : 
/**
 * Active Callback for Blog View All Button
*/
function shopexcel_blog_view_all_ac(){
    $blog = get_option( 'page_for_posts' );
    if( $blog ) return true;
    
    return false; 
}
endif;

if( ! function_exists( 'shopexcel_scroll_to_top_ac' ) ) :
/**
 * Active Callback for Scroll to top button
*/
function shopexcel_scroll_to_top_ac($control){
    $ed_scroll_top = $control->manager->get_setting( 'ed_scroll_top' )->value();
    
    if ( $ed_scroll_top ) return true;
    
    return false;
}
endif;


if( ! function_exists( 'shopexcel_performance_fonts' ) ) :
/**
*Fonts Performance Active Callback 
*/
function shopexcel_performance_fonts( $control ){
    $ed_google_fonts_locally  = $control->manager->get_setting( 'ed_localgoogle_fonts' )->value();
    $control_id               = $control->id;
    
    if ( $control_id == 'ed_preload_local_fonts' && $ed_google_fonts_locally === true ) return true;
    if ( $control_id == 'flush_google_fonts' && $ed_google_fonts_locally === true) return true;

    return false;
}
endif;

if( ! function_exists( 'shopexcel_seo_breadcrumb_ac' ) ) :
/**
* Breadcrumb Active Callback 
*/
function shopexcel_seo_breadcrumb_ac( $control ){
    $control_id  = $control->id;
    $ed_breadcrumb = $control->manager->get_setting( 'ed_breadcrumb' )->value();

    if( $control_id == 'home_text' && $ed_breadcrumb == true) return true;
    if( $control_id == 'separator_icon' && $ed_breadcrumb == true) return true;

    return false;
}
endif;

if( ! function_exists( 'shopexcel_read_words_per_min_ac' ) ) :
/**
* Blog page read words per minute callback 
*/
function shopexcel_read_words_per_min_ac( $control ){
    $control_id      = $control->id;
    $blog_meta_order = $control->manager->get_setting( 'blog_meta_order' )->value();

    if( $control_id == 'read_words_per_minute' && in_array( 'reading-time', $blog_meta_order ) ) return true;

    return false;
}
endif;

if( ! function_exists( 'shopexcel_related_post_ac' ) ) :
/**
 * Active Callback for related posts
*/
function shopexcel_related_post_ac( $control ){
    
    $ed_related_post = $control->manager->get_setting( 'ed_related' )->value();
    $control_id      = $control->id;

    if ( $control_id == 'related_post_title' && $ed_related_post ) return true;
    if ( $control_id == 'no_of_posts_rp' && $ed_related_post ) return true;
}
endif;

if( ! function_exists( 'shopexcel_post_comment_ac' ) ) :
/**
 * Active Callback for comment toggle
*/
function shopexcel_post_comment_ac( $control ){
    $ed_comment = $control->manager->get_setting( 'ed_post_comments' )->value();
    $control_id = $control->id;

    if ( $control_id == 'toggle_comments' && $ed_comment == true ) return true;
    if ( $control_id == 'single_comment_form' && $ed_comment == true ) return true;
    
    return false;
}
endif;

if( ! function_exists( 'shopexcel_author_section_ac' ) ) :
/**
 * Active Callback for author box
*/
function shopexcel_author_section_ac( $control ){
    $ed_author = $control->manager->get_setting( 'ed_author' )->value();
    $control_id = $control->id;

    if ( $control_id == 'author_title' && $ed_author == true ) return true;
    
    return false;
}
endif;

if( ! function_exists( 'shopexcel_social_media_ac' ) ) :
/**
 * Active Callback for social media
*/
function shopexcel_social_media_ac( $control ){
    $ed_social_media = $control->manager->get_setting( 'ed_social_links' )->value();
    $control_id = $control->id;

    if ( $control_id == 'ed_social_links_new_tab' && $ed_social_media == true ) return true;
    if ( $control_id == 'social_media_order' && $ed_social_media == true ) return true;
    if ( $control_id == 'header_social_media_text' && $ed_social_media == true ) return true;
    
    return false;
}
endif;