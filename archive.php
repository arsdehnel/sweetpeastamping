<?php
/**
 * The template for displaying Archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each specific one. For example, Twenty Fourteen
 * already has tag.php for Tag archives, category.php for Category archives,
 * and author.php for Author archives.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>
<div class="main">
  <div class="content">
	<section id="primary" class="content-area">
		<div id="content" class="site-content" role="main">

			<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title">
					<?php
						if ( is_day() ) :
							printf( __( 'Daily Archives: <strong>%s</strong>', 'sweetpea2014' ), get_the_date() );

						elseif ( is_month() ) :
							printf( __( 'Monthly Archives: <strong>%s</strong>', 'sweetpea2014' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'sweetpea2014' ) ) );

						elseif ( is_year() ) :
							printf( __( 'Yearly Archives: <strong>%s</strong>', 'sweetpea2014' ), get_the_date( _x( 'Y', 'yearly archives date format', 'sweetpea2014' ) ) );

						elseif ( is_category() ) :
							printf( __( '<strong>%s</strong> Category Archive', 'sweetpea2014' ), single_cat_title('', false) );

						elseif ( is_tag() ) :
							printf( __( '<strong>%s</strong> Archive', 'sweetpea2014' ), single_cat_title('', false) );

						elseif ( is_search() ) :
							printf( __( 'Search Results: <strong>&#8216;%1$s&#8217;</strong>', 'sweetpea2014' ), esc_html( get_search_query() ) );

						else :
							_e( 'Archives', 'sweetpea2014' );

						endif;
					?>
				</h1>
			</header><!-- .page-header -->

			<?php
					// Start the Loop.
					while ( have_posts() ) : the_post();

						/*
						 * Include the post format-specific template for the content. If you want to
						 * use this in a child theme, then include a file called called content-___.php
						 * (where ___ is the post format) and that will be used instead.
						 */
						get_template_part( 'content', get_post_format() );

					endwhile;
					// Previous/next page navigation.
					sweetpea2014_paging_nav();

				else :
					// If no content, include the "No posts found" template.
					get_template_part( 'content', 'none' );

				endif;
			?>
		</div><!-- #content -->
	</section><!-- #primary -->
    <?php
    get_sidebar( 'right' );
    ?>
    </div><!-- /.content -->
</main>
<?php
get_footer();
