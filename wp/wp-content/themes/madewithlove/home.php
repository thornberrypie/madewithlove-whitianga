<?php
/*
 * Template Name: Home
 */
get_header();
?>

<main class="mw-main">
	<div class="mw-container">
			<?php
			if ( have_posts() ) {
				while ( have_posts() ) {
					the_post();
					echo MWL_get_image('intro_image', 'large');
					get_template_part('views/homepage');
				}
			} else {
				get_template_part('views/content', 'none' );
			} ?>
	</div>
</main>

<?php
get_footer();