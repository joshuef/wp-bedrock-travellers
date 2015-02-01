<footer class="content-info  footer" role="contentinfo">
  <div class="container">
    <script type="text/javascript" defer="defer">
        //grunt load css hing
        (function(e){function t(t,n,r,o){"use strict";function a(){for(var e,n=0;u.length>n;n++)u[n].href&&u[n].href.indexOf(t)>-1&&(e=!0);e?i.media=r||"all":setTimeout(a)}var i=e.document.createElement("link"),c=n||e.document.getElementsByTagName("script")[0],u=e.document.styleSheets;return i.rel="stylesheet",i.href=t,i.media="only x",i.onload=o||function(){},c.parentNode.insertBefore(i,c),a(),i}var n=function(r,o){"use strict";if(r&&3===r.length){var a=e.navigator,i=e.Image,c=!(!document.createElementNS||!document.createElementNS("http://www.w3.org/2000/svg","svg").createSVGRect||!document.implementation.hasFeature("http://www.w3.org/TR/SVG11/feature#Image","1.1")||e.opera&&-1===a.userAgent.indexOf("Chrome")||-1!==a.userAgent.indexOf("Series40")),u=new i;u.onerror=function(){n.method="png",t(r[2])},u.onload=function(){var e=1===u.width&&1===u.height,a=r[e&&c?0:e?1:2];n.method=e&&c?"svg":e?"datapng":"png",n.href=a,t(a,null,null,o)},u.src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///ywAAAAAAQABAAACAUwAOw==",document.documentElement.className+=" grunticon"}};n.loadCSS=t,e.grunticon=n})(this);
        

        var trv__setupSelect2s = function ( )
        {
            var script =document.createElement('script');
            script.type ='text/javascript';
            script.async = true;
            script.src = "<?php _e ( get_stylesheet_directory_uri() ) ?>/js/vendor/select2.min.js";

            //stylesheet
            var ss =document.createElement('link');
            ss.rel = "stylesheet";
            var href="<?php _e ( get_stylesheet_directory_uri() ) ?>/css/select2.css"
            ss.href= href;
            ss.type="text/css";
            ss.media = "x";
            var sheets = window.document.styleSheets;

            $("body").append(ss);
            // link.onload = function( )
            function toggleMedia()
            {
                var defined;
                for( var i = 0; i < sheets.length; i++ ){
                    if( sheets[ i ].href && sheets[ i ].href.indexOf( href ) > -1 ){
                        defined = true;
                    }
                }
                if( defined ){
                    ss.media = "all";
                }
                else {
                    setTimeout( toggleMedia );
                }
            }
            toggleMedia();

            

            $("body").append(script);

            $( 'select', '.js-booking-bar' ).select2(
                {
                    minimumResultsForSearch : 500
                });

        };
            

        
            var theme = '/wp-content/'
            if( window.location.hostname === 'localhost' )
            {
                theme = '/app/'
            }
            var iconFolder = '//'+window.location.host + theme +'themes/travellers/images/icons/';
            grunticon([iconFolder+"icons.data.svg.css", iconFolder+"icons.data.png.css", iconFolder+"icons.fallback.png.css"]);
    </script>
    <?php // dynamic_sidebar('sidebar-footer'); ?>
  </div>
</footer>
