<?php
/**
 * Displays the post header
 *
 * @package WordPress
 * @subpackage 3D_Capital
 * @since 1.0.0
 */

$discussion = ! is_page() && capital_theme_can_show_post_thumbnail() ? capital_theme_get_discussion_data() : null; ?>

<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

<?php if ( ! is_page() ) : ?>
<div class="entry-meta">
	<?php capital_theme_posted_by(); ?>
	<?php capital_theme_posted_on(); ?>
	<span class="comment-count">
		<?php
		if ( ! empty( $discussion ) ) {
			capital_theme_discussion_avatars_list( $discussion->authors );
		}
		?>
		<?php capital_theme_comment_count(); ?>
	</span>
	
</div><!-- .meta-info -->
<?php endif; ?>
