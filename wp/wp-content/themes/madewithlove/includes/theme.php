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

function MWL_get_featured_image($id) {
  if(has_post_thumbnail($id)) {
      $image_array = wp_get_attachment_image_src(
        get_post_thumbnail_id( $id ),
        'large'
      );
      $image = $image_array[0];
  }else{
      $image = MWL_DEFAULT_FEATURED_IMAGE;
  }

  return '<img src="'.$image.'">';
}

function MWL_get_image($field, $size='thumbnail', $alt='') {
  $image = get_field($field);
  if(!$image) return '';

  if(is_array($image)) {
    $imgAlt = $alt !== '' ? $alt : $image['alt'];
    return '<img src="'.$image['sizes'][$size].'" alt="'.$imgAlt.'">';
  }

  if(is_int($image)) {
    $src = wp_get_attachment_image_src($image, $size);
    return '<img src="'.$src[0].'" alt="'.$alt.'">';
  }

  return '<img src="'.$image.'" alt="'.$alt.'">';
}

function MWL_get_image_url($field, $size='thumbnail') {
  $image = get_field($field);
  if(!$image) return '';

  if(is_array($image)) {
    return $image['sizes'][$size];
  }

  if(is_int($image)) {
    $src = wp_get_attachment_image_src($image, $size);
    return $src[0];
  }

  return $image;
}

function MWL_get_the_title() {
  $object = get_queried_object();

  if(isset($object->taxonomy)){
    return $object->name;
  } else {
    return the_title();
  }
}