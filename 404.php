<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package WordPress
 * @subpackage 3D_Capital
 * @since 1.0.0
 */

get_header();
?>

<div class="customDefaultPages">
    <div class="wrapper">

			<div class="error-404 not-found">
				<div class="page-header">
					<h1 class="page-title"><?php _e( 'Oops! That page can&rsquo;t be found.', 'capital_theme' ); ?></h1>
				</div><!-- .page-header -->

				<div class="page-content">
					<p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'capital_theme' ); ?></p>
					<?php get_search_form(); ?>
				</div><!-- .page-content -->
			</div><!-- .error-404 -->

		</div><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
