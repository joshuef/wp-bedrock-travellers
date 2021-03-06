<?php
/**
 * Scripts and stylesheets
 *
 * Enqueue stylesheets in the following order:
 * 1. /theme/assets/css/main.css
 *
 * Enqueue scripts in the following order:
 * 1. jquery-1.11.1.min.js via Google CDN
 * 2. /theme/assets/js/vendor/modernizr.min.js
 * 3. /theme/assets/js/scripts.js
 *
 * Google Analytics is loaded after enqueued scripts if:
 * - An ID has been defined in config.php
 * - You're not logged in as an administrator
 */
function roots_scripts() {
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
    remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
    remove_action( 'wp_print_styles', 'print_emoji_styles' );
    remove_action( 'admin_print_styles', 'print_emoji_styles' );

    add_theme_support( 'jquery-cdn' );

    /**
       * jQuery is loaded using the same method from HTML5 Boilerplate:
       * Grab Google CDN's latest jQuery with a protocol relative URL; fallback to local if offline
       * It's kept in the header instead of footer to avoid conflicts with plugins.
       */
    if (!is_admin() && current_theme_supports('jquery-cdn') ) 
    {
          wp_deregister_script('jquery');
          wp_register_script('jquery', '//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js', array(), null, true);
          add_filter('script_loader_src', 'roots_jquery_local_fallback', 10, 2);
    }

    if (is_single() && comments_open() && get_option('thread_comments')) 
      {
        wp_enqueue_script('comment-reply');
    }

    // wp_enqueue_script('modernizr', get_template_directory_uri() . $assets['modernizr'], array(), null, true);
    wp_enqueue_script('jquery');





    
    // wp_enqueue_script('roots_js', get_template_directory_uri() . $assets['js'], array(), null, true);

      /**
       * The build task in Grunt renames production assets with a hash
       * Read the asset names from assets-manifest.json
       */
      if (WP_ENV === 'development') {

        //
        // STYLES
        //
        $stylesheetTime = filemtime( get_stylesheet_directory() . '/css/style.css' );

        global $wp_styles;
        global $is_IE;
        global $post;

        if( ! $is_IE )
        {
          // Load the main stylesheet
          wp_enqueue_style( 'main-style', get_stylesheet_directory_uri() . '/css/style.css', false, $stylesheetTime );
        }
        else
        {
        // Load the main stylesheet
          wp_enqueue_style( 'main-style-ie', get_stylesheet_directory_uri() . '/css/style.css', false, $stylesheetTime );
          $wp_styles->add_data( 'main-style-ie', 'conditional', 'gte IE 9' );
          /*
          * Load our IE specific stylesheet for a range of older versions:
          * <!--[if lt IE 9]> ... <![endif]-->
          * <!--[if lte IE 8]> ... <![endif]-->
          * NOTE: You can use the 'less than' or the 'less than or equal to' syntax here interchangeably.
          */
          wp_enqueue_style( 'style--legacy', plugins_url( 'css/style--legacy.css' , __FILE__ ) , [] , $styleTime );
          $wp_styles->add_data( 'style--legacy', 'conditional', 'lt IE 9' );
          /**
          * Load our IE version-specific stylesheet:
          * <!--[if IE 7]> ... <![endif]-->
          */
          wp_enqueue_style( 'style--fallback', plugins_url( 'css/style--fallback.css' , __FILE__ ), [] , $styleTime );
          $wp_styles->add_data( 'style--fallback', 'conditional', 'IE 7' );
        }
        




        wp_enqueue_script( 'modernizr', get_stylesheet_directory_uri() . '/js/vendor/modernizr.js', array(), $stylesheetTime, true );
        wp_enqueue_script( 'smoothState', get_stylesheet_directory_uri() . '/js/vendor/smoothState.js', array( 'jquery'), $stylesheetTime, true );
        wp_enqueue_script( 'basic.slider', get_stylesheet_directory_uri() . '/js/vendor/basic.slider.js', array( 'jquery'), $stylesheetTime, true );
        wp_enqueue_script( 'main', get_stylesheet_directory_uri() . '/js/main.js', array( 'jquery' ), $stylesheetTime, true );




      } 
      else 
      {

        
        
        //
        // STYLES
        //
        $stylesheetTime = filemtime( get_stylesheet_directory() . '/css/style.css' );

        global $wp_styles;
        global $is_IE;
        global $post;

        if( ! $is_IE )
        {
          // Load the main stylesheet
          wp_enqueue_style( 'main-style', get_stylesheet_directory_uri() . '/css/style.css', false, $stylesheetTime );
        }
        else
        {
        // Load the main stylesheet
          wp_enqueue_style( 'main-style-ie', get_stylesheet_directory_uri() . '/css/style.css', false, $stylesheetTime );
          $wp_styles->add_data( 'main-style-ie', 'conditional', 'gte IE 9' );
          /*
          * Load our IE specific stylesheet for a range of older versions:
          * <!--[if lt IE 9]> ... <![endif]-->
          * <!--[if lte IE 8]> ... <![endif]-->
          * NOTE: You can use the 'less than' or the 'less than or equal to' syntax here interchangeably.
          */
          wp_enqueue_style( 'style--legacy', plugins_url( 'css/style--legacy.css' , __FILE__ ) , [] , $stylesheetTime );
          $wp_styles->add_data( 'style--legacy', 'conditional', 'lt IE 9' );
          /**
          * Load our IE version-specific stylesheet:
          * <!--[if IE 7]> ... <![endif]-->
          */
          wp_enqueue_style( 'style--fallback', plugins_url( 'css/style--fallback.css' , __FILE__ ), [] , $stylesheetTime );
          $wp_styles->add_data( 'style--fallback', 'conditional', 'IE 7' );
        }
        


        $jsTime = filemtime( get_stylesheet_directory() . '/js/site.min.js' );

        wp_enqueue_script( 'site', get_stylesheet_directory_uri() . '/js/site.min.js', array(), $jsTime, true );

    }

  // wp_enqueue_style('roots_css', get_template_directory_uri() . $assets['css'], false, null);

}

add_action('wp_enqueue_scripts', 'roots_scripts', 100);






// http://wordpress.stackexchange.com/a/12450
function roots_jquery_local_fallback($src, $handle = null) 
{
  static $add_jquery_fallback = false;

  if ($add_jquery_fallback) {
    echo '<script>window.jQuery || document.write(\'<script src="' . get_stylesheet_directory_uri() . '/js/vendor/jquery-1.11.1.min.js"><\/script>\')</script>' . "\n";
    $add_jquery_fallback = false;
  }

  if ($handle === 'jquery') {
    $add_jquery_fallback = true;
  }

  return $src;
}
add_action('wp_head', 'roots_jquery_local_fallback');






/**
 * Google Analytics snippet from HTML5 Boilerplate
 *
 * Cookie domain is 'auto' configured. See: http://goo.gl/VUCHKM
 */
function roots_google_analytics() { ?>
<script>
  <?php if (WP_ENV === 'production') : ?>
    (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
    function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
    e=o.createElement(i);r=o.getElementsByTagName(i)[0];
    e.src='//www.google-analytics.com/analytics.js';
    r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
  <?php else : ?>
    function ga() {
      console.log('GoogleAnalytics: ' + [].slice.call(arguments));
    }
  <?php endif; ?>
  ga('create','<?php echo GOOGLE_ANALYTICS_ID; ?>','auto');ga('send','pageview');
</script>

<?php }
if (GOOGLE_ANALYTICS_ID && (WP_ENV !== 'production' || !current_user_can('manage_options'))) 
{
  add_action('wp_footer', 'roots_google_analytics', 20);
}?>