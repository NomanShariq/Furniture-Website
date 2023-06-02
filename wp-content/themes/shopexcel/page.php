<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Shopexcel
 */

get_header(); 
global $post;
$single_page_title = get_post_meta( $post->ID, '_shply_page_title', true );
$add_class         = $single_page_title == true ? ' shply_title_disabled': '';
?>
	<div class="page-grid<?php echo esc_attr( $add_class ); ?>">
		<div id="primary" class="content-area">
			<main id="main" class="site-main">

				<?php
				while ( have_posts() ) : the_post();

					get_template_part( 'template-parts/content', 'page' );

					/**
					 * Comment Template
					 * 
					 * @hooked shopexcel_comment
					*/
					do_action( 'shopexcel_after_page_content' );

				endwhile; // End of the loop.
				?>

			</main><!-- #main -->
		</div><!-- #primary -->
		<?php get_sidebar(); ?>
	</div>
<?php

get_footer();
