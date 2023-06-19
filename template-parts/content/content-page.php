<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage 3D_Capital
 * @since 1.0.0
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if ( ! capital_theme_can_show_post_thumbnail() ) : ?>
	<div class="entry-header">
		<?php get_template_part( 'template-parts/header/entry', 'header' ); ?>
	</div>
	<?php endif; ?>

	<div class="entry-content">
		<?php
		the_content();

		
		?>
	</div><!-- .entry-content -->

	
</article><!-- #post-<?php the_ID(); ?> -->
