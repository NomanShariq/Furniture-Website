<?php
/**
 * Shopexcel Woocommerce hooks and functions.
 *
 * @link https://docs.woothemes.com/document/third-party-custom-theme-compatibility/
 *
 * @package Shopexcel
 */

/**
 * Woocommerce related hooks
*/
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content',  'woocommerce_output_content_wrapper_end', 10 );
remove_action( 'woocommerce_sidebar',             'woocommerce_get_sidebar', 10 );

if( ! function_exists( 'shopexcel_woocommerce_support' ) ) :
/**
 * Declare Woocommerce Support
*/
function shopexcel_woocommerce_support() {
    global $woocommerce;
    
    add_theme_support( 'woocommerce' );
    
    if( version_compare( $woocommerce->version, '3.0', ">=" ) ) {
        add_theme_support( 'wc-product-gallery-zoom' );
        add_theme_support( 'wc-product-gallery-lightbox' );
        add_theme_support( 'wc-product-gallery-slider' );
    }
}
endif;
add_action( 'after_setup_theme', 'shopexcel_woocommerce_support');

if( ! function_exists( 'shopexcel_wc_widgets_init' ) ) :
/**
 * Woocommerce Sidebar
*/
function shopexcel_wc_widgets_init(){
    register_sidebar( array(
		'name'          => esc_html__( 'Shop Sidebar', 'shopexcel' ),
		'id'            => 'shop-sidebar',
		'description'   => esc_html__( 'Sidebar displaying only in woocommerce pages.', 'shopexcel' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );    
}
endif;
add_action( 'widgets_init', 'shopexcel_wc_widgets_init' );

if( ! function_exists( 'shopexcel_wc_wrapper' ) ) :
/**
 * Before Content
 * Wraps all WooCommerce content in wrappers which match the theme markup
*/
function shopexcel_wc_wrapper(){    
    ?>
    <div class="page-grid">
        <div id="primary" class="content-area">
            <main id="main" class="site-main" role="main">
    <?php
}
endif;
add_action( 'woocommerce_before_main_content', 'shopexcel_wc_wrapper' );

if( ! function_exists( 'shopexcel_wc_wrapper_end' ) ) :
/**
 * After Content
 * Closes the wrapping divs
*/
function shopexcel_wc_wrapper_end(){
    ?>
                </main>
            </div>
        <?php do_action( 'shopexcel_wo_sidebar' ); ?>
    </div>
    <?php
}
endif;
add_action( 'woocommerce_after_main_content', 'shopexcel_wc_wrapper_end' );

if( ! function_exists( 'shopexcel_wc_sidebar_cb' ) ) :
/**
 * Callback function for Shop sidebar
*/
function shopexcel_wc_sidebar_cb(){
    if( is_active_sidebar( 'shop-sidebar' ) ){
        echo '<aside id="secondary" class="widget-area" role="complementary">';
        dynamic_sidebar( 'shop-sidebar' );
        echo '</aside>'; 
    }
}
endif;
add_action( 'shopexcel_wo_sidebar', 'shopexcel_wc_sidebar_cb' );

/**
 * Removes the "shop" title on the main shop page
*/
add_filter( 'woocommerce_show_page_title' , '__return_false' );

if( ! function_exists( 'shopexcel_wc_cart_count' ) ) :
/**
 * Woocommerce Cart Count
 * 
 * @link https://isabelcastillo.com/woocommerce-cart-icon-count-theme-header 
*/
function shopexcel_wc_cart_count(){
    $cart_page = get_option( 'woocommerce_cart_page_id' );
    $count = WC()->cart->cart_contents_count; 
    if( $cart_page){ ?>
        <div class="header-cart">
            <a href="<?php echo esc_url( wc_get_cart_url() ); ?>" class="cart" title="<?php esc_attr_e( 'View your shopping cart', 'shopexcel' ); ?>">
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><g clip-path="url(#clip0_196_1496)"><path d="M18.3332 3.33325H4.1665L6.6665 11.6666H15.8332L18.3332 3.33325Z" stroke="inherit" fill="none" stroke-opacity="0.9" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M6.52162 11.7998L5.10861 14.9375L5.08325 15.0175H16.3981" stroke="inherit" fill="none" stroke-opacity="0.9" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><ellipse cx="7.08317" cy="17.9167" rx="0.416667" ry="0.416666" stroke="inherit" stroke-opacity="0.9" stroke-width="2"/><ellipse cx="14.6122" cy="17.9203" rx="0.416667" ry="0.416667" stroke="inherit" stroke-opacity="0.9" stroke-width="2"/><path d="M6.66634 11.67L3.66793 1.66602H1.66309" stroke="inherit" stroke-opacity="0.9" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></g><defs><clipPath id="clip0_196_1496"><rect width="20" height="20" fill="white" transform="translate(-0.000244141)"/></clipPath></defs></svg>
                <span class="number"><?php echo absint( $count ); ?></span>
            </a>
        </div>
    <?php
    }
}
endif;

if( ! function_exists( 'shopexcel_add_to_cart_fragment' ) ) :
/**
 * Ensure cart contents update when products are added to the cart via AJAX
 *
 * @link https://isabelcastillo.com/woocommerce-cart-icon-count-theme-header
 */
function shopexcel_add_to_cart_fragment( $fragments ){
    ob_start();
    $count = WC()->cart->cart_contents_count; ?>
    <div class="header-cart">
        <a href="<?php echo esc_url( wc_get_cart_url() ); ?>" class="cart" title="<?php esc_attr_e( 'View your shopping cart', 'shopexcel' ); ?>">
            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="none" xmlns="http://www.w3.org/2000/svg"><g clip-path="url(#clip0_196_1496)"><path d="M18.3332 3.33325H4.1665L6.6665 11.6666H15.8332L18.3332 3.33325Z" stroke="inherit" fill="none" stroke-opacity="0.9" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M6.52162 11.7998L5.10861 14.9375L5.08325 15.0175H16.3981" stroke="inherit" fill="none" stroke-opacity="0.9" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><ellipse cx="7.08317" cy="17.9167" rx="0.416667" ry="0.416666" stroke="inherit" fill="none" stroke-opacity="0.9" stroke-width="2"/><ellipse cx="14.6122" cy="17.9203" rx="0.416667" ry="0.416667" stroke="inherit" fill="none" stroke-opacity="0.9" stroke-width="2"/><path d="M6.66634 11.67L3.66793 1.66602H1.66309" stroke="inherit" stroke-opacity="0.9" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></g><defs><clipPath id="clip0_196_1496"><rect width="20" height="20" fill="white" stroke="none" transform="translate(-0.000244141)"/></clipPath></defs></svg>
            <span class="number"><?php echo absint( $count ); ?></span>
        </a>
    </div>
    <?php

    $fragments['a.cart'] = ob_get_clean();

    return $fragments;
}
endif;
add_filter( 'woocommerce_add_to_cart_fragments', 'shopexcel_add_to_cart_fragment' );

if( ! function_exists( 'shopexcel_add_cart_ajax' ) ) :
/**
 * Ajax Callback for adding product in cart
 *
*/
function shopexcel_add_cart_ajax() {
	global $woocommerce;
    
    $product_id = $_POST['product_id'];

	WC()->cart->add_to_cart( $product_id, 1 );
	$count = WC()->cart->cart_contents_count;
	$cart_url = $woocommerce->cart->get_cart_url(); 
    
    ?>
    <a href="<?php echo esc_url( $cart_url ); ?>" rel="bookmark" class="btn-add-to-cart"><?php esc_html_e( 'View Cart', 'shopexcel' ); ?></a>
    <input type="hidden" id="<?php echo esc_attr( 'cart-' . $product_id ); ?>" value="<?php echo esc_attr( $count ); ?>" />
    <?php 
    die();
}
endif;
add_action( 'wp_ajax_shopexcel_add_cart_single', 'shopexcel_add_cart_ajax' );
add_action( 'wp_ajax_nopriv_shopexcel_add_cart_single', 'shopexcel_add_cart_ajax' );


if( ! function_exists( 'shopexcel_wishlist' ) ) :
/**
 * Header Wishlist Block
*/
function shopexcel_wishlist(){ 
    if( shopexcel_is_woocommerce_activated() && shopexcel_is_yith_whislist_activated() ) : 
        $defaults     = shopexcel_get_general_defaults();
        $whislist_url = yith_wcwl_object_id( get_option( 'yith_wcwl_wishlist_page_id' ) );
        $ed_whislist  = get_theme_mod( 'ed_woo_wishlist', $defaults['ed_woo_wishlist'] );
        if( $ed_whislist && $whislist_url ) : ?> 
            <div class="favourite-block">
                <a href="<?php the_permalink( $whislist_url ); ?>" class="favourite" title="<?php esc_attr_e( 'View your favourite cart', 'shopexcel' ); ?>">
                    <svg width="21" height="22" viewBox="0 0 21 22" fill="none"  xmlns="http://www.w3.org/2000/svg"><path d="M10.8332 19.3334L18.5474 11.387C20.484 9.39209 20.484 6.15777 18.5474 4.1629C16.6108 2.16803 13.471 2.16803 11.5345 4.1629L10.8332 4.88532L10.1319 4.1629C8.1953 2.16803 5.0555 2.16803 3.11893 4.1629C1.18236 6.15777 1.18236 9.39209 3.11893 11.387L10.8332 19.3334Z" stroke="inherit" fill="none" stroke-opacity="0.9" stroke-width="2" stroke-linejoin="round"/></svg>
                    <span class="count"><?php echo yith_wcwl_count_products(); ?></span>
                </a>
            </div>
            <?php
        endif; 
    endif; 
}
endif;

if( ! function_exists( 'shopexcel_woo_user_account' ) ) :
/**
 * Header User Account Block
*/
function shopexcel_woo_user_account(){ 

    if( shopexcel_is_woocommerce_activated() && wc_get_page_id( 'myaccount' ) ) : 
        ?>
        <div class="user-block">
            <a href="<?php the_permalink( wc_get_page_id( 'myaccount' ) ); ?>">
                <svg width="21" height="20" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M10.6666 9.16667C12.5075 9.16667 13.9999 7.67428 13.9999 5.83333C13.9999 3.99238 12.5075 2.5 10.6666 2.5C8.82564 2.5 7.33325 3.99238 7.33325 5.83333C7.33325 7.67428 8.82564 9.16667 10.6666 9.16667Z" fill="none" stroke="inherit" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M16.3331 17.5C16.3331 18.0523 16.7808 18.5 17.3331 18.5C17.8854 18.5 18.3331 18.0523 18.3331 17.5H16.3331ZM2.99976 17.5C2.99976 18.0523 3.44747 18.5 3.99976 18.5C4.55204 18.5 4.99976 18.0523 4.99976 17.5H2.99976ZM9.33309 13.5H11.9998V11.5H9.33309V13.5ZM11.9998 13.5C14.4548 13.5 16.3331 15.3507 16.3331 17.5H18.3331C18.3331 14.1265 15.4358 11.5 11.9998 11.5V13.5ZM9.33309 11.5C5.89706 11.5 2.99976 14.1265 2.99976 17.5H4.99976C4.99976 15.3507 6.87808 13.5 9.33309 13.5V11.5Z" fill="inherit" stroke="none"/></svg>
            </a>
            <?php if ( is_user_logged_in() ): ?>
                <div class="user-block-popup">
                    <?php
                    $orders             = get_option( 'woocommerce_myaccount_orders_endpoint', 'orders' );
                    $edit_account       = get_option( 'woocommerce_myaccount_edit_account_endpoint', 'edit-account' );
                    $customer_logout    = get_option( 'woocommerce_logout_endpoint', 'customer-logout' );

                    ?>
                    <?php if( $orders ) : ?> <li><a class="user-order" href="<?php echo esc_url( wc_get_account_endpoint_url( $orders ) ); ?>"><?php esc_html_e( 'My Orders','shopexcel' ); ?></a></li><?php endif; ?>
                    <?php if( $edit_account ) : ?><li><a class="user-account-edit" href="<?php echo esc_url( wc_get_account_endpoint_url( $edit_account ) ); ?>"><?php esc_html_e( 'Edit Account','shopexcel' ); ?></a></li><?php endif; ?>
                    <?php if( $customer_logout ) : ?><li><a class="user-account-log" href="<?php echo esc_url( wc_get_account_endpoint_url( $customer_logout ) ); ?>"><?php esc_html_e( 'Logout','shopexcel' ); ?></a></li><?php endif; ?>
                </div>
            <?php endif; ?>
        </div>
        <?php
    endif; 
}
endif;

/**
 * Add pagination layouts for shop page
 */
if( shopexcel_pro_is_activated() ){
    remove_action( 'woocommerce_after_shop_loop', 'woocommerce_pagination', 10 );
    add_action( 'woocommerce_after_shop_loop', 'shopexcel_navigation', 10 );
}