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
      <img src="/wp-content/themes/madewithlove/images/made-with-love-logo-large.jpg" alt="made with love gifts wellness eco friendly flowers" />
    </header>
  </div>
