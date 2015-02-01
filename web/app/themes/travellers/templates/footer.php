<footer class="content-info  footer" role="contentinfo">
  <div class="container">
    <script type="text/javascript" defer="defer">
        

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
            
    </script>
    <?php // dynamic_sidebar('sidebar-footer'); ?>
  </div>
</footer>
