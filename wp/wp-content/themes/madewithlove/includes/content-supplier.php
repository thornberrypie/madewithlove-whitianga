<?php
// The attributes applied to the <h1> are transferred to
// hidden fields in the contact form for sending emails
global $post;
$post_slug = $post->post_name;
$supplierEmail = get_field('supplier_email');

// If the email address is not the MWL address then
// send a duplicate to MWL including supplier slug in address with '+'
if ($supplierEmail && strpos($supplierEmail, 'madewithlove.whitianga') === false) {
  //MWL_DEFAULT_EMAIL
  $supplierEmail = $supplierEmail.',madewithlove.whitianga+'.$post_slug.'@gmail.com';
}
?>
<div class="mwl-content mwl-content-supplier">
  <?php echo mwl_content_image() ?>
  <div class="mwl-content-main">
    <h1
      class="mwl-content-title"
      data-supplier-email="<?php echo $supplierEmail ?>"
      data-supplier-slug="<?php echo $post_slug ?>"
      data-supplier-title="<?php the_title() ?>"
      id="mwl-supplier-title"><?php the_title() ?>
    </h1>
    <?php the_content() ?>
  </div>
</div>
<?php
// Only show supplier form if email is set in CMS
if($supplierEmail) { ?>
  <div class="mwl-form">
    <?php echo FrmFormsController::get_form_shortcode( array( 'id' => 1, 'title' => false ) ) ?>
  </div>
<?php } ?>