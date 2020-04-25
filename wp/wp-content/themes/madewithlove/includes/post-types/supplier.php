<?php
add_action( 'init', 'supplier_posttype' );

function supplier_posttype() {
  $supports = array(
    'title', // post title
    'editor', // post content
    'author', // post author
    'thumbnail', // featured images
    'excerpt', // post excerpt
    'custom-fields', // custom fields
    'comments', // post comments
    'revisions', // post revisions
    'post-formats', // post formats
  );

  $labels = array(
    'name'            => _x( 'suppliers', 'plural' ),
    'singular_name'   => _x( 'supplier', 'singular' ),
    'menu_name'       => _x( 'suppliers', 'admin menu' ),
    'name_admin_bar'  => _x( 'suppliers', 'admin bar' ),
    'add_new'         => _x( 'Add New', 'add new' ),
    'add_new_item'    => __( 'Add New supplier' ),
    'new_item'        => __( 'New supplier' ),
    'edit_item'       => __( 'Edit suppliers' ),
    'view_item'       => __( 'View suppliers' ),
    'all_items'       => __( 'All suppliers' ),
    'search_items'    => __( 'Search suppliers' ),
    'not_found'       => __( 'No suppliers found.' ),
  );
  
  $args = array(
    'supports'        => $supports,
    'labels'          => $labels,
    'public'          => true,
    'menu_position'   => 7,
    // 'show_in_rest'    => true,  // This is what displays gutenberg block if true, if not you get the old WYSIWYG editor.
    'menu_icon'       => 'dashicons-businessman',
    'query_var'       => true,
    'rewrite'         => array('slug' => 'supplier'),
    'has_archive'     => true,
    'hierarchical'    => false,
  );
  
  register_post_type('supplier', $args);
}