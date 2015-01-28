<?php
/**
 * Theme wrapper
 *
 * @link http://roots.io/an-introduction-to-the-roots-theme-wrapper/
 * @link http://scribu.net/wordpress/theme-wrappers.html
 */
function roots_template_path() {
  return Roots_Wrapping::$main_template;
}

function roots_sidebar_path() {
  return new Roots_Wrapping('templates/sidebar.php');
}

class Roots_Wrapping {
  // Stores the full path to the main template file
  public static $main_template;

  // basename of template file
  public $slug;

  // array of templates
  public $templates;

  // Stores the base name of the template file; e.g. 'page' for 'page.php' etc.
  static $base;

  public function __construct($template = 'base.php') {
    $this->slug = basename($template, '.php');
    $this->templates = array($template);

    if (self::$base) {
      $str = substr($template, 0, -4);
      array_unshift($this->templates, sprintf($str . '-%s.php', self::$base));
    }
  }

  public function __toString() {
    $this->templates = apply_filters('roots/wrap_' . $this->slug, $this->templates);
    return locate_template($this->templates);
  }

  static function wrap($main) {
    // Check for other filters returning null
    if (!is_string($main)) {
      return $main;
    }

    self::$main_template = $main;
    self::$base = basename(self::$main_template, '.php');

    if (self::$base === 'index') {
      self::$base = false;
    }

    return new Roots_Wrapping();
  }
}
add_filter('template_include', array('Roots_Wrapping', 'wrap'), 99);




add_filter('roots/wrap_base', 'trv_wrap_sliders'); // Add our function to the roots_wrap_base filter

/**
 * Sets the base for sliders to remove total page guff.
 * @param  array $templates wordpress templates array
 * @return array            as above. templates
 */
function trv_wrap_sliders($templates) 
{

  $current_template = get_page_template();

  // $cpt = get_post_type(); // Get the current post type
  if ( strpos( $current_template, 'slider' ) > 0 ) {
     array_unshift($templates, 'base--slider.php'); // Shift the template to the front of the array
  }
  return $templates; // Return our modified array with base-$cpt.php at the front of the queue
}



