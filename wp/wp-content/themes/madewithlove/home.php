<?php
/*
 * Template Name: Home
 */
get_header();
?>

<main class="mwl-main">
	<div class="mwl-container">
			<?php
			if ( have_posts() ) {
				while ( have_posts() ) {
					the_post();
					get_template_part('views/homepage');
				}
			} else {
				get_template_part('views/content', 'none' );
			} ?>
	</div>
</main>

<?php
get_footer();