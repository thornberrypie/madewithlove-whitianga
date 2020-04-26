<?php
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

// shortcut and formatting for var_dump
function vd($data) {
  echo "<pre>";
  var_dump($data);
  echo "</pre>";
}
