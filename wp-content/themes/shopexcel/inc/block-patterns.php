<?php
/**
 * Shopexcel: Block Patterns
 *
 * Registers block patterns and categories
 *
 */

/**
 * Information on using register_block_pattern_category function
 *
 * @link  https://gutenbergtimes.com/the-wordpress-block-patterns-resource-list/#8-theme-review-team
 * @return void
 */
if( ! function_exists( 'shopexcel_register_block_patterns' ) ) :

function shopexcel_register_block_patterns() {

	register_block_pattern_category(
		'shopexcel-patterns',
		array( 'label' => esc_html__( 'Shopexcel Patterns', 'shopexcel' ) )
	);

}
endif;
add_action( 'init', 'shopexcel_register_block_patterns', 10 );