<?php
function mwl_featured_image($id) {
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

function mwl_hero_image($id) {
  $img = mwl_get_image('intro_image', 'large');
  $txt = get_field('intro_text');

  if(!$img && ! $txt) return '';

  $hero = '<div class="mwl-hero">';
  $hero .= $img ? $img : '';
  $hero .= $txt ? '<h1 class="mwl-hero-overlay"><span class="mwl-hero-text">'.$txt.'</span></h1>': '';
  $hero .= '</div>';

  return $hero;
}

function mwl_suppliers() {
  $s = '';
  
  $query = new WP_Query(array(
      'post_type' => 'supplier',
      'post_status' => 'publish',
      'posts_per_page' => -1
  ));

  while ($query->have_posts()) {
      $query->the_post();
      $id = get_the_ID();
      $img_url = mwl_get_image_url('product_image');
      
      $s .= '<a class="mwl-supplier" href="'.get_permalink().'">';
      $s .= $img_url ? '<div class="mwl-supplier-image" style="background-image:url('.$img_url.')"></div>' : '';
      $s .= '<h4 class="mwl-supplier-name">'.get_the_title().'</h4>';
      $s .= '</a>';
  }

  wp_reset_query();

  return $s !== '' ? '<div class="mwl-suppliers-grid">'.$s.'</div>' : '';
}