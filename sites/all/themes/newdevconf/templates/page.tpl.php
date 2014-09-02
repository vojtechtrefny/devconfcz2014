<?php
/**
 * @file
 * Returns the HTML for a single Drupal page.
 *
 * Complete documentation for this file is available online.
 * @see https://drupal.org/node/1728148
 */
?>

<div id="page">

  <header class="header" id="header" role="banner">
   <div class="content-wrapper">
    <?php if ($logo): ?>
      <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" class="header__logo" id="logo"><img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" class="header__logo-image" /></a>
    <?php endif; ?>

    <?php if ($site_name || $site_slogan): ?>
      <div class="header__name-and-slogan" id="name-and-slogan">
        <?php if ($site_name): ?>
          <h1 class="header__site-name" id="site-name">
            <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" class="header__site-link" rel="home"><span><?php print $site_name; ?></span></a>
          </h1>
        <?php endif; ?>

        <?php if ($site_slogan): ?>
          <div class="header__site-slogan" id="site-slogan"><?php print $site_slogan; ?></div>
        <?php endif; ?>
      </div>
    <?php endif; ?>

    <?php if ($secondary_menu): ?>
      <nav class="header__secondary-menu" id="secondary-menu" role="navigation">
        <?php print theme('links__system_secondary_menu', array(
          'links' => $secondary_menu,
          'attributes' => array(
            'class' => array('links', 'inline', 'clearfix'),
          ),
          'heading' => array(
            'text' => $secondary_menu_heading,
            'level' => 'h2',
            'class' => array('element-invisible'),
          ),
        )); ?>
      </nav>
    <?php endif; ?>

    <?php print render($page['header']); ?>
  </div>
  </header>

  <div id="main">
   <div class="content-wrapper">
    <div id="content" class="column" role="main">
      <?php print render($page['highlighted']); ?>
      <?php print $breadcrumb; ?>
      <a id="main-content"></a>
      <?php print render($title_prefix); ?>
      <?php if ($title): ?>
        <h1 class="page__title title" id="page-title"><?php print $title; ?></h1>
      <?php endif; ?>
      <?php print render($title_suffix); ?>
      <?php print $messages; ?>
      <?php print render($tabs); ?>
      <?php print render($page['help']); ?>
      <?php if ($action_links): ?>
        <ul class="action-links"><?php print render($action_links); ?></ul>
      <?php endif; ?>
      <?php print render($page['content']); ?>
      <?php print $feed_icons; ?>
    </div>

    <div id="navigation">

      <?php if ($main_menu): ?>
        <nav id="main-menu" role="navigation" tabindex="-1">
          <?php
          // This code snippet is hard to modify. We recommend turning off the
          // "Main menu" on your sub-theme's settings form, deleting this PHP
          // code block, and, instead, using the "Menu block" module.
          // @see https://drupal.org/project/menu_block
          print theme('links__system_main_menu', array(
            'links' => $main_menu,
            'attributes' => array(
              'class' => array('links', 'inline', 'clearfix'),
            ),
            'heading' => array(
              'text' => t('Main menu'),
              'level' => 'h2',
              'class' => array('element-invisible'),
            ),
          )); ?>
        </nav>
      <?php endif; ?>

      <?php print render($page['navigation']); ?>
        <div id="jump_menu">
        <?php
        // jump_menu($menu, $parent, $btn = FALSE, $maxDepth = 0, $choose = 'Select Now')
        if (module_exists('jump_menu')) {
          echo jump_menu('main-menu', 0 );
        }
        ?>
        </div><!-- end jump_menu -->
    </div>

    <?php
      // Render the sidebars to see if there's anything in them.
      $sidebar_first  = render($page['sidebar_first']);
      $sidebar_second = render($page['sidebar_second']);
    ?>

    <?php if ($sidebar_first || $sidebar_second): ?>
      <aside class="sidebars">
        <?php print $sidebar_first; ?>
        <?php print $sidebar_second; ?>
      </aside>
    <?php endif; ?>
  </div>
  </div>

  <?php //print render($page['footer']); ?>
<div id="footer">
<div class="content-wrapper">
        <div id="footer_logos">
                <span id="organized_by">Devconf is an event organized by:</span>
                <br />

                <img class="footer_logo" src="<?php print base_path() . path_to_theme();?>/images/fedora_logo.png" />
                <img class="footer_logo" src="<?php print base_path() . path_to_theme();?>/images/rh_logo.png" />
                <img class="footer_logo" src="<?php print base_path() . path_to_theme();?>/images/JBossLogoCS.png" />
                
        </div><!-- end footer_logos -->
        <div id="footer_logos2">
        
        <span id="supported_by">Supported by:</span>
                <br />
                <a href="http://www.fit.vutbr.cz/.en"><img class="footer_logo" src="<?php print base_path() . path_to_theme();?>/images/fit_logo.png" title="FIT VUT" /></a>
        </div><!-- end footer_logos2 -->
        
        <div id="social_media">
                <a href="https://twitter.com/search?q=DevConfCZ&f=realtime"><img class="sm_icon" src="<?php print base_path() . path_to_theme();?>/images/twitter2.png" /></a>
                <a href="<?php print base_path();?>rss.xml"><img class="sm_icon" src="<?php print base_path() . path_to_theme();?>/images/rss2.png" /></a>
                <a href="https://plus.google.com/events/ce6b2trcboo1rvu5mfjulk5051s"><img class="sm_icon" src="<?php print base_path() . path_to_theme();?>/images/gplus2.png" /></a>
                <a href="https://www.facebook.com/events/320221544781263/"><img class="sm_icon" src="<?php print base_path() . path_to_theme();?>/images/facebook2.png" ></a/>
        </div><!--end social media -->
</div>
</div><!-- end footer -->

</div>

<?php print render($page['bottom']); ?>
