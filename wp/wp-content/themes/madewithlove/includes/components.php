<?php
function mwl_content_image() {
  $img = mwl_get_image('product_image', 'large');
  return $img ?
    '<div class="mwl-content-image">'.$img.'</div>'
    : '';
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
      $img_style = $img_url ? ' style="background-image:url('.$img_url.')"' : '';
      
      $s .= '<a class="mwl-supplier" href="'.get_permalink().'">';
      $s .= '<div class="mwl-supplier-image"'.$img_style.'></div>';
      $s .= '<h4 class="mwl-supplier-name">'.get_the_title().'</h4>';
      $s .= '</a>';
  }

  wp_reset_query();

  return $s !== '' ? '
  <div class="mwl-suppliers-grid">
    <h3 class="mwl-suppliers-title">Stockist of</h3>
    '.$s.'
  </div>
  ' : '';
}