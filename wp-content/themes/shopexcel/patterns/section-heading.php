<?php

/**
 * Title: Section Heading
 * Slug: shopexcel/section-heading
 * Categories: shopexcel-patterns
 * Keywords: woocommerce
 * Block Types: core/group, core/columns, core/image, core/cover
 * @package shopexcel
 * @since 1.0.0
 */

?>
<!-- wp:group {"align":"wide"} -->
<div class="wp-block-group alignwide">
    <!-- wp:columns {"className":" shply-mg-bottom-0"} -->
    <div class="wp-block-columns shply-mg-bottom-0">
        <!-- wp:column -->
        <div class="wp-block-column">
            <!-- wp:heading {"textAlign":"left","className":"shply-section-title shply-mg-bottom-16"} -->
            <h2 class="has-text-align-left shply-section-title shply-mg-bottom-16"><?php esc_html_e('Featured Categories', 'shopexcel'); ?></h2>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"align":"left","style":{"typography":{"fontSize":"1.25em"}},"className":"shply-section-desc shply-mg-bottom-0"} -->
            <p class="has-text-align-left shply-section-desc shply-mg-bottom-0" style="font-size:1.25em"><?php esc_html_e('Best selling categories this month. Get the best out of you.', 'shopexcel'); ?></p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"verticalAlignment":"bottom"} -->
        <div class="wp-block-column is-vertically-aligned-bottom">
            <!-- wp:group -->
            <div class="wp-block-group">
                <!-- wp:buttons {"className":"shply-btn-secondary","layout":{"type":"flex","justifyContent":"right","verticalAlignment":"bottom"}} -->
                <div class="wp-block-buttons shply-btn-secondary">
                    <!-- wp:button {"className":"Shply__btn-arrow with-outline"} -->
                    <div class="wp-block-button Shply__btn-arrow with-outline"><a class="wp-block-button__link wp-element-button"><?php esc_html_e('View All', 'shopexcel'); ?></a></div>
                    <!-- /wp:button -->
                </div>
                <!-- /wp:buttons -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->

    <!-- wp:spacer {"height":"56px"} -->
    <div style="height:56px" aria-hidden="true" class="wp-block-spacer"></div>
    <!-- /wp:spacer -->
</div>
<!-- /wp:group -->