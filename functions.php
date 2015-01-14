<?php

    // This theme uses wp_nav_menu() in two locations.
    register_nav_menus( array(
        'primary'   => __( 'Primary menu', 'sweetpea2014' ),
        'connect' => __( 'Social media connection options', 'sweetpea2014' ),
    ) );

function sweetpea2014_get_featured_posts() {
    /**
     * Filter the featured posts to return in Twenty Fourteen.
     *
     * @since Twenty Fourteen 1.0
     *
     * @param array|bool $posts Array of featured posts, otherwise false.
     */
    return apply_filters( 'twentyfourteen_get_featured_posts', array() );
}

function sweetpea2014_post_thumbnail() {
    if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
        return;
    }

    if ( is_singular() ) :
    ?>

    <div class="post-thumbnail">
    <?php
        if ( ( ! is_active_sidebar( 'sidebar-2' ) || is_page_template( 'page-templates/full-width.php' ) ) ) {
            the_post_thumbnail( 'twentyfourteen-full-width' );
        } else {
            the_post_thumbnail();
        }
    ?>
    </div>

    <?php else : ?>

    <a class="post-thumbnail" href="<?php the_permalink(); ?>">
    <?php
        if ( ( ! is_active_sidebar( 'sidebar-2' ) || is_page_template( 'page-templates/full-width.php' ) ) ) {
            the_post_thumbnail( 'twentyfourteen-full-width' );
        } else {
            the_post_thumbnail();
        }
    ?>
    </a>

    <?php endif; // End is_singular()
}

function sweetpea2014_paging_nav() {
    global $wp_query, $wp_rewrite;

    // Don't print empty markup if there's only one page.
    if ( $wp_query->max_num_pages < 2 ) {
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
        'total'    => $wp_query->max_num_pages,
        'current'  => $paged,
        'mid_size' => 1,
        'add_args' => array_map( 'urlencode', $query_args ),
        'prev_text' => __( '&larr; Previous', 'twentyfourteen' ),
        'next_text' => __( 'Next &rarr;', 'twentyfourteen' ),
    ) );

    if ( $links ) :

    ?>
    <nav class="navigation paging-navigation" role="navigation">
        <h1 class="screen-reader-text"><?php _e( 'Posts navigation', 'twentyfourteen' ); ?></h1>
        <div class="pagination loop-pagination">
            <?php echo $links; ?>
        </div><!-- .pagination -->
    </nav><!-- .navigation -->
    <?php
    endif;
}
