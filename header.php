<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width">
    <title><?php wp_title( '|', true, 'right' ); ?></title>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style.css" type="text/css">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <script src="<?php echo get_template_directory_uri(); ?>/js/lib/jquery-1.11.1.js"></script>
    <!--[if lt IE 9]>
    <script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
    <![endif]-->
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<header id="site-header" class="site-header large">
  <h1><img src="http://static.tumblr.com/4587e450727ed912d1e81867cd656810/9qo96br/Q85mqi9a0/tumblr_static_sweetpeastamping_horizontal.gif" alt="Sweetpea Stamping"></h1>
  <h2>Creativity Without Limits</h2>
  <?php

    $nav_connect = array(
                         array(
                            'class' => 'connect-rss',
                            'svg' => 'icon-feed',
                            'label' => 'rss'
                          ),
                         array(
                            'class' => 'connect-tumblr',
                            'svg' => 'icon-tumblr',
                            'label' => 'tumblr'
                          ),
                         array(
                            'class' => 'connect-facebook',
                            'svg' => 'icon-facebook',
                            'label' => 'facebook'
                          ),
                         array(
                            'class' => 'connect-newsletter',
                            'svg' => 'icon-mail',
                            'label' => 'newsletter'
                          ),
                         array(
                            'class' => 'connect-pinterest',
                            'svg' => 'icon-pinterest',
                            'label' => 'pinterest'
                          )
                        );

  ?>
  <nav class="nav-connect">
      <?php
        foreach( $nav_connect as $nav ):
          ?>
          <a href="#" class="<?php echo $nav['class']; ?>">
            <svg viewbox="0 0 32 32">
              <use xlink:href="<?php echo get_template_directory_uri(); ?>/svg/core-defs.svg#<?php echo $nav['svg']; ?>"></use>
            </svg>
            <span><?php echo $nav['label']; ?></span>
          </a>
          <?php
        endforeach;
      ?>
      <a href="#" class="search">
        <svg viewbox="0 0 1024 1024">
          <use xlink:href="<?php echo get_template_directory_uri(); ?>/svg/core-defs.svg#icon-search"></use>
        </svg>
        <span>Search</span>
      </a>
  </nav>
  <nav class="search-form">
    <?php get_search_form(); ?>
  </nav>
  <?php
    $cur_id = get_the_id();
    $items = wp_get_nav_menu_items( 'main' );
    if( is_array( $items ) && count( $items ) ):
      echo '<nav class="nav-main">';
      foreach( $items as $item ):
        echo '<a href="'.$item->url.'" class="nav-item';
        if( $cur_id == $item->object_id ):
          echo ' active';
        elseif( get_permalink( $cur_id ) == $item->url ):
          echo ' active';
        endif;
        echo '"><span class="text">'.$item->title.'</span>';
        include( 'svg/nav-item.svg' );
        echo '</a>';
      endforeach;

      // TAGS
      $tags = get_tags();
      if( is_array( $tags ) ):
        echo '<span class="nav-item';
        if( is_archive() ):
          echo ' active';
        endif;
        echo '"><span class="text">Browse</span>';
        include( 'svg/nav-item.svg' );
        echo '<ul>';
        foreach ( $tags as $tag ):
          $tag_link = get_tag_link( $tag->term_id );

          echo '<li>';
          echo "<a href='{$tag_link}' title='{$tag->name} Tag' class='{$tag->slug}'>";
          echo "{$tag->name}</a>";
          echo '</li>';

        endforeach;
        echo '</ul>';
        echo '</span>';
      endif;

      echo '</nav><!-- /.nav-main -->';
    endif;
  ?>
</header>