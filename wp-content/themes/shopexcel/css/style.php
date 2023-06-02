<?php
/**
 * Shopexcel Dynamic Styles
 * 
 * @package Shopexcel
*/

function shopexcel_dynamic_css(){
    
    $typo_defaults   = shopexcel_get_typography_defaults();
	$defaults        = shopexcel_get_color_defaults();
	$site_defaults   = shopexcel_get_site_defaults();
	$button_defaults = shopexcel_get_button_defaults();
	$layout_defaults = shopexcel_get_general_defaults();
    
	$primary_font   = wp_parse_args( get_theme_mod( 'primary_font' ), $typo_defaults['primary_font'] );
	$sitetitle      = wp_parse_args( get_theme_mod( 'site_title' ), $typo_defaults['site_title'] );
	$button         = wp_parse_args( get_theme_mod( 'button' ), $typo_defaults['button'] );
    $heading_one    = wp_parse_args( get_theme_mod( 'heading_one' ), $typo_defaults['heading_one'] );
	$heading_two    = wp_parse_args( get_theme_mod( 'heading_two' ), $typo_defaults['heading_two'] );
	$heading_three  = wp_parse_args( get_theme_mod( 'heading_three' ), $typo_defaults['heading_three'] );
	$heading_four   = wp_parse_args( get_theme_mod( 'heading_four' ), $typo_defaults['heading_four'] );
	$heading_five   = wp_parse_args( get_theme_mod( 'heading_five' ), $typo_defaults['heading_five'] );
	$heading_six    = wp_parse_args( get_theme_mod( 'heading_six' ), $typo_defaults['heading_six'] );

    //Primary Font variables
    $primarydesktopFontSize = isset(  $primary_font['desktop']['font_size'] ) ? $primary_font['desktop']['font_size'] : $typo_defaults['primary_font']['desktop']['font_size'];
    $primarydesktopSpacing  = isset(  $primary_font['desktop']['letter_spacing'] ) ? $primary_font['desktop']['letter_spacing'] : $typo_defaults['primary_font']['desktop']['letter_spacing'];
    $primarydesktopHeight   = isset(  $primary_font['desktop']['line_height'] ) ? $primary_font['desktop']['line_height'] : $typo_defaults['primary_font']['desktop']['line_height'];
    $primarytabletFontSize  = isset(  $primary_font['tablet']['font_size'] ) ? $primary_font['tablet']['font_size'] : $typo_defaults['primary_font']['tablet']['font_size'];
    $primarytabletSpacing   = isset(  $primary_font['tablet']['letter_spacing'] ) ? $primary_font['tablet']['letter_spacing'] : $typo_defaults['primary_font']['tablet']['letter_spacing'];
    $primarytabletHeight    = isset(  $primary_font['tablet']['line_height'] ) ? $primary_font['tablet']['line_height'] : $typo_defaults['primary_font']['tablet']['line_height'];
    $primarymobileFontSize  = isset(  $primary_font['mobile']['font_size'] ) ? $primary_font['mobile']['font_size'] : $typo_defaults['primary_font']['mobile']['font_size'];
    $primarymobileSpacing   = isset(  $primary_font['mobile']['letter_spacing'] ) ? $primary_font['mobile']['letter_spacing'] : $typo_defaults['primary_font']['mobile']['letter_spacing'];
    $primarymobileHeight    = isset(  $primary_font['mobile']['line_height'] ) ? $primary_font['mobile']['line_height'] : $typo_defaults['primary_font']['mobile']['line_height'];

    //Site Title variables
    $sitedesktopFontSize = isset(  $sitetitle['desktop']['font_size'] ) ? $sitetitle['desktop']['font_size'] : $typo_defaults['site_title']['desktop']['font_size'];
    $sitedesktopSpacing  = isset(  $sitetitle['desktop']['letter_spacing'] ) ? $sitetitle['desktop']['letter_spacing'] : $typo_defaults['site_title']['desktop']['letter_spacing'];
    $sitedesktopHeight   = isset(  $sitetitle['desktop']['line_height'] ) ? $sitetitle['desktop']['line_height'] : $typo_defaults['site_title']['desktop']['line_height'];
    $sitetabletFontSize  = isset(  $sitetitle['tablet']['font_size'] ) ? $sitetitle['tablet']['font_size'] : $typo_defaults['site_title']['tablet']['font_size'];
    $sitetabletSpacing   = isset(  $sitetitle['tablet']['letter_spacing'] ) ? $sitetitle['tablet']['letter_spacing'] : $typo_defaults['site_title']['tablet']['letter_spacing'];
    $sitetabletHeight    = isset(  $sitetitle['tablet']['line_height'] ) ? $sitetitle['tablet']['line_height'] : $typo_defaults['site_title']['tablet']['line_height'];
    $sitemobileFontSize  = isset(  $sitetitle['mobile']['font_size'] ) ? $sitetitle['mobile']['font_size'] : $typo_defaults['site_title']['mobile']['font_size'];
    $sitemobileSpacing   = isset(  $sitetitle['mobile']['letter_spacing'] ) ? $sitetitle['mobile']['letter_spacing'] : $typo_defaults['site_title']['mobile']['letter_spacing'];
    $sitemobileHeight    = isset(  $sitetitle['mobile']['line_height'] ) ? $sitetitle['mobile']['line_height'] : $typo_defaults['site_title']['mobile']['line_height'];
    
    //Button variables
    $btndesktopFontSize = isset(  $button['desktop']['font_size'] ) ? $button['desktop']['font_size'] : $typo_defaults['button']['desktop']['font_size'];
    $btndesktopSpacing  = isset(  $button['desktop']['letter_spacing'] ) ? $button['desktop']['letter_spacing'] : $typo_defaults['button']['desktop']['letter_spacing'];
    $btndesktopHeight   = isset(  $button['desktop']['line_height'] ) ? $button['desktop']['line_height'] : $typo_defaults['button']['desktop']['line_height'];
    $btntabletFontSize  = isset(  $button['tablet']['font_size'] ) ? $button['tablet']['font_size'] : $typo_defaults['button']['tablet']['font_size'];
    $btntabletSpacing   = isset(  $button['tablet']['letter_spacing'] ) ? $button['tablet']['letter_spacing'] : $typo_defaults['button']['tablet']['letter_spacing'];
    $btntabletHeight    = isset(  $button['tablet']['line_height'] ) ? $button['tablet']['line_height'] : $typo_defaults['button']['tablet']['line_height'];
    $btnmobileFontSize  = isset(  $button['mobile']['font_size'] ) ? $button['mobile']['font_size'] : $typo_defaults['button']['mobile']['font_size'];
    $btnmobileSpacing   = isset(  $button['mobile']['letter_spacing'] ) ? $button['mobile']['letter_spacing'] : $typo_defaults['button']['mobile']['letter_spacing'];
    $btnmobileHeight    = isset(  $button['mobile']['line_height'] ) ? $button['mobile']['line_height'] : $typo_defaults['button']['mobile']['line_height'];

    //Heading 1 variables
    $h1desktopFontSize = isset(  $heading_one['desktop']['font_size'] ) ? $heading_one['desktop']['font_size'] : $typo_defaults['heading_one']['desktop']['font_size'];
    $h1desktopSpacing  = isset(  $heading_one['desktop']['letter_spacing'] ) ? $heading_one['desktop']['letter_spacing'] : $typo_defaults['heading_one']['desktop']['letter_spacing'];
    $h1desktopHeight   = isset(  $heading_one['desktop']['line_height'] ) ? $heading_one['desktop']['line_height'] : $typo_defaults['heading_one']['desktop']['line_height'];
    $h1tabletFontSize  = isset(  $heading_one['tablet']['font_size'] ) ? $heading_one['tablet']['font_size'] : $typo_defaults['heading_one']['tablet']['font_size'];
    $h1tabletSpacing   = isset(  $heading_one['tablet']['letter_spacing'] ) ? $heading_one['tablet']['letter_spacing'] : $typo_defaults['heading_one']['tablet']['letter_spacing'];
    $h1tabletHeight    = isset(  $heading_one['tablet']['line_height'] ) ? $heading_one['tablet']['line_height'] : $typo_defaults['heading_one']['tablet']['line_height'];
    $h1mobileFontSize  = isset(  $heading_one['mobile']['font_size'] ) ? $heading_one['mobile']['font_size'] : $typo_defaults['heading_one']['mobile']['font_size'];
    $h1mobileSpacing   = isset(  $heading_one['mobile']['letter_spacing'] ) ? $heading_one['mobile']['letter_spacing'] : $typo_defaults['heading_one']['mobile']['letter_spacing'];
    $h1mobileHeight    = isset(  $heading_one['mobile']['line_height'] ) ? $heading_one['mobile']['line_height'] : $typo_defaults['heading_one']['mobile']['line_height'];
    
    //Heading 2 variables
    $h2desktopFontSize = isset(  $heading_two['desktop']['font_size'] ) ? $heading_two['desktop']['font_size'] : $typo_defaults['heading_two']['desktop']['font_size'];
    $h2desktopSpacing  = isset(  $heading_two['desktop']['letter_spacing'] ) ? $heading_two['desktop']['letter_spacing'] : $typo_defaults['heading_two']['desktop']['letter_spacing'];
    $h2desktopHeight   = isset(  $heading_two['desktop']['line_height'] ) ? $heading_two['desktop']['line_height'] : $typo_defaults['heading_two']['desktop']['line_height'];
    $h2tabletFontSize  = isset(  $heading_two['tablet']['font_size'] ) ? $heading_two['tablet']['font_size'] : $typo_defaults['heading_two']['tablet']['font_size'];
    $h2tabletSpacing   = isset(  $heading_two['tablet']['letter_spacing'] ) ? $heading_two['tablet']['letter_spacing'] : $typo_defaults['heading_two']['tablet']['letter_spacing'];
    $h2tabletHeight    = isset(  $heading_two['tablet']['line_height'] ) ? $heading_two['tablet']['line_height'] : $typo_defaults['heading_two']['tablet']['line_height'];
    $h2mobileFontSize  = isset(  $heading_two['mobile']['font_size'] ) ? $heading_two['mobile']['font_size'] : $typo_defaults['heading_two']['mobile']['font_size'];
    $h2mobileSpacing   = isset(  $heading_two['mobile']['letter_spacing'] ) ? $heading_two['mobile']['letter_spacing'] : $typo_defaults['heading_two']['mobile']['letter_spacing'];
    $h2mobileHeight    = isset(  $heading_two['mobile']['line_height'] ) ? $heading_two['mobile']['line_height'] : $typo_defaults['heading_two']['mobile']['line_height'];
    
    //Heading 3 variables
    $h3desktopFontSize = isset(  $heading_three['desktop']['font_size'] ) ? $heading_three['desktop']['font_size'] : $typo_defaults['heading_three']['desktop']['font_size'];
    $h3desktopSpacing  = isset(  $heading_three['desktop']['letter_spacing'] ) ? $heading_three['desktop']['letter_spacing'] : $typo_defaults['heading_three']['desktop']['letter_spacing'];
    $h3desktopHeight   = isset(  $heading_three['desktop']['line_height'] ) ? $heading_three['desktop']['line_height'] : $typo_defaults['heading_three']['desktop']['line_height'];
    $h3tabletFontSize  = isset(  $heading_three['tablet']['font_size'] ) ? $heading_three['tablet']['font_size'] : $typo_defaults['heading_three']['tablet']['font_size'];
    $h3tabletSpacing   = isset(  $heading_three['tablet']['letter_spacing'] ) ? $heading_three['tablet']['letter_spacing'] : $typo_defaults['heading_three']['tablet']['letter_spacing'];
    $h3tabletHeight    = isset(  $heading_three['tablet']['line_height'] ) ? $heading_three['tablet']['line_height'] : $typo_defaults['heading_three']['tablet']['line_height'];
    $h3mobileFontSize  = isset(  $heading_three['mobile']['font_size'] ) ? $heading_three['mobile']['font_size'] : $typo_defaults['heading_three']['mobile']['font_size'];
    $h3mobileSpacing   = isset(  $heading_three['mobile']['letter_spacing'] ) ? $heading_three['mobile']['letter_spacing'] : $typo_defaults['heading_three']['mobile']['letter_spacing'];
    $h3mobileHeight    = isset(  $heading_three['mobile']['line_height'] ) ? $heading_three['mobile']['line_height'] : $typo_defaults['heading_three']['mobile']['line_height'];
    
    //Heading 4 variables
    $h4desktopFontSize = isset(  $heading_four['desktop']['font_size'] ) ? $heading_four['desktop']['font_size'] : $typo_defaults['heading_four']['desktop']['font_size'];
    $h4desktopSpacing  = isset(  $heading_four['desktop']['letter_spacing'] ) ? $heading_four['desktop']['letter_spacing'] : $typo_defaults['heading_four']['desktop']['letter_spacing'];
    $h4desktopHeight   = isset(  $heading_four['desktop']['line_height'] ) ? $heading_four['desktop']['line_height'] : $typo_defaults['heading_four']['desktop']['line_height'];
    $h4tabletFontSize  = isset(  $heading_four['tablet']['font_size'] ) ? $heading_four['tablet']['font_size'] : $typo_defaults['heading_four']['tablet']['font_size'];
    $h4tabletSpacing   = isset(  $heading_four['tablet']['letter_spacing'] ) ? $heading_four['tablet']['letter_spacing'] : $typo_defaults['heading_four']['tablet']['letter_spacing'];
    $h4tabletHeight    = isset(  $heading_four['tablet']['line_height'] ) ? $heading_four['tablet']['line_height'] : $typo_defaults['heading_four']['tablet']['line_height'];
    $h4mobileFontSize  = isset(  $heading_four['mobile']['font_size'] ) ? $heading_four['mobile']['font_size'] : $typo_defaults['heading_four']['mobile']['font_size'];
    $h4mobileSpacing   = isset(  $heading_four['mobile']['letter_spacing'] ) ? $heading_four['mobile']['letter_spacing'] : $typo_defaults['heading_four']['mobile']['letter_spacing'];
    $h4mobileHeight    = isset(  $heading_four['mobile']['line_height'] ) ? $heading_four['mobile']['line_height'] : $typo_defaults['heading_four']['mobile']['line_height'];
    
    //Heading 5 variables
    $h5desktopFontSize = isset(  $heading_five['desktop']['font_size'] ) ? $heading_five['desktop']['font_size'] : $typo_defaults['heading_five']['desktop']['font_size'];
    $h5desktopSpacing  = isset(  $heading_five['desktop']['letter_spacing'] ) ? $heading_five['desktop']['letter_spacing'] : $typo_defaults['heading_five']['desktop']['letter_spacing'];
    $h5desktopHeight   = isset(  $heading_five['desktop']['line_height'] ) ? $heading_five['desktop']['line_height'] : $typo_defaults['heading_five']['desktop']['line_height'];
    $h5tabletFontSize  = isset(  $heading_five['tablet']['font_size'] ) ? $heading_five['tablet']['font_size'] : $typo_defaults['heading_five']['tablet']['font_size'];
    $h5tabletSpacing   = isset(  $heading_five['tablet']['letter_spacing'] ) ? $heading_five['tablet']['letter_spacing'] : $typo_defaults['heading_five']['tablet']['letter_spacing'];
    $h5tabletHeight    = isset(  $heading_five['tablet']['line_height'] ) ? $heading_five['tablet']['line_height'] : $typo_defaults['heading_five']['tablet']['line_height'];
    $h5mobileFontSize  = isset(  $heading_five['mobile']['font_size'] ) ? $heading_five['mobile']['font_size'] : $typo_defaults['heading_five']['mobile']['font_size'];
    $h5mobileSpacing   = isset(  $heading_five['mobile']['letter_spacing'] ) ? $heading_five['mobile']['letter_spacing'] : $typo_defaults['heading_five']['mobile']['letter_spacing'];
    $h5mobileHeight    = isset(  $heading_five['mobile']['line_height'] ) ? $heading_five['mobile']['line_height'] : $typo_defaults['heading_five']['mobile']['line_height'];
    
    //Heading 6 variables
    $h6desktopFontSize = isset(  $heading_six['desktop']['font_size'] ) ? $heading_six['desktop']['font_size'] : $typo_defaults['heading_six']['desktop']['font_size'];
    $h6desktopSpacing  = isset(  $heading_six['desktop']['letter_spacing'] ) ? $heading_six['desktop']['letter_spacing'] : $typo_defaults['heading_six']['desktop']['letter_spacing'];
    $h6desktopHeight   = isset(  $heading_six['desktop']['line_height'] ) ? $heading_six['desktop']['line_height'] : $typo_defaults['heading_six']['desktop']['line_height'];
    $h6tabletFontSize  = isset(  $heading_six['tablet']['font_size'] ) ? $heading_six['tablet']['font_size'] : $typo_defaults['heading_six']['tablet']['font_size'];
    $h6tabletSpacing   = isset(  $heading_six['tablet']['letter_spacing'] ) ? $heading_six['tablet']['letter_spacing'] : $typo_defaults['heading_six']['tablet']['letter_spacing'];
    $h6tabletHeight    = isset(  $heading_six['tablet']['line_height'] ) ? $heading_six['tablet']['line_height'] : $typo_defaults['heading_six']['tablet']['line_height'];
    $h6mobileFontSize  = isset(  $heading_six['mobile']['font_size'] ) ? $heading_six['mobile']['font_size'] : $typo_defaults['heading_six']['mobile']['font_size'];
    $h6mobileSpacing   = isset(  $heading_six['mobile']['letter_spacing'] ) ? $heading_six['mobile']['letter_spacing'] : $typo_defaults['heading_six']['mobile']['letter_spacing'];
    $h6mobileHeight    = isset(  $heading_six['mobile']['line_height'] ) ? $heading_six['mobile']['line_height'] : $typo_defaults['heading_six']['mobile']['line_height'];

    $primary_font_family       = shopexcel_get_font_family( $primary_font );
    $sitetitle_font_family     = shopexcel_get_font_family( $sitetitle );
    $btn_font_family           = shopexcel_get_font_family( $button );
    $heading_one_font_family   = shopexcel_get_font_family( $heading_one );
    $heading_two_font_family   = shopexcel_get_font_family( $heading_two );
    $heading_three_font_family = shopexcel_get_font_family( $heading_three );
    $heading_four_font_family  = shopexcel_get_font_family( $heading_four );
    $heading_five_font_family  = shopexcel_get_font_family( $heading_five );
    $heading_six_font_family   = shopexcel_get_font_family( $heading_six );

    $siteFontFamily = $sitetitle_font_family === '"Default Family"' ? 'inherit' : $sitetitle_font_family;
    $btnFontFamily  = $btn_font_family === '"Default Family"' ? 'inherit' : $btn_font_family;
    $h1FontFamily   = $heading_one_font_family === '"Default Family"' ? 'inherit' : $heading_one_font_family;
    $h2FontFamily   = $heading_two_font_family === '"Default Family"' ? 'inherit' : $heading_two_font_family;
    $h3FontFamily   = $heading_three_font_family === '"Default Family"' ? 'inherit' : $heading_three_font_family;
    $h4FontFamily   = $heading_four_font_family === '"Default Family"' ? 'inherit' : $heading_four_font_family;
    $h5FontFamily   = $heading_five_font_family === '"Default Family"' ? 'inherit' : $heading_five_font_family;
    $h6FontFamily   = $heading_six_font_family === '"Default Family"' ? 'inherit' : $heading_six_font_family;

    $logo_width        = get_theme_mod( 'logo_width', $site_defaults['logo_width'] );
	$tablet_logo_width = get_theme_mod( 'tablet_logo_width', $site_defaults['tablet_logo_width'] );
	$mobile_logo_width = get_theme_mod( 'mobile_logo_width', $site_defaults['mobile_logo_width'] );

    $container_width        = get_theme_mod( 'container_width', $layout_defaults['container_width'] );
	$tablet_container_width = get_theme_mod( 'tablet_container_width', $layout_defaults['tablet_container_width'] );
	$mobile_container_width = get_theme_mod( 'mobile_container_width', $layout_defaults['mobile_container_width'] );

    $fullwidth_centered        = get_theme_mod( 'fullwidth_centered', $layout_defaults['fullwidth_centered']);
    $tablet_fullwidth_centered = get_theme_mod( 'tablet_fullwidth_centered', $layout_defaults['tablet_fullwidth_centered']);
    $mobile_fullwidth_centered = get_theme_mod( 'mobile_fullwidth_centered', $layout_defaults['mobile_fullwidth_centered']);

    $sidebar_width        = get_theme_mod( 'sidebar_width', $layout_defaults['sidebar_width']);

    $widgets_spacing        = get_theme_mod( 'widgets_spacing', $layout_defaults['widgets_spacing']);
    $tablet_widgets_spacing = get_theme_mod( 'tablet_widgets_spacing', $layout_defaults['tablet_widgets_spacing']);
    $mobile_widgets_spacing = get_theme_mod( 'mobile_widgets_spacing', $layout_defaults['mobile_widgets_spacing']);

    $scroll_top_size        = get_theme_mod( 'scroll_top_size', $layout_defaults['scroll_top_size']);
    $tablet_scroll_top_size = get_theme_mod( 'tablet_scroll_top_size', $layout_defaults['tablet_scroll_top_size']);
    $mobile_scroll_top_size = get_theme_mod( 'mobile_scroll_top_size', $layout_defaults['mobile_scroll_top_size']);

    $button_roundness = get_theme_mod( 'button_roundness', $button_defaults['button_roundness'] );
	$button_padding   = get_theme_mod( 'button_padding', $button_defaults['button_padding'] );

    //COLOR VARIABLES

    $primary_color      = get_theme_mod( 'primary_color', $defaults['primary_color'] );
	$rgb                = shopexcel_hex2rgb( shopexcel_sanitize_rgba( $primary_color ) );
	$body_font_color    = get_theme_mod( 'body_font_color', $defaults['body_font_color'] );
	$rgb2               = shopexcel_hex2rgb( shopexcel_sanitize_rgba( $body_font_color ) );
	$heading_color      = get_theme_mod( 'heading_color', $defaults['heading_color'] );
	$rgb3               = shopexcel_hex2rgb( shopexcel_sanitize_rgba( $heading_color ) );
	$section_bg_color   = get_theme_mod( 'section_bg_color', $defaults['section_bg_color'] );
	$rgb4               = shopexcel_hex2rgb( shopexcel_sanitize_rgba( $section_bg_color ) );
	$background_color   = get_theme_mod( 'site_bg_color', $defaults['site_bg_color'] );
	$rgb5               = shopexcel_hex2rgb( shopexcel_sanitize_rgba( $background_color ) );

    //Button Color
	$btn_text_color         = get_theme_mod( 'btn_text_color_initial', $defaults['btn_text_color_initial'] );
	$btn_bg_color           = get_theme_mod( 'btn_bg_color_initial', $defaults['btn_bg_color_initial'] );
	$btn_text_hover_color   = get_theme_mod( 'btn_text_color_hover', $defaults['btn_text_color_hover'] );
	$btn_bg_hover_color     = get_theme_mod( 'btn_bg_color_hover', $defaults['btn_bg_color_hover'] );
	$btn_border_color       = get_theme_mod( 'btn_border_color_initial', $defaults['btn_border_color_initial'] );
	$btn_border_hover_color = get_theme_mod( 'btn_border_color_hover', $defaults['btn_border_color_hover'] );

    //Footer Color
    $foot_text_color      = get_theme_mod( 'foot_text_color', $defaults['foot_text_color'] );
    $foot_bg_color        = get_theme_mod( 'foot_bg_color', $defaults['foot_bg_color'] );
    $widget_heading_color = get_theme_mod( 'foot_widget_heading_color', $defaults['foot_widget_heading_color'] );

    echo "<style type='text/css' media='all'>"; ?>
    
    :root {
        --shply-primary-color       : <?php echo shopexcel_sanitize_rgba( $primary_color ); ?>;
        --shply-primary-color-rgb   : <?php printf('%1$s, %2$s, %3$s', $rgb[0], $rgb[1], $rgb[2] ); ?>;
        --shply-font-color          : <?php echo shopexcel_sanitize_rgba( $body_font_color ); ?>;
        --shply-font-color-rgb      : <?php printf('%1$s, %2$s, %3$s', $rgb2[0], $rgb2[1], $rgb2[2] ); ?>;
        --shply-heading-color       : <?php echo shopexcel_sanitize_rgba( $heading_color ); ?>;
        --shply-heading-color-rgb   : <?php printf('%1$s, %2$s, %3$s', $rgb3[0], $rgb3[1], $rgb3[2] ); ?>;
        --shply-section-bg-color    : <?php echo shopexcel_sanitize_rgba( $section_bg_color ); ?>;
        --shply-section-bg-color-rgb: <?php printf('%1$s, %2$s, %3$s', $rgb4[0], $rgb4[1], $rgb4[2] ); ?>;
        --shply-background-color    : <?php echo shopexcel_sanitize_rgba( $background_color ); ?>;
        --shply-background-color-rgb: <?php printf('%1$s, %2$s, %3$s', $rgb5[0], $rgb5[1], $rgb5[2] ); ?>;

        --shply-primary-font: <?php echo wp_kses_post( $primary_font_family ); ?>;     
        --shply-primary-font-weight: <?php echo esc_html( $primary_font['weight'] ); ?>;
        --shply-primary-font-transform: <?php echo esc_html( $primary_font['transform'] ); ?>;

        --shply-secondary-font: <?php echo wp_kses_post( $h1FontFamily ); ?>;
        --shply-secondary-font-weight: <?php echo esc_html( $heading_one['weight'] ); ?>;

        --shply-btn-text-initial-color: <?php echo shopexcel_sanitize_rgba( $btn_text_color ); ?>;
        --shply-btn-text-hover-color: <?php echo shopexcel_sanitize_rgba( $btn_text_hover_color ); ?>;
        --shply-btn-bg-initial-color: <?php echo shopexcel_sanitize_rgba( $btn_bg_color ); ?>;
        --shply-btn-bg-hover-color: <?php echo shopexcel_sanitize_rgba( $btn_bg_hover_color ); ?>;
        --shply-btn-border-initial-color: <?php echo shopexcel_sanitize_rgba( $btn_border_color ); ?>;
        --shply-btn-border-hover-color: <?php echo shopexcel_sanitize_rgba( $btn_border_hover_color ); ?>;

        --shply-btn-font-family: <?php echo wp_kses_post( $btnFontFamily ); ?>;     
        --shply-btn-font-weight: <?php echo esc_html( $button['weight'] ); ?>;
        --shply-btn-font-transform: <?php echo esc_html( $button['transform'] ); ?>;
        --shply-btn-roundness-top: <?php echo absint( $button_roundness['top'] ); ?>px;
        --shply-btn-roundness-right: <?php echo absint( $button_roundness['right'] ); ?>px;
        --shply-btn-roundness-bottom: <?php echo absint( $button_roundness['bottom'] ); ?>px;
        --shply-btn-roundness-left: <?php echo absint( $button_roundness['left'] ); ?>px;
        --shply-btn-padding-top: <?php echo absint( $button_padding['top'] ); ?>px;
        --shply-btn-padding-right: <?php echo absint( $button_padding['right'] ); ?>px;
        --shply-btn-padding-bottom: <?php echo absint( $button_padding['bottom'] ); ?>px;
        --shply-btn-padding-left: <?php echo absint( $button_padding['left'] ); ?>px;
	}

    .site-branding .site-title{
        font-family   : <?php echo wp_kses_post( $siteFontFamily ); ?>;
        font-weight   : <?php echo esc_html( $sitetitle['weight'] ); ?>;
        text-transform: <?php echo esc_html( $sitetitle['transform'] ); ?>;
    }
    
    .site-header .custom-logo{
		width : <?php echo absint( $logo_width ); ?>px;
	}

    .site-footer{
        --shply-foot-text-color   : <?php echo shopexcel_sanitize_rgba( $foot_text_color ); ?>;
        --shply-foot-bg-color     : <?php echo shopexcel_sanitize_rgba( $foot_bg_color ); ?>;
        --shply-widget-title-color: <?php echo shopexcel_sanitize_rgba( $widget_heading_color ); ?>;
    }

    h1{
        font-family : <?php echo wp_kses_post( $h1FontFamily ); ?>;
        text-transform: <?php echo esc_html( $heading_one['transform'] ); ?>;      
        font-weight: <?php echo esc_html( $heading_one['weight'] ); ?>;
    }

    h2{
        font-family : <?php echo wp_kses_post( $h2FontFamily ); ?>;
        text-transform: <?php echo esc_html( $heading_two['transform'] ); ?>;      
        font-weight: <?php echo esc_html( $heading_two['weight'] ); ?>;
    }

    h3{
        font-family : <?php echo wp_kses_post( $h3FontFamily ); ?>;
        text-transform: <?php echo esc_html( $heading_three['transform'] ); ?>;      
        font-weight: <?php echo esc_html( $heading_three['weight'] ); ?>;
    }

    h4{
        font-family : <?php echo wp_kses_post( $h4FontFamily ); ?>;
        text-transform: <?php echo esc_html( $heading_four['transform'] ); ?>;      
        font-weight: <?php echo esc_html( $heading_four['weight'] ); ?>;
    }

    h5{
        font-family : <?php echo wp_kses_post( $h5FontFamily ); ?>;
        text-transform: <?php echo esc_html( $heading_five['transform'] ); ?>;      
        font-weight: <?php echo esc_html( $heading_five['weight'] ); ?>;
    }
    
    h6{
        font-family : <?php echo wp_kses_post( $h6FontFamily ); ?>;
        text-transform: <?php echo esc_html( $heading_six['transform'] ); ?>;      
        font-weight: <?php echo esc_html( $heading_six['weight'] ); ?>;
    }

    @media (min-width: 1024px){
        :root{
            --shply-primary-font-size   : <?php echo absint( $primarydesktopFontSize ); ?>px;
            --shply-primary-font-height : <?php echo floatval( $primarydesktopHeight ); ?>em;
            --shply-primary-font-spacing: <?php echo absint( $primarydesktopSpacing ); ?>px;

            --shply-secondary-font-height : <?php echo floatval( $h1desktopHeight ); ?>em;
            --shply-secondary-font-spacing: <?php echo absint( $h1desktopSpacing ); ?>px;

            --shply-container-width  : <?php echo absint($container_width); ?>px;
            --shply-centered-maxwidth: <?php echo absint($fullwidth_centered); ?>px;

            --shply-btn-font-size   : <?php echo absint( $btndesktopFontSize ); ?>px;
            --shply-btn-font-height : <?php echo floatval( $btndesktopHeight ); ?>em;
            --shply-btn-font-spacing: <?php echo absint( $btndesktopSpacing ); ?>px;

            --shply-widget-spacing: <?php echo absint($widgets_spacing); ?>px;
        }

        .site-header .site-branding .site-title {
            font-size     : <?php echo absint( $sitedesktopFontSize ); ?>px;
            line-height   : <?php echo floatval( $sitedesktopHeight ); ?>em;
            letter-spacing: <?php echo absint( $sitedesktopSpacing ); ?>px;
        }

        .page-grid{
            --shply-sidebar-width: <?php echo absint($sidebar_width); ?>%;
        }

        .back-to-top{
            --shply-scroll-to-top-size: <?php echo absint($scroll_top_size); ?>px;
        }

        h1{
            font-size   : <?php echo floatval( $h1desktopFontSize ); ?>px;
            line-height   : <?php echo floatval( $h1desktopHeight ); ?>em;
            letter-spacing: <?php echo absint( $h1desktopSpacing ); ?>px;
        }

        h2{
            font-size   : <?php echo floatval( $h2desktopFontSize ); ?>px;
            line-height   : <?php echo floatval( $h2desktopHeight ); ?>em;
            letter-spacing: <?php echo absint( $h2desktopSpacing ); ?>px;
        }

        h3{
            font-size   : <?php echo floatval( $h3desktopFontSize ); ?>px;
            line-height   : <?php echo floatval( $h3desktopHeight ); ?>em;
            letter-spacing: <?php echo absint( $h3desktopSpacing ); ?>px;
        }

        h4{
            font-size   : <?php echo floatval( $h4desktopFontSize ); ?>px;
            line-height   : <?php echo floatval( $h4desktopHeight ); ?>em;
            letter-spacing: <?php echo absint( $h4desktopSpacing ); ?>px;
        }

        h5{
            font-size   : <?php echo floatval( $h5desktopFontSize ); ?>px;
            line-height   : <?php echo floatval( $h5desktopHeight ); ?>em;
            letter-spacing: <?php echo absint( $h5desktopSpacing ); ?>px;
        }

        h6{
            font-size   : <?php echo floatval( $h6desktopFontSize ); ?>px;
            line-height   : <?php echo floatval( $h6desktopHeight ); ?>em;
            letter-spacing: <?php echo absint( $h6desktopSpacing ); ?>px;
        }
    }

    @media (min-width: 767px) and (max-width: 1024px){
        :root{
            --shply-primary-font-size: <?php echo absint( $primarytabletFontSize ); ?>px;
            --shply-primary-font-height: <?php echo floatval( $primarytabletHeight ); ?>em;
            --shply-primary-font-spacing: <?php echo absint( $primarytabletSpacing ); ?>px;

            --shply-secondary-font-height : <?php echo floatval( $h1tabletHeight ); ?>em;
            --shply-secondary-font-spacing: <?php echo absint( $h1tabletSpacing ); ?>px;

            --shply-container-width  : <?php echo absint($tablet_container_width); ?>px;
            --shply-centered-maxwidth: <?php echo absint($tablet_fullwidth_centered); ?>px;

            --shply-btn-font-size   : <?php echo absint( $btntabletFontSize ); ?>px;
            --shply-btn-font-height : <?php echo floatval( $btntabletHeight ); ?>em;
            --shply-btn-font-spacing: <?php echo absint( $btntabletSpacing ); ?>px;

            --shply-widget-spacing: <?php echo absint($tablet_widgets_spacing); ?>px;
        }

        .site-branding .site-title {
            font-size   : <?php echo absint( $sitetabletFontSize ); ?>px;
            line-height   : <?php echo floatval( $sitetabletHeight ); ?>em;
            letter-spacing: <?php echo absint( $sitetabletSpacing ); ?>px;
        }

        .site-branding .custom-logo-link img{
			width: <?php echo absint( $tablet_logo_width ); ?>px;
        }

        .page-grid{
            --shply-sidebar-width: 100%;
        }

        .back-to-top{
            --shply-scroll-to-top-size: <?php echo absint($tablet_scroll_top_size); ?>px;
        }

        h1{
            font-size   : <?php echo floatval( $h1tabletFontSize ); ?>px;
            line-height   : <?php echo floatval( $h1tabletHeight ); ?>em;
            letter-spacing: <?php echo absint( $h1tabletSpacing ); ?>px;
        }

        h2{
            font-size   : <?php echo floatval( $h2tabletFontSize ); ?>px;
            line-height   : <?php echo floatval( $h2tabletHeight ); ?>em;
            letter-spacing: <?php echo absint( $h2tabletSpacing ); ?>px;
        }

        h3{
            font-size   : <?php echo floatval( $h3tabletFontSize ); ?>px;
            line-height   : <?php echo floatval( $h3tabletHeight ); ?>em;
            letter-spacing: <?php echo absint( $h3tabletSpacing ); ?>px;
        }

        h4{
            font-size   : <?php echo floatval( $h4tabletFontSize ); ?>px;
            line-height   : <?php echo floatval( $h4tabletHeight ); ?>em;
            letter-spacing: <?php echo absint( $h4tabletSpacing ); ?>px;
        }

        h5{
            font-size   : <?php echo floatval( $h5tabletFontSize ); ?>px;
            line-height   : <?php echo floatval( $h5tabletHeight ); ?>em;
            letter-spacing: <?php echo absint( $h5tabletSpacing ); ?>px;
        }

        h6{
            font-size   : <?php echo floatval( $h6tabletFontSize ); ?>px;
            line-height   : <?php echo floatval( $h6tabletHeight ); ?>em;
            letter-spacing: <?php echo absint( $h6tabletSpacing ); ?>px;
        }
    }

    @media (max-width: 767px){
        :root{
            --shply-primary-font-size: <?php echo absint( $primarymobileFontSize ); ?>px;
            --shply-primary-font-height: <?php echo floatval( $primarymobileHeight ); ?>em;
            --shply-primary-font-spacing: <?php echo absint( $primarymobileSpacing ); ?>px;

            --shply-secondary-font-height : <?php echo floatval( $h1mobileHeight ); ?>em;
            --shply-secondary-font-spacing: <?php echo absint( $h1mobileSpacing ); ?>px;

            --shply-container-width  : <?php echo absint($mobile_container_width); ?>px;
            --shply-centered-maxwidth: <?php echo absint($mobile_fullwidth_centered); ?>px;

            --shply-btn-font-size   : <?php echo absint( $btnmobileFontSize ); ?>px;
            --shply-btn-font-height : <?php echo floatval( $btnmobileHeight ); ?>em;
            --shply-btn-font-spacing: <?php echo absint( $btnmobileSpacing ); ?>px;

            --shply-widget-spacing: <?php echo absint($mobile_widgets_spacing); ?>px;
        }

        .site-branding .site-title{
            font-size   : <?php echo absint( $sitemobileFontSize ); ?>px;
            line-height   : <?php echo floatval( $sitemobileHeight ); ?>em;
            letter-spacing: <?php echo absint( $sitemobileSpacing ); ?>px;
        }

        .site-branding .custom-logo-link img{
            width: <?php echo absint( $mobile_logo_width ); ?>px;
        }

        .back-to-top{
            --shply-scroll-to-top-size: <?php echo absint($mobile_scroll_top_size); ?>px;
        }

        h1{
            font-size   : <?php echo floatval( $h1mobileFontSize ); ?>px;
            line-height   : <?php echo floatval( $h1mobileHeight ); ?>em;
            letter-spacing: <?php echo absint( $h1mobileSpacing ); ?>px;
        }

        h2{
            font-size   : <?php echo floatval( $h2mobileFontSize ); ?>px;
            line-height   : <?php echo floatval( $h2mobileHeight ); ?>em;
            letter-spacing: <?php echo absint( $h2mobileSpacing ); ?>px;
        }

        h3{
            font-size   : <?php echo floatval( $h3mobileFontSize ); ?>px;
            line-height   : <?php echo floatval( $h3mobileHeight ); ?>em;
            letter-spacing: <?php echo absint( $h3mobileSpacing ); ?>px;
        }

        h4{
            font-size   : <?php echo floatval( $h4mobileFontSize ); ?>px;
            line-height   : <?php echo floatval( $h4mobileHeight ); ?>em;
            letter-spacing: <?php echo absint( $h4mobileSpacing ); ?>px;
        }

        h5{
            font-size   : <?php echo floatval( $h5mobileFontSize ); ?>px;
            line-height   : <?php echo floatval( $h5mobileHeight ); ?>em;
            letter-spacing: <?php echo absint( $h5mobileSpacing ); ?>px;
        }

        h6{
            font-size   : <?php echo floatval( $h6mobileFontSize ); ?>px;
            line-height   : <?php echo floatval( $h6mobileHeight ); ?>em;
            letter-spacing: <?php echo absint( $h6mobileSpacing ); ?>px;
        }
    }

    <?php echo "</style>";
}
add_action( 'wp_head', 'shopexcel_dynamic_css', 99 );

/**
 * convert hex to rgb
 * @link https://bavotasan.com/2011/convert-hex-color-to-rgb-using-php/
*/
function shopexcel_hex2rgb($hex) {
    if($hex[0] === '#' ){
        $hex = str_replace("#", "", $hex);

        if(strlen($hex) == 3) {
            $r = hexdec(substr($hex,0,1).substr($hex,0,1));
            $g = hexdec(substr($hex,1,1).substr($hex,1,1));
            $b = hexdec(substr($hex,2,1).substr($hex,2,1));
        } else {
            $r = hexdec(substr($hex,0,2));
            $g = hexdec(substr($hex,2,2));
            $b = hexdec(substr($hex,4,2));
        }
        $rgb = array($r, $g, $b);
        //return implode(",", $rgb); // returns the rgb values separated by commas
        return $rgb; // returns an array with the rgb values
    } else {
        $hex = str_replace("rgba(", "", $hex);
        $hex = str_replace(")", "", $hex);
        $rgb = explode(",", $hex );
        $opacity = array_pop($rgb); //removing opacity value from rgba

        return $rgb;
    }
}

/**
 * Convert '#' to '%23'
*/
function shopexcel_hash_to_percent23( $color_code ){
    $color_code = str_replace( "#", "%23", $color_code );
    return $color_code;
}

if ( ! function_exists( 'shopexcel_gutenberg_inline_style' ) ) : 
/**
 * Gutenberg Dynamic Style
 */
function shopexcel_gutenberg_inline_style(){
    $typo_defaults   = shopexcel_get_typography_defaults();
    $defaults        = shopexcel_get_color_defaults();
    $button_defaults = shopexcel_get_button_defaults();
	$layout_defaults = shopexcel_get_general_defaults();
    
    $primary_font   = wp_parse_args( get_theme_mod( 'primary_font' ), $typo_defaults['primary_font'] );
    $button         = wp_parse_args( get_theme_mod( 'button' ), $typo_defaults['button'] );
    $heading_one    = wp_parse_args( get_theme_mod( 'heading_one' ), $typo_defaults['heading_one'] );
	$heading_two    = wp_parse_args( get_theme_mod( 'heading_two' ), $typo_defaults['heading_two'] );
	$heading_three  = wp_parse_args( get_theme_mod( 'heading_three' ), $typo_defaults['heading_three'] );
	$heading_four   = wp_parse_args( get_theme_mod( 'heading_four' ), $typo_defaults['heading_four'] );
	$heading_five   = wp_parse_args( get_theme_mod( 'heading_five' ), $typo_defaults['heading_five'] );
	$heading_six    = wp_parse_args( get_theme_mod( 'heading_six' ), $typo_defaults['heading_six'] );

    //Primary Font variables
    $primarydesktopFontSize = isset(  $primary_font['desktop']['font_size'] ) ? $primary_font['desktop']['font_size'] : $typo_defaults['primary_font']['desktop']['font_size'];
    $primarydesktopSpacing  = isset(  $primary_font['desktop']['letter_spacing'] ) ? $primary_font['desktop']['letter_spacing'] : $typo_defaults['primary_font']['desktop']['letter_spacing'];
    $primarydesktopHeight   = isset(  $primary_font['desktop']['line_height'] ) ? $primary_font['desktop']['line_height'] : $typo_defaults['primary_font']['desktop']['line_height'];
    $primarytabletFontSize  = isset(  $primary_font['tablet']['font_size'] ) ? $primary_font['tablet']['font_size'] : $typo_defaults['primary_font']['tablet']['font_size'];
    $primarytabletSpacing   = isset(  $primary_font['tablet']['letter_spacing'] ) ? $primary_font['tablet']['letter_spacing'] : $typo_defaults['primary_font']['tablet']['letter_spacing'];
    $primarytabletHeight    = isset(  $primary_font['tablet']['line_height'] ) ? $primary_font['tablet']['line_height'] : $typo_defaults['primary_font']['tablet']['line_height'];
    $primarymobileFontSize  = isset(  $primary_font['mobile']['font_size'] ) ? $primary_font['mobile']['font_size'] : $typo_defaults['primary_font']['mobile']['font_size'];
    $primarymobileSpacing   = isset(  $primary_font['mobile']['letter_spacing'] ) ? $primary_font['mobile']['letter_spacing'] : $typo_defaults['primary_font']['mobile']['letter_spacing'];
    $primarymobileHeight    = isset(  $primary_font['mobile']['line_height'] ) ? $primary_font['mobile']['line_height'] : $typo_defaults['primary_font']['mobile']['line_height'];

    //Button variables
    $btndesktopFontSize = isset(  $button['desktop']['font_size'] ) ? $button['desktop']['font_size'] : $typo_defaults['button']['desktop']['font_size'];
    $btndesktopSpacing  = isset(  $button['desktop']['letter_spacing'] ) ? $button['desktop']['letter_spacing'] : $typo_defaults['button']['desktop']['letter_spacing'];
    $btndesktopHeight   = isset(  $button['desktop']['line_height'] ) ? $button['desktop']['line_height'] : $typo_defaults['button']['desktop']['line_height'];
    $btntabletFontSize  = isset(  $button['tablet']['font_size'] ) ? $button['tablet']['font_size'] : $typo_defaults['button']['tablet']['font_size'];
    $btntabletSpacing   = isset(  $button['tablet']['letter_spacing'] ) ? $button['tablet']['letter_spacing'] : $typo_defaults['button']['tablet']['letter_spacing'];
    $btntabletHeight    = isset(  $button['tablet']['line_height'] ) ? $button['tablet']['line_height'] : $typo_defaults['button']['tablet']['line_height'];
    $btnmobileFontSize  = isset(  $button['mobile']['font_size'] ) ? $button['mobile']['font_size'] : $typo_defaults['button']['mobile']['font_size'];
    $btnmobileSpacing   = isset(  $button['mobile']['letter_spacing'] ) ? $button['mobile']['letter_spacing'] : $typo_defaults['button']['mobile']['letter_spacing'];
    $btnmobileHeight    = isset(  $button['mobile']['line_height'] ) ? $button['mobile']['line_height'] : $typo_defaults['button']['mobile']['line_height'];

    //Heading 1 variables
    $h1desktopFontSize = isset(  $heading_one['desktop']['font_size'] ) ? $heading_one['desktop']['font_size'] : $typo_defaults['heading_one']['desktop']['font_size'];
    $h1desktopSpacing  = isset(  $heading_one['desktop']['letter_spacing'] ) ? $heading_one['desktop']['letter_spacing'] : $typo_defaults['heading_one']['desktop']['letter_spacing'];
    $h1desktopHeight   = isset(  $heading_one['desktop']['line_height'] ) ? $heading_one['desktop']['line_height'] : $typo_defaults['heading_one']['desktop']['line_height'];
    $h1tabletFontSize  = isset(  $heading_one['tablet']['font_size'] ) ? $heading_one['tablet']['font_size'] : $typo_defaults['heading_one']['tablet']['font_size'];
    $h1tabletSpacing   = isset(  $heading_one['tablet']['letter_spacing'] ) ? $heading_one['tablet']['letter_spacing'] : $typo_defaults['heading_one']['tablet']['letter_spacing'];
    $h1tabletHeight    = isset(  $heading_one['tablet']['line_height'] ) ? $heading_one['tablet']['line_height'] : $typo_defaults['heading_one']['tablet']['line_height'];
    $h1mobileFontSize  = isset(  $heading_one['mobile']['font_size'] ) ? $heading_one['mobile']['font_size'] : $typo_defaults['heading_one']['mobile']['font_size'];
    $h1mobileSpacing   = isset(  $heading_one['mobile']['letter_spacing'] ) ? $heading_one['mobile']['letter_spacing'] : $typo_defaults['heading_one']['mobile']['letter_spacing'];
    $h1mobileHeight    = isset(  $heading_one['mobile']['line_height'] ) ? $heading_one['mobile']['line_height'] : $typo_defaults['heading_one']['mobile']['line_height'];
    
    //Heading 2 variables
    $h2desktopFontSize = isset(  $heading_two['desktop']['font_size'] ) ? $heading_two['desktop']['font_size'] : $typo_defaults['heading_two']['desktop']['font_size'];
    $h2desktopSpacing  = isset(  $heading_two['desktop']['letter_spacing'] ) ? $heading_two['desktop']['letter_spacing'] : $typo_defaults['heading_two']['desktop']['letter_spacing'];
    $h2desktopHeight   = isset(  $heading_two['desktop']['line_height'] ) ? $heading_two['desktop']['line_height'] : $typo_defaults['heading_two']['desktop']['line_height'];
    $h2tabletFontSize  = isset(  $heading_two['tablet']['font_size'] ) ? $heading_two['tablet']['font_size'] : $typo_defaults['heading_two']['tablet']['font_size'];
    $h2tabletSpacing   = isset(  $heading_two['tablet']['letter_spacing'] ) ? $heading_two['tablet']['letter_spacing'] : $typo_defaults['heading_two']['tablet']['letter_spacing'];
    $h2tabletHeight    = isset(  $heading_two['tablet']['line_height'] ) ? $heading_two['tablet']['line_height'] : $typo_defaults['heading_two']['tablet']['line_height'];
    $h2mobileFontSize  = isset(  $heading_two['mobile']['font_size'] ) ? $heading_two['mobile']['font_size'] : $typo_defaults['heading_two']['mobile']['font_size'];
    $h2mobileSpacing   = isset(  $heading_two['mobile']['letter_spacing'] ) ? $heading_two['mobile']['letter_spacing'] : $typo_defaults['heading_two']['mobile']['letter_spacing'];
    $h2mobileHeight    = isset(  $heading_two['mobile']['line_height'] ) ? $heading_two['mobile']['line_height'] : $typo_defaults['heading_two']['mobile']['line_height'];
    
    //Heading 3 variables
    $h3desktopFontSize = isset(  $heading_three['desktop']['font_size'] ) ? $heading_three['desktop']['font_size'] : $typo_defaults['heading_three']['desktop']['font_size'];
    $h3desktopSpacing  = isset(  $heading_three['desktop']['letter_spacing'] ) ? $heading_three['desktop']['letter_spacing'] : $typo_defaults['heading_three']['desktop']['letter_spacing'];
    $h3desktopHeight   = isset(  $heading_three['desktop']['line_height'] ) ? $heading_three['desktop']['line_height'] : $typo_defaults['heading_three']['desktop']['line_height'];
    $h3tabletFontSize  = isset(  $heading_three['tablet']['font_size'] ) ? $heading_three['tablet']['font_size'] : $typo_defaults['heading_three']['tablet']['font_size'];
    $h3tabletSpacing   = isset(  $heading_three['tablet']['letter_spacing'] ) ? $heading_three['tablet']['letter_spacing'] : $typo_defaults['heading_three']['tablet']['letter_spacing'];
    $h3tabletHeight    = isset(  $heading_three['tablet']['line_height'] ) ? $heading_three['tablet']['line_height'] : $typo_defaults['heading_three']['tablet']['line_height'];
    $h3mobileFontSize  = isset(  $heading_three['mobile']['font_size'] ) ? $heading_three['mobile']['font_size'] : $typo_defaults['heading_three']['mobile']['font_size'];
    $h3mobileSpacing   = isset(  $heading_three['mobile']['letter_spacing'] ) ? $heading_three['mobile']['letter_spacing'] : $typo_defaults['heading_three']['mobile']['letter_spacing'];
    $h3mobileHeight    = isset(  $heading_three['mobile']['line_height'] ) ? $heading_three['mobile']['line_height'] : $typo_defaults['heading_three']['mobile']['line_height'];
    
    //Heading 4 variables
    $h4desktopFontSize = isset(  $heading_four['desktop']['font_size'] ) ? $heading_four['desktop']['font_size'] : $typo_defaults['heading_four']['desktop']['font_size'];
    $h4desktopSpacing  = isset(  $heading_four['desktop']['letter_spacing'] ) ? $heading_four['desktop']['letter_spacing'] : $typo_defaults['heading_four']['desktop']['letter_spacing'];
    $h4desktopHeight   = isset(  $heading_four['desktop']['line_height'] ) ? $heading_four['desktop']['line_height'] : $typo_defaults['heading_four']['desktop']['line_height'];
    $h4tabletFontSize  = isset(  $heading_four['tablet']['font_size'] ) ? $heading_four['tablet']['font_size'] : $typo_defaults['heading_four']['tablet']['font_size'];
    $h4tabletSpacing   = isset(  $heading_four['tablet']['letter_spacing'] ) ? $heading_four['tablet']['letter_spacing'] : $typo_defaults['heading_four']['tablet']['letter_spacing'];
    $h4tabletHeight    = isset(  $heading_four['tablet']['line_height'] ) ? $heading_four['tablet']['line_height'] : $typo_defaults['heading_four']['tablet']['line_height'];
    $h4mobileFontSize  = isset(  $heading_four['mobile']['font_size'] ) ? $heading_four['mobile']['font_size'] : $typo_defaults['heading_four']['mobile']['font_size'];
    $h4mobileSpacing   = isset(  $heading_four['mobile']['letter_spacing'] ) ? $heading_four['mobile']['letter_spacing'] : $typo_defaults['heading_four']['mobile']['letter_spacing'];
    $h4mobileHeight    = isset(  $heading_four['mobile']['line_height'] ) ? $heading_four['mobile']['line_height'] : $typo_defaults['heading_four']['mobile']['line_height'];
    
    //Heading 5 variables
    $h5desktopFontSize = isset(  $heading_five['desktop']['font_size'] ) ? $heading_five['desktop']['font_size'] : $typo_defaults['heading_five']['desktop']['font_size'];
    $h5desktopSpacing  = isset(  $heading_five['desktop']['letter_spacing'] ) ? $heading_five['desktop']['letter_spacing'] : $typo_defaults['heading_five']['desktop']['letter_spacing'];
    $h5desktopHeight   = isset(  $heading_five['desktop']['line_height'] ) ? $heading_five['desktop']['line_height'] : $typo_defaults['heading_five']['desktop']['line_height'];
    $h5tabletFontSize  = isset(  $heading_five['tablet']['font_size'] ) ? $heading_five['tablet']['font_size'] : $typo_defaults['heading_five']['tablet']['font_size'];
    $h5tabletSpacing   = isset(  $heading_five['tablet']['letter_spacing'] ) ? $heading_five['tablet']['letter_spacing'] : $typo_defaults['heading_five']['tablet']['letter_spacing'];
    $h5tabletHeight    = isset(  $heading_five['tablet']['line_height'] ) ? $heading_five['tablet']['line_height'] : $typo_defaults['heading_five']['tablet']['line_height'];
    $h5mobileFontSize  = isset(  $heading_five['mobile']['font_size'] ) ? $heading_five['mobile']['font_size'] : $typo_defaults['heading_five']['mobile']['font_size'];
    $h5mobileSpacing   = isset(  $heading_five['mobile']['letter_spacing'] ) ? $heading_five['mobile']['letter_spacing'] : $typo_defaults['heading_five']['mobile']['letter_spacing'];
    $h5mobileHeight    = isset(  $heading_five['mobile']['line_height'] ) ? $heading_five['mobile']['line_height'] : $typo_defaults['heading_five']['mobile']['line_height'];
    
    //Heading 6 variables
    $h6desktopFontSize = isset(  $heading_six['desktop']['font_size'] ) ? $heading_six['desktop']['font_size'] : $typo_defaults['heading_six']['desktop']['font_size'];
    $h6desktopSpacing  = isset(  $heading_six['desktop']['letter_spacing'] ) ? $heading_six['desktop']['letter_spacing'] : $typo_defaults['heading_six']['desktop']['letter_spacing'];
    $h6desktopHeight   = isset(  $heading_six['desktop']['line_height'] ) ? $heading_six['desktop']['line_height'] : $typo_defaults['heading_six']['desktop']['line_height'];
    $h6tabletFontSize  = isset(  $heading_six['tablet']['font_size'] ) ? $heading_six['tablet']['font_size'] : $typo_defaults['heading_six']['tablet']['font_size'];
    $h6tabletSpacing   = isset(  $heading_six['tablet']['letter_spacing'] ) ? $heading_six['tablet']['letter_spacing'] : $typo_defaults['heading_six']['tablet']['letter_spacing'];
    $h6tabletHeight    = isset(  $heading_six['tablet']['line_height'] ) ? $heading_six['tablet']['line_height'] : $typo_defaults['heading_six']['tablet']['line_height'];
    $h6mobileFontSize  = isset(  $heading_six['mobile']['font_size'] ) ? $heading_six['mobile']['font_size'] : $typo_defaults['heading_six']['mobile']['font_size'];
    $h6mobileSpacing   = isset(  $heading_six['mobile']['letter_spacing'] ) ? $heading_six['mobile']['letter_spacing'] : $typo_defaults['heading_six']['mobile']['letter_spacing'];
    $h6mobileHeight    = isset(  $heading_six['mobile']['line_height'] ) ? $heading_six['mobile']['line_height'] : $typo_defaults['heading_six']['mobile']['line_height'];

    $primary_font_family       = shopexcel_get_font_family( $primary_font );
    $btn_font_family           = shopexcel_get_font_family( $button );
    $heading_one_font_family   = shopexcel_get_font_family( $heading_one );
    $heading_two_font_family   = shopexcel_get_font_family( $heading_two );
    $heading_three_font_family = shopexcel_get_font_family( $heading_three );
    $heading_four_font_family  = shopexcel_get_font_family( $heading_four );
    $heading_five_font_family  = shopexcel_get_font_family( $heading_five );
    $heading_six_font_family   = shopexcel_get_font_family( $heading_six );

    $btnFontFamily  = $btn_font_family === '"Default Family"' ? 'inherit' : $btn_font_family;
    $h1FontFamily   = $heading_one_font_family === '"Default Family"' ? 'inherit' : $heading_one_font_family;
    $h2FontFamily   = $heading_two_font_family === '"Default Family"' ? 'inherit' : $heading_two_font_family;
    $h3FontFamily   = $heading_three_font_family === '"Default Family"' ? 'inherit' : $heading_three_font_family;
    $h4FontFamily   = $heading_four_font_family === '"Default Family"' ? 'inherit' : $heading_four_font_family;
    $h5FontFamily   = $heading_five_font_family === '"Default Family"' ? 'inherit' : $heading_five_font_family;
    $h6FontFamily   = $heading_six_font_family === '"Default Family"' ? 'inherit' : $heading_six_font_family;

    $primary_color      = get_theme_mod( 'primary_color', $defaults['primary_color'] );
	$rgb                = shopexcel_hex2rgb( shopexcel_sanitize_rgba( $primary_color ) );
	$body_font_color    = get_theme_mod( 'body_font_color', $defaults['body_font_color'] );
	$rgb2               = shopexcel_hex2rgb( shopexcel_sanitize_rgba( $body_font_color ) );
	$heading_color      = get_theme_mod( 'heading_color', $defaults['heading_color'] );
	$rgb3               = shopexcel_hex2rgb( shopexcel_sanitize_rgba( $heading_color ) );
	$section_bg_color   = get_theme_mod( 'section_bg_color', $defaults['section_bg_color'] );
	$rgb4               = shopexcel_hex2rgb( shopexcel_sanitize_rgba( $section_bg_color ) );
	$background_color   = get_theme_mod( 'site_bg_color', $defaults['site_bg_color'] );
	$rgb5               = shopexcel_hex2rgb( shopexcel_sanitize_rgba( $background_color ) );

    $button_roundness = get_theme_mod( 'button_roundness', $button_defaults['button_roundness'] );
    $button_padding   = get_theme_mod( 'button_padding', $button_defaults['button_padding'] );

    //Button Color
    $btn_text_color         = get_theme_mod( 'btn_text_color_initial', $defaults['btn_text_color_initial'] );
    $btn_bg_color           = get_theme_mod( 'btn_bg_color_initial', $defaults['btn_bg_color_initial'] );
    $btn_text_hover_color   = get_theme_mod( 'btn_text_color_hover', $defaults['btn_text_color_hover'] );
    $btn_bg_hover_color     = get_theme_mod( 'btn_bg_color_hover', $defaults['btn_bg_color_hover'] );
    $btn_border_color       = get_theme_mod( 'btn_border_color_initial', $defaults['btn_border_color_initial'] );
    $btn_border_hover_color = get_theme_mod( 'btn_border_color_hover', $defaults['btn_border_color_hover'] );

    $container_width        = get_theme_mod( 'container_width', $layout_defaults['container_width'] );
	$tablet_container_width = get_theme_mod( 'tablet_container_width', $layout_defaults['tablet_container_width'] );
	$mobile_container_width = get_theme_mod( 'mobile_container_width', $layout_defaults['mobile_container_width'] );

    $custom_css = ':root .block-editor-page {
        --shply-primary-color   : ' . shopexcel_sanitize_rgba( $primary_color ) . ';
        --shply-primary-color-rgb: ' . $rgb[0] . ',' . $rgb[1] .',' . $rgb[2] . ';
        --shply-font-color : ' . shopexcel_sanitize_rgba( $body_font_color ) . ';
        --shply-font-color-rgb:' . $rgb2[0] . ',' . $rgb2[1] .',' . $rgb2[2] . ';
        --shply-heading-color   : ' . shopexcel_sanitize_rgba( $heading_color ) . ';
        --shply-heading-color-rgb:' . $rgb3[0] . ',' . $rgb3[1] .',' . $rgb3[2] . ';
        --shply-section-bg-color: ' . shopexcel_sanitize_rgba( $section_bg_color ) . ';
        --shply-section-bg-color-rgb:' . $rgb4[0] . ',' . $rgb4[1] .',' . $rgb4[2] . ';
        --shply-background-color: ' . shopexcel_sanitize_rgba( $background_color ) . ';
        --shply-background-color-rgb:' . $rgb5[0] . ',' . $rgb5[1] .',' . $rgb5[2] . ';

        --shply-btn-text-initial-color  : ' . shopexcel_sanitize_rgba( $btn_text_color ) . ';
        --shply-btn-text-hover-color    : ' . shopexcel_sanitize_rgba( $btn_text_hover_color ) . ';
        --shply-btn-bg-initial-color    : ' . shopexcel_sanitize_rgba( $btn_bg_color ) . ';
        --shply-btn-bg-hover-color      : ' . shopexcel_sanitize_rgba( $btn_bg_hover_color ) . ';
        --shply-btn-border-initial-color: ' . shopexcel_sanitize_rgba( $btn_border_color ) . ';
        --shply-btn-border-hover-color  : ' . shopexcel_sanitize_rgba( $btn_border_hover_color ) . ';

        --shply-primary-font   : ' . wp_kses_post( $primary_font_family ) . ';
        --shply-primary-font-weight   : ' . esc_html( $primary_font['weight'] ) . ';
        --shply-primary-font-transform: ' . esc_html( $primary_font['transform'] ) . ';

        --shply-secondary-font   : ' . wp_kses_post( $h1FontFamily ) . ';
        --shply-secondary-font-weight   : ' . esc_html( $heading_one['weight'] ) . ';

        --shply-btn-font-family     : ' . wp_kses_post( $btnFontFamily ) . ';
        --shply-btn-font-weight     : ' . esc_html( $button['weight'] ) . ';
        --shply-btn-font-transform  : ' . esc_html( $button['transform'] ) . ';
        --shply-btn-roundness-top   : ' . absint( $button_roundness['top'] ) . 'px;
        --shply-btn-roundness-right : ' . absint( $button_roundness['right'] ) . 'px;
        --shply-btn-roundness-bottom: ' . absint( $button_roundness['bottom'] ) . 'px;
        --shply-btn-roundness-left  : ' . absint( $button_roundness['left'] ) . 'px;
        --shply-btn-padding-top     : ' . absint( $button_padding['top'] ) . 'px;
        --shply-btn-padding-right   : ' . absint( $button_padding['right'] ) . 'px;
        --shply-btn-padding-bottom  : ' . absint( $button_padding['bottom'] ) . 'px;
        --shply-btn-padding-left    : ' . absint( $button_padding['left'] ) . 'px;
    }
    .block-editor-page .editor-styles-wrapper h1{
        font-family :' . wp_kses_post( $h1FontFamily ) . '; 
        text-transform:' . esc_html( $heading_one['transform'] ) . ';       
        font-weight:' . esc_html( $heading_one['weight'] ) . '; 
    }
    .block-editor-page .editor-styles-wrapper h2{
        font-family :' . wp_kses_post( $h2FontFamily ) . '; 
        text-transform:' . esc_html( $heading_two['transform'] ) . ';       
        font-weight:' . esc_html( $heading_two['weight'] ) . '; 
    }
    .block-editor-page .editor-styles-wrapper h3{
        font-family :' . wp_kses_post( $h3FontFamily ) . '; 
        text-transform:' . esc_html( $heading_three['transform'] ) . ';       
        font-weight:' . esc_html( $heading_three['weight'] ) . '; 
    }
    .block-editor-page .editor-styles-wrapper h4{
        font-family :' . wp_kses_post( $h4FontFamily ) . '; 
        text-transform:' . esc_html( $heading_four['transform'] ) . ';       
        font-weight:' . esc_html( $heading_four['weight'] ) . '; 
    }
    .block-editor-page .editor-styles-wrapper h5{
        font-family :' . wp_kses_post( $h5FontFamily ) . '; 
        text-transform:' . esc_html( $heading_five['transform'] ) . ';       
        font-weight:' . esc_html( $heading_five['weight'] ) . '; 
    }
    .block-editor-page .editor-styles-wrapper h6{
        font-family :' . wp_kses_post( $h6FontFamily ) . '; 
        text-transform:' . esc_html( $heading_six['transform'] ) . ';       
        font-weight:' . esc_html( $heading_six['weight'] ) . '; 
    }
    @media (min-width: 1024px){
        :root .block-editor-page .editor-styles-wrapper{
            --shply-primary-font-size   : ' . absint( $primarydesktopFontSize ) . 'px;
            --shply-primary-font-height : ' . floatval( $primarydesktopHeight ) . 'em;
            --shply-primary-font-spacing: ' . absint( $primarydesktopSpacing ) . 'px;
            
            --shply-secondary-font-spacing: ' . absint( $h1desktopSpacing ) . 'px;            
            --shply-secondary-font-height: ' . floatval( $h1desktopHeight ) . 'em;

            --shply-container-width  :' . absint($container_width) . 'px;

            --shply-btn-font-size   : ' . absint( $btndesktopFontSize ) . 'px;
            --shply-btn-font-height : ' . floatval( $btndesktopHeight ) . 'em;
            --shply-btn-font-spacing: ' . absint( $btndesktopSpacing ) . 'px;
        }
        .block-editor-page .editor-styles-wrapper h1{
            font-size   : ' . floatval( $h1desktopFontSize ) . 'px;
            line-height   : ' . floatval( $h1desktopHeight ) . 'em;
            letter-spacing: ' . absint( $h1desktopSpacing ) . 'px;
        }
        .block-editor-page .editor-styles-wrapper h2{
            font-size   : ' . floatval( $h2desktopFontSize ) . 'px;
            line-height   : ' . floatval( $h2desktopHeight ) . 'em;
            letter-spacing: ' . absint( $h2desktopSpacing ) . 'px;
        }
        .block-editor-page .editor-styles-wrapper h3{
            font-size   : ' . floatval( $h3desktopFontSize ) . 'px;
            line-height   : ' . floatval( $h3desktopHeight ) . 'em;
            letter-spacing: ' . absint( $h3desktopSpacing ) . 'px;
        }
        .block-editor-page .editor-styles-wrapper h4{
            font-size   : ' . floatval( $h4desktopFontSize ) . 'px;
            line-height   : ' . floatval( $h4desktopHeight ) . 'em;
            letter-spacing: ' . absint( $h4desktopSpacing ) . 'px;
        }
        .block-editor-page .editor-styles-wrapper h5{
            font-size   : ' . floatval( $h5desktopFontSize ) . 'px;
            line-height   : ' . floatval( $h5desktopHeight ) . 'em;
            letter-spacing: ' . absint( $h5desktopSpacing ) . 'px;
        }
        .block-editor-page .editor-styles-wrapper h6{
            font-size   : ' . floatval( $h6desktopFontSize ) . 'px;
            line-height   : ' . floatval( $h6desktopHeight ) . 'em;
            letter-spacing: ' . absint( $h6desktopSpacing ) . 'px;
        }
    }
    @media (min-width: 767px) and (max-width: 1024px){
        :root .block-editor-page .editor-styles-wrapper{
            --shply-primary-font-size   : ' . absint( $primarytabletFontSize ) . 'px;
            --shply-primary-font-height : ' . floatval( $primarytabletHeight ) . 'em;
            --shply-primary-font-spacing: ' . absint( $primarytabletSpacing ) . 'px;

            --shply-secondary-font-spacing: ' . absint( $h1tabletSpacing ) . 'px;            
            --shply-secondary-font-height: ' . floatval( $h1tabletHeight ) . 'em;

            --shply-container-width  :' . absint($tablet_container_width) . 'px;

            --shply-btn-font-size   : ' . absint( $btntabletFontSize ) . 'px;
            --shply-btn-font-height : ' . floatval( $btntabletHeight ) . 'em;
            --shply-btn-font-spacing: ' . absint( $btntabletSpacing ) . 'px;
        }
        .block-editor-page .editor-styles-wrapper h1{
            font-size   : ' . floatval( $h1tabletFontSize ) . 'px;
            line-height   : ' . floatval( $h1tabletHeight ) . 'em;
            letter-spacing: ' . absint( $h1tabletSpacing ) . 'px;
        }
        .block-editor-page .editor-styles-wrapper h2{
            font-size   : ' . floatval( $h2tabletFontSize ) . 'px;
            line-height   : ' . floatval( $h2tabletHeight ) . 'em;
            letter-spacing: ' . absint( $h2tabletSpacing ) . 'px;
        }
        .block-editor-page .editor-styles-wrapper h3{
            font-size   : ' . floatval( $h3tabletFontSize ) . 'px;
            line-height   : ' . floatval( $h3tabletHeight ) . 'em;
            letter-spacing: ' . absint( $h3tabletSpacing ) . 'px;
        }
        .block-editor-page .editor-styles-wrapper h4{
            font-size   : ' . floatval( $h4tabletFontSize ) . 'px;
            line-height   : ' . floatval( $h4tabletHeight ) . 'em;
            letter-spacing: ' . absint( $h4tabletSpacing ) . 'px;
        }
        .block-editor-page .editor-styles-wrapper h5{
            font-size   : ' . floatval( $h5tabletFontSize ) . 'px;
            line-height   : ' . floatval( $h5tabletHeight ) . 'em;
            letter-spacing: ' . absint( $h5tabletSpacing ) . 'px;
        }
        .block-editor-page .editor-styles-wrapper h6{
            font-size   : ' . floatval( $h6tabletFontSize ) . 'px;
            line-height   : ' . floatval( $h6tabletHeight ) . 'em;
            letter-spacing: ' . absint( $h6tabletSpacing ) . 'px;
        }
    }
    @media (max-width: 767px){
        :root .block-editor-page .editor-styles-wrapper{
            --shply-primary-font-size   : ' . absint( $primarymobileFontSize ) . 'px;
            --shply-primary-font-height : ' . floatval( $primarymobileHeight ) . 'em;
            --shply-primary-font-spacing: ' . absint( $primarymobileSpacing ) . 'px;
            
            --shply-secondary-font-spacing: ' . absint( $h1mobileSpacing ) . 'px;            
            --shply-secondary-font-height: ' . floatval( $h1mobileHeight ) . 'em;

            --shply-container-width  : ' . absint($mobile_container_width) . 'px;

            --shply-btn-font-size   : ' . absint( $btnmobileFontSize ) . 'px;
            --shply-btn-font-height : ' . floatval( $btnmobileHeight ) . 'em;
            --shply-btn-font-spacing: ' . absint( $btnmobileSpacing ) . 'px;
        }
        .block-editor-page .editor-styles-wrapper h1{
            font-size   : ' . floatval( $h1mobileFontSize ) . 'px;
            line-height   : ' . floatval( $h1mobileHeight ) . 'em;
            letter-spacing: ' . absint( $h1mobileSpacing ) . 'px;
        }
        .block-editor-page .editor-styles-wrapper h2{
            font-size   : ' . floatval( $h2mobileFontSize ) . 'px;
            line-height   : ' . floatval( $h2mobileHeight ) . 'em;
            letter-spacing: ' . absint( $h2mobileSpacing ) . 'px;
        }
        .block-editor-page h3{
            font-size   : ' . floatval( $h3mobileFontSize ) . 'px;
            line-height   : ' . floatval( $h3mobileHeight ) . 'em;
            letter-spacing: ' . absint( $h3mobileSpacing ) . 'px;
        }
        .block-editor-page h4{
            font-size   : ' . floatval( $h4mobileFontSize ) . 'px;
            line-height   : ' . floatval( $h4mobileHeight ) . 'em;
            letter-spacing: ' . absint( $h4mobileSpacing ) . 'px;
        }
        .block-editor-page h5{
            font-size   : ' . floatval( $h5mobileFontSize ) . 'px;
            line-height   : ' . floatval( $h5mobileHeight ) . 'em;
            letter-spacing: ' . absint( $h5mobileSpacing ) . 'px;
        }
        .block-editor-page h6{
            font-size   : ' . floatval( $h6mobileFontSize ) . 'px;
            line-height   : ' . floatval( $h6mobileHeight ) . 'em;
            letter-spacing: ' . absint( $h6mobileSpacing ) . 'px;
        }
    }';

    return $custom_css;
}
endif;