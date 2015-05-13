/* ========================================================================
 * DOM-based Routing
 * Based on http://goo.gl/EUTi53 by Paul Irish
 *
 * Only fires on body classes that match. If a body class contains a dash,
 * replace the dash with an underscore when adding it to the object below.
 *
 * .noConflict()
 * The routing is enclosed within an anonymous function so that you can 
 * always reference jQuery with $, even when in .noConflict() mode.
 *
 * Google CDN, Latest jQuery
 * To use the default WordPress version of jQuery, go to lib/config.php and
 * remove or comment out: add_theme_support('jquery-cdn');
 * ======================================================================== */

(function($) {

// Use this variable to set up the common and page specific functions. If you 
// rename this variable, you will also need to rename the namespace below.
var Travellers = {
  // All pages
    common: {
        fonz: {}, //smoothstate
        fishSize: '', //screen size from body:after
        vinesShown : false, //are the vines shown?
        sliderLoaded : false, //is the slider loaded?
        contactToggle : $( '.js-navbar a[title="contact"]'),
        booking : $( '.js-navbar--main .nav__item:first-child' ),
        init: function() 
        {
        // JavaScript to be fired on all pages
            var self = this;

            // this.fonz = $('#main-content').smoothState(
            //             { 
            //                 prefetch: true,
            //                 development: true,
            //                 pageCacheSize: 4
            //             });


            // not working . maybe overkill / maybe just have nav inside the container
            // this.makeNavigationSmooth( $( '.js-site-nav') );


            self.hideSrollbarOnSmallerScreens();


            //To be run only on certain fishsizes
            $( document ).ready( function()
            {
   
                self.onWindowReadyLets();

                self.wrapContactLinkTitle();

                if( self.fishSize === 'whale' || self.fishSize === 'shark' )
                {
                    self.lazyLoadImages( $( '.js-showcase__pic' ) );
                }
                
            });

            $( window ).resize( function( )
            {
                self.onWindowReadyLets();

                console.log( self.fishSize );
                if( self.fishSize === 'whale' || self.fishSize === 'shark' )
                {
                    self.lazyLoadImages( $( '.js-showcase__pic' ) );
                }
            });
        },


        loadSlider : function( )
        {
            // var $sliderBox = $( '<div class="js-sliderbox  sliderbox"></div>' );
            // var showcase = $( '.js-showcase' );
            if( ! this.sliderLoaded )
            {
                $slider = $( '.js-slider' );
                $slides = $( '.js-slide', $slider );

                this.lazyLoadImages( $slides );

                $slider.bjqs({
                    'height' : 270,
                    'width' : 500,

                    // animation values
                    animtype : 'fade', // accepts 'fade' or 'slide'
                    animduration : 450, // how fast the animation are
                    animspeed : 4000, // the delay between each slide
                    automatic : false, // automatic

                    // control and marker configuration
                    showcontrols : true, // show next and prev controls
                    centercontrols : true, // center controls verically
                    nexttext : 'Next', // Text for 'next' button (can use HTML)
                    prevtext : 'Prev', // Text for 'previous' button (can use HTML)
                    // showmarkers : true, // Show individual slide markers
                    // centermarkers : true, // Center markers horizontally

                    // interaction values
                    keyboardnav : true, // enable keyboard navigation
                    hoverpause : true, // pause the slider on hover

                    // presentational options
                    // usecaptions : true, // show captions for images using the image title tag
                    randomstart : true, // start slider at random slide
                    responsive : true // enable responsive capabilities (beta)


                });
            }

            this.sliderLoaded = true;

        },


        onWindowReadyLets : function( )
        {
            var self = this;
            self.fishSize = window.getComputedStyle( document.body,':after' ).getPropertyValue( 'content' );
            fishSize = self.fishSize;
            
            // self.makeBookingMeasureUp();

            if( fishSize === 'shrimp' || fishSize === 'tuna' )
            {
                // self.makeCurrentLanguageAToggler();
                self.bindNavMenusToSide();

                $slider = $( '.js-slider' ).addClass( 'wee-fish' );
            }
            else
            {
            console.log( 'THISISHAPPppppppENING' );
              //we're larger so...
              self.showVines();
              self.loadSlider();
              this.removeContactForBigFish();
              // this.preventBookingClickForBigFish();

              //better way to do this than global?
              window.trv__setupSelect2s();
            }
        },

        // makeBookingMeasureUp : function( )
        // {
        //     //not for mobile
        //     if( fishSize !== 'shrimp' && fishSize !== 'tuna' )
        //     {
        //         var bookingBar = $( '.js-booking-bar' );
        //         var rhsBooking = this.booking.offset().left + this.booking.width();
        //         var rhsBookingBar = bookingBar.offset().left + bookingBar.width();

        //         this.booking.css('padding-left', rhsBookingBar - rhsBooking + 5 )
        //     }

        // },

        removeContactForBigFish : function ( )
        {
            this.contactToggleBkp = this.contactToggle;
            console.log( 'removing contact', this.contactToggle );
            this.contactToggle.parent().remove();     
        },

        // removeContactForBigFish : function ( )
        // {
        //     this.contactToggleBkp = this.contactToggle;
        //     this.contactToggle.remove();     
        // },

        // preventBookingClickForBigFish : function ( )
        // {
        //     this.booking.click( function( e ) { e.preventDefault(); });
        //     this.booking.addClass( 'big-fish' );
        // },

        hideSrollbarOnSmallerScreens : function ( )
        {
            console.log( 'HIDING' );
         
        },


        /**
         * Shows the vines via loading data-vine and appending an img
         */
        showVines : function ( )
        {

            if( ! this.vinesShown )
            {
                var $vines = $( '.js-vine__thumb' );

                this.lazyLoadImages( $vines );
                
                this.vinesShown = true;
            }
        },

        /**
         * Lazily loads images from a lazyImage data attribute
         * from an array of elements
         * @param  {object} $elements array / jq object of elements to load
         */
        lazyLoadImages : function( $elements )
        {
            $.each( $elements, function( i, element )
            {
                var hideClass = 'lazy-loading__hide' ;
                var $element = $( element );
                var $elementImg = $( element ).data( 'lazyImage' );
                var $targetLink = $element.data( 'targetLink' );

                //hide it pre
                $element.addClass( 'lazy-loading' );
                $element.addClass( hideClass );

                if( !$targetLink )
                {
                    $targetLink = $element;
                }
                else
                {
                    $targetLink = $( '<a href="'+ $targetLink +'" target="_blank"></a>' );
                    $element.append( $targetLink );
                }

                //tagertLInk is the element. RENAME IT
                $image = $( "<img src='" + $elementImg + "' />" );
                $targetLink.html( $image );
                //todo parse the link for href as well
                
                $image.on( 'load', function( )
                {
                    $element.removeClass( hideClass );

                });
                //imagesloaded

            });
        },

        /*
            Make Navigation Smooth

            Should hijack navigation links (site only) and force smooth state to load them
            even if they aren't within the smoothstate content area.

            compare the host id to the link. or if its relative?? or just use a class
         */
        makeNavigationSmooth : function ( element )
        {
            var self = this;
            if( !element.jquery )
            {
                element = $( element );
            }

            if( !element.prop( 'href' ) )
            {
                element = element.children( 'a[href]' );

                if( ! element.length )
                {
                    $.error( 'no href on your link ', element  )
                    return;
                    
                }
            }

            element.click( function smoothThisNavigation( e )
            {
                e.preventDefault();
                var target = $( e.target );
                var href    = target.prop( 'href' );

                if( typeof href !== 'undefined' )
                {
                    // self.fonz.load( href );
                }

            });

        },




        /**
         * Sets up jq behaviour for nav menus to slide in from the side
         * via access data-target on the toggler buttons
         * 
         */
        bindNavMenusToSide : function ( )
        {
            //check via our css media queries, the screen size.
            console.log( 'BINDING NAVVV' );
            var toggles     = $( '.js-navbar-toggle' );
            var mask        = $( '.js-nav-mask' );
            var menus       = $( '.js-navbar' );

            var contactToggle = this.contactToggle;
            // gets a link with title contact and makes it a toggle
            if( contactToggle )
            {
                contactToggle.data( 'target', $( '.js-navbar--contact' )  );
                toggles.push( contactToggle );

                //to hide it on larger screens via css
                contactToggle.addClass( 'contact-toggle' );

            }

            var eventTrigger = 'click';

            if( Modernizr.touch )
            {
                eventTrigger = "touchend";
            }

            mask.on( eventTrigger, function( e )
            {                   
                console.log( 'masking itt' );
                mask.removeClass( 'open' );
                menus.removeClass( 'open' );
                $( 'html' ).removeClass( 'navbar-open')
            })
                console.log( 'EVENT', eventTrigger );

            $.each( toggles, function eachMenu( i, toggle )
            {
                var targetMenu;

                if( !toggle.jquery )
                {
                    toggle = $( toggle );
                    toggle.data( 'target', $( toggle.data( 'target' ) ) );
                }

                toggle.bind( eventTrigger, function( e )
                {
                    e.preventDefault();
                    toggle.data( 'target' ).toggleClass( 'open' );
                    $( 'html' ).toggleClass( 'navbar-open')
                    toggle.data( 'target' ).siblings().removeClass( 'open' );
                    mask.toggleClass( 'open' );
                });


            });
        },

        /**
         * Wrap Contact Link Title
         *
         * Wraps the title in span with a class for styling the title
         * as non - linky
         */
        wrapContactLinkTitle : function ( )
        {
            var contacts = $( '.navbar--contact__ul .js-site-nav' );

            if( contacts.length > 0 )
            {
                $.each( contacts, function( i, contact )
                {
                    var link = $( contact ).children( 'a' );
                    var linkHtml = link.html();

                    var textArray = linkHtml.split( ":" );

                    newText = '<span class="navbar--contact__title">' + textArray[0] +
                        ':</span>' + textArray[1];

                    // console.log(  );
                    link.html( newText );

                } );
                
            }
        },

    },
  // Home page
  home: {
    init: function() {
      // JavaScript to be fired on the home page
    }
  },
  // About us page, note the change from about-us to about_us.
  gallery: {
    init: function() {

      // JavaScript to be fired on the gallery page
    }
  }
};

// The routing fires all common scripts, followed by the page specific scripts.
// Add additional events for more control over timing e.g. a finalize event
var UTIL = {
  fire: function(func, funcname, args) {
    var namespace = Travellers;
    funcname = (funcname === undefined) ? 'init' : funcname;
    if (func !== '' && namespace[func] && typeof namespace[func][funcname] === 'function') {
      namespace[func][funcname](args);
    }
  },
  loadEvents: function() {
    UTIL.fire('common');

    $.each(document.body.className.replace(/-/g, '_').split(/\s+/),function(i,classnm) {
      // console.log( classnm );
      UTIL.fire(classnm);
    });
  }
};

$(document).ready(UTIL.loadEvents);
window.Travellers = Travellers;


})(jQuery); // Fully reference jQuery after this point.

function hideAddressBar(){
  if(document.documentElement.scrollHeight<window.outerHeight/window.devicePixelRatio)
    document.documentElement.style.height=(window.outerHeight/window.devicePixelRatio)+'px';
  setTimeout(window.scrollTo(1,1),0);
}
window.addEventListener("load",function(){hideAddressBar();});
window.addEventListener("orientationchange",function(){hideAddressBar();});
