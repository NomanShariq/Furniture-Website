<?php
/**
 * Shopexcel Standalone Functions.
 *
 * @package Shopexcel
 */

if( ! function_exists( 'shopexcel_site_branding' ) ) :
/**
 * Site Branding
*/
function shopexcel_site_branding( $mobile = false ){
    $site_title       = get_bloginfo( 'name' );
    $site_description = get_bloginfo( 'description', 'display' );

    if( has_custom_logo() || $site_title || $site_description ) :
        if( has_custom_logo() && ( $site_title || $site_description ) ) {
            $branding_class = ' has-image-text';
        }else{
            $branding_class = '';
        }?>
        <div class="site-branding<?php echo esc_attr( $branding_class ); ?>" itemscope itemtype="https://schema.org/Organization">  
            <div class="site-logo">
                <?php 
                if( function_exists( 'has_custom_logo' ) && has_custom_logo() ){
                    the_custom_logo();
                }  ?>
            </div>

            <?php 
            if( $site_title || $site_description ) :
                echo '<div class="site-title-wrap">';
                if( is_front_page() && is_home() && !$mobile ){ ?>
                    <h1 class="site-title" itemprop="name"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" itemprop="url"><?php bloginfo( 'name' ); ?></a></h1>
                    <?php 
                }else{ ?>
                    <p class="site-title" itemprop="name"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" itemprop="url"><?php bloginfo( 'name' ); ?></a></p>
                <?php }
                
                $description = get_bloginfo( 'description', 'display' );
                if ( $description || is_customize_preview() ){ ?>
                    <p class="site-description" itemprop="description"><?php echo $description; ?></p>
                <?php }
                echo '</div>';
            endif; ?>
        </div>    
    <?php endif;
}
endif;

if( ! function_exists( 'shopexcel_primary_navigation' ) ) :
/**
 * Primary Navigation.
*/
function shopexcel_primary_navigation(){
    $data_stretch = '';
    if( shopexcel_pro_is_activated() ){
        $prodefaults   = shopexcel_pro_get_customizer_defaults();
        $menu_stretch  = get_theme_mod('header_strech_menu', $prodefaults['header_strech_menu']);
        $data_stretch  = $menu_stretch ? 'data-stretch=yes' : 'data-stretch=no';
    }
    if( current_user_can( 'manage_options' ) || has_nav_menu( 'primary' ) ) {
        ?>
        <nav id="site-navigation" class="main-navigation" itemscope itemtype="https://schema.org/SiteNavigationElement" <?php echo esc_attr($data_stretch); ?>>
            <?php
                wp_nav_menu( array(
                    'theme_location'  => 'primary',
                    'menu_id'         => 'primary-menu',
                    'menu_class'      => 'nav-menu',
                    'container_class' => 'primary-menu-container',
                    'fallback_cb'     => 'shopexcel_primary_menu_fallback',
                ) );
            ?>
        </nav><!-- #site-navigation -->
        <?php
    }
}
endif;

if( ! function_exists( 'shopexcel_primary_menu_fallback' ) ) :
/**
 * Fallback for primary menu
*/
function shopexcel_primary_menu_fallback(){
    if( current_user_can( 'manage_options' ) ){
        echo '<ul id="primary-menu" class="nav-menu">';
        echo '<li><a href="' . esc_url( admin_url( 'nav-menus.php' ) ) . '">' . esc_html__( 'Click here to add a menu', 'shopexcel' ) . '</a></li>';
        echo '</ul>';
    }
}
endif;

if( ! function_exists( 'shopexcel_mobile_navigation' ) ) :
/**
 * Mobile Navigation
*/
function shopexcel_mobile_navigation(){ 
    $defaults        = shopexcel_get_general_defaults();
    $proDefaults     = shopexcel_pro_is_activated() ? shopexcel_pro_get_customizer_defaults() : [];
    $ed_cart         = get_theme_mod( 'ed_woo_cart', $defaults['ed_woo_cart'] );
    $ed_acc          = get_theme_mod( 'ed_woo_account', $defaults['ed_woo_account'] );
    $ed_wish         = get_theme_mod( 'ed_woo_wishlist', $defaults['ed_woo_wishlist'] );
    $ed_search       = get_theme_mod( 'ed_header_search', $defaults['ed_header_search'] );
    $ed_social_media = get_theme_mod( 'ed_social_links', $defaults['ed_social_links'] );

    ?>
    <div class="mobile-header">
        <div class="header-main">
            <div class="container">
                <div class="header-center">
                    <?php shopexcel_site_branding( true ); ?>
                </div>
                <div class="mob-nav-site-branding-wrap">
                    <div class="toggle-btn-wrap">
                        <button class="toggle-btn" data-toggle-target=".main-menu-modal" data-toggle-body-class="showing-main-menu-modal" aria-expanded="false" data-set-focus=".close-main-nav-toggle">
                            <span class="toggle-bar"></span>
                            <span class="toggle-bar"></span>
                            <span class="toggle-bar"></span>
                        </button>
                        <div class="mobile-header-popup">
                            <div class="header-bottom-slide mobile-menu-list main-menu-modal cover-modal" data-modal-target-string=".main-menu-modal">
                                <div class="header-bottom-slide-inner mobile-menu" aria-label="<?php esc_attr_e( 'Mobile', 'shopexcel' ); ?>">
                                    <div class="container">
                                        <div class="mobile-header-wrap">
                                            <button class="close close-main-nav-toggle" data-toggle-target=".main-menu-modal" data-toggle-body-class="showing-main-menu-modal" aria-expanded="false" data-set-focus=".main-menu-modal"></button>
                                            <?php if( $ed_search ) shopexcel_search(); ?>
                                        </div>
                                        <div class="mobile-header-wrapper">
                                            <div class="header-left">
                                                <?php 
                                                    shopexcel_primary_navigation();
                                                    if (shopexcel_pro_is_activated() && get_theme_mod('header_layout', $proDefaults['header_layout'] ) !== 'one' )
                                                    shopexcel_secondary_navigation(); 
                                                ?>

                                            </div>
                                        </div>
                                        <?php if( $ed_social_media ){ ?>
                                            <div class="header-social-wrapper">
                                                <div class="header-social">
                                                    <?php
                                                        $social_icons = new Shopexcel_Social_Lists;
                                                        $social_icons->shopexcel_social_links();
                                                    ?>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php if( $ed_cart || $ed_wish ){ ?>
                        <div class="header-right">
                            <?php
                                if( shopexcel_is_woocommerce_activated() && $ed_acc ) shopexcel_woo_user_account();
                                if( shopexcel_is_woocommerce_activated() && $ed_cart ) shopexcel_wc_cart_count();
                                if( shopexcel_is_woocommerce_activated() && $ed_wish ) shopexcel_wishlist();
                            ?>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
<?php }
endif;

if( ! function_exists( 'shopexcel_search' ) ) :
/**
 * Search form Section
*/
function shopexcel_search(){
    $defaults  = shopexcel_get_general_defaults();
    $ed_search = get_theme_mod( 'ed_header_search', $defaults['ed_header_search'] ); 
    if( $ed_search ){ ?>
        <div class="header-search">
            <button class="search-toggle" data-toggle-target=".search-modal" data-toggle-body-class="showing-search-modal" data-set-focus=".search-modal .search-field" aria-expanded="false">
                <svg width="21" height="20" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9.83325 16.6667C13.9754 16.6667 17.3333 13.3089 17.3333 9.16675C17.3333 5.02461 13.9754 1.66675 9.83325 1.66675C5.69112 1.66675 2.33325 5.02461 2.33325 9.16675C2.33325 13.3089 5.69112 16.6667 9.83325 16.6667Z" stroke="inherit" fill="none" stroke-opacity="0.9" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M18.1665 17.5L15.6665 15" stroke="inherit" fill="none" stroke-opacity="0.9" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </button>
            <div class="header-search-wrap search-modal cover-modal" data-modal-target-string=".search-modal">
                <div class="header-search-inner">
                    <button aria-label="<?php esc_attr_e( 'search form close', 'shopexcel' ); ?>" class="close" data-toggle-target=".search-modal" data-toggle-body-class="showing-search-modal" data-set-focus=".search-modal .search-field" aria-expanded="false"></button>
                    <?php get_search_form(); ?>
                </div>
            </div>
        </div>
    <?php }
    }
endif;

if( ! function_exists( 'shopexcel_header_phone' ) ) :
/**
 * Header Phone
*/
function shopexcel_header_phone(){    
    $defaults = shopexcel_get_general_defaults();
    $phone    = get_theme_mod( 'header_phone', $defaults['header_phone'] );
    if( $phone ){ ?>
        <span class="header-data contact-phone-wrap">
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
        </span>
    <?php
    }
}
endif;

if ( ! function_exists( 'shopexcel_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog.
 *
 */
function shopexcel_header_style() {
    $defaults           = shopexcel_get_site_defaults();
    $color_defaults     = shopexcel_get_color_defaults();
    $hide_title         = get_theme_mod( 'hide_title', $defaults['hide_title'] );
    $hide_tagline       = get_theme_mod( 'hide_tagline', $defaults['hide_tagline'] );
    $site_title_color   = get_theme_mod( 'site_title_color', $color_defaults['site_title_color'] );
    $site_tagline_color = get_theme_mod( 'site_tagline_color', $color_defaults['site_tagline_color'] );
    ?>
    <style type="text/css">
    <?php if ( $hide_title  ) { ?>
            .site-title {
                position: absolute;
                clip: rect(1px, 1px, 1px, 1px);
            }
        <?php }else{ ?>
            .site-branding .site-title a{
                color: <?php echo esc_attr( $site_title_color ); ?>;
            }
        <?php } ?>

        <?php if ( $hide_tagline ) { ?>
            .site-description {
                position: absolute;
                clip: rect(1px, 1px, 1px, 1px);
            }
        <?php }else{ ?>
            .site-branding .site-description {
                color: <?php echo esc_attr( $site_tagline_color ); ?>;
            }
        <?php } ?>
    </style>
    <?php
}
endif;

if ( ! function_exists( 'shopexcel_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time.
 */
function shopexcel_posted_on() {
    $defaults = shopexcel_get_general_defaults();
	$ed_updated_post_date = get_theme_mod( 'ed_post_update_date', $defaults['ed_post_update_date'] );
    $on = '';
    
    if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		if( $ed_updated_post_date && ( get_the_modified_time( 'U' ) > get_the_time( 'U' ) ) ){
            $time_string = '<time class="entry-date published updated" datetime="%3$s" itemprop="dateModified">%4$s</time><time class="updated" datetime="%1$s" itemprop="datePublished">%2$s</time>';
            $on = __( 'Updated on ', 'shopexcel' );		  
		}else{
            $time_string = '<time class="entry-date published" datetime="%1$s" itemprop="datePublished">%2$s</time><time class="updated" datetime="%3$s" itemprop="dateModified">%4$s</time>';  
		}        
	}else{
        $time_string = '<time class="entry-date published updated" datetime="%1$s" itemprop="datePublished">%2$s</time><time class="updated" datetime="%3$s" itemprop="dateModified">%4$s</time>';   
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);
    
    $posted_on = sprintf( '%1$s %2$s', esc_html( $on ), '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>' );
	
	echo '<span class="posted-on">' . $posted_on . '</span>'; // WPCS: XSS OK.

}
endif;

if ( ! function_exists( 'shopexcel_posted_by' ) ) :
/**
 * Prints HTML with meta information for the current author.
 */
function shopexcel_posted_by() {
    global $post;
    $author_id = $post->post_author;
    $byline = sprintf(
        /* translators: %s: post author. */
        esc_html('%s') , '<span class="author vcard"><a class="url fn n" href="' . esc_url(get_author_posts_url(get_the_author_meta('ID', $author_id))) . '" itemprop="url"><span itemprop="name">' . esc_html(get_the_author_meta('display_name', $author_id)) . '</span></a></span>'
    );
    
	echo '<span class="byline" itemprop="author" itemscope itemtype="https://schema.org/Person">' . $byline . '</span>';
}
endif;

if( ! function_exists( 'shopexcel_comment_count' ) ) :
/**
 * Comment Count
*/
function shopexcel_comment_count(){
    if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments"><i class="far fa-comment"></i>';
		comments_popup_link(
			sprintf(
				wp_kses(
					/* translators: %s: post title */
					__( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'shopexcel' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			)
		);
		echo '</span>';
	}    
}
endif;

if( ! function_exists( 'shopexcel_related_posts' ) ) :
/**
 * Related Posts 
*/
function shopexcel_related_posts(){
    $defaults        = shopexcel_get_general_defaults();
    $ed_related_post = get_theme_mod( 'ed_related', $defaults['ed_related'] );
    if( $ed_related_post ){
        shopexcel_get_posts_list( 'related' );    
    }
}
endif;

if ( ! function_exists( 'shopexcel_comment_toggle' ) ):
/**
 * Function toggle comment section position
*/
function shopexcel_comment_toggle(){
    $defaults        = shopexcel_get_general_defaults();
    $comment_postion = get_theme_mod( 'toggle_comments', $defaults['toggle_comments'] );

    if ( $comment_postion === 'below-post' ) {
        $priority = 5;
    }else{
        $priority = 40;
    }
    return absint( $priority ) ;
}
endif;

if( ! function_exists( 'shopexcel_estimated_reading_time' ) ) :
/** 
 * Reading Time Calculate Function 
*/
function shopexcel_estimated_reading_time( $content ) {
    $defaults = shopexcel_get_general_defaults();
    $wpm = get_theme_mod( 'read_words_per_minute', $defaults['read_words_per_minute'] );
    $clean_content = strip_shortcodes( $content );
    $clean_content = strip_tags( $clean_content );
    $word_count = str_word_count( $clean_content );
    $time = ceil( $word_count / $wpm );
    echo '<span class="post-read-time">' . absint( $time ) . esc_html__( ' min read', 'shopexcel' ) . '</span>';
}
endif;

if ( ! function_exists( 'shopexcel_category' ) ) :
/**
 * Prints categories
 */
function shopexcel_category(){
	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( ' ' );
		if ( $categories_list ) {
			echo '<span class="cat-links" itemprop="about">' . $categories_list . '</span>';
		}
	}
}
endif;

if ( ! function_exists( 'shopexcel_tag' ) ) :
/**
 * Prints tags
 */
function shopexcel_tag(){
	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {
		$tags_list = get_the_tag_list( '', ' ' );
		if ( $tags_list ) {
			/* translators: 1: list of tags. */
			printf( '<div class="tags" itemprop="about">' . esc_html__( '%1$sTags:%2$s %3$s', 'shopexcel' ) . '</div>', '<span>', '</span>', $tags_list );
		}
	}
}
endif;

if( ! function_exists( 'shopexcel_get_posts_list' ) ) :
/**
 * Returns Latest, Related & Popular Posts
*/
function shopexcel_get_posts_list( $status ){
    global $post;
    $defaults         = shopexcel_get_general_defaults();
    $related_post_num = get_theme_mod( 'no_of_posts_rp', $defaults['no_of_posts_rp'] );
    $prodefaults      = shopexcel_pro_is_activated() ? shopexcel_pro_get_customizer_defaults() : [];
    $post_type        = shopexcel_pro_is_activated() ? get_theme_mod( 'posts_or_products', $prodefaults['posts_or_products']) : 'post';
    $post_num         = shopexcel_pro_is_activated() ? get_theme_mod( 'no_of_posts_404', $prodefaults['no_of_posts_404'] ) : 3;

    $args = array(
        'posts_status'        => 'publish',
        'ignore_sticky_posts' => true
    );

    switch( $status ){
        case 'latest':        
        $args['post_type']      = $post_type;
        $args['posts_per_page'] = $post_num;
        $relatedPostTitle       = __( 'Recommended For You', 'shopexcel' );
        $class                  = 'related-posts';
        $image_size             = 'shopexcel-withsidebar';
        break;
        
        case 'related':
        $args['post_type']      = 'post';
        $args['posts_per_page'] = $related_post_num;
        $args['post__not_in']   = array( $post->ID );
        $args['orderby']        = 'rand';
        $relatedPostTitle       = get_theme_mod( 'related_post_title', $defaults['related_post_title'] );
        $class                  = 'related-posts';
        $image_size             = 'shopexcel-related';        
        $cats                   = get_the_category( $post->ID );        
        if( $cats ){
            $c = array();
            foreach( $cats as $cat ){
                $c[] = $cat->term_id; 
            }
            $args['category__in'] = $c;
        }        
        break;
    }
    
    $qry = new WP_Query( $args );
    
    if( $qry->have_posts() ){ ?>    
        <div class="<?php echo esc_attr( $class ); ?>">
    		<?php if( $relatedPostTitle ) echo '<h2 class="title">' . esc_html( $relatedPostTitle ) . '</h2>'; ?>
            <div class="article-wrap">
                <?php while( $qry->have_posts() ){ $qry->the_post(); ?>
                    <article class="post">
                        <a href="<?php the_permalink(); ?>" class="post-thumbnail">
                            <?php
                                if( has_post_thumbnail() ){
                                    the_post_thumbnail( $image_size, array( 'itemprop' => 'image' ) );
                                }else{ 
                                    shopexcel_get_fallback_svg( $image_size );//fallback
                                }
                            ?>
                        </a>
                        <header class="entry-header">
                            <?php
                                shopexcel_category();
                                the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
                                if ( is_single() ) shopexcel_posted_on();
                                if ( is_404() ) shopexcel_404_posted_on();
                            ?>                        
                        </header>
                    </article>
                <?php } ?>
            </div>
    	</div>
        <?php
        wp_reset_postdata();
    }
}
endif;

if( !function_exists( 'shopexcel_404_posted_on') ):
/**
 * Entry content for recommended posts in 404 page
 */
function shopexcel_404_posted_on(){
    if( shopexcel_pro_is_activated() ){
        $prodefaults = shopexcel_pro_get_customizer_defaults();
        if( shopexcel_is_woocommerce_activated() && get_theme_mod( 'posts_or_products', $prodefaults['posts_or_products'] ) === 'product'){
            woocommerce_template_loop_rating();
        } else {
            shopexcel_posted_on();
        }
    }else {
        shopexcel_posted_on();
    }
}
endif;

if( ! function_exists( 'shopexcel_breadcrumb' ) ) :
/**
 * Breadcrumbs
*/
function shopexcel_breadcrumb(){ 
    global $post;
    $defaults       = shopexcel_get_general_defaults();
    $post_page      = get_option( 'page_for_posts' ); //The ID of the page that displays posts.
    $show_front     = get_option( 'show_on_front' );  //What to show on the front page    
    $home           = get_theme_mod( 'home_text', $defaults['home_text'] ); // text for the 'Home' link
    $separator_icon = get_theme_mod('separator_icon', $defaults['separator_icon']);
    $delimiter      = '<span class="separator">' . shopexcel_breadcrumb_icons_list($separator_icon) . '</span>';
    $before         = '<span class="current" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">'; // tag before the current crumb
    $after          = '</span>'; // tag after the current crumb
    
    if( get_theme_mod( 'ed_breadcrumb', $defaults['ed_breadcrumb'] ) ){
        $depth = 1;
        echo '<div class="breadcrumb-wrapper"><div id="crumbs" itemscope itemtype="https://schema.org/BreadcrumbList">
                <span itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                    <a href="' . esc_url( home_url() ) . '" itemprop="item"><span itemprop="name" class="home-text">' . esc_html( $home ) . '</span></a><meta itemprop="position" content="'. absint( $depth ).'" />' . $delimiter . '</span>';
        
        if( is_home() ){ 
            $depth = 2;                       
            echo $before . '<a itemprop="item" href="'. esc_url( get_the_permalink() ) .'"><span itemprop="name">' . esc_html( single_post_title( '', false ) ) . '</span></a><meta itemprop="position" content="'. absint( $depth ).'" />' . $after;            
        }elseif( is_category() ){  
            $depth = 2;          
            $thisCat = get_category( get_query_var( 'cat' ), false );            
            if( $show_front === 'page' && $post_page ){ //If static blog post page is set
                $p = get_post( $post_page );
                echo '<span itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem"><a href="' . esc_url( get_permalink( $post_page ) ) . '" itemprop="item"><span itemprop="name">' . esc_html( $p->post_title ) . '</span></a><meta itemprop="position" content="'. absint( $depth ).'" />' . $delimiter . '</span>';
                $depth++;  
            }            
            if( $thisCat->parent != 0 ){
                $parent_categories = get_category_parents( $thisCat->parent, false, ',' );
                $parent_categories = explode( ',', $parent_categories );
                foreach( $parent_categories as $parent_term ){
                    $parent_obj = get_term_by( 'name', $parent_term, 'category' );
                    if( is_object( $parent_obj ) ){
                        $term_url  = get_term_link( $parent_obj->term_id );
                        $term_name = $parent_obj->name;
                        echo '<span itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem"><a itemprop="item" href="' . esc_url( $term_url ) . '"><span itemprop="name">' . esc_html( $term_name ) . '</span></a><meta itemprop="position" content="'. absint( $depth ).'" />' . $delimiter . '</span>';
                        $depth++;
                    }
                }
            }
            echo $before . '<a itemprop="item" href="' . esc_url( get_term_link( $thisCat->term_id) ) . '"><span itemprop="name">' .  esc_html( single_cat_title( '', false ) ) . '</span></a><meta itemprop="position" content="'. absint( $depth ).'" />' . $after;       
        }elseif( shopexcel_is_woocommerce_activated() && ( is_product_category() || is_product_tag() ) ){ //For Woocommerce archive page
            $depth = 2;
            $current_term = $GLOBALS['wp_query']->get_queried_object();            
            if( wc_get_page_id( 'shop' ) ){ //Displaying Shop link in woocommerce archive page
                $_name = wc_get_page_id( 'shop' ) ? get_the_title( wc_get_page_id( 'shop' ) ) : '';
                if ( ! $_name ) {
                    $product_post_type = get_post_type_object( 'product' );
                    $_name = $product_post_type->labels->singular_name;
                }
                echo '<span itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem"><a href="' . esc_url( get_permalink( wc_get_page_id( 'shop' ) ) ) . '" itemprop="item"><span itemprop="name">' . esc_html( $_name ) . '</span></a><meta itemprop="position" content="'. absint( $depth ).'" />' . $delimiter . '</span>';
                $depth++;
            }
            if( is_product_category() ){
                $ancestors = get_ancestors( $current_term->term_id, 'product_cat' );
                $ancestors = array_reverse( $ancestors );
                foreach ( $ancestors as $ancestor ) {
                    $ancestor = get_term( $ancestor, 'product_cat' );    
                    if ( ! is_wp_error( $ancestor ) && $ancestor ) {
                        echo '<span itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem"><a href="' . esc_url( get_term_link( $ancestor ) ) . '" itemprop="item"><span itemprop="name">' . esc_html( $ancestor->name ) . '</span></a><meta itemprop="position" content="'. absint( $depth ).'" />' . $delimiter . '</span>';
                        $depth++;
                    }
                }
            }
            echo $before . '<a itemprop="item" href="' . esc_url( get_term_link( $current_term->term_id ) ) . '"><span itemprop="name">' . esc_html( $current_term->name ) .'</span></a><meta itemprop="position" content="'. absint( $depth ).'" />' . $after;
        }elseif( shopexcel_is_woocommerce_activated() && is_shop() ){ //Shop Archive page
            $depth = 2;
            if( get_option( 'page_on_front' ) == wc_get_page_id( 'shop' ) ){
                return;
            }
            $_name    = wc_get_page_id( 'shop' ) ? get_the_title( wc_get_page_id( 'shop' ) ) : '';
            $shop_url = ( wc_get_page_id( 'shop' ) && wc_get_page_id( 'shop' ) > 0 )  ? get_the_permalink( wc_get_page_id( 'shop' ) ) : home_url( '/shop' );
            if( ! $_name ){
                $product_post_type = get_post_type_object( 'product' );
                $_name             = $product_post_type->labels->singular_name;
            }
            echo $before . '<a itemprop="item" href="' . esc_url( $shop_url ) . '"><span itemprop="name">' . esc_html( $_name ) . '</span></a><meta itemprop="position" content="' . absint( $depth ) . '" />' . $after;
        }elseif( is_tag() ){ 
            $depth          = 2;
            $queried_object = get_queried_object();
            echo $before . '<a itemprop="item" href="' . esc_url( get_term_link( $queried_object->term_id ) ) . '"><span itemprop="name">' . esc_html( single_tag_title( '', false ) ) . '</span></a><meta itemprop="position" content="' . absint( $depth ). '" />'. $after;
        }elseif( is_author() ){  
            global $author;
            $depth    = 2;
            $userdata = get_userdata( $author );
            echo $before . '<a itemprop="item" href="' . esc_url( get_author_posts_url( $author ) ) . '"><span itemprop="name">' . esc_html( $userdata->display_name ) .'</span></a><meta itemprop="position" content="' . absint( $depth ) . '" />' . $after;     
        }elseif( is_search() ){ 
            $depth       = 2;
            $request_uri = $_SERVER['REQUEST_URI'];
            echo $before . '<a itemprop="item" href="'. esc_url( $request_uri ) . '"><span itemprop="name">' . sprintf( __( 'Search Results for "%s"', 'shopexcel' ), esc_html( get_search_query() ) ) . '</span></a><meta itemprop="position" content="'. absint( $depth ).'" />' . $after;        
        }elseif( is_day() ){            
            $depth = 2;
            echo '<span itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem"><a href="' . esc_url( get_year_link( get_the_time( __( 'Y', 'shopexcel' ) ) ) ) . '" itemprop="item"><span itemprop="name">' . esc_html( get_the_time( __( 'Y', 'shopexcel' ) ) ) . '</span></a><meta itemprop="position" content="'. absint( $depth ).'" />' . $delimiter . '</span>';
            $depth++;
            echo '<span itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem"><a href="' . esc_url( get_month_link( get_the_time( __( 'Y', 'shopexcel' ) ), get_the_time( __( 'm', 'shopexcel' ) ) ) ) . '" itemprop="item"><span itemprop="name">' . esc_html( get_the_time( __( 'F', 'shopexcel' ) ) ) . '</span></a><meta itemprop="position" content="'. absint( $depth ).'" />' . $delimiter . '</span>';
            $depth++;
            echo $before . '<a itemprop="item" href="' . esc_url( get_day_link( get_the_time( __( 'Y', 'shopexcel' ) ), get_the_time( __( 'm', 'shopexcel' ) ), get_the_time( __( 'd', 'shopexcel' ) ) ) ) . '"><span itemprop="name">' . esc_html( get_the_time( __( 'd', 'shopexcel' ) ) ) . '</span></a><meta itemprop="position" content="'. absint( $depth ).'" />' . $after;        
        }elseif( is_month() ){            
            $depth = 2;
            echo '<span itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem"><a href="' . esc_url( get_year_link( get_the_time( __( 'Y', 'shopexcel' ) ) ) ) . '" itemprop="item"><span itemprop="name">' . esc_html( get_the_time( __( 'Y', 'shopexcel' ) ) ) . '</span></a><meta itemprop="position" content="'. absint( $depth ).'" />' . $delimiter . '</span>';
            $depth++;
            echo $before . '<a itemprop="item" href="' . esc_url( get_month_link( get_the_time( __( 'Y', 'shopexcel' ) ), get_the_time( __( 'm', 'shopexcel' ) ) ) ) . '"><span itemprop="name">' . esc_html( get_the_time( __( 'F', 'shopexcel' ) ) ) . '</span></a><meta itemprop="position" content="'. absint( $depth ).'" />' . $after;        
        }elseif( is_year() ){ 
            $depth = 2;
            echo $before .'<a itemprop="item" href="' . esc_url( get_year_link( get_the_time( __( 'Y', 'shopexcel' ) ) ) ) . '"><span itemprop="name">'. esc_html( get_the_time( __( 'Y', 'shopexcel' ) ) ) .'</span></a><meta itemprop="position" content="'. absint( $depth ).'" />'. $after;  
        }elseif( is_single() && !is_attachment() ){   
            $depth = 2;         
            if( shopexcel_is_woocommerce_activated() && 'product' === get_post_type() ){ //For Woocommerce single product
                if( wc_get_page_id( 'shop' ) ){ //Displaying Shop link in woocommerce archive page
                    $_name = wc_get_page_id( 'shop' ) ? get_the_title( wc_get_page_id( 'shop' ) ) : '';
                    if ( ! $_name ) {
                        $product_post_type = get_post_type_object( 'product' );
                        $_name = $product_post_type->labels->singular_name;
                    }
                    echo '<span itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem"><a href="' . esc_url( get_permalink( wc_get_page_id( 'shop' ) ) ) . '" itemprop="item"><span itemprop="name">' . esc_html( $_name ) . '</span></a><meta itemprop="position" content="'. absint( $depth ).'" />' . $delimiter . '</span>';
                    $depth++;                    
                }           
                if( $terms = wc_get_product_terms( $post->ID, 'product_cat', array( 'orderby' => 'parent', 'order' => 'DESC' ) ) ){
                    $main_term = apply_filters( 'woocommerce_breadcrumb_main_term', $terms[0], $terms );
                    $ancestors = get_ancestors( $main_term->term_id, 'product_cat' );
                    $ancestors = array_reverse( $ancestors );
                    foreach ( $ancestors as $ancestor ) {
                        $ancestor = get_term( $ancestor, 'product_cat' );    
                        if ( ! is_wp_error( $ancestor ) && $ancestor ) {
                            echo '<span itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem"><a href="' . esc_url( get_term_link( $ancestor ) ) . '" itemprop="item"><span itemprop="name">' . esc_html( $ancestor->name ) . '</span></a><meta itemprop="position" content="'. absint( $depth ).'" />' . $delimiter . '</span>';
                            $depth++;
                        }
                    }
                    echo '<span itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem"><a href="' . esc_url( get_term_link( $main_term ) ) . '" itemprop="item"><span itemprop="name">' . esc_html( $main_term->name ) . '</span></a><meta itemprop="position" content="'. absint( $depth ).'" />' . $delimiter . '</span>';
                    $depth++;
                }
                echo $before . '<a href="' . esc_url( get_the_permalink() ) . '" itemprop="item"><span itemprop="name">' . esc_html( get_the_title() ) .'</span></a><meta itemprop="position" content="'. absint( $depth ).'" />' . $after;
            }elseif( get_post_type() != 'post' ){                
                $post_type = get_post_type_object( get_post_type() );                
                if( $post_type->has_archive == true ){// For CPT Archive Link                   
                   // Add support for a non-standard label of 'archive_title' (special use case).
                   $label = !empty( $post_type->labels->archive_title ) ? $post_type->labels->archive_title : $post_type->labels->name;
                   echo '<span itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem"><a href="' . esc_url( get_post_type_archive_link( get_post_type() ) ) . '" itemprop="item"><span itemprop="name">' . esc_html( $label ) . '</span></a><meta itemprop="position" content="' . absint( $depth ) . '" />' . $delimiter . '</span>';
                   $depth++;    
                }
                echo $before . '<a href="' . esc_url( get_the_permalink() ) . '" itemprop="item"><span itemprop="name">' . esc_html( get_the_title() ) . '</span></a><meta itemprop="position" content="' . absint( $depth ) . '" />' . $after;
            }else{ //For Post                
                $cat_object       = get_the_category();
                $potential_parent = 0;
                
                if( $show_front === 'page' && $post_page ){ //If static blog post page is set
                    $p = get_post( $post_page );
                    echo '<span itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem"><a href="' . esc_url( get_permalink( $post_page ) ) . '" itemprop="item"><span itemprop="name">' . esc_html( $p->post_title ) . '</span></a><meta itemprop="position" content="' . absint( $depth ) . '" />' . $delimiter . '</span>';  
                    $depth++; 
                }
                
                if( $cat_object ){ //Getting category hierarchy if any        
                    //Now try to find the deepest term of those that we know of
                    $use_term = key( $cat_object );
                    foreach( $cat_object as $key => $object ){
                        //Can't use the next($cat_object) trick since order is unknown
                        if( $object->parent > 0  && ( $potential_parent === 0 || $object->parent === $potential_parent ) ){
                            $use_term         = $key;
                            $potential_parent = $object->term_id;
                        }
                    }                    
                    $cat  = $cat_object[$use_term];              
                    $cats = get_category_parents( $cat, false, ',' );
                    $cats = explode( ',', $cats );
                    foreach ( $cats as $cat ) {
                        $cat_obj = get_term_by( 'name', $cat, 'category' );
                        if( is_object( $cat_obj ) ){
                            $term_url  = get_term_link( $cat_obj->term_id );
                            $term_name = $cat_obj->name;
                            echo '<span itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem"><a itemprop="item" href="' . esc_url( $term_url ) . '"><span itemprop="name">' . esc_html( $term_name ) . '</span></a><meta itemprop="position" content="' . absint( $depth ). '" />' . $delimiter . '</span>';
                            $depth++;
                        }
                    }
                }
                echo $before . '<a itemprop="item" href="' . esc_url( get_the_permalink() ) . '"><span itemprop="name">' . esc_html( get_the_title() ) . '</span></a><meta itemprop="position" content="' . absint( $depth ) . '" />' . $after;   
            }        
        }elseif( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ){ //For Custom Post Archive
            $depth     = 2;
            $post_type = get_post_type_object( get_post_type() );
            if( get_query_var('paged') ){
                echo '<span itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem"><a href="' . esc_url( get_post_type_archive_link( $post_type->name ) ) . '" itemprop="item"><span itemprop="name">' . esc_html( $post_type->label ) . '</span></a><meta itemprop="position" content="' . absint( $depth ) . '" />' . $delimiter . '/</span>';
                echo $before . sprintf( __('Page %s', 'shopexcel'), get_query_var('paged') ) . $after; //@todo need to check this
            }else{
                echo $before . '<a itemprop="item" href="' . esc_url( get_post_type_archive_link( $post_type->name ) ) . '"><span itemprop="name">' . esc_html( $post_type->label ) . '</span></a><meta itemprop="position" content="' . absint( $depth ). '" />' . $after;
            }    
        }elseif( is_attachment() ){ 
            $depth = 2;           
            echo $before . '<a itemprop="item" href="' . esc_url( get_the_permalink() ) . '"><span itemprop="name">' . esc_html( get_the_title() ) . '</span></a><meta itemprop="position" content="' . absint( $depth ) . '" />' . $after;
        }elseif( is_page() && !$post->post_parent ){            
            $depth = 2;
            echo $before . '<a itemprop="item" href="' . esc_url( get_the_permalink() ) . '"><span itemprop="name">' . esc_html( get_the_title() ) . '</span></a><meta itemprop="position" content="' . absint( $depth ) . '" />' . $after;
        }elseif( is_page() && $post->post_parent ){            
            $depth       = 2;
            $parent_id   = $post->post_parent;
            $breadcrumbs = array();
            while( $parent_id ){
                $current_page  = get_post( $parent_id );
                $breadcrumbs[] = $current_page->ID;
                $parent_id     = $current_page->post_parent;
            }
            $breadcrumbs = array_reverse( $breadcrumbs );
            for ( $i = 0; $i < count( $breadcrumbs) ; $i++ ){
                echo '<span itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem"><a href="' . esc_url( get_permalink( $breadcrumbs[$i] ) ) . '" itemprop="item"><span itemprop="name">' . esc_html( get_the_title( $breadcrumbs[$i] ) ) . '</span></a><meta itemprop="position" content="'. absint( $depth ).'" />' . $delimiter . '</span>';
                $depth++;
            }
            echo $before . '<a href="' . get_permalink() . '" itemprop="item"><span itemprop="name">' . esc_html( get_the_title() ) . '</span></a><meta itemprop="position" content="' . absint( $depth ) . '" /></span>' . $after;
        }elseif( is_404() ){
            $depth = 2;
            echo $before . '<a itemprop="item" href="' . esc_url( home_url() ) . '"><span itemprop="name">' . esc_html__( '404 Error - Page Not Found', 'shopexcel' ) . '</span></a><meta itemprop="position" content="' . absint( $depth ). '" />' . $after;
        }
        
        if( get_query_var('paged') ) printf( __( ' (Page %s)', 'shopexcel' ), get_query_var('paged') );
        
        echo '</div></div><!-- .crumbs --><!-- .breadcrumb-wrapper -->';
        
    }                
}
endif;

if (!function_exists('shopexcel_breadcrumb_icons_list')):
/**
 * Breadcrumbs Icon List
 */
function shopexcel_breadcrumb_icons_list($separator_icon = 'one') {

    switch ($separator_icon) {
            case 'one':
                return '<svg width="15" height="15" viewBox="0 0 20 20"><path d="M7.7,20c-0.3,0-0.5-0.1-0.7-0.3c-0.4-0.4-0.4-1.1,0-1.5l8.1-8.1L6.7,1.8c-0.4-0.4-0.4-1.1,0-1.5
            c0.4-0.4,1.1-0.4,1.5,0l9.1,9.1c0.4,0.4,0.4,1.1,0,1.5l-8.8,8.9C8.2,19.9,7.9,20,7.7,20z" opacity="0.7"/></svg>';
                break;
            case 'two':
                return '<svg width="15" height="15" viewBox="0 0 20 20"><polygon points="7,0 18,10 7,20 " opacity="0.7"/></svg>';
                break;
            case 'three':
                return '<svg width="15" height="15" viewBox="0 0 20 20"><path d="M6.1,20c-0.2,0-0.3,0-0.5-0.1c-0.5-0.2-0.7-0.8-0.4-1.3l9.5-17.9C15,0.1,15.6,0,16.1,0.2
            c0.5,0.2,0.7,0.8,0.4,1.3L6.9,19.4C6.8,19.8,6.5,19.9,6.1,20z" opacity="0.7"/></svg>';
                break;

        default:
            # code...
            
        break;
    }
}
endif;

if( ! function_exists( 'shopexcel_theme_comment' ) ) :
/**
 * Callback function for Comment List *
 * 
 * @link https://codex.wordpress.org/Function_Reference/wp_list_comments 
 */
function shopexcel_theme_comment( $comment, $args, $depth ){
	if ( 'div' == $args['style'] ) {
		$tag = 'div';
		$add_below = 'comment';
	} else {
		$tag = 'li';
		$add_below = 'div-comment';
	}
?>
	<<?php echo $tag ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">
	
    <?php if ( 'div' != $args['style'] ) : ?>
    <div id="div-comment-<?php comment_ID() ?>" class="comment-body" itemscope itemtype="https://schema.org/UserComments">
	<?php endif; ?>
    	
        <footer class="comment-meta">
            <div class="comment-author vcard">
        	   <?php if ( $args['avatar_size'] != 0 ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
        	</div><!-- .comment-author vcard -->
        </footer>
        
        <div class="text-holder">
        	<div class="top">
                <div class="left">
                    <?php if ( $comment->comment_approved == '0' ) : ?>
                		<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'shopexcel' ); ?></em>
                		<br />
                	<?php endif; ?>
                    <?php printf( __( '<b class="fn" itemprop="creator" itemscope itemtype="https://schema.org/Person">%s</b> <span class="says">says:</span>', 'shopexcel' ), get_comment_author_link() ); ?>
                	<div class="comment-metadata commentmetadata">
                        <?php esc_html_e( 'Posted on', 'shopexcel' );?>
                        <a href="<?php echo esc_url( htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ); ?>">
                    		<time itemprop="commentTime" datetime="<?php echo esc_attr( get_gmt_from_date( get_comment_date() . get_comment_time(), 'Y-m-d H:i:s' ) ); ?>"><?php printf( esc_html__( '%1$s at %2$s', 'shopexcel' ), get_comment_date(),  get_comment_time() ); ?></time>
                        </a>
                	</div>
                </div>
                <div class="reply">
                    <?php comment_reply_link( array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
            	</div>
            </div>            
            <div class="comment-content" itemprop="commentText"><?php comment_text(); ?></div>        
        </div><!-- .text-holder -->
        
	<?php if ( 'div' != $args['style'] ) : ?>
    </div><!-- .comment-body -->
	<?php endif; ?>
    
<?php
}
endif;

if (!function_exists('shopexcel_search_post_count')):
/**
 * Search Result Page Count
 */
function shopexcel_search_post_count() {
    global $wp_query;
    $found_posts = $wp_query->found_posts;
    $visible_post = get_option('posts_per_page');

    if ($found_posts > 0) {
        echo '<span class="search-results-count">';
        if ($found_posts > $visible_post) {
            printf(esc_html__('Showing %1$s of %2$s Results', 'shopexcel') , number_format_i18n($visible_post) , number_format_i18n($found_posts));
        }
        else {
            /* translators: 1: found posts. */
            printf(_nx('%s Result', '%s Results', $found_posts, 'found posts', 'shopexcel') , number_format_i18n($found_posts));
        }
        echo '</span>';
    }
}
endif;

if( ! function_exists( 'shopexcel_sidebar' ) ) :
/**
 * Return sidebar layouts for pages/posts
*/
function shopexcel_sidebar( $class = false ){
    global $post;
    $return      = false;
    $defaults    = shopexcel_get_general_defaults();
    $page_layout = get_theme_mod( 'page_sidebar_layout', $defaults['page_sidebar_layout']  ); //Default Layout Style for Pages
    $post_layout = get_theme_mod( 'post_sidebar_layout', $defaults['post_sidebar_layout']  ); //Default Layout Style for Posts
    $layout      = get_theme_mod( 'layout_style', $defaults['layout_style']  ); //Default Layout Style for Styling Settings

    if( is_singular( array( 'page', 'post' ) ) ){         
        if( get_post_meta( $post->ID, '_shopexcel_sidebar_layout', true ) ){
            $sidebar_layout = get_post_meta( $post->ID, '_shopexcel_sidebar_layout', true );
        }else{
            $sidebar_layout = 'default-sidebar';
        }
        
        if( is_page() ){
            $post_id     = $post->ID;
            $wishlist_id = get_option( 'yith_wcwl_wishlist_page_id' );

            if( is_active_sidebar( 'sidebar' ) ){
                if( $sidebar_layout == 'no-sidebar' || ( $sidebar_layout == 'default-sidebar' && $page_layout == 'no-sidebar' ) ){
                    $return = $class ? 'full-width' : false;
                }elseif( $sidebar_layout == 'centered' || ( $sidebar_layout == 'default-sidebar' && $page_layout == 'centered' ) ){
                    $return = $class ? 'full-width centered' : false;
                }elseif( ( $sidebar_layout == 'default-sidebar' && $page_layout == 'right-sidebar' ) || ( $sidebar_layout == 'right-sidebar' ) ){
                    $return = $class ? 'rightsidebar' : 'sidebar';
                }elseif( ( $sidebar_layout == 'default-sidebar' && $page_layout == 'left-sidebar' ) || ( $sidebar_layout == 'left-sidebar' ) ){
                    $return = $class ? 'leftsidebar' : 'sidebar';
                }
            }else{
                $return = $class ? 'full-width' : false;
            }
            if( shopexcel_is_woocommerce_activated() && ( is_cart() || is_checkout() ) ) {
                $return = $class ? 'full-width' : false; //Fullwidth for woocommerce cart and checkout pages
            }
            if( shopexcel_is_woocommerce_activated() && shopexcel_is_yith_whislist_activated() && $wishlist_id == $post_id){
                $return = $class ? 'full-width' : false; //Fullwidth for wishlist page
            }
            if( is_front_page() && !is_home() ){
                $return = $class ? 'full-width' : false; //Fullwidth for wishlist page
            }
        }elseif( is_single() ){
            if( is_active_sidebar( 'sidebar' ) ){
                if( $sidebar_layout == 'no-sidebar' || ( $sidebar_layout == 'default-sidebar' && $post_layout == 'no-sidebar' ) ){
                    $return = $class ? 'full-width' : false;
                }elseif( $sidebar_layout == 'centered' || ( $sidebar_layout == 'default-sidebar' && $post_layout == 'centered' ) ){
                    $return = $class ? 'full-width centered' : false;
                }elseif( ( $sidebar_layout == 'default-sidebar' && $post_layout == 'right-sidebar' ) || ( $sidebar_layout == 'right-sidebar' ) ){
                    $return = $class ? 'rightsidebar' : 'sidebar';
                }elseif( ( $sidebar_layout == 'default-sidebar' && $post_layout == 'left-sidebar' ) || ( $sidebar_layout == 'left-sidebar' ) ){
                    $return = $class ? 'leftsidebar' : 'sidebar';
                }
            }else{
                $return = $class ? 'full-width' : false;
            }
        }
    }elseif( shopexcel_is_woocommerce_activated() && ( is_shop() || is_product_category() || is_product_tag() ) ){
        if( $layout == 'no-sidebar' ){
            $return = $class ? 'full-width' : false;
        }elseif( is_active_sidebar( 'shop-sidebar' ) ){            
            if( $class ){
                if( $layout == 'right-sidebar' ) $return = 'rightsidebar'; //With Sidebar
                if( $layout == 'left-sidebar' ) $return = 'leftsidebar';
            }         
        }else{
            $return = $class ? 'full-width' : false;
        } 
    }else{
        if( $layout == 'no-sidebar' ){
            $return = $class ? 'full-width' : false;
        }elseif( is_active_sidebar( 'sidebar' ) ){            
            if( $class ){
                if( $layout == 'right-sidebar' ) $return = 'rightsidebar'; //With Sidebar
                if( $layout == 'left-sidebar' ) $return = 'leftsidebar';
            }else{
                $return = 'sidebar';    
            }                         
        }else{
            $return = $class ? 'full-width' : false;
        } 
    }    
    return $return; 
}
endif;

if( ! function_exists( 'shopexcel_get_image_sizes' ) ) :
/**
 * Get information about available image sizes
 */
function shopexcel_get_image_sizes( $size = '' ) {
 
    global $_wp_additional_image_sizes;
 
    $sizes = array();
    $get_intermediate_image_sizes = get_intermediate_image_sizes();
 
    // Create the full array with sizes and crop info
    foreach( $get_intermediate_image_sizes as $_size ) {
        if ( in_array( $_size, array( 'thumbnail', 'medium', 'medium_large', 'large' ) ) ) {
            $sizes[ $_size ]['width'] = get_option( $_size . '_size_w' );
            $sizes[ $_size ]['height'] = get_option( $_size . '_size_h' );
            $sizes[ $_size ]['crop'] = (bool) get_option( $_size . '_crop' );
        } elseif ( isset( $_wp_additional_image_sizes[ $_size ] ) ) {
            $sizes[ $_size ] = array( 
                'width' => $_wp_additional_image_sizes[ $_size ]['width'],
                'height' => $_wp_additional_image_sizes[ $_size ]['height'],
                'crop' =>  $_wp_additional_image_sizes[ $_size ]['crop']
            );
        }
    } 
    // Get only 1 size if found
    if ( $size ) {
        if( isset( $sizes[ $size ] ) ) {
            return $sizes[ $size ];
        } else {
            return false;
        }
    }
    return $sizes;
}
endif;

if (!function_exists('shopexcel_footer_payments')):
/**
 * Footer Payments
 */
function shopexcel_footer_payments() {
    $defaults       = shopexcel_get_general_defaults();
    $payments_image = get_theme_mod('payment_image', $defaults['payment_image']);
    $img_id         = attachment_url_to_postid($payments_image);
    if ( $payments_image) { ?>
        <div class="payments-showcase">
            <?php echo wp_get_attachment_image($img_id, 'full'); ?>
        </div>
    <?php
    }
}
endif;

if ( ! function_exists( 'shopexcel_get_fallback_svg' ) ) :    
/**
 * Get Fallback SVG
*/
function shopexcel_get_fallback_svg( $post_thumbnail ) {
    if( ! $post_thumbnail ){
        return;
    }

    $defaults      = shopexcel_get_color_defaults();
    $image_size    = shopexcel_get_image_sizes( $post_thumbnail );
    $primary_color = get_theme_mod('primary_color', $defaults['primary_color']);

    if( $image_size ){ ?>
        <div class="svg-holder">
            <svg class="fallback-svg" viewBox="0 0 <?php echo esc_attr( $image_size['width'] ); ?> <?php echo esc_attr( $image_size['height'] ); ?>" preserveAspectRatio="none">
                    <rect width="<?php echo esc_attr( $image_size['width'] ); ?>" height="<?php echo esc_attr( $image_size['height'] ); ?>" style="fill:<?php echo shopexcel_sanitize_rgba($primary_color); ?>;opacity: 0.03"></rect>
            </svg>
        </div>
        <?php
    }
}
endif;

if( ! function_exists( 'wp_body_open' ) ) :
/**
 * Fire the wp_body_open action.
 * Added for backwards compatibility to support pre 5.2.0 WordPress versions.
*/
function wp_body_open() {
	/**
	 * Triggered after the opening <body> tag.
    */
	do_action( 'wp_body_open' );
}
endif;

if ( ! function_exists('shopexcel_is_btif_activated') ):
/**
 * Is BlossomThemes Instagram Feed active or not
*/
function shopexcel_is_btif_activated(){
    return class_exists( 'Blossomthemes_Instagram_Feed' ) ? true : false;
}
endif;

if ( ! function_exists('shopexcel_is_woocommerce_activated') ):
/**
 * Query WooCommerce activation
 */
function shopexcel_is_woocommerce_activated() {
	return class_exists( 'woocommerce' ) ? true : false;
}
endif;

if ( ! function_exists('shopexcel_is_yith_whislist_activated') ):
/**
 * Query Yith activation
 */
function shopexcel_is_yith_whislist_activated() {
    return class_exists( 'YITH_WCWL' ) ? true : false;
}
endif;

if ( ! function_exists('shopexcel_pro_is_activated') ):
/**
 * Check if Shopexcel Pro is activated
 */
function shopexcel_pro_is_activated() {
    return class_exists('Shopexcel_Pro') ? true : false;
}
endif;

/**
 * Add filter only if function exists
 */
if (function_exists('DEMO_IMPORTER_PLUS_setup')) {
    add_filter(
        'demo_importer_plus_api_url',
        function () {
            return 'https://blossomthemesdemo.com/';
        }
    );
}
/**
 * Add filter only if function exists
 */
if (function_exists('DEMO_IMPORTER_PLUS_setup')) {
    add_filter(
        'demo_importer_plus_api_id',
        function () {
            return array( '803', '798', '804', '805', '806', '823', '824'  );
        }
    );
}

/**
 * Filter to modify the Demo Importer Plus link
 */
if ( ! shopexcel_pro_is_activated() ) {
    add_filter( 'demo_importer_plus_get_pro_text', function() { return __( 'Get Shopexcel Pro', 'shopexcel' ); } );
    add_filter( 'demo_importer_plus_get_pro_url', function() { return esc_url('https://blossomthemes.com/wordpress-themes/shopexcel-pro/'); } );
} else {
    add_filter( 'demo_importer_plus_get_pro_text', '__return_false' );
    add_filter( 'demo_importer_plus_get_pro_url', '__return_false' );
}