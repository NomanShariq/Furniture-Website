/* global wp */
var customize_tabs_focus = function ( $ ) {
    'use strict';
    $( function () {
        var customize = wp.customize;
        $( '.customize-partial-edit-shortcut' ).on( 'DOMNodeInserted', function () {
            $( this ).on( 'click', function() {
                var controlId = $( this ).attr( 'class' );
                var tabToActivate = '';

                if ( controlId.indexOf( 'widget' ) !== -1 ) {
                    tabToActivate = $( '.customizer-tab>.widgets' );
                } else {
                    var controlFinalId = controlId.split( ' ' ).pop().split( '-' ).pop();
                    tabToActivate = $( '.customizer-tab>.' + controlFinalId );
                }

                customize.preview.send( 'tab-previewer-edit', tabToActivate );
            } );
        } );
    } );
};

customize_tabs_focus( jQuery );