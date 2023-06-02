<?php

/**
 * Title: Product Countdown
 * Slug: shopexcel/product-countdown
 * Categories: shopexcel-patterns
 * Keywords: woocommerce
 * Block Types: core/group, core/columns, core/image, core/cover
 * @package shopexcel
 * @since 1.0.0
 */

?>
<!-- wp:group -->
<div class="wp-block-group">
    <!-- wp:group {"align":"wide"} -->
    <div class="wp-block-group alignwide">
        <!-- wp:cover {"url":"https://blossomthemesdemo.com/shopexcel-clothing-store/wp-content/uploads/sites/177/2022/11/Group-6401-1.jpg","id":1068,"dimRatio":0,"minHeight":490,"isDark":false,"align":"wide","className":"shply-pad-68 shply-mob-pad-24"} -->
        <div class="wp-block-cover alignwide is-light shply-pad-68 shply-mob-pad-24" style="min-height:490px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim"></span><img class="wp-block-cover__image-background wp-image-1068" alt="" src="https://blossomthemesdemo.com/shopexcel-clothing-store/wp-content/uploads/sites/177/2022/11/Group-6401-1.jpg" data-object-fit="cover" />
            <div class="wp-block-cover__inner-container">
                <!-- wp:paragraph {"style":{"typography":{"fontSize":"0.87em","fontStyle":"normal","fontWeight":"500"},"color":{"text":"#00000099"}},"className":"shply-mg-bottom-0"} -->
                <p class="shply-mg-bottom-0 has-text-color" style="color:#00000099;font-size:0.87em;font-style:normal;font-weight:500"><?php echo wp_kses_post('📢 '); esc_html_e('SALE', 'shopexcel'); ?></p>
                <!-- /wp:paragraph -->

                <!-- wp:heading {"className":"shply-mg-bottom-0"} -->
                <h2 class="shply-mg-bottom-0"><?php esc_html_e('Clearance Sale', 'shopexcel'); ?></h2>
                <!-- /wp:heading -->

                <!-- wp:spacer {"height":"16px"} -->
                <div style="height:16px" aria-hidden="true" class="wp-block-spacer"></div>
                <!-- /wp:spacer -->

                <!-- wp:paragraph -->
                <p><?php esc_html_e('Upto 70% Off. All Sales Are Final!', 'shopexcel'); ?></p>
                <!-- /wp:paragraph -->

                <!-- wp:spacer {"height":"36px"} -->
                <div style="height:36px" aria-hidden="true" class="wp-block-spacer"></div>
                <!-- /wp:spacer -->

                <!-- wp:shortcode -->
                <?php echo do_shortcode('[hurrytimer id="1091"]'); ?>
                <!-- /wp:shortcode -->

                <!-- wp:spacer {"height":"30px"} -->
                <div style="height:30px" aria-hidden="true" class="wp-block-spacer"></div>
                <!-- /wp:spacer -->

                <!-- wp:buttons -->
                <div class="wp-block-buttons">
                    <!-- wp:button {"className":"Shply__btn-arrow"} -->
                    <div class="wp-block-button Shply__btn-arrow"><a class="wp-block-button__link wp-element-button"><?php esc_html_e('Grab The Offer', 'shopexcel'); ?></a></div>
                    <!-- /wp:button -->
                </div>
                <!-- /wp:buttons -->
            </div>
        </div>
        <!-- /wp:cover -->
    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:group -->