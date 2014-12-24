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
        init: function() 
        {
        // JavaScript to be fired on all pages
            var self = this;

            this.fonz = $('#main-content').smoothState(
                        { 
                            prefetch: true,
                            development: true,
                            pageCacheSize: 4
                        });


            // not working . maybe overkill / maybe just have nav inside the container
            // this.makeNavigationSmooth( $( '.js-site-nav') );



            //To be run only on certain fishsizes
            $( document ).ready( function()
            {
                var fishSize = window.getComputedStyle( document.body,':after' ).getPropertyValue( 'content' );
                console.log( fishSize );

                if( fishSize === 'shrimp' || fishSize === 'tuna' )
                {
                    self.makeCurrentLanguageAToggler();
                    self.bindNavMenusToSide();

                }
                
            })
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
                console.log( href );
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

            var toggles = $( '.js-navbar-toggle' );
            var mask = $( '.js-nav-mask' );
            var menus = $( '.js-navbar' );

            mask.click( function( e )
            {   
                console.log( 'masking itt' );
                mask.removeClass( 'open' );
                menus.removeClass( 'open' );
            })

            $.each( toggles, function eachMenu( i, toggle )
            {
                var targetMenu;

                if( !toggle.jquery )
                {
                    toggle = $( toggle );
                    toggle.data( 'target', $( toggle.data( 'target' ) ) );
                }


                toggle.bind( 'click', function( e )
                {
                    toggle.data( 'target' ).toggleClass( 'open' );
                    toggle.data( 'target' ).siblings().removeClass( 'open' );
                    mask.toggleClass( 'open' );
                });


            });
        },

        /**
         * Sets up the current language to be a toggler for a full language
         * menu. (Normally triggered only on smaller screens )
         */
        makeCurrentLanguageAToggler : function ( )
        {
            var current = $( '.current-lang' );
            
            current.data( 'target', $( '.js-navbar--languages' ) ) ;
            current.addClass( 'js-navbar-toggle' );

            current.click( function(e)
            { 
                e.preventDefault(); 
            });

        }
    },
  // Home page
  home: {
    init: function() {
      // JavaScript to be fired on the home page
    }
  },
  // About us page, note the change from about-us to about_us.
  about_us: {
    init: function() {
      // JavaScript to be fired on the about us page
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
      UTIL.fire(classnm);
    });
  }
};

$(document).ready(UTIL.loadEvents);

})(jQuery); // Fully reference jQuery after this point.

