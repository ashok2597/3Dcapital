<?php
/**
 * Custom template tags for this theme
 *
 * @package WordPress
 * @subpackage 3D_Capital
 * @since 1.0.0
 */

if ( ! function_exists( 'capital_theme_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function capital_theme_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf(
			$time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);

		printf(
			'<span class="posted-on">%1$s<a href="%2$s" rel="bookmark">%3$s</a></span>',
			capital_theme_get_icon_svg( 'watch', 16 ),
			esc_url( get_permalink() ),
			$time_string
		);
	}
endif;

if ( ! function_exists( 'capital_theme_posted_by' ) ) :
	/**
	 * Prints HTML with meta information about theme author.
	 */
	function capital_theme_posted_by() {
		printf(
			'<span class="byline">%1$s<span class="screen-reader-text">%2$s</span><span class="author vcard"><a class="url fn n" href="%3$s">%4$s</a></span></span>',
			/* translators: 1: SVG icon. 2: post author, only visible to screen readers. 3: author link. */
			capital_theme_get_icon_svg( 'person', 16 ),
			__( 'Posted by', 'capital_theme' ),
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			esc_html( get_the_author() )
		);
	}
endif;

if ( ! function_exists( 'capital_theme_comment_count' ) ) :
	/**
	 * Prints HTML with the comment count for the current post.
	 */
	function capital_theme_comment_count() {
		if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			echo capital_theme_get_icon_svg( 'comment', 16 );

			/* translators: %s: Name of current post. Only visible to screen readers. */
			comments_popup_link( sprintf( __( 'Leave a comment<span class="screen-reader-text"> on %s</span>', 'capital_theme' ), get_the_title() ) );

			echo '</span>';
		}
	}
endif;

if ( ! function_exists( 'capital_theme_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function capital_theme_entry_footer() {

		// Hide author, post date, category and tag text for pages.
		if ( 'post' === get_post_type() ) {

			// Posted by
			capital_theme_posted_by();

			// Posted on
			capital_theme_posted_on();

			/* translators: used between list items, there is a space after the comma. */
			$categories_list = get_the_category_list( __( ', ', 'capital_theme' ) );
			if ( $categories_list ) {
				/* translators: 1: SVG icon. 2: posted in label, only visible to screen readers. 3: list of categories. */
				printf(
					'<span class="cat-links">%1$s<span class="screen-reader-text">%2$s</span>%3$s</span>',
					capital_theme_get_icon_svg( 'archive', 16 ),
					__( 'Posted in', 'capital_theme' ),
					$categories_list
				); // WPCS: XSS OK.
			}

			/* translators: used between list items, there is a space after the comma. */
			$tags_list = get_the_tag_list( '', __( ', ', 'capital_theme' ) );
			if ( $tags_list ) {
				/* translators: 1: SVG icon. 2: posted in label, only visible to screen readers. 3: list of tags. */
				printf(
					'<span class="tags-links">%1$s<span class="screen-reader-text">%2$s </span>%3$s</span>',
					capital_theme_get_icon_svg( 'tag', 16 ),
					__( 'Tags:', 'capital_theme' ),
					$tags_list
				); // WPCS: XSS OK.
			}
		}

		// Comment count.
		if ( ! is_singular() ) {
			capital_theme_comment_count();
		}

		// Edit post link.
		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers. */
					__( 'Edit <span class="screen-reader-text">%s</span>', 'capital_theme' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			),
			'<span class="edit-link">' . capital_theme_get_icon_svg( 'edit', 16 ),
			'</span>'
		);
	}
endif;

if ( ! function_exists( 'capital_theme_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function capital_theme_post_thumbnail() {
		if ( ! capital_theme_can_show_post_thumbnail() ) {
			return;
		}

		if ( is_singular() ) :
			?>

			<figure class="post-thumbnail">
				<?php the_post_thumbnail(); ?>
			</figure><!-- .post-thumbnail -->

			<?php
		else :
			?>

		<figure class="post-thumbnail">
			<a class="post-thumbnail-inner" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
				<?php
				the_post_thumbnail( 'post-thumbnail' );
				?>
			</a>
		</figure>

			<?php
		endif; // End is_singular().
	}
endif;

if ( ! function_exists( 'capital_theme_comment_avatar' ) ) :
	/**
	 * Returns the HTML markup to generate a user avatar.
	 */
	function capital_theme_get_user_avatar_markup( $id_or_email = null ) {

		if ( ! isset( $id_or_email ) ) {
			$id_or_email = get_current_user_id();
		}

		return sprintf( '<div class="comment-user-avatar comment-author vcard">%s</div>', get_avatar( $id_or_email, capital_theme_get_avatar_size() ) );
	}
endif;

if ( ! function_exists( 'capital_theme_discussion_avatars_list' ) ) :
	/**
	 * Displays a list of avatars involved in a discussion for a given post.
	 */
	function capital_theme_discussion_avatars_list( $comment_authors ) {
		if ( empty( $comment_authors ) ) {
			return;
		}
		echo '<ol class="discussion-avatar-list">', "\n";
		foreach ( $comment_authors as $id_or_email ) {
			printf(
				"<li>%s</li>\n",
				capital_theme_get_user_avatar_markup( $id_or_email )
			);
		}
		echo '</ol><!-- .discussion-avatar-list -->', "\n";
	}
endif;

if ( ! function_exists( 'capital_theme_comment_form' ) ) :
	/**
	 * Documentation for function.
	 */
	function capital_theme_comment_form( $order ) {
		if ( true === $order || strtolower( $order ) === strtolower( get_option( 'comment_order', 'asc' ) ) ) {

			comment_form(
				array(
					'logged_in_as'       => null,
					'title_reply'        => null,
				)
			);
		}
	}
endif;

if ( ! function_exists( 'capital_theme_the_posts_navigation' ) ) :
	/**
	 * Documentation for function.
	 */
	function capital_theme_the_posts_navigation() {
		$prev_icon = capital_theme_get_icon_svg( 'chevron_left', 22 );
		$next_icon = capital_theme_get_icon_svg( 'chevron_right', 22 );
		the_posts_pagination(
			array(
				'mid_size'  => 2,
				'prev_text' => sprintf( '%s <span class="nav-prev-text">%s</span>', $prev_icon, __( 'Newer posts', 'capital_theme' ) ),
				'next_text' => sprintf( '<span class="nav-next-text">%s</span> %s', __( 'Older posts', 'capital_theme' ), $next_icon ),
			)
		);
	}
endif;

if ( ! function_exists( 'capital_theme_paging_nav' ) ) :
    function capital_theme_paging_nav( $capital_theme_query ) {
        global $wp_query, $wp_rewrite;

        // Don't print empty markup if there's only one page.
        if ( $capital_theme_query->max_num_pages < 2 ) {
            return;
        }

        $paged        = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
        $pagenum_link = html_entity_decode( get_pagenum_link() );
        $query_args   = array();
        $url_parts    = explode( '?', $pagenum_link );

        if ( isset( $url_parts[1] ) ) {
            wp_parse_str( $url_parts[1], $query_args );
        }

        $pagenum_link = remove_query_arg( array_keys( $query_args ), $pagenum_link );
        $pagenum_link = trailingslashit( $pagenum_link ) . '%_%';

        $format  = $wp_rewrite->using_index_permalinks() && ! strpos( $pagenum_link, 'index.php' ) ? 'index.php/' : '';
        $format .= $wp_rewrite->using_permalinks() ? user_trailingslashit( $wp_rewrite->pagination_base . '/%#%', 'paged' ) : '?paged=%#%';

        // Set up paginated links.
        $links = paginate_links( array(
            'base'     => $pagenum_link,
            'format'   => $format,
            'total'    => $capital_theme_query->max_num_pages,
            'current'  => $paged,
            'mid_size' => 1,
            'add_args' => array_map( 'urlencode', $query_args ),
//        'prev_text' => __( '&larr; Previous', 'cbc' ),
//        'next_text' => __( 'Next &rarr;', 'cbc' ),
        ) );

        if ( $links ) :

            ?>

                <div class="rgWrap rgNumPart clearfix text-center">
                    <nav class="navigation paging-navigation" role="navigation">
                        <div class="pagination loop-pagination">
                            <?php echo $links; ?>
                        </div><!-- .pagination -->
                    </nav><!-- .navigation -->
                </div>
                <!--<div class="rgWrap rgAdvPart">
                    <span id="ctl00_ContentMain_ctl09_ctl00_ctl00_grdMember_ctl00_ctl03_ctl01_ChangePageSizeLabel" class="rgPagerLabel">Page size:</span>
                    <div id="ctl00_ContentMain_ctl09_ctl00_ctl00_grdMember_ctl00_ctl03_ctl01_PageSizeComboBox" class="RadComboBox RadComboBox_Default">
                        <table cellpadding="0" cellspacing="0" summary="combobox" border="0">
                            <tr class="rcbReadOnly">
                                <td class="rcbInputCell rcbInputCellLeft">
                                    <input name="ctl00$ContentMain$ctl09$ctl00$ctl00$grdMember$ctl00$ctl03$ctl01$PageSizeComboBox" type="text" class="rcbInput" id="ctl00_ContentMain_ctl09_ctl00_ctl00_grdMember_ctl00_ctl03_ctl01_PageSizeComboBox_Input" value="<?php /*echo isset( $_GET['resultshow'] ) ? $_GET['resultshow'] : 20; */?>" readonly="readonly" />
                                </td>
                                <td class="rcbArrowCell rcbArrowCellRight">
                                    <a id="ctl00_ContentMain_ctl09_ctl00_ctl00_grdMember_ctl00_ctl03_ctl01_PageSizeComboBox_Arrow">select</a>
                                </td>
                            </tr>
                        </table>
                        <?php
                /*                        $actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                                        $link1 = add_query_arg( 'resultshow', '10', $actual_link );
                                        $link2 = add_query_arg( 'resultshow', '20', $actual_link );
                                        $link3 = add_query_arg( 'resultshow', '50', $actual_link );
                                        */?>
                        <div class="rcbSlide">
                            <div id="ctl00_ContentMain_ctl09_ctl00_ctl00_grdMember_ctl00_ctl03_ctl01_PageSizeComboBox_DropDown" class="RadComboBoxDropDown RadComboBoxDropDown_Default " style="display:none;">
                                <div class="rcbScroll rcbWidth">
                                    <ul class="rcbList">
                                        <li class="rcbItem "><a href="<?php /*echo $link1; */?>">10</a></li>
                                        <li class="rcbItem "><a href="<?php /*echo $link2; */?>">20</a></li>
                                        <li class="rcbItem "><a href="<?php /*echo $link3; */?>">50</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <input id="ctl00_ContentMain_ctl09_ctl00_ctl00_grdMember_ctl00_ctl03_ctl01_PageSizeComboBox_ClientState" name="ctl00_ContentMain_ctl09_ctl00_ctl00_grdMember_ctl00_ctl03_ctl01_PageSizeComboBox_ClientState" type="hidden" />
                    </div>
                </div>
                <div class="rgWrap rgInfoPart">
                    <strong><?php /*echo $cbc_query->found_posts; */?></strong> items in <strong><?php /*echo $cbc_query->max_num_pages; */?></strong> pages
                </div>-->

        <?php
        endif;
    }
endif;