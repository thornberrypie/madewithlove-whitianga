<?php
function MWL_featured_image($id) {
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

function MWL_hero_image($id) {
  $img = MWL_get_image('intro_image');
  $txt = get_field('intro_text');

  if(!$img && ! $txt) return '';

  $hero = '<div class="mwl-hero">';
  $hero .= $img ? $img : '';
  $hero .= $txt ? '<div class="mwl-hero-text">'.$txt.'</div>': '';
  $hero .= '</div>';

  return $hero;
}