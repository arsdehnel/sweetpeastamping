<div class="sidebar" id="sidebar" role="complementary">
    <?php   /* Widgetized sidebar, if you have the plugin installed. */
        if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar() ) : ?>
            <ul role="navigation">
                <h2>Recent Posts</h2>
                <ul>
                <?php
                    $args = array( 'numberposts' => '5' );
                    $recent_posts = wp_get_recent_posts( $args );
                    foreach( $recent_posts as $recent ){
                        echo '<li><a href="' . get_permalink($recent["ID"]) . '">' .   $recent["post_title"].'</a> </li> ';
                    }
                ?>
                </ul>
            </ul>
            <br>
            <ul role="navigation">
                <h2>Categories</h2>
                <ul>
                    <?php wp_list_categories(array('show_count' => 1, 'title_li' => '')); ?>
                </ul>
            </ul><?php
        endif;
        if ( is_active_sidebar( 'main_sidebar' ) ) :
            ?>
            <div id="primary-sidebar" class="primary-sidebar widget-area" role="complementary">
                <?php dynamic_sidebar( 'main_sidebar' ); ?>
            </div><!-- #primary-sidebar -->
            <?
        endif;
    ?>
</div>
