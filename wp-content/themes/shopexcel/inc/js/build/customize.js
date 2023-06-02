jQuery(document).ready(function($){
    // Switch to Social Media settings field from the header
    $('#customize-control-header_social_media_text').on( 'click','.social_media_text', function(e){
        e.preventDefault();
        wp.customize.section( 'social_network_section' ).focus();        
    });

    // Switch to Sidebar layouts field from the sidebar settings
    $('#customize-control-sidebar_layout_text').on( 'click','.sidebar_layout_text', function(e){
        e.preventDefault();
        wp.customize.section( 'general_layout' ).focus();        
    });

    $('#sub-accordion-section-general_layout').on( 'click', '.sidebar_texts', function(e){
        e.preventDefault();
        wp.customize.section( 'general_sidebar_section' ).focus();        
    });

    $('#sub-accordion-section-layout_header').on( 'click', '.header_layout_text', function(e){
        e.preventDefault();
        wp.customize.panel( 'main_header_settings' ).focus();        
    });

    $('#sub-accordion-section-header_settings').on( 'click', '.header_texts', function(e){
        e.preventDefault();
        wp.customize.control( 'header_layout_text' ).focus();        
    });
    
    $('#sub-accordion-section-extended_header_settings').on( 'click', '.header_texts_two', function(e){
        e.preventDefault();
        wp.customize.control( 'header_layout_text' ).focus();        
    });

    $('#sub-accordion-section-blog_layout').on( 'click', '.blog_layout_text', function(e){
        e.preventDefault();
        wp.customize.control( 'blog_texts' ).focus();        
    });

    $('#sub-accordion-section-blogpage_settings').on( 'click', '.blog_texts', function(e){
        e.preventDefault();
        wp.customize.control( 'blog_layout_text' ).focus();        
    });

    $('#sub-accordion-section-blog_archive_layout').on( 'click', '.archive_layout_text', function(e){
        e.preventDefault();
        wp.customize.control( 'archive_texts' ).focus();        
    });

    $('#sub-accordion-section-archivepage_settings').on( 'click', '.archive_texts', function(e){
        e.preventDefault();
        wp.customize.control( 'archive_layout_text' ).focus();        
    });

    // Get all nodes by data-grpid
    let allNodes = document.querySelectorAll('[data-grpid]');
    for (let i = 0; i < allNodes.length; i++) {
        let grpID = allNodes[i].getAttribute('data-grpid');
        let childNodes = document.querySelectorAll('._' + grpID);
        for (let j = 0; j < childNodes.length; j++) {
            let ParentOfChildElem = childNodes[j].parentNode.classList;
            ParentOfChildElem.add("customizer-hidden-class");
            let li = document.createElement('li');
            li.classList.add(...ParentOfChildElem);
            li.appendChild(childNodes[j]);
            allNodes[i].querySelector('.controls').appendChild(li);
        }
    }

    // Flush local fonts
    $('body').on('click', '.flush-it', function(event) {
        $.ajax ({
            url     : shopexcel_cdata.ajax_url,  
            type    : 'post',
            data    : 'action=flush_local_google_fonts',    
            nonce   : shopexcel_cdata.nonce,
            success : function(results){
                //results can be appended in needed
                $( '.flush-it' ).val(shopexcel_cdata.flushit);
            },
        });
    });
});

( function( api ) {

	// Extends our custom "example-1" section.
	api.sectionConstructor['shopexcel-pro-section'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );