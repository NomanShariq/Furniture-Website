<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Shopexcel
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
        /**
         * Post Thumbnail
         * 
         * @hooked shopexcel_post_thumbnail
        */
        do_action( 'shopexcel_before_page_entry_content' );
    
        /**
         * Entry Content
         * 
         * @hooked shopexcel_entry_content - 10
         * @hooked shopexcel_entry_content - 15
         * @hooked shopexcel_entry_footer  - 20
        */
        do_action( 'shopexcel_page_entry_content' );    
    ?>
</article><!-- #post-<?php the_ID(); ?> -->
