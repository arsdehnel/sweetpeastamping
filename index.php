<?php get_header(); ?>
<div class="main">
  <div class="content">
	<?php
		if ( is_front_page() ) {
			// Include the featured content template.
			get_template_part( 'featured-content' );
		}
	?>

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">

		<?php
			if ( have_posts() ) :
				// Start the Loop.
				while ( have_posts() ) : the_post();

					/*
					 * Include the post format-specific template for the content. If you want to
					 * use this in a child theme, then include a file called called content-___.php
					 * (where ___ is the post format) and that will be used instead.
					 */
					get_template_part( 'content', get_post_format() );

				endwhile;

			else :
				// If no content, include the "No posts found" template.
				get_template_part( 'content', 'none' );

			endif;
		?>

		</div><!-- #content -->
	</div><!-- #primary -->
	<?php
	get_sidebar( 'right' );
	?>
    </div><!-- /.content -->
</main>
<?php
get_footer();
