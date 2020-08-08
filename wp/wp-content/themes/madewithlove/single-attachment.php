<?php
get_header();
?>
<main class="mwl-main">
	<div class="mwl-container">
			<?php
			if ( have_posts() ) {
				while ( have_posts() ) {
					the_post();
					get_template_part('includes/content');
				}
			} else {
				get_template_part('includes/content', 'none' );
			} ?>
      <button onclick="history.back()" class="mwl-backlink">&lt; Back</button>
	</div>
</main>

<?php
get_footer();