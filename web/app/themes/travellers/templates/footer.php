<footer class="content-info  footer" role="contentinfo">
  <div class="container">
    <script type="text/javascript">
        var trv__setupSelect2s = function ( )
        {
            var script =document.createElement('script');
            script.type ='text/javascript';
            script.async = true;
            script.src = "<?php _e ( get_stylesheet_directory_uri() ) ?>/js/vendor/select2.min.js";

            
            var link =document.createElement('link');
            link.rel = "stylesheet";
            link.href="<?php _e ( get_stylesheet_directory_uri() ) ?>/css/select2.css"
            link.type="text/css";
            link.media = "all";

            $("body").append(link);
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
