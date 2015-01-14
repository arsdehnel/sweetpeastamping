<?php
/**
 * @package WordPress
 * @subpackage Theme_Compat
 * @deprecated 3.0
 *
 * This file is here for Backwards compatibility with old themes and will be removed in a future version
 *
 */
_deprecated_file( sprintf( __( 'Theme without %1$s' ), basename(__FILE__) ), '3.0', null, sprintf( __('Please include a %1$s template in your theme.'), basename(__FILE__) ) );
?>
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
        ?>
    </div>