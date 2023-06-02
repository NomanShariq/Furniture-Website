<?php

/**
 * Title: Popular Product with CTA
 * Slug: shopexcel/popular-product-cta
 * Categories: shopexcel-patterns
 * Keywords: woocommerce
 * Block Types: core/group, core/columns, core/image, core/cover
 * @package shopexcel
 * @since 1.0.0
 */

?>
<!-- wp:heading {"textAlign":"center","className":"shply-section-title shply-mg-bottom-16"} -->
<h2 class="has-text-align-center shply-section-title shply-mg-bottom-16"><?php esc_html_e( 'Popular Products', 'shopexcel' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"1.25em"}},"className":"shply-section-desc shply-mg-bottom-0 Shply__text-alignCenter"} -->
<p class="has-text-align-center shply-section-desc shply-mg-bottom-0 Shply__text-alignCenter" style="font-size:1.25em"><?php esc_html_e( 'Our popular products selected by top specialist for your daily usage', 'shopexcel' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:spacer {"height":"56px"} -->
<div style="height:56px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:group {"align":"wide"} -->
<div class="wp-block-group alignwide">
    <!-- wp:columns {"className":"shply-desktop-has-2-columns shply-tablet-has-1-column   shply-mobile-has-1-column shply-mg-bottom-0 shply-ltablet-has-2-columns "} -->
    <div class="wp-block-columns shply-desktop-has-2-columns shply-tablet-has-1-column shply-mobile-has-1-column shply-mg-bottom-0 shply-ltablet-has-2-columns">
        <!-- wp:column -->
        <div class="wp-block-column">
            <!-- wp:group {"className":"shply-tablet-has-2-columns"} -->
            <div class="wp-block-group shply-tablet-has-2-columns">
                <!-- wp:woocommerce/product-top-rated {"columns":2,"rows":2} /-->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column -->
        <div class="wp-block-column">
            <!-- wp:group {"className":"align-bottom","layout":{"inherit":true,"type":"constrained"}} -->
            <div class="wp-block-group align-bottom">
                <!-- wp:cover {"url":"https://blossomthemesdemo.com/shopexcel-clothing-store/wp-content/uploads/sites/177/2022/11/Rectangle-273.jpg","id":1042,"dimRatio":50,"minHeight":935,"customGradient":"linear-gradient(0deg,rgba(0,0,0,0.2) 0%,rgba(0,0,0,0.2) 100%)","isDark":false,"className":"product-cta Shply__mob-mhig-500 "} -->
                <div class="wp-block-cover is-light product-cta Shply__mob-mhig-500" style="min-height:935px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim wp-block-cover__gradient-background has-background-gradient" style="background:linear-gradient(0deg,rgba(0,0,0,0.2) 0%,rgba(0,0,0,0.2) 100%)"></span><img class="wp-block-cover__image-background wp-image-1042" alt="" src="https://blossomthemesdemo.com/shopexcel-clothing-store/wp-content/uploads/sites/177/2022/11/Rectangle-273.jpg" data-object-fit="cover" />
                    <div class="wp-block-cover__inner-container">
                        <!-- wp:paragraph {"style":{"color":{"text":"#00000099"},"typography":{"letterSpacing":"0.15em"}},"className":"shply-mg-bottom-0"} -->
                        <p class="shply-mg-bottom-0 has-text-color" style="color:#00000099;letter-spacing:0.15em"><?php esc_html_e('HOTTEST DEAL', 'shopexcel'); ?></p>
                        <!-- /wp:paragraph -->

                        <!-- wp:heading {"level":3,"style":{"typography":{"fontSize":"46px"}},"className":"shply-mg-top-8  shply-mg-bottom-8"} -->
                        <h3 class="shply-mg-top-8 shply-mg-bottom-8" style="font-size:46px"><?php esc_html_e( 'Deal of the Day', 'shopexcel'); ?></h3>
                        <!-- /wp:heading -->

                        <!-- wp:paragraph {"className":"shply-mg-bottom-0"} -->
                        <p class="shply-mg-bottom-0"><?php esc_html_e( 'Get 30% off on beauty products.', 'shopexcel' ); ?></p>
                        <!-- /wp:paragraph -->

                        <!-- wp:buttons -->
                        <div class="wp-block-buttons">
                            <!-- wp:button {"className":"shply-mg-top-32 Shply__btn-arrow"} -->
                            <div class="wp-block-button shply-mg-top-32 Shply__btn-arrow"><a class="wp-block-button__link wp-element-button"><?php esc_html_e( 'Grab The Offer', 'shopexcel' ); ?></a></div>
                            <!-- /wp:button -->
                        </div>
                        <!-- /wp:buttons -->
                    </div>
                </div>
                <!-- /wp:cover -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->