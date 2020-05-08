<?php
$email = get_field('supplier_email');
?>
<div class="mwl-content mwl-content-supplier">
  <?php echo mwl_content_image() ?>
  <div class="mwl-content-main">
    <h1 class="mwl-content-title" data-supplier-title="<?php the_title() ?>" id="mwl-supplier-title"<?php echo ' data-supplier-id="'.$email.'"' ?>>
      <?php the_title() ?>
    </h1>
    <?php the_content() ?>
    <div class="mwl-form">
      <?php echo FrmFormsController::get_form_shortcode( array( 'id' => 1, 'title' => false ) ); ?>
    </div>
  </div>
</div>