<?php
/**
 * @file
 * Returns the HTML for a single Drupal page.
 *
 * Complete documentation for this file is available online.
 * @see https://drupal.org/node/1728148
 */
 
 global $language;
?>
?>
<script>
jQuery(function () {
  var confday = new Date(2014, 1, 6);
  jQuery('#countdown_timer').countdown({until: confday});
  });
</script>
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
  <div id="cfp-banner"><div class="content-wrapper">
      <div id="countdown_timer">
      </div><!-- end countdown_timer -->
  </div><!-- end content-wrapper --></div><!-- end cfp-banner -->
  <div id="main">
    <div class="content-wrapper">
    <div id="content" class="column" role="main">
      <?php print render($page['highlighted']); ?>
      <?php print $breadcrumb; ?>
      <a id="main-content"></a>
      <?php print render($title_prefix); ?>
      <?php if ($title): ?>
        <!--<h1 class="page__title title" id="page-title"><?php //print $title; ?></h1> -->
      <?php endif; ?>
      <?php print render($title_suffix); ?>
      <?php print $messages; ?>
      <?php print render($tabs); ?>
      <?php print render($page['help']); ?>
      <?php if ($action_links): ?>
        <ul class="action-links"><?php print render($action_links); ?></ul>
      <?php endif; ?>

       <!--<div id="language_switcher">
<?php
          //$block = module_invoke('locale', 'block_view', 'language');
          //print render($block['content']);
          ?>
       </div>--><!-- end language_switcher -->
       <!-- <div id="main_conf_hook">
        <?php
        	//$block = module_invoke('block', 'block_view', '1');
		      //print render($block['content']);
	?>
        </div>--><!-- end main_conf_hook -->
        <div id="main_page_blocks">
          <?php print render($page['front_blocks']);?>
        </div><!-- end main_page_blocks -->
        
        <?php if ($language->language == 'en') {
        echo '
        
	<div id="main_speakers_block">
		<div id="main_speakers_header">
			<span id="speakers_title">SPEAKERS</span>
			<span id="speakers_all"><a href="/main-page-speakers">VIEW ALL</a></span>
		</div><!-- end main_speakers_header -->

		<div id="main_speakers">';
                
                         $main_speakers = module_invoke('views', 'block_view', 'main_page_speakers-block');
                        print render($main_speakers);
               

		echo' </div><!-- end main_speakers -->
	</div><!-- end main_speakers_block-->

    	<div id="main_news_block">
		<div id="main_news_block_header">
			<span id="news_title">NEWS</span>
			<span id="news_all"><a href="/main-page-news">VIEW ALL</a></span>
		</div><!-- end main_news_block_header-->';
	        
               		 $main_news = module_invoke('views', 'block_view', 'main_page_news-block');
        	        print render($main_news);
	        

	echo '</div><!-- end main_news_block -->
	'; } 
	
	if ($language->language == 'cs') {
        echo '
        
	<div id="main_speakers_block">
		<div id="main_speakers_header">
			<span id="speakers_title">PŘEDNÁŠEJÍCÍ</span>
			<span id="speakers_all"><a href="/main-page-speakers-cz">ZOBRAZIT VŠE</a></span>
		</div><!-- end main_speakers_header -->

		<div id="main_speakers">';
                
                         $main_speakers = module_invoke('views', 'block_view', 'main_page_speakers_czech-block');
                        print render($main_speakers);
               

		echo' </div><!-- end main_speakers -->
	</div><!-- end main_speakers_block-->

    	<div id="main_news_block">
		<div id="main_news_block_header">
			<span id="news_title">NOVINKY</span>
			<span id="news_all"><a href="/main-page-news-cz">ZOBRAZIT VŠE</a></span>
		</div><!-- end main_news_block_header-->';
	        
               		 $main_news = module_invoke('views', 'block_view', 'main_page_news_czech-block');
        	        print render($main_news);
	        

	echo '</div><!-- end main_news_block -->
	'; }
	
	?>

      <?php //print render($page['content']); ?>
      <?php //print $feed_icons; ?>
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
	<div id="social_media">
		<a href="https://twitter.com/search?q=DevConfBrno&f=realtime"><img class="sm_icon" src="<?php print base_path() . path_to_theme();?>/images/twitter2.png" /></a>
		<a href="<?php print base_path();?>rss.xml"><img class="sm_icon" src="<?php print base_path() . path_to_theme();?>/images/rss2.png" /></a>
		<a href="https://plus.google.com/events/ce6b2trcboo1rvu5mfjulk5051s"><img class="sm_icon" src="<?php print base_path() . path_to_theme();?>/images/gplus2.png" /></a>
		<a href="https://www.facebook.com/events/320221544781263/"><img class="sm_icon" src="<?php print base_path() . path_to_theme();?>/images/facebook2.png" ></a/>
	</div><!--end social media -->
    </div>
</div><!-- end footer -->

</div>

<?php print render($page['bottom']); ?>
