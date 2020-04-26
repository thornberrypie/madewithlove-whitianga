<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>
        <?php
          echo MWL_get_the_title().' | '.get_bloginfo();
        ?>
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class() ?>>
<div class="mw-wrapper"><?php // div closes in footer.php ?>
  <div class="mw-container">
    <header class="mw-header">
      <?php if($post) echo MWL_get_featured_image($post->ID) ?>
    </header>
  </div>
