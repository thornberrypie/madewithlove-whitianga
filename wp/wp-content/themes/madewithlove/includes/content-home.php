<div class="mwl-content">
  <?php if($post) echo mwl_hero_image($post->ID) ?>
  <div class="mwl-content-main"><?php the_content() ?></div>
  <div class="mwl-suppliers">
    <?php echo mwl_suppliers() ?>
  </div>
</div>