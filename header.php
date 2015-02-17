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
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <script src="<?php echo get_template_directory_uri(); ?>/js/lib/svg4everybody.ie8.min.js"></script>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<header id="site-header" class="site-header large">
  <h1>Sweetpea Stamping</h1>
  <h2>Creativity Without Limits</h2>
  <?php

    $nav_connect = array(
                         // array(
                         //    'class' => 'connect-rss',
                         //    'svg' => 'icon-feed',
                         //    'label' => 'rss',
                         //    'url' => '#'
                         //  ),
                         // array(
                         //    'class' => 'connect-stampinup',
                         //    'img' => '/img/su-logo.png',
                         //    'display_text' => 'Site',
                         //    'label' => 'stampinup',
                         //    'url' => 'http://www.pinterest.com/chlojono/'
                         //  ),
                         // array(
                         //    'class' => 'connect-sucatalog',
                         //    'img' => '/img/su-logo.png',
                         //    'display_text' => 'Catalog',
                         //    'label' => 'catalog',
                         //    'url' => 'http://www.stampinup.com/home/en-US/catalogs'
                         //  ),
                         // array(
                         //    'class' => 'connect-sukelly',
                         //    'img' => '/img/su-logo.png',
                         //    'display_text' => 'Site',
                         //    'label' => 'stampinup',
                         //    'url' => 'http://www.pinterest.com/chlojono/'
                         //  ),
                         array(
                            'class' => 'connect-tumblr',
                            'svg' => 'icon-tumblr',
                            'label' => 'tumblr',
                            'url' => 'https://www.tumblr.com/blog/sweetpeastamping'
                          ),
                         array(
                            'class' => 'connect-facebook',
                            'svg' => 'icon-facebook',
                            'label' => 'facebook',
                            'url' => 'https://www.facebook.com/kelly.emerson.315'
                          ),
                         // array(
                         //    'class' => 'connect-newsletter',
                         //    'svg' => 'icon-mail',
                         //    'label' => 'newsletter',
                         //    'url' => '#'
                         //  ),
                         array(
                            'class' => 'connect-instagram',
                            'svg' => 'icon-instagram',
                            'label' => 'instagram',
                            'url' => 'http://instagram.com/stampinkelly'
                          ),
                         array(
                            'class' => 'connect-pinterest',
                            'svg' => 'icon-pinterest',
                            'label' => 'pinterest',
                            'url' => 'http://www.pinterest.com/chlojono/'
                          )
                        );

  ?>
  <nav class="nav-connect">
    <span class="tab connect-stampinup">
      <a href="http://www.pinterest.com/chlojono/">
        <span class="display-text">Site</span>
      </a>
      <a href="http://www.stampinup.com/home/en-US/catalogs">
        <span class="display-text">Catalog</span>
      </a>
      <a href="http://kellystamper.stampinup.net">
        <span class="display-text">My Site</span>
      </a>
    </span><?php
        foreach( $nav_connect as $nav ):
          ?>
          <a href="#" class="tab <?php echo $nav['class']; ?>">
            <?php if( array_key_exists('svg', $nav) ): ?>
              <svg viewbox="0 0 32 32">
                <use xlink:href="<?php echo get_template_directory_uri(); ?>/svg/core-defs.svg#<?php echo $nav['svg']; ?>"></use>
              </svg>
            <?php else: ?>
              <img src="<?php echo get_template_directory_uri().$nav['img']; ?>" alt="<?php echo $nav['label']; ?>">
            <?php endif; ?>
            <?php if( array_key_exists('display_text', $nav) ): ?>
              <span class="display-text"><?php echo $nav['display_text']; ?></span>
            <?php endif; ?>
            <span class="hover-label"><?php echo $nav['label']; ?></span>
          </a>
          <?php
        endforeach;
      ?><a href="#" class="search tab">
        <svg viewbox="0 0 1024 1024">
          <use xlink:href="<?php echo get_template_directory_uri(); ?>/svg/core-defs.svg#icon-search"></use>
        </svg>
        <span class="hover-label">Search</span>
      </a>
  </nav>
  <nav class="search-form">
    <?php get_search_form(); ?>
  </nav>
  <?php
    $cur_id = get_the_id();
    $menu_locations = get_nav_menu_locations();
    $hero_menu = $menu_locations[ 'primary' ];
    $items = wp_get_nav_menu_items( $hero_menu );

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
    else:
        print_r( wp_get_nav_menu_items( 'primary' ) );
    endif;
  ?>
</header>