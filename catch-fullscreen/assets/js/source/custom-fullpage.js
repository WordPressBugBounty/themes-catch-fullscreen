/**
 * Theme functions file.
 *
 * Full Page Custom Supporting Scripts
 */
( function( $ ) {

    $(document).ready(function() {
        var anchor = [];
        var i;

        for (i = 0; i < $("#fullpage > .section").length; i++) {
            anchor.push( 'section' + i );
        }

        // Full page initialize.
        $('#fullpage').fullpage({
            //options here
            anchors: anchor,
            licenseKey: 'OPEN-SOURCE-GPLV3-LICENSE',
            navigation: true,
            slidesNavigation: true,
            controlArrows: true,
            navigationPosition: 'right',
            scrollBar: catchFullscreenFullpageOptions.scrollBar,
            scrollOverflow: ! catchFullscreenFullpageOptions.scrollBar,
            autoScrolling: ! catchFullscreenFullpageOptions.autoScrolling,
            css3: false,
            scrollOverflowOptions:{
                 preventDefault: true
            },
            onLeave: function(origin, destination, direction){
                var leavingSection = this;

                if( ! catchFullscreenFullpageOptions.autoScrolling ) {
                    if( destination.index > 0 ){
                        $( '#header-wrapper' ).addClass( 'header-top' );
                        $( '#scrollup' ).fadeIn('slow');
                        $( '#scrollup' ).show();
                    } else {
                        $( '#header-wrapper' ).removeClass( 'header-top' );
                        $('#scrollup').fadeOut('slow');
                        $("#scrollup").hide();
                    }
                }
            }
        });

        if( ! catchFullscreenFullpageOptions.autoScrolling ) {
            $( '#menu-toggle-primary' ).on( 'click', function() {
                if( $('body').hasClass('menu-is-open') ) {
                    $.fn.fullpage.setAllowScrolling(false);
                } else {
                    $.fn.fullpage.setAllowScrolling(true);
                }
            });
        }

        // Add Arrow Down and Arrow Up for page navigation.
        $('#fp-nav').prepend('<span class="arrow-up"></span>');
        $('#fp-nav').append('<span class="arrow-down"></span>');

        $('.arrow-up').on('click', function(){
            $.fn.fullpage.moveSectionUp();
        });

        $('.arrow-down').on('click', function(){
            $.fn.fullpage.moveSectionDown();
        });

        $( '#scrollup' ).on( 'click', function () {
            $.fn.fullpage.moveTo(1);
        });
    });
} )( jQuery );
