<?php
get_header();
?>
<main class="mwl-main">
	<div class="mwl-container">
			<?php
			if ( have_posts() ) {
				while ( have_posts() ) {
					the_post();
					get_template_part('includes/content-supplier');
				}
			} else {
				get_template_part('includes/content', 'none' );
			} ?>
			<a href="/" class="mwl-backlink">&lt; Back</a>
	</div>
</main>

<?php
get_footer();