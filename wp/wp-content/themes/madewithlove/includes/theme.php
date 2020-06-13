<?php
// Theme setup
add_action('wp_enqueue_scripts', 'mwl_enqueue_files');
add_action( 'after_setup_theme', 'mwl_post_thumbnails' );

function mwl_post_thumbnails() {
  add_theme_support( 'post-thumbnails' );
}

// Navigation
register_nav_menus(
  array(
    'mainmenu' => __( 'Main Menu', 'madewithlove' ),
    'footermenu' => __( 'Footer Menu', 'madewithlove' )
  )
);

// Theme functions
function mwl_enqueue_files() {
  wp_enqueue_style( 'mwl-styles', get_template_directory_uri() . '/dist/css/theme.css');
  wp_enqueue_script( 'mwl-scripts', get_template_directory_uri() . '/dist/js/theme.js', [], false, true);
}

/**
 *  Disabling emoji library from Wordpress.
 */
function disable_emojis() {

  // Let's remove a bunch of actions & filters.
  remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
  remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
  remove_action( 'wp_print_styles', 'print_emoji_styles' );
  remove_action( 'admin_print_styles', 'print_emoji_styles' );
  remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
  remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
  remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
  
  // We also take care of Tiny MCE.
  add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
  add_filter( 'wp_resource_hints', 'disable_emojis_remove_dns_prefetch', 10, 2 );
}

// Let's do this at the init.
add_action( 'init', 'disable_emojis' );

/**
* Filter funcion to remove the emoji plugin from TinyMCE.
* @param array $plugins
* @return array Difference betwen the two arrays.
*/
function disable_emojis_tinymce($plugins) {
  if ( is_array( $plugins ) ) {
      return array_diff( $plugins, array( 'wpemoji' ) );
  } else return array();
}

/**
* Removing emoji CDN hostname from DNS prefetching hints.
* @param array $urls URLs to print for resource hints.
* @param string $relation_type The relation type the URLs are printed for.
* @return array Difference betwen the two arrays.
*/
function disable_emojis_remove_dns_prefetch( $urls, $relation_type ) {
  if ( 'dns-prefetch' == $relation_type ) {
      /** This filter is documented in wp-includes/formatting.php */
      $emoji_svg_url = apply_filters( 'emoji_svg_url', 'https://s.w.org/images/core/emoji/2/svg/' );
      $urls = array_diff( $urls, array( $emoji_svg_url ) );
  }
  return $urls;
}