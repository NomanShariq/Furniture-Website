<?php
/**
 * Shopexcel Customizer Partials
 *
 * @package Shopexcel
 */

if( ! function_exists( 'shopexcel_customize_partial_blogname' ) ) :
/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function shopexcel_customize_partial_blogname() {
	bloginfo( 'name' );
}
endif;

if( ! function_exists( 'shopexcel_customize_partial_blogdescription' ) ) :
/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function shopexcel_customize_partial_blogdescription() {
	bloginfo( 'description' );
}
endif;

if( ! function_exists( 'shopexcel_header_phone_label' ) ) :
/**
 * Header Email
*/
function shopexcel_header_phone_label(){
    $defaults    = shopexcel_get_general_defaults();
    $phone_label = get_theme_mod( 'header_phone_label', $defaults['header_phone_label'] );
    if( $phone_label ) echo '<span class="contact-phone-label">' . esc_html( $phone_label ) . '</span>';
}
endif;

if( ! function_exists( 'shopexcel_header_phone_partial' ) ) :
/**
 * Header Phone
*/
function shopexcel_header_phone_partial(){    
    $defaults = shopexcel_get_general_defaults();
    $phone    = get_theme_mod( 'header_phone', $defaults['header_phone'] );
    if( $phone ){ ?>
        <?php if( shopexcel_pro_is_activated() && ( get_theme_mod( 'header_layout') === 'three' || get_theme_mod( 'header_layout') === 'four' ) ){ ?>
            <span class="icon">
                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M13.0787 15.2772L13.0667 15.276C8.91677 14.8251 5.06541 12.4518 2.82428 8.92657C1.64161 7.10008 0.905578 5.02078 0.675795 2.85697L0.674773 2.84657C0.649784 2.57004 0.682648 2.29133 0.771274 2.02819C0.859899 1.76506 1.00234 1.52326 1.18954 1.31819C1.37673 1.11312 1.60458 0.949278 1.85856 0.837091C2.11255 0.724903 2.38711 0.66683 2.66477 0.666569L4.66245 0.666569C5.14648 0.662677 5.61554 0.834464 5.9826 1.15013C6.35057 1.46659 6.59092 1.90605 6.65884 2.3866L6.65971 2.39273C6.73751 2.98268 6.88176 3.56194 7.08974 4.11947C7.22402 4.47717 7.25304 4.86586 7.17334 5.23954C7.09359 5.61351 6.9083 5.95677 6.63944 6.22866L6.63681 6.23131L6.15874 6.70937C6.94265 7.93913 7.98617 8.98266 9.21593 9.76656L9.694 9.2885L9.69664 9.28587C9.96853 9.017 10.3118 8.83172 10.6858 8.75196C11.0594 8.67227 11.4481 8.70128 11.8058 8.83556C12.3634 9.04354 12.9426 9.18782 13.5326 9.26563L13.5385 9.26641C14.0243 9.33494 14.4679 9.57964 14.7851 9.95393C15.1002 10.3259 15.2686 10.8001 15.2587 11.2874V13.2799C15.2587 13.2799 15.3148 14.0184 14.6667 14.6665C13.9203 15.4129 13.0787 15.2772 13.0787 15.2772Z" fill="black"/>
                </svg>
            </span>
        <?php } ?>
        <a href="<?php echo esc_url( 'tel:' . preg_replace( '/[^\d+]/', '', $phone ) ); ?>" class="shply-header-phone">
            <?php echo esc_html( $phone ); ?>
        </a>
    <?php
    }
}
endif;

if( ! function_exists( 'shopexcel_footer_phone_label' ) ) :
/**
 * Footer Email
*/
function shopexcel_footer_phone_label(){
    $defaults    = shopexcel_get_general_defaults();
    $phone_label = get_theme_mod( 'footer_phone_label', $defaults['footer_phone_label'] );
    if( $phone_label ) echo '<span class="footer-label foot-phn">' . esc_html( $phone_label ) . '</span>';
}
endif;

if( ! function_exists( 'shopexcel_footer_phone_partial' ) ) :
/**
 * Footer Phone
*/
function shopexcel_footer_phone_partial(){    
    $defaults = shopexcel_get_general_defaults();
    $phone    = get_theme_mod( 'footer_phone', $defaults['footer_phone'] );
    if( $phone ){ ?>
        <h2 class="footer-data footer-phone-number">
            <a href="<?php echo esc_url( 'tel:' . preg_replace( '/[^\d+]/', '', $phone ) ); ?>" class="shply-footer-phone">
                <?php echo esc_html( $phone ); ?>
            </a>
        </h2>
    <?php
    }
}
endif;

if( ! function_exists( 'shopexcel_footer_email_label' ) ) :
/**
 * Header Email Label
*/
function shopexcel_footer_email_label(){
    $defaults    = shopexcel_get_general_defaults();
    $email_label = get_theme_mod( 'footer_email_label', $defaults['footer_email_label'] );
    if( $email_label ) echo '<span class="footer-label foot-email">' . esc_html( $email_label ) . '</span>';
}
endif;

if( ! function_exists( 'shopexcel_footer_email' ) ) :
/**
 * Header Email
*/
function shopexcel_footer_email(){
    $defaults = shopexcel_get_general_defaults();
    $email    = get_theme_mod( 'footer_email', $defaults['footer_email'] );
    if( $email ) echo '<h2 class="footer-data footer-email-wrap"><a href="' . esc_url( 'mailto:' . sanitize_email( $email ) ) . '" class="email-link">' . esc_html( $email ) . '</a></h2>';
}
endif;

if( ! function_exists( 'shopexcel_opening_hour_label' ) ) :
/**
 * Footer Opening Hour Label
*/
function shopexcel_opening_hour_label(){
    $defaults      = shopexcel_get_general_defaults();
    $opening_label = get_theme_mod( 'opening_hour_label', $defaults['opening_hour_label'] );
    if( $opening_label ) echo '<span class="footer-label foot-opn-hr">' . esc_html( $opening_label ) . '</span>';
}
endif;

if( ! function_exists( 'shopexcel_opening_hour' ) ) :
/**
 * Footer Opening Hours
*/
function shopexcel_opening_hour(){
    $defaults     = shopexcel_get_general_defaults();
    $opening_hour = get_theme_mod( 'opening_hour', $defaults['opening_hour'] );
    if( $opening_hour ) echo '<h2 class="footer-data footer-opn-hr">' . esc_html( $opening_hour ) . '</h2>';
}
endif;

if ( ! function_exists( 'shopexcel_get_home_text' ) ) :
/**
 * Breadcrumb Home Text
 */
function shopexcel_get_home_text() {
    $defaults = shopexcel_get_general_defaults();
    return esc_html( get_theme_mod( 'home_text', $defaults['home_text'] ) );
}
endif;

if( ! function_exists( 'shopexcel_get_read_more' ) ) :
/**
 * Display blog readmore button
*/
function shopexcel_get_read_more(){
    $defaults = shopexcel_get_general_defaults();
    return esc_html( get_theme_mod( 'read_more_text', $defaults['read_more_text'] ) );    
}
endif;

if( ! function_exists( 'shopexcel_get_author_title' ) ) :
/**
 * Display blog readmore button
*/
function shopexcel_get_author_title(){
    $defaults = shopexcel_get_general_defaults();
    return esc_html( get_theme_mod( 'author_title', $defaults['author_title'] ) );
}
endif;

if( ! function_exists( 'shopexcel_get_related_title' ) ) :
/**
 * Display blog readmore button
*/
function shopexcel_get_related_title(){
    $defaults = shopexcel_get_general_defaults();
    return esc_html( get_theme_mod( 'related_post_title', $defaults['related_post_title']) );
}
endif;

if( ! function_exists( 'shopexcel_get_footer_copyright' ) ) :
/**
 * Footer Copyright
*/
function shopexcel_get_footer_copyright(){
    $defaults  = shopexcel_get_general_defaults();
    $copyright = get_theme_mod( 'footer_copyright', $defaults['footer_copyright'] );
    echo '<span class="copyright">';
    if( $copyright ){
        if( shopexcel_pro_is_activated() ){
            echo wp_kses_post( shopexcel_apply_theme_shortcode( $copyright ) );
        } else {
            echo wp_kses_post( $copyright );
        }
    }else{
        esc_html_e( '&copy; Copyright ', 'shopexcel' );
        echo date_i18n( esc_html__( 'Y', 'shopexcel' ) );
        echo ' <a href="' . esc_url( home_url( '/' ) ) . '">' . esc_html( get_bloginfo( 'name' ) ) . '</a>. ';
        esc_html_e( 'All Rights Reserved. ', 'shopexcel' );
    }
    echo '</span>'; 
}
endif;