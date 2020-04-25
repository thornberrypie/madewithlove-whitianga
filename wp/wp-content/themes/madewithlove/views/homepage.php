<?php $bgImg = MWL_get_image_url('background_image') ?>
<div class="mw-content mw-bigtext" style="background-image:url(<?php echo $bgImg ?>)">
  <h1><?php the_title() ?></h1>
  <h2><?php the_content() ?></h2>
</div>