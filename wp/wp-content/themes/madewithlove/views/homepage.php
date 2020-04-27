<div class="mwl-content">
  <?php if($post) echo mwl_hero_image($post->ID) ?>
  <div class="mwl-content-main"><?php the_content() ?></div>
  <div class="mwl-suppliers">
    <h3 class="mwl-suppliers-title">Stockists of:</h3>
    <?php echo mwl_suppliers() ?>
  </div>
</div>