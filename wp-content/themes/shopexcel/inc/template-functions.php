<?php
/**
 * Shopexcel Template Functions which enhance the theme by hooking into WordPress
 *
 * @package Shopexcel
 */

if( ! function_exists( 'shopexcel_doctype' ) ) :
/**
 * Doctype Declaration
*/
function shopexcel_doctype(){ ?>
    <!DOCTYPE html>
    <html <?php language_attributes(); ?>>
    <?php
}
endif;
add_action( 'shopexcel_doctype', 'shopexcel_doctype' );

if( ! function_exists( 'shopexcel_head' ) ) :
/**
 * Before wp_head 
*/
function shopexcel_head(){ ?>
    <meta charset="<?php echo esc_attr( get_bloginfo( 'charset' ) ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php
}
endif;
add_action( 'shopexcel_before_wp_head', 'shopexcel_head' );

if( ! function_exists( 'shopexcel_page_start' ) ) :
/**
 * Page Start
*/
function shopexcel_page_start(){ ?>
    <div id="page" class="site">
        <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content (Press Enter)', 'shopexcel' ); ?></a>
    <?php
}
endif;
add_action( 'shopexcel_before_header', 'shopexcel_page_start', 20 );

if( ! function_exists( 'shopexcel_header' ) ) :
/**
 * Header Start
*/
function shopexcel_header(){ 
    $defaults        = shopexcel_get_general_defaults();
    $siteDefaults    = shopexcel_get_site_defaults();
    $phone           = get_theme_mod( 'header_phone', $defaults['header_phone'] );
    $phone_label     = get_theme_mod( 'header_phone_label', $defaults['header_phone_label'] );
    $ed_social_media = get_theme_mod( 'ed_social_links', $defaults['ed_social_links'] );
    $ed_cart         = get_theme_mod( 'ed_woo_cart', $defaults['ed_woo_cart'] );
    $ed_acc          = get_theme_mod( 'ed_woo_account', $defaults['ed_woo_account'] );
    $ed_wish         = get_theme_mod( 'ed_woo_wishlist', $defaults['ed_woo_wishlist'] );
    $ed_search       = get_theme_mod( 'ed_header_search', $defaults['ed_header_search'] );
    $blogname        = get_option('blogname');
    $hideblogname    = get_theme_mod('hide_title', $siteDefaults['hide_title']);
    $blogdesc        = get_option('blogdescription');
    $hideblogdesc    = get_theme_mod('hide_tagline', $siteDefaults['hide_tagline']);
    $add_class       = '';
    if( shopexcel_pro_is_activated() ){
        $prodefaults     = shopexcel_pro_get_customizer_defaults();
        $header_width    = get_theme_mod( 'header_width_layout', $prodefaults['header_width_layout']);
        $add_class       = 'fullwidth' === $header_width ? 'c-full' : '';
    }
    ?>
    <header id="masthead" class="site-header style-one" itemscope itemtype="https://schema.org/WPHeader">
        <?php if( $ed_social_media || $phone || $phone_label ){ ?>
            <div class="header-top">
                <div class="container <?php echo esc_attr( $add_class ); ?>">
                    <?php if( $ed_social_media ){ ?>
                        <div class="header-left">
                            <?php
                                $social_icons = new Shopexcel_Social_Lists;
                                $social_icons->shopexcel_social_links();
                            ?>
                        </div>
                    <?php } if( $phone || $phone_label) { ?>
                        <div class="top-contact-right">
                            <?php 
                                shopexcel_header_phone_label();
                                shopexcel_header_phone();
                            ?>
                        </div>
                    <?php } ?>
                </div>
            </div>
        <?php } if( has_nav_menu( 'primary') || has_custom_logo() || (!empty($blogname) && !$hideblogname) || ( !empty($blogdesc) && !$hideblogdesc) ) { ?>
            <div class="header-main"> 
                <div class="container <?php echo esc_attr( $add_class ); ?>">
                    <?php 
                    shopexcel_site_branding(); 
                    shopexcel_primary_navigation(); ?>
                    <?php if ( $ed_search || $ed_cart || $ed_acc || $ed_wish ){ ?>
                        <div class="header-right">
                            <?php 
                                if( $ed_search ) shopexcel_search();
                                if( shopexcel_is_woocommerce_activated() && $ed_acc ) shopexcel_woo_user_account();
                                if( shopexcel_is_woocommerce_activated() && $ed_wish ) shopexcel_wishlist();
                                if( shopexcel_is_woocommerce_activated() && $ed_cart ) shopexcel_wc_cart_count();
                            ?>
                        </div>
                    <?php } ?>
                </div>
            </div>
        <?php }
        shopexcel_mobile_navigation();
        if( shopexcel_pro_is_activated() && function_exists('shopexcel_sticky_header') ) shopexcel_sticky_header(); ?>
	</header>
    <?php 
}
endif;

if( shopexcel_pro_is_activated() && function_exists( 'shopexcel_header_layouts') ){
    add_action( 'shopexcel_header', 'shopexcel_header_layouts', 20 );
} else {
    add_action( 'shopexcel_header', 'shopexcel_header', 20 );
}

if( ! function_exists( 'shopexcel_content_start' ) ) :
/**
 * Content Start
*/
function shopexcel_content_start(){
    $defaults          = shopexcel_get_general_defaults();
    $ed_blog_title     = get_theme_mod( 'ed_blog_title', $defaults['ed_blog_title'] );
    $ed_blog_desc      = get_theme_mod( 'ed_blog_desc', $defaults['ed_blog_desc'] );
    $blog_alignment    = get_theme_mod( 'blog_alignment', $defaults['blog_alignment'] );
    $ed_archive_title  = get_theme_mod( 'ed_archive_title', $defaults['ed_archive_title'] );
    $ed_archive_desc   = get_theme_mod( 'ed_archive_desc', $defaults['ed_archive_desc'] );
	$archive_count     = get_theme_mod( 'ed_archive_post_count', $defaults['ed_archive_post_count'] );
    $archive_alignment = get_theme_mod( 'archivetitle_alignment', $defaults['archivetitle_alignment'] );
	$header_image      = get_theme_mod( 'header_bg_img', $defaults['header_bg_img']);
    $bg_img            = wp_get_attachment_image_url($header_image, 'shopexcel-header-bg-img');
    $bg_style          = $bg_img ? ' style="background-image: url(' . esc_url($bg_img) . ')" data-bg-image="yes"' : '';
    $alignment = '';
    $page_hdr_class = '';
    if( is_home() ) {
        $alignment = ' data-alignment='.  esc_html( $blog_alignment );
		$page_hdr_class = ( $ed_blog_title || $ed_blog_desc) ? 'page-header' : 'no-header-text';
	}
    if( is_archive() || is_search() ) {
        $alignment = ' data-alignment='.  esc_html( $archive_alignment );
		$page_hdr_class = ( $ed_archive_title || $ed_archive_desc) ? 'page-header' : 'no-header-text';
	}

    if( !( is_front_page() && !is_home() ) ){ ?>
    <div id="content" class="site-content">
        <div class="page-header-img-wrap"<?php if( is_archive() || is_home() || is_search() ) echo $bg_style; ?>>
            <div class="container">
                <?php 
                shopexcel_breadcrumb();
                if(!is_singular()) echo '<div class="' . esc_attr( $page_hdr_class ) . '"' . esc_attr( $alignment) . '>';       
                    if ( is_home() ) {
                        if ($ed_blog_title){ 
                            echo '<h1 class="page-title">';
                            single_post_title();
                            echo '</h1>';
                        }
                        if( $ed_blog_desc ){
                            $posts_id   = get_option('page_for_posts');
                            $posts_desc = get_post_field( 'post_content', $posts_id );
                            echo '<div class="archive-description">'. wp_kses_post( $posts_desc ) .'</div>';
                        }
                    }
                    
                    if( is_archive() ){
                        if( is_author() ){
                            if( get_the_author_meta( 'description' ) ){ ?>
                                <section class="shopexcel-author-box">
                                    <div class="author-archive-section">
                                        <div class="img-holder"><?php echo get_avatar( get_the_author_meta( 'ID' ), 95 ); ?></div>
                                        <div class="author-meta">
                                            <?php printf( esc_html__( '%1$s %2$s%3$s%4$s', 'shopexcel' ), '<h3 class="author-name">', '<span class="vcard">', esc_html( get_the_author_meta( 'display_name' ) ), '</span></h3>' );                
                                                echo '<div class="author-description">' . wp_kses_post( get_the_author_meta( 'description' ) ) . '</div>';
                                            ?>
                                        </div>
                                    </div>
                                </section>
                                <?php 
                            }
                        } else {  
                            if( $ed_archive_title ) the_archive_title();
                            if( $ed_archive_desc ) the_archive_description( '<div class="archive-description">', '</div>' );
                        }         
                    }
                    
                    if( is_search() ){
                        echo '<h1 class="page-title">' . esc_html__( 'Search', 'shopexcel' ) . '</h1>';
                        get_search_form();
                    }

                    /**
                     * Show post count on search and archive pages
                     */
                    if( ( $archive_count && ( is_archive() ) && !is_post_type_archive('product') )
                    || is_search() 
                    ) {
                        echo '<section class="shopexcel-search-count">';
                        shopexcel_search_post_count();
                        echo '</section>';
                    }
                if(!is_singular()) echo '</div>';
                ?>
            </div>
        </div>
        <?php
        if (!is_404()) echo '<div class="container">'; 
    }        
}
endif;
add_action( 'shopexcel_content', 'shopexcel_content_start' );

if ( ! function_exists( 'shopexcel_post_thumbnail' ) ) :
/**
 * Displays an optional post thumbnail.
 *
 * Wraps the post thumbnail in an anchor element on index views, or a div
 * element when on single views.
 */
function shopexcel_post_thumbnail() {
	global $wp_query;
    $image_size       = 'thumbnail';
    $defaults         = shopexcel_get_general_defaults();
    $ed_featured      = get_theme_mod( 'ed_post_featured_image', $defaults['ed_post_featured_image']);
    $post_crop_image  = get_theme_mod( 'post_crop_image', $defaults[ 'post_crop_image' ] );
    $blog_crop_img    = get_theme_mod( 'blog_crop_image', $defaults[ 'blog_crop_image' ] );
    $sidebar          = shopexcel_sidebar();
    $ed_page_featured = get_theme_mod( 'ed_page_featured_image', $defaults['ed_page_featured_image'] );

    if( shopexcel_pro_is_activated() ){
        $prodefaults    = shopexcel_pro_get_customizer_defaults();
        $blog_layout    = get_theme_mod( 'blog_page_layout', $prodefaults['blog_page_layout'] );
        $archive_layout = get_theme_mod( 'archive_page_layout', $prodefaults['archive_page_layout'] );
    }

    if( is_home() ){ 
        echo '<a href="' . esc_url( get_permalink() ) . '" class="post-thumbnail">';
        if( shopexcel_pro_is_activated() && $blog_layout !== 'one'){
            if ( $blog_layout === 'two' ) $image_size = 'blog-img-lay-2';
            if ( $blog_layout === 'three' ) $image_size = 'shopexcel-withsidebar';
        }else {
            if( $wp_query->current_post == 0 && $blog_crop_img ){                
                $image_size = ( $sidebar ) ? 'shopexcel-withsidebar' : 'shopexcel-fullwidth';
            }elseif( $blog_crop_img ){
                $image_size = 'shopexcel-blog-home';
            }else {
                $image_size = 'full';
            }
        }

        if( has_post_thumbnail() ){                        
            the_post_thumbnail( $image_size, array( 'itemprop' => 'image' ) );    
        }else{
            shopexcel_get_fallback_svg( $image_size );//fallback    
        }        
        echo '</a>';
    }elseif( is_archive() || is_search() ){
        echo '<a href="' . esc_url( get_permalink() ) . '" class="post-thumbnail">';
        if( shopexcel_pro_is_activated() && $archive_layout !== 'one' ){
            if ( $archive_layout === 'two' ) $image_size = 'blog-img-lay-2';
            if ( $archive_layout === 'three' ) $image_size = 'shopexcel-withsidebar';
        } else {
            if( $wp_query->current_post == 0 ){
                $image_size = ( $sidebar ) ? 'shopexcel-withsidebar' : 'shopexcel-fullwidth';
            }else {
                $image_size = 'shopexcel-blog-home';
            }
        }
        
        if( has_post_thumbnail() ){
            the_post_thumbnail( $image_size, array( 'itemprop' => 'image' ) );    
        }else{
            shopexcel_get_fallback_svg( $image_size );//fallback
        }
        echo '</a>';
    }elseif( is_singular() ){
        $image_size = ( $sidebar ) ? 'shopexcel-withsidebar' : 'shopexcel-fullwidth';
        if( is_single() ){
            $image_size = !$post_crop_image ? 'full' : $image_size;
            if( $ed_featured && has_post_thumbnail() ){
                echo '<div class="post-thumbnail">';
                the_post_thumbnail( $image_size, array( 'itemprop' => 'image' ) );
                echo '</div>';    
            }
        }else{
            if( $ed_page_featured && has_post_thumbnail() ){
                echo '<div class="post-thumbnail">';
                the_post_thumbnail( $image_size, array( 'itemprop' => 'image' ) );
                echo '</div>';    
            }            
        }
    }
}
endif;
add_action( 'shopexcel_before_page_entry_content', 'shopexcel_post_thumbnail' );
add_action( 'shopexcel_before_post_entry_content', 'shopexcel_post_thumbnail', 15 );
add_action( 'shopexcel_before_single_post_entry_content', 'shopexcel_post_thumbnail', 20 );


if( ! function_exists( 'shopexcel_entry_header' ) ) :
/**
 * Entry Header
*/
function shopexcel_entry_header(){
    global $post; 
    $defaults          = shopexcel_get_general_defaults();
    $meta_structure    = get_theme_mod( 'blog_meta_order', $defaults['blog_meta_order'] );
    $single_post_meta  = get_theme_mod( 'post_meta_order', $defaults['post_meta_order'] );
    $ed_page_title     = get_theme_mod( 'ed_page_title', $defaults['ed_page_title'] );
    $page_alignment    = get_theme_mod( 'pagetitle_alignment', $defaults['pagetitle_alignment'] );
    $single_page_title = get_post_meta( $post->ID, '_shply_page_title', true );
    $add_class         = $single_page_title == true ? ' shply_disabled': '';
    $alignment         = '';
    if (is_page()){
        $alignment = ' data-alignment='.  esc_html( $page_alignment );
    }
    if( shopexcel_pro_is_activated() ){
        $prodefaults    = shopexcel_pro_get_customizer_defaults();
        $blog_layout    = get_theme_mod( 'blog_page_layout', $prodefaults['blog_page_layout'] );
        $archive_layout = get_theme_mod( 'archive_page_layout', $prodefaults['archive_page_layout'] );
    }
    if( shopexcel_pro_is_activated() ) { 
        if ( is_home() && $blog_layout === 'two' || 
            ( (is_archive() || is_search() ) && $archive_layout === 'two') 
        ) echo '<div class="content-wrapper">'; 
    } ?>
        <header class="entry-header<?php echo esc_attr( $add_class ); ?>"<?php echo esc_attr($alignment); ?>>
            <?php 
                $ed_cat_single  = get_theme_mod( 'ed_post_category', $defaults['ed_post_category'] );

                if( 'post' === get_post_type() ){
                    echo '<div class="entry-meta">';
                    if( is_single() ){
                        if( $ed_cat_single ) shopexcel_category();
                    }else{
                        shopexcel_category();    
                    }
                    echo '</div>';
                }
                
                if ( is_singular() ) {
                    if( is_page() && $ed_page_title && !is_front_page() ) the_title( '<h1 class="entry-title">', '</h1>' );
                    if( is_single() ) the_title( '<h1 class="entry-title">', '</h1>' );
                } else {
                    the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
                };

                if( 'post' === get_post_type() ){
                    echo '<div class="entry-meta">';
                    if( is_home()) {
                        foreach( $meta_structure as $post_meta ){
                            if( $post_meta == 'author' ) shopexcel_posted_by();
                            if( $post_meta == 'date' ) shopexcel_posted_on();				
                            if( $post_meta == 'comment' ) shopexcel_comment_count();				
                            if( $post_meta == 'reading-time' ) shopexcel_estimated_reading_time( get_post( get_the_ID() )->post_content );				
                        }
                    }else if( is_single() ){
                        foreach( $single_post_meta as $post_meta ){
                            if( $post_meta == 'author' ) shopexcel_posted_by();
                            if( $post_meta == 'date' ) shopexcel_posted_on();				
                            if( $post_meta == 'comment' ) shopexcel_comment_count();				
                            if( $post_meta == 'reading-time' ) shopexcel_estimated_reading_time( get_post( get_the_ID() )->post_content );				
                        }
                    }elseif( !is_single()){
                        shopexcel_posted_by();
                        shopexcel_posted_on();				
                        shopexcel_comment_count();
                        shopexcel_estimated_reading_time( get_post( get_the_ID() )->post_content );
                    }
                    echo '</div>';
                }
            ?>
        </header>         
    <?php    
}
endif;
add_action( 'shopexcel_before_page_entry_content', 'shopexcel_entry_header', 10 );
add_action( 'shopexcel_before_post_entry_content', 'shopexcel_entry_header', 20 );
add_action( 'shopexcel_before_single_post_entry_content', 'shopexcel_entry_header', 15 );

if( ! function_exists( 'shopexcel_entry_content' ) ) :
/**
 * Entry Content
*/
function shopexcel_entry_content(){
    $defaults            = shopexcel_get_general_defaults();
    $blog_content        = get_theme_mod( 'blog_content', $defaults['blog_content'] );

    if( shopexcel_pro_is_activated() ){
        $prodefaults         = shopexcel_pro_get_customizer_defaults();
        $ed_social_sharing   = get_theme_mod( 'ed_social_sharing', $prodefaults['ed_social_sharing'] );
        $ed_sticky_sharing   = get_theme_mod( 'ed_sticky_social_sharing', $prodefaults['ed_social_sharing'] );
        $author_sign         = get_theme_mod( 'author_signature', $prodefaults['author_signature'] );
        $img_id              = attachment_url_to_postid( $author_sign );
        $ed_toggle_social    = get_theme_mod( 'ed_toggle_social', $prodefaults['ed_toggle_social'] );
        $alignment_signature = get_theme_mod( 'alignment_signature', $prodefaults['alignment_signature'] );
    }

	if ( is_single() ) echo '<div class="article-wrapper">'; ?>
        <div class="entry-content" itemprop="text">
            <?php
                if( is_singular() || $blog_content === 'content' || ( get_post_format() != false ) ){
                    the_content();    
                    wp_link_pages( array(
                        'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'shopexcel' ),
                        'after'  => '</div>',
                    ) );
                }else{
                    the_excerpt();
                }
            ?>
        </div><!-- .entry-content -->
        <?php if( is_single() && function_exists( 'shopexcel_social_share' ) && $ed_social_sharing ) shopexcel_social_share($ed_sticky_sharing);
    if ( is_single() ) echo '</div>';

    if( shopexcel_pro_is_activated() ){
        if( is_singular( 'post' ) && $author_sign ) {
            echo '<div class="author-signature ' . esc_attr( $alignment_signature ) . '">';                          
            echo wp_get_attachment_image($img_id, 'full');
            if( $ed_toggle_social ) {
                $social_icons = new Shopexcel_Social_Lists;
                $social_icons->shopexcel_social_links();
            }
            echo '</div>';
        }
    }
}
endif;
add_action( 'shopexcel_page_entry_content', 'shopexcel_entry_content', 15 );
add_action( 'shopexcel_post_entry_content', 'shopexcel_entry_content', 15 );
add_action( 'shopexcel_single_post_entry_content', 'shopexcel_entry_content', 15 );

if( ! function_exists( 'shopexcel_entry_footer' ) ) :
/**
 * Entry Footer
*/
function shopexcel_entry_footer(){ 
    $defaults  = shopexcel_get_general_defaults();
    $readmore  = get_theme_mod( 'read_more_text',  $defaults['read_more_text'] );
    $post_tags = get_theme_mod( 'ed_post_tags', $defaults['ed_post_tags'] ); 
    if( shopexcel_pro_is_activated() ){
        $prodefaults    = shopexcel_pro_get_customizer_defaults();
        $blog_layout    = get_theme_mod( 'blog_page_layout', $prodefaults['blog_page_layout'] );
        $archive_layout = get_theme_mod( 'archive_page_layout', $prodefaults['archive_page_layout'] );
    }
    if( is_front_page() && !is_home() ) return; ?>
	<footer class="entry-footer">
		<?php
			if( is_single() && $post_tags ){
                shopexcel_tag();
			}
            
            if( is_home() || is_archive() || is_search() ){
                echo '<a href="' . esc_url( get_the_permalink() ) . '" class="btn-tertiary">' . esc_html( $readmore ) . '</a>';    
            }
            
            if( get_edit_post_link() ){
                edit_post_link(
					sprintf(
						wp_kses(
							/* translators: %s: Name of current post. Only visible to screen readers */
							__( 'Edit <span class="screen-reader-text">%s</span>', 'shopexcel' ),
							array(
								'span' => array(
									'class' => array(),
								),
							)
						),
						get_the_title()
					),
					'<span class="edit-link">',
					'</span>'
				);
            }
		?>
	</footer><!-- .entry-footer -->
    <?php 
    if( shopexcel_pro_is_activated() ) { 
        if ( is_home() && $blog_layout === 'two' || 
            ( (is_archive() || is_search() ) && $archive_layout === 'two') 
        ) echo '</div><!-- .content-wrapper -->'; 
    }

}
endif;
add_action( 'shopexcel_page_entry_content', 'shopexcel_entry_footer', 20 );
add_action( 'shopexcel_post_entry_content', 'shopexcel_entry_footer', 20 );
add_action( 'shopexcel_single_post_entry_content', 'shopexcel_entry_footer', 20 );

if( ! function_exists( 'shopexcel_navigation' ) ) :
/**
 * Navigation
*/
function shopexcel_navigation(){
    $defaults   = shopexcel_get_general_defaults();
    $pagination = get_theme_mod( 'ed_post_pagination',  $defaults['ed_post_pagination'] );
    if( is_single() && $pagination ){
        $previous = get_previous_post_link(
            '<div class="nav-previous nav-holder">%link</div>',
            '<span class="meta-nav">' . esc_html__( 'Previous Article', 'shopexcel' ) . '</span><span class="post-title">%title</span>',
            false,
            '',
            'category'
        );
    
        $next = get_next_post_link(
            '<div class="nav-next nav-holder">%link</div>',
            '<span class="meta-nav">' . esc_html__( 'Next Article', 'shopexcel' ) . '</span><span class="post-title">%title</span>',
            false,
            '',
            'category'
        ); 
        
        if( $previous || $next ){?>            
            <nav class="navigation post-navigation" role="navigation">
                <h2 class="screen-reader-text"><?php esc_html_e( 'Post Navigation', 'shopexcel' ); ?></h2>
                <div class="nav-links">
                    <?php
                        if( $previous ) echo $previous;
                        if( $next ) echo $next;
                    ?>
                </div>
            </nav>        
            <?php
        }
    }elseif( ! is_single() && shopexcel_pro_is_activated() ){
        $prodefaults = shopexcel_pro_get_customizer_defaults();
        $pagination  = get_theme_mod( 'pagination_type', $prodefaults['pagination_type'] );

        switch( $pagination ){
            case 'default': // Default Pagination
            
            the_posts_navigation();
            
            break;
            
            case 'numbered': // Numbered Pagination
            
            the_posts_pagination( array(
                'prev_text'          => __( 'Previous', 'shopexcel' ),
                'next_text'          => __( 'Next', 'shopexcel' ),
                'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'shopexcel' ) . ' </span>',
            ) );
            
            break;
            
            case 'load_more': // Load More Button
            case 'infinite_scroll': // Auto Infinite Scroll
            
            echo '<div class="pagination"></div>';
            
            break;
            
            default:
            
            the_posts_navigation();
            
            break;
        }
    }else {
        the_posts_pagination( array(
            'prev_text'          => __( 'Previous', 'shopexcel' ),
            'next_text'          => __( 'Next', 'shopexcel' ),
            'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'shopexcel' ) . ' </span>',
        ) );
    }
}
endif;
add_action( 'shopexcel_after_post_content', 'shopexcel_navigation', 15 );
add_action( 'shopexcel_after_posts_content', 'shopexcel_navigation' );

if( ! function_exists( 'shopexcel_author' ) ) :
/**
 * Author Section
*/
function shopexcel_author(){
    $defaults     = shopexcel_get_general_defaults();
    $ed_author    = get_theme_mod( 'ed_author', $defaults['ed_author'] );
    $author_title = get_theme_mod( 'author_title', $defaults['author_title'] );
    if( $ed_author && get_the_author_meta( 'description' ) ){ ?>
        <section class="shopexcel-author-box">
            <div class="author-section">
                <div class="img-holder"><?php echo get_avatar( get_the_author_meta( 'ID' ), 160 ); ?></div>
                <div class="author-content">
                    <div class="author-meta">
                        <?php 
                            if( $author_title ) echo '<span class="sub-title">' . esc_html( $author_title ) . '</span>';
                            echo '<h3 class="title">' . esc_html(  get_the_author_meta( 'display_name' ) ) . '</h3>';
                            echo wp_kses_post( wpautop( get_the_author_meta( 'description' ) ) );
                        ?>		
                    </div>
                    <?php 
                        if( shopexcel_pro_is_activated() && function_exists( 'shopexcel_author_social' ) ){
                            ?>
                                <div class="author-social-links"><?php shopexcel_author_social(); ?></div>
                            <?php 
                        }
                    ?>
                </div>
            </div>
        </section>
    <?php 
    }
}
endif;
add_action( 'shopexcel_after_post_content', 'shopexcel_author', 20 );

if( ! function_exists( 'shopexcel_latest_posts' ) ) :
/**
 * Latest Posts
*/
function shopexcel_latest_posts(){ 
    shopexcel_get_posts_list( 'latest' );
}
endif;
add_action( 'shopexcel_latest_posts', 'shopexcel_latest_posts' );

if( ! function_exists( 'shopexcel_comment' ) ) :
/**
 * Comments Template 
*/
function shopexcel_comment(){
    // If comments are open or we have at least one comment, load up the comment template.
    
    $defaults      = shopexcel_get_general_defaults();
    $page_comments = get_theme_mod( 'ed_page_comments', $defaults['ed_page_comments'] );
    $post_comments = get_theme_mod( 'ed_post_comments', $defaults['ed_post_comments'] );
    if ( (is_page() && !$page_comments) || (is_single() && !$post_comments) ) return;
	
    if ( comments_open() || get_comments_number() ) :
		comments_template();
	endif;
}
endif;
add_action( 'shopexcel_after_page_content', 'shopexcel_comment' );

if( ! function_exists( 'shopexcel_comment_location_hook' ) ) :
/**
 * Comments Location Hook in Single Post
*/
function shopexcel_comment_location_hook(){
    add_action( 'shopexcel_after_post_content', 'shopexcel_comment', shopexcel_comment_toggle() );
}
endif;
add_action( 'wp', 'shopexcel_comment_location_hook', 10 );

if( ! function_exists( 'shopexcel_content_end' ) ) :
/**
 * Content End
*/
function shopexcel_content_end(){ 
    
    if( !( is_front_page() && ! is_home() ) ){
        if(!is_404()) echo '</div><!-- .container -->'; ?>        
    </div><!-- .site-content -->
    <?php
    }
}
endif;
add_action( 'shopexcel_before_footer', 'shopexcel_content_end', 20 );

if( ! function_exists( 'shopexcel_footer_instagram_section' ) ) :
/**
 * Bottom Shop Section
*/
function shopexcel_footer_instagram_section(){ 
    if( shopexcel_is_btif_activated() ){
        $defaults     = shopexcel_get_general_defaults();
        $ed_instagram = get_theme_mod( 'ed_instagram', $defaults['ed_instagram'] );
        if( $ed_instagram ){
            echo '<div class="instagram-section">' . do_shortcode( '[blossomthemes_instagram_feed]' ) . '</div>';
        }
    }
}
endif;
add_action( 'shopexcel_footer', 'shopexcel_footer_instagram_section', 15 );

if( ! function_exists( 'shopexcel_footer_start' ) ) :
/**
 * Footer Start
*/
function shopexcel_footer_start(){
    ?>
    <footer id="colophon" class="site-footer" itemscope itemtype="https://schema.org/WPFooter">
    <?php
}
endif;
add_action( 'shopexcel_footer', 'shopexcel_footer_start', 20 );

if( ! function_exists( 'shopexcel_footer_info' ) ) :
/**
 * Footer Start
*/
function shopexcel_footer_info(){
    $defaults         = shopexcel_get_general_defaults();
    $foot_phn_label   = get_theme_mod( 'footer_phone_label', $defaults['footer_phone_label'] );
    $foot_phn         = get_theme_mod( 'footer_phone', $defaults['footer_phone'] );
    $foot_email_label = get_theme_mod( 'footer_email_label', $defaults['footer_email_label'] );
    $foot_email       = get_theme_mod( 'footer_email', $defaults['footer_email'] );
    $foot_opn_label   = get_theme_mod( 'opening_hour_label', $defaults['opening_hour_label'] );
    $foot_opn_hrs     = get_theme_mod( 'opening_hour', $defaults['opening_hour'] );
    if($foot_phn_label || $foot_phn || $foot_email_label || $foot_email || $foot_opn_label || $foot_opn_hrs ) { ?>
        <div class="footer-info-section">
            <div class="container">
                <div class="footer-info-wrapper">
                    <?php if( $foot_phn_label || $foot_phn ) { ?>
                        <div class="grid-item">
                            <div class="grid-item__icon">
                                <svg width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M34.9999 29.92V32.92C35.0011 33.1985 34.944 33.4741 34.8324 33.7293C34.7209 33.9845 34.5572 34.2136 34.352 34.4018C34.1468 34.5901 33.9045 34.7335 33.6407 34.8227C33.3769 34.9119 33.0973 34.945 32.8199 34.92C29.7428 34.5856 26.7869 33.5341 24.1899 31.85C21.7738 30.3146 19.7253 28.2661 18.1899 25.85C16.4999 23.2412 15.4482 20.271 15.1199 17.18C15.0949 16.9034 15.1278 16.6247 15.2164 16.3616C15.3051 16.0985 15.4475 15.8567 15.6347 15.6516C15.8219 15.4465 16.0497 15.2827 16.3037 15.1705C16.5577 15.0583 16.8323 15.0002 17.1099 15H20.1099C20.5952 14.9952 21.0657 15.1671 21.4337 15.4835C21.8017 15.8 22.042 16.2394 22.1099 16.72C22.2366 17.68 22.4714 18.6227 22.8099 19.53C22.9445 19.8879 22.9736 20.2769 22.8938 20.6509C22.8141 21.0248 22.6288 21.3681 22.3599 21.64L21.0899 22.91C22.5135 25.4135 24.5864 27.4864 27.0899 28.91L28.3599 27.64C28.6318 27.3711 28.9751 27.1858 29.3491 27.1061C29.723 27.0263 30.112 27.0554 30.4699 27.19C31.3772 27.5285 32.3199 27.7634 33.2799 27.89C33.7657 27.9585 34.2093 28.2032 34.5265 28.5775C34.8436 28.9518 35.0121 29.4296 34.9999 29.92Z" stroke="var(--shply-primary-color)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><rect x="1" y="1" width="48" height="48" rx="24" stroke="var(--shply-primary-color)" stroke-width="2"/></svg>
                            </div>
                            <div class="grid-item__contact-info">
                                <?php
                                    shopexcel_footer_phone_label();
                                    shopexcel_footer_phone_partial(); 
                                ?>
                            </div>
                        </div>
                    <?php } if( $foot_email_label || $foot_email ) { ?>
                        <div class="grid-item">
                            <div class="grid-item__icon">
                                <svg width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M17 17H33C34.1 17 35 17.9 35 19V31C35 32.1 34.1 33 33 33H17C15.9 33 15 32.1 15 31V19C15 17.9 15.9 17 17 17Z" stroke="var(--shply-primary-color)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M35 19L25 26L15 19" stroke="var(--shply-primary-color)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><rect x="1" y="1" width="48" height="48" rx="24" stroke="var(--shply-primary-color)" stroke-width="2"/></svg>
                            </div>
                            <div class="grid-item__contact-info">
                                <?php
                                    shopexcel_footer_email_label();
                                    shopexcel_footer_email(); 
                                ?>
                            </div>
                        </div>
                    <?php } if( $foot_opn_label || $foot_opn_hrs ) { ?>
                        <div class="grid-item">
                            <div class="grid-item__icon">
                                <svg width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M25 35C30.5228 35 35 30.5228 35 25C35 19.4772 30.5228 15 25 15C19.4772 15 15 19.4772 15 25C15 30.5228 19.4772 35 25 35Z" stroke="var(--shply-primary-color)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M25 19V25L29 27" stroke="var(--shply-primary-color)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><rect x="1" y="1" width="48" height="48" rx="24" stroke="var(--shply-primary-color)" stroke-width="2"/></svg>
                            </div>
                            <div class="grid-item__contact-info">
                                <?php
                                    shopexcel_opening_hour_label();
                                    shopexcel_opening_hour(); 
                                ?>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    <?php }
}
endif;
add_action( 'shopexcel_footer', 'shopexcel_footer_info', 25 );

if( ! function_exists( 'shopexcel_footer_top' ) ) :
/**
 * Footer Top
*/
function shopexcel_footer_top(){    
    $footer_sidebars = array( 'footer-one', 'footer-two', 'footer-three', 'footer-four' );
    $active_sidebars = array();
    $sidebar_count   = 0;
    
    foreach ( $footer_sidebars as $sidebar ) {
        if( is_active_sidebar( $sidebar ) ){
            array_push( $active_sidebars, $sidebar );
            $sidebar_count++ ;
        }
    }

    if( $active_sidebars ){ ?>
        <div class="footer-t">
            <div class="container">
                <div class="grid column-<?php echo esc_attr( $sidebar_count ); ?>">
                    <?php foreach( $active_sidebars as $active ){ ?>
                        <div class="col">
                            <?php dynamic_sidebar( $active ); ?>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <?php 
    }   
}
endif;
add_action( 'shopexcel_footer', 'shopexcel_footer_top', 30 );

if( ! function_exists( 'shopexcel_footer_bottom' ) ) :
/**
 * Footer Bottom
*/
function shopexcel_footer_bottom(){ ?>
    <div class="footer-b">
		<div class="container">
            <div class="footer-bottom-t">
                <div class="site-info">            
                    <?php
                        shopexcel_get_footer_copyright();
                        if( shopexcel_pro_is_activated() ){
                            $partials = new Shopexcel_Partials;
                            $partials->shopexcel_ed_author_link();
                            $partials->shopexcel_ed_wp_link();
                            if( function_exists( 'the_privacy_policy_link' ) ){
                                the_privacy_policy_link();
                            }
                        } else {
                            echo esc_html__( ' Shopexcel | Developed By ', 'shopexcel' ); 
                            echo '<a href="' . esc_url( 'https://blossomthemes.com/' ) .'" rel="nofollow" target="_blank">' . esc_html__( 'Blossom Themes', 'shopexcel' ) . '</a>.';                
                            printf( esc_html__( ' Powered by %s. ', 'shopexcel' ), '<a href="'. esc_url( 'https://wordpress.org/', 'shopexcel' ) .'" rel="nofollow" target="_blank">WordPress</a>' );
                            if( function_exists( 'the_privacy_policy_link' ) ){
                                the_privacy_policy_link();
                            }
                        }
                    ?> 
                </div>
                <?php shopexcel_footer_payments(); ?>               
            </div>
		</div>
	</div>
    <?php
}
endif;
add_action( 'shopexcel_footer', 'shopexcel_footer_bottom', 40 );

if( ! function_exists( 'shopexcel_footer_end' ) ) :
/**
 * Footer End 
*/
function shopexcel_footer_end(){ ?>
    </footer><!-- #colophon -->
    <?php
}
endif;
add_action( 'shopexcel_footer', 'shopexcel_footer_end', 50 );

if( ! function_exists( 'shopexcel_scrolltotop' ) ) :
/**
 * Scroll To Top
 */
function shopexcel_scrolltotop(){
    $defaults    = shopexcel_get_general_defaults();
    $scrolltotop = get_theme_mod( 'ed_scroll_top', $defaults['ed_scroll_top'] );
    if( $scrolltotop ){ ?>
        <div class="back-to-top"> 
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="inherit" d="M6.101 359.293L25.9 379.092c4.686 4.686 12.284 4.686 16.971 0L224 198.393l181.13 180.698c4.686 4.686 12.284 4.686 16.971 0l19.799-19.799c4.686-4.686 4.686-12.284 0-16.971L232.485 132.908c-4.686-4.686-12.284-4.686-16.971 0L6.101 342.322c-4.687 4.687-4.687 12.285 0 16.971z"></path></svg>
        </div>
        <?php
    }
}
endif;
add_action( 'shopexcel_after_footer', 'shopexcel_scrolltotop', 15 );

if( ! function_exists( 'shopexcel_page_end' ) ) :
/**
 * Page End
*/
function shopexcel_page_end(){ ?>
    </div><!-- #page -->
    <?php
}
endif;
add_action( 'shopexcel_after_footer', 'shopexcel_page_end', 20 );