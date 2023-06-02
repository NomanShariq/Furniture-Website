/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {

	/**
	 * Theme Customizer enhancements for a better user experience.
	 *
	 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
	 * 
	 * It controls the pseudo code as well
	 */
	function shopexcel_colors_live_update(thememod, selector, property, rgb) {

		wp.customize(thememod, function (value) {
			value.bind(function (newval) {
				var color = '';
				
				if ( newval[0] === '#') {
					color = newval;
				} else { //change rgba to hex
					const rgba = newval.replace(/^rgba?\(|\s+|\)$/g, '').split(',');
					color = `#${((1 << 24) + (parseInt(rgba[0]) << 16) + (parseInt(rgba[1]) << 8) + parseInt(rgba[2])).toString(16).slice(1)}`;
				}
				
				//get rgb values
				var rgbVal = color.replace(/^#?([a-f\d])([a-f\d])([a-f\d])$/i
								,(m, r, g, b) => '#' + r + r + g + g + b + b)
					.substring(1).match(/.{2}/g)
					.map(x => parseInt(x, 16))
					.toString()
				
				if (jQuery('style#' + thememod + property).length) {
					jQuery('style#' + thememod + property).html(selector + '{' + property + ':' + newval + ';}');
					if (rgb !== undefined ){
						jQuery('style#' + thememod + property + '-rgb').html(selector + '{' + rgb + ':' + rgbVal + ';}');
					} 
				} else {
					jQuery('head').append('<style id="' + thememod + property + '">' + selector + '{' + property + ':' + newval + '}</style>');
					setTimeout(function () {
						jQuery('style#' + thememod + property).not(':last').remove();
					}, 1000);
					if (rgb !== undefined ){
						jQuery('head').append('<style id="' + thememod + property + '-rgb">' + selector + '{' + rgb + ':' + rgbVal + '}</style>');
						setTimeout(function () {
							jQuery('style#' + thememod + property +'-rgb').not(':last').remove();
						}, 1000);
					} 
				}
			});
		});
	}

	//Shopexcel partial refresh for slider customizer settings
	function shopexcel_slider_live_update(settings, responsive, selector, property, unit) {
		settings = typeof settings !== 'undefined' ? settings : '';
		
		var media = 'desktop' === responsive ? shopexcel_view_port.desktop
					: 'tablet' === responsive ? shopexcel_view_port.tablet
					: 'mobile' === responsive ? shopexcel_view_port.mobile
					: undefined;

		// Check if media query
		var media_query = typeof media !== 'undefined' ? ' media="' + media + '"' : '';

		wp.customize(settings, function (value) {	
			value.bind(function (newval) {
				// Get our unit if applicable
				unit = typeof unit !== 'undefined' ? unit : '';
				jQuery('head').append('<style id="shply_' + settings + '" ' + media_query + '>' + selector + '{' + property + ':' + newval + unit + ';}' + '</style>');
				setTimeout(function () {
					jQuery('style#shply_' + settings).not(':last').remove();
				}, 500);

			});
		});
	}

	// Shopexcel Font Family Update
	function shopexcel_typo_update_font_family_css(control, selector, cssProperty = 'font-family' ) {
		wp.customize(control, function (value) {
			value.bind(function (value, oldValue) {

				var link = '';

				var fontName = value.split(",")[0];
				fontName = fontName.replace(/'/g, '');

				if (value === 'System Stack') {
					value = shopexcel_view_port.systemfonts;
				}

				// Remove <style> first!
				control = control.replace('[', '-');
				control = control.replace(']', '');

				jQuery('style#' + control + '-' + cssProperty).remove();

				var fontName = fontName.split(' ').join('+');

				jQuery('link#' + control).remove();
				link = '<link id="' + control + '" href="https://fonts.googleapis.com/css?family=' + fontName + '"  rel="stylesheet">';

				// Concat and append new <style> and <link>.
				jQuery('head').append(
					'<style id="' + control + '-' + cssProperty + '">'
					+ selector + '	{ ' + cssProperty + ': ' + value + ' }'
					+ '</style>'
					+ link
				);
			});
		});
	}

	//Shopexcel Font Weight and others update 
	function shopexcel_typography_live_update(id, responsive, selector, property, unit, settings) {
		settings = typeof settings !== 'undefined' ? settings : '';
		
		var media = 'desktop' === responsive ? shopexcel_view_port.desktop
					: 'tablet' === responsive ? shopexcel_view_port.tablet
					: 'mobile' === responsive ? shopexcel_view_port.mobile
					: undefined;

		// Check if media query
		var media_query = typeof media !== 'undefined' ? ' media="' + media + '"' : '';

		var responsive_id = '' !== responsive ? `[${responsive}]` : ''; //Responsive should be empty for Font Weight and Text Transform
		wp.customize(settings + responsive_id + '[' + id + ']', function (value) {	
			value.bind(function (newval) {
				// Get our unit if applicable
				unit = typeof unit !== 'undefined' ? unit : '';
				jQuery('head').append('<style id="' + responsive + id + settings + '" ' + settings + media_query + '>' + selector + '{' + property + ':' + newval + unit + ';}' + '</style>');
				setTimeout(function () {
					jQuery('style#' + responsive + id + settings).not(':last').remove();
				}, 500);

			});
		});
	}

	//Shopexcel partial refresh for spacing customizer settings
	function shopexcel_spacing_live_update(settings, responsive, selector, property, unit) {
		settings = typeof settings !== 'undefined' ? settings : '';
		
		var media = 'desktop' === responsive ? shopexcel_view_port.desktop
					: 'tablet' === responsive ? shopexcel_view_port.tablet
					: 'mobile' === responsive ? shopexcel_view_port.mobile
					: undefined;

		// Check if media query
		var media_query = typeof media !== 'undefined' ? ' media="' + media + '"' : '';

		wp.customize(settings + '[top]', function (value) {	
			value.bind(function (newval) {
				unit = typeof unit !== 'undefined' ? unit : '';
				jQuery('head').append('<style id="shply_' + settings + 'top" ' + media_query + '>' + selector + '{' + property + '-top:' + newval + unit + ';}' + '</style>');
				setTimeout(function () {
					jQuery('style#shply_' + settings + 'top').not(':last').remove();
				}, 500);
			})
		});

		wp.customize(settings + '[right]', function (value) {	
			value.bind(function (newval) {
				unit = typeof unit !== 'undefined' ? unit : '';
				jQuery('head').append('<style id="shply_' + settings + 'right" ' + media_query + '>' + selector + '{' + property + '-right:' + newval + unit + ';}' + '</style>');
				setTimeout(function () {
					jQuery('style#shply_' + settings + 'right').not(':last').remove();
				}, 500);
			})
		});

		wp.customize(settings + '[bottom]', function (value) {	
			value.bind(function (newval) {
				unit = typeof unit !== 'undefined' ? unit : '';
				jQuery('head').append('<style id="shply_' + settings + 'bottom" ' + media_query + '>' + selector + '{' + property + '-bottom:' + newval + unit + ';}' + '</style>');
				setTimeout(function () {
					jQuery('style#shply_' + settings + 'bottom').not(':last').remove();
				}, 500);
			})
		});

		wp.customize(settings + '[left]', function (value) {	
			value.bind(function (newval) {
				unit = typeof unit !== 'undefined' ? unit : '';
				jQuery('head').append('<style id="shply_' + settings + 'left" ' + media_query + '>' + selector + '{' + property + '-left:' + newval + unit + ';}' + '</style>');
				setTimeout(function () {
					jQuery('style#shply_' + settings + 'left').not(':last').remove();
				}, 500);
			})
		});
	}

	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );

	wp.customize('hide_title', function (value) {
		value.bind(function (to) {
			if (to) {
				$('.site-title').css({
					clip: 'rect(1px, 1px, 1px, 1px)',
					position: 'absolute',
				});
			} else {
				$('.site-title').css({
					clip: 'auto',
					position: 'relative',
				});
			}
		});
	});

	wp.customize('hide_tagline', function (value) {
		value.bind(function (to) {
			if (to) {
				$('.site-description').css({
					clip: 'rect(1px, 1px, 1px, 1px)',
					position: 'absolute',
				});
			} else {
				$('.site-description').css({
					clip: 'auto',
					position: 'relative',
				});
			}
		});
	});
	
	// Header text color.
	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.site-title, .site-description' ).css( {
					'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute'
				} );
			} else {
				$( '.site-title, .site-description' ).css( {
					'clip': 'auto',
					'position': 'relative'
				} );
				$( '.site-title a, .site-description' ).css( {
					'color': to
				} );
			}
		} );
	} );

	/*********** 
	Theme Colors
	************/
	shopexcel_colors_live_update( 'site_title_color', '.site-branding .site-title a', 'color', undefined );
	shopexcel_colors_live_update( 'site_tagline_color', '.site-branding .site-description', 'color', undefined );
	shopexcel_colors_live_update( 'primary_color', ':root', '--shply-primary-color', '--shply-primary-color-rgb' );
	shopexcel_colors_live_update( 'body_font_color', ':root', '--shply-font-color', '--shply-font-color-rgb' );
	shopexcel_colors_live_update( 'heading_color', ':root', '--shply-heading-color', '--shply-heading-color-rgb' );
	shopexcel_colors_live_update( 'section_bg_color', ':root', '--shply-section-bg-color', '--shply-section-bg-color-rgb' );
	shopexcel_colors_live_update( 'site_bg_color', ':root', '--shply-background-color', '--shply-background-color-rgb' );

	/**
	 * Global Button Colors
	 */
	shopexcel_colors_live_update( 'btn_text_color_initial', ':root', '--shply-btn-text-initial-color', undefined );
	shopexcel_colors_live_update( 'btn_text_color_hover', ':root', '--shply-btn-text-hover-color', undefined );
	shopexcel_colors_live_update( 'btn_bg_color_initial', ':root', '--shply-btn-bg-initial-color', undefined );
	shopexcel_colors_live_update( 'btn_bg_color_hover', ':root', '--shply-btn-bg-hover-color', undefined );
	shopexcel_colors_live_update( 'btn_border_color_initial', ':root', '--shply-btn-border-initial-color', undefined );
	shopexcel_colors_live_update( 'btn_border_color_hover', ':root', '--shply-btn-border-hover-color', undefined );


	/**
	 * Footer Color
	*/
	shopexcel_colors_live_update( 'foot_text_color', '.site-footer', '--shply-foot-text-color', undefined );
	shopexcel_colors_live_update( 'foot_bg_color', '.site-footer', '--shply-foot-bg-color', undefined );
	shopexcel_colors_live_update( 'foot_widget_heading_color', '.site-footer', '--shply-widget-title-color', undefined );
	

	/**********************
	Typography Font Family
	***********************/
	/**
	 * Site Title Font Family
	 */
	shopexcel_typo_update_font_family_css('site_title[family]','.site-branding .site-title a');
	/**
	  * Primary Font Family
	  */
	shopexcel_typo_update_font_family_css('primary_font[family]', ':root', '--shply-primary-font');
	/**
	 * Button Font Family
	 */
	shopexcel_typo_update_font_family_css('button[family]', ':root', '--shply-btn-font-family');
	/**
	 * Heading One Family
	 */
	shopexcel_typo_update_font_family_css('heading_one[family]', 'h1');
	/**
	 * Heading Two Family
	 */
	shopexcel_typo_update_font_family_css('heading_two[family]', 'h2');
	/**
	 * Heading Three Family
	 */
	shopexcel_typo_update_font_family_css('heading_three[family]', 'h3');
	/**
	 * Heading Four Family
	 */
	shopexcel_typo_update_font_family_css('heading_four[family]', 'h4');
	/**
	 * Heading Five Family
	 */
	shopexcel_typo_update_font_family_css('heading_five[family]', 'h5');
	/**
	 * Heading Six Family
	 */
	shopexcel_typo_update_font_family_css('heading_six[family]', 'h6');
	

	/**********************************
		Typography Font Weight
	***********************************/
	/**
	 * Site Title Font Weight 
	*/
	shopexcel_typography_live_update( 'weight', '', '.site-branding .site-title a', 'font-weight', '', 'site_title' );
	/**
	 * Primary Font Weight 
	*/
	shopexcel_typography_live_update( 'weight', '', ':root', '--shply-primary-font-weight', '', 'primary_font' );
	/**
	 * Button Font Weight 
	*/
	shopexcel_typography_live_update( 'weight', '', ':root', '--shply-btn-font-weight', '', 'button' );
	/**
	 * Heading One Font Weight 
	*/
	shopexcel_typography_live_update( 'weight', '', 'h1', 'font-weight', '', 'heading_one' );
	/**
	 * Heading Two Font Weight 
	*/
	shopexcel_typography_live_update( 'weight', '', 'h2', 'font-weight', '', 'heading_two' );
	/**
	 * Heading Three Font Weight 
	*/
	shopexcel_typography_live_update( 'weight', '', 'h3', 'font-weight', '', 'heading_three' );
	/**
	 * Heading Four Font Weight 
	*/
	shopexcel_typography_live_update( 'weight', '', 'h4', 'font-weight', '', 'heading_four' );
	/**
	 * Heading Five Font Weight 
	*/
	shopexcel_typography_live_update( 'weight', '', 'h5', 'font-weight', '', 'heading_five' );
	/**
	 * Heading Six Font Weight 
	*/
	shopexcel_typography_live_update( 'weight', '', 'h6', 'font-weight', '', 'heading_six' );


	/**********************************
		Typography Text Transform
	***********************************/
	/**
	 * Site Title Text Transform 
	*/
	shopexcel_typography_live_update( 'transform', '', '.site-branding .site-title a', 'text-transform', '', 'site_title' );
	/**
	 * Primary Font Text Transform 
	*/
	shopexcel_typography_live_update( 'transform', '', ':root', '--shply-primary-font-transform', '', 'primary_font' );
	/**
	 * Btton Font Text Transform 
	*/
	shopexcel_typography_live_update( 'transform', '', ':root', '--shply-btn-font-transform', '', 'button' );
	/**
	 * Heading One Text Transform 
	*/
	shopexcel_typography_live_update( 'transform', '', 'h1', 'text-transform', '', 'heading_one' );
	/**
	 * Heading Two Text Transform 
	*/
	shopexcel_typography_live_update( 'transform', '', 'h2', 'text-transform', '', 'heading_two' );
	/**
	 * Heading Three Text Transform 
	*/
	shopexcel_typography_live_update( 'transform', '', 'h3', 'text-transform', '', 'heading_three' );
	/**
	 * Heading Four Text Transform 
	*/
	shopexcel_typography_live_update( 'transform', '', 'h4', 'text-transform', '', 'heading_four' );
	/**
	 * Heading Five Text Transform 
	*/
	shopexcel_typography_live_update( 'transform', '', 'h5', 'text-transform', '', 'heading_five' );
	/**
	 * Heading Six Text Transform 
	*/
	shopexcel_typography_live_update( 'transform', '', 'h6', 'text-transform', '', 'heading_six' );


	/**********************************
			Typography Font Size
	***********************************/

	/**
	 * Site Title Font Size 
	*/
	//Desktop
	shopexcel_typography_live_update( 'font_size', 'desktop', '.site-header .site-branding .site-title a', 'font-size', 'px', 'site_title' );
	//Tablet
	shopexcel_typography_live_update( 'font_size', 'tablet', '.mobile-header .site-branding .site-title a', 'font-size', 'px', 'site_title' );
	//Mobile
	shopexcel_typography_live_update( 'font_size', 'mobile', '.mobile-header .site-branding .site-title a', 'font-size', 'px', 'site_title' );

	/**
	 * Primary Font Size 
	*/
	//Desktop
	shopexcel_typography_live_update( 'font_size', 'desktop', ':root', '--shply-primary-font-size', 'px', 'primary_font' );
	//Tablet
	shopexcel_typography_live_update( 'font_size', 'tablet', ':root', '--shply-primary-font-size', 'px', 'primary_font' );
	//Mobile
	shopexcel_typography_live_update( 'font_size', 'mobile', ':root', '--shply-primary-font-size', 'px', 'primary_font' );

	/**
	 * Button Font Size 
	*/
	//Desktop
	shopexcel_typography_live_update( 'font_size', 'desktop', ':root', '--shply-btn-font-size', 'px', 'button' );
	//Tablet
	shopexcel_typography_live_update( 'font_size', 'tablet', ':root', '--shply-btn-font-size', 'px', 'button' );
	//Mobile
	shopexcel_typography_live_update( 'font_size', 'mobile', ':root', '--shply-btn-font-size', 'px', 'button' );

	/**
	 * Heading One Font Size 
	*/
	//Desktop
	shopexcel_typography_live_update( 'font_size', 'desktop', 'h1', 'font-size', 'px', 'heading_one' );
	//Tablet
	shopexcel_typography_live_update( 'font_size', 'tablet', 'h1', 'font-size', 'px', 'heading_one' );
	//Mobile
	shopexcel_typography_live_update( 'font_size', 'mobile', 'h1', 'font-size', 'px', 'heading_one' );

	/**
	 * Heading Two Font Size 
	*/
	//Desktop
	shopexcel_typography_live_update( 'font_size', 'desktop', 'h2', 'font-size', 'px', 'heading_two' );
	//Tablet
	shopexcel_typography_live_update( 'font_size', 'tablet', 'h2', 'font-size', 'px', 'heading_two' );
	//Mobile
	shopexcel_typography_live_update( 'font_size', 'mobile', 'h2', 'font-size', 'px', 'heading_two' );

	/**
	 * Heading Three Font Size 
	*/
	//Desktop
	shopexcel_typography_live_update( 'font_size', 'desktop', 'h3', 'font-size', 'px', 'heading_three' );
	//Tablet
	shopexcel_typography_live_update( 'font_size', 'tablet', 'h3', 'font-size', 'px', 'heading_three' );
	//Mobile
	shopexcel_typography_live_update( 'font_size', 'mobile', 'h3', 'font-size', 'px', 'heading_three' );

	/**
	 * Heading Four Font Size 
	*/
	//Desktop
	shopexcel_typography_live_update( 'font_size', 'desktop', 'h4', 'font-size', 'px', 'heading_four' );
	//Tablet
	shopexcel_typography_live_update( 'font_size', 'tablet', 'h4', 'font-size', 'px', 'heading_four' );
	//Mobile
	shopexcel_typography_live_update( 'font_size', 'mobile', 'h4', 'font-size', 'px', 'heading_four' );

	/**
	 * Heading Five Font Size 
	*/
	//Desktop
	shopexcel_typography_live_update( 'font_size', 'desktop', 'h5', 'font-size', 'px', 'heading_five' );
	//Tablet
	shopexcel_typography_live_update( 'font_size', 'tablet', 'h5', 'font-size', 'px', 'heading_five' );
	//Mobile
	shopexcel_typography_live_update( 'font_size', 'mobile', 'h5', 'font-size', 'px', 'heading_five' );

	/**
	 * Heading Six Font Size 
	*/
	//Desktop
	shopexcel_typography_live_update( 'font_size', 'desktop', 'h6', 'font-size', 'px', 'heading_six' );
	//Tablet
	shopexcel_typography_live_update( 'font_size', 'tablet', 'h6', 'font-size', 'px', 'heading_six' );
	//Mobile
	shopexcel_typography_live_update( 'font_size', 'mobile', 'h6', 'font-size', 'px', 'heading_six' );


	/**********************************
			Typography Line Height
	***********************************/

	/**
	 * Site Title Line Height 
	*/
	//Desktop
	shopexcel_typography_live_update( 'line_height', 'desktop', '.site-header .site-branding .site-title a', 'line-height', 'em', 'site_title' );
	//Tablet
	shopexcel_typography_live_update( 'line_height', 'tablet', '.mobile-header .site-branding .site-title a', 'line-height', 'em', 'site_title' );
	//Mobile
	shopexcel_typography_live_update( 'line_height', 'mobile', '.mobile-header .site-branding .site-title a', 'line-height', 'em', 'site_title' );
	
	/**
	 * Primary Font Line Height 
	*/
	//Desktop
	shopexcel_typography_live_update( 'line_height', 'desktop', ':root', '--shply-primary-font-height', 'em', 'primary_font' );
	//Tablet
	shopexcel_typography_live_update( 'line_height', 'tablet', ':root', '--shply-primary-font-height', 'em', 'primary_font' );
	//Mobile
	shopexcel_typography_live_update( 'line_height', 'mobile', ':root', '--shply-primary-font-height', 'em', 'primary_font' );
	
	/**
	 * Button Font Line Height 
	*/
	//Desktop
	shopexcel_typography_live_update( 'line_height', 'desktop', ':root', '--shply-btn-font-height', 'em', 'button' );
	//Tablet
	shopexcel_typography_live_update( 'line_height', 'tablet', ':root', '--shply-btn-font-height', 'em', 'button' );
	//Mobile
	shopexcel_typography_live_update( 'line_height', 'mobile', ':root', '--shply-btn-font-height', 'em', 'button' );

	/**
	 * Heading One Line Height 
	*/
	//Desktop
	shopexcel_typography_live_update( 'line_height', 'desktop', 'h1', 'line-height', 'em', 'heading_one' );
	//Tablet
	shopexcel_typography_live_update( 'line_height', 'tablet', 'h1', 'line-height', 'em', 'heading_one' );
	//Mobile
	shopexcel_typography_live_update( 'line_height', 'mobile', 'h1', 'line-height', 'em', 'heading_one' );
	
	/**
	 * Heading Two Line Height 
	*/
	//Desktop
	shopexcel_typography_live_update( 'line_height', 'desktop', 'h2', 'line-height', 'em', 'heading_two' );
	//Tablet
	shopexcel_typography_live_update( 'line_height', 'tablet', 'h2', 'line-height', 'em', 'heading_two' );
	//Mobile
	shopexcel_typography_live_update( 'line_height', 'mobile', 'h2', 'line-height', 'em', 'heading_two' );
	
	/**
	 * Heading Three Line Height 
	*/
	//Desktop
	shopexcel_typography_live_update( 'line_height', 'desktop', 'h3', 'line-height', 'em', 'heading_three' );
	//Tablet
	shopexcel_typography_live_update( 'line_height', 'tablet', 'h3', 'line-height', 'em', 'heading_three' );
	//Mobile
	shopexcel_typography_live_update( 'line_height', 'mobile', 'h3', 'line-height', 'em', 'heading_three' );
	/**
	 * Heading Four Line Height 
	*/
	//Desktop
	shopexcel_typography_live_update( 'line_height', 'desktop', 'h4', 'line-height', 'em', 'heading_four' );
	//Tablet
	shopexcel_typography_live_update( 'line_height', 'tablet', 'h4', 'line-height', 'em', 'heading_four' );
	//Mobile
	shopexcel_typography_live_update( 'line_height', 'mobile', 'h4', 'line-height', 'em', 'heading_four' );
	
	/**
	 * Heading Five Line Height 
	*/
	//Desktop
	shopexcel_typography_live_update( 'line_height', 'desktop', 'h5', 'line-height', 'em', 'heading_five' );
	//Tablet
	shopexcel_typography_live_update( 'line_height', 'tablet', 'h5', 'line-height', 'em', 'heading_five' );
	//Mobile
	shopexcel_typography_live_update( 'line_height', 'mobile', 'h5', 'line-height', 'em', 'heading_five' );
	
	/**
	 * Heading Six Line Height 
	*/
	//Desktop
	shopexcel_typography_live_update( 'line_height', 'desktop', 'h6', 'line-height', 'em', 'heading_six' );
	//Tablet
	shopexcel_typography_live_update( 'line_height', 'tablet', 'h6', 'line-height', 'em', 'heading_six' );
	//Mobile
	shopexcel_typography_live_update( 'line_height', 'mobile', 'h6', 'line-height', 'em', 'heading_six' );


	/**********************************
		Typography Letter Spacing
	***********************************/

	/**
	 * Site Title Letter Spacing 
	*/
	//Desktop
	shopexcel_typography_live_update( 'letter_spacing', 'desktop', '.site-header .site-branding .site-title a', 'letter-spacing', 'px', 'site_title' );
	//Tablet
	shopexcel_typography_live_update( 'letter_spacing', 'tablet', '.mobile-header .site-branding .site-title a', 'letter-spacing', 'px', 'site_title' );
	//Mobile
	shopexcel_typography_live_update( 'letter_spacing', 'mobile', '.mobile-header .site-branding .site-title a', 'letter-spacing', 'px', 'site_title' );
	
	/**
	 * Primary Font Letter Spacing 
	*/
	//Desktop
	shopexcel_typography_live_update( 'letter_spacing', 'desktop', ':root', '--shply-primary-font-spacing', 'px', 'primary_font' );
	//Tablet
	shopexcel_typography_live_update( 'letter_spacing', 'tablet', ':root', '--shply-primary-font-spacing', 'px', 'primary_font' );
	//Mobile
	shopexcel_typography_live_update( 'letter_spacing', 'mobile', ':root', '--shply-primary-font-spacing', 'px', 'primary_font' );
	
	/**
	 * Button Font Letter Spacing 
	*/
	//Desktop
	shopexcel_typography_live_update( 'letter_spacing', 'desktop', ':root', '--shply-btn-font-spacing', 'px', 'button' );
	//Tablet
	shopexcel_typography_live_update( 'letter_spacing', 'tablet', ':root', '--shply-btn-font-spacing', 'px', 'button' );
	//Mobile
	shopexcel_typography_live_update( 'letter_spacing', 'mobile', ':root', '--shply-btn-font-spacing', 'px', 'button' );

	/**
	 * Heading One Letter Spacing 
	*/
	//Desktop
	shopexcel_typography_live_update( 'letter_spacing', 'desktop', 'h1', 'letter-spacing', 'px', 'heading_one' );
	//Tablet
	shopexcel_typography_live_update( 'letter_spacing', 'tablet', 'h1', 'letter-spacing', 'px', 'heading_one' );
	//Mobile
	shopexcel_typography_live_update( 'letter_spacing', 'mobile', 'h1', 'letter-spacing', 'px', 'heading_one' );
	
	/**
	 * Heading Two Letter Spacing 
	*/
	//Desktop
	shopexcel_typography_live_update( 'letter_spacing', 'desktop', 'h2', 'letter-spacing', 'px', 'heading_two' );
	//Tablet
	shopexcel_typography_live_update( 'letter_spacing', 'tablet', 'h2', 'letter-spacing', 'px', 'heading_two' );
	//Mobile
	shopexcel_typography_live_update( 'letter_spacing', 'mobile', 'h2', 'letter-spacing', 'px', 'heading_two' );
	
	/**
	 * Heading Three Letter Spacing 
	*/
	//Desktop
	shopexcel_typography_live_update( 'letter_spacing', 'desktop', 'h3', 'letter-spacing', 'px', 'heading_three' );
	//Tablet
	shopexcel_typography_live_update( 'letter_spacing', 'tablet', 'h3', 'letter-spacing', 'px', 'heading_three' );
	//Mobile
	shopexcel_typography_live_update( 'letter_spacing', 'mobile', 'h3', 'letter-spacing', 'px', 'heading_three' );
	/**
	 * Heading Four Letter Spacing 
	*/
	//Desktop
	shopexcel_typography_live_update( 'letter_spacing', 'desktop', 'h4', 'letter-spacing', 'px', 'heading_four' );
	//Tablet
	shopexcel_typography_live_update( 'letter_spacing', 'tablet', 'h4', 'letter-spacing', 'px', 'heading_four' );
	//Mobile
	shopexcel_typography_live_update( 'letter_spacing', 'mobile', 'h4', 'letter-spacing', 'px', 'heading_four' );
	
	/**
	 * Heading Five Letter Spacing 
	*/
	//Desktop
	shopexcel_typography_live_update( 'letter_spacing', 'desktop', 'h5', 'letter-spacing', 'px', 'heading_five' );
	//Tablet
	shopexcel_typography_live_update( 'letter_spacing', 'tablet', 'h5', 'letter-spacing', 'px', 'heading_five' );
	//Mobile
	shopexcel_typography_live_update( 'letter_spacing', 'mobile', 'h5', 'letter-spacing', 'px', 'heading_five' );
	
	/**
	 * Heading Six Letter Spacing 
	*/
	//Desktop
	shopexcel_typography_live_update( 'letter_spacing', 'desktop', 'h6', 'letter-spacing', 'px', 'heading_six' );
	//Tablet
	shopexcel_typography_live_update( 'letter_spacing', 'tablet', 'h6', 'letter-spacing', 'px', 'heading_six' );
	//Mobile
	shopexcel_typography_live_update( 'letter_spacing', 'mobile', 'h6', 'letter-spacing', 'px', 'heading_six' );


	/**************
	Logo Width
	***************/
	//Desktop
	shopexcel_slider_live_update( 'logo_width', 'desktop', '.site-header .custom-logo', 'width', 'px' );
	//Tablet
	shopexcel_slider_live_update( 'tablet_logo_width', 'tablet', '.site-branding .custom-logo-link img', 'width', 'px' );
	//Mobile
	shopexcel_slider_live_update( 'mobile_logo_width', 'mobile', '.site-branding .custom-logo-link img', 'width','px' );


	/****************** 
	Container Width
	*******************/
	//Desktop
	shopexcel_slider_live_update('container_width', 'desktop', ':root', '--shply-container-width', 'px');
	//Tablet
	shopexcel_slider_live_update('tablet_container_width', 'tablet', ':root', '--shply-container-width', 'px');
	//mobile
	shopexcel_slider_live_update('mobile_container_width', 'mobile', ':root', '--shply-container-width', 'px');


	/************************
	Fullwidth Centered Width
	*************************/
	//Desktop
	shopexcel_slider_live_update('fullwidth_centered', 'desktop', ':root', '--shply-centered-maxwidth', 'px')
	//Tablet
	shopexcel_slider_live_update('tablet_fullwidth_centered', 'tablet', ':root', '--shply-centered-maxwidth', 'px')
	//Mobile
	shopexcel_slider_live_update('mobile_fullwidth_centered', 'mobile', ':root', '--shply-centered-maxwidth', 'px')


	/**********************************
		Sidebar Width
	***********************************/
	//Desktop
	shopexcel_slider_live_update('sidebar_width', 'desktop', '.page-grid', '--shply-sidebar-width', '%');


	/**********************************
		Sidebar Widget Spacing
	***********************************/
	//Desktop
	shopexcel_slider_live_update('widgets_spacing', 'desktop', ':root', '--shply-widget-spacing', 'px');
	//Tablet
	shopexcel_slider_live_update('tablet_widgets_spacing', 'tablet', ':root', '--shply-widget-spacing', 'px');
	//Mobile
	shopexcel_slider_live_update('mobile_widgets_spacing', 'mobile', ':root', '--shply-widget-spacing', 'px');

	
	/**********************************
		Scroll to top icon size
	***********************************/
	//Desktop
	shopexcel_slider_live_update('scroll_top_size', 'desktop', '.back-to-top', '--shply-scroll-to-top-size', 'px');
	//Tablet
	shopexcel_slider_live_update('tablet_scroll_top_size', 'tablet', '.back-to-top', '--shply-scroll-to-top-size', 'px');
	//Mobile
	shopexcel_slider_live_update('mobile_scroll_top_size', 'mobile', '.back-to-top', '--shply-scroll-to-top-size', 'px');


	/**************************** 
		Global Button Settings
	*****************************/
	//Button Roundness
	shopexcel_spacing_live_update('button_roundness', '', ':root', '--shply-btn-roundness', 'px' );
	//Button Padding
	shopexcel_spacing_live_update('button_padding', '', ':root', '--shply-btn-padding', 'px' );


	/**********************************
		Breadcrumb separator icon
	***********************************/
	wp.customize( 'separator_icon',function( value ){
		value.bind( function( newval ){
			var icon = newval === 'three' ? shopexcel_view_port.breadcrumb_sep_three
				: newval === 'two' ? shopexcel_view_port.breadcrumb_sep_two
				: shopexcel_view_port.breadcrumb_sep_one;		
			var separator = jQuery("#crumbs span.separator")
			$.each(separator, function(index, value) {
				$(value).html(icon)		
			})
		} );
	} );

	/**************************** 
		Alignment Settings
	*****************************/
	//Blog Page Title Alignment
	wp.customize( 'blog_alignment',function( value ){
		value.bind( function( newval ){
			var pageTitle = jQuery(".page-header")
			pageTitle.attr('data-alignment', `${newval}`)
		} );
	} );

	//Archive Title Alignment
	wp.customize( 'archivetitle_alignment',function( value ){
		value.bind( function( newval ){
			var pageTitle = jQuery(".page-header")
			pageTitle.attr('data-alignment', `${newval}`)
		} );
	} );

	//Single Page Title Alignment
	wp.customize( 'pagetitle_alignment',function( value ){
		value.bind( function( newval ){
			var pageTitle = jQuery(".page .entry-header")
			pageTitle.attr('data-alignment', `${newval}`)
		} );
	} );
} )( jQuery );
