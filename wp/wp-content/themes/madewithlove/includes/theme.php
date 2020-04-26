<?php
// Theme setup
add_action('wp_enqueue_scripts', 'MWL_enqueue_files');
add_action( 'after_setup_theme', 'MWL_post_thumbnails' );

function MWL_post_thumbnails() {
  add_theme_support( 'post-thumbnails' );
}

// Navigation
register_nav_menus(
  array(
    'mainmenu' => __( 'Main Menu', MWL_TEXT_DOMAIN ),
    'footermenu' => __( 'Footer Menu', MWL_TEXT_DOMAIN )
  )
);

// Theme functions
function MWL_enqueue_files() {
  wp_enqueue_style( 'mw-styles', get_template_directory_uri() . '/dist/css/theme.css');
  wp_enqueue_script( 'mw-scripts', get_template_directory_uri() . '/dist/js/theme.js', [], false, true);
}