<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package sovaldi
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/brands.css" integrity="sha384-n9+6/aSqa9lBidZMRCQHTHKJscPq6NW4pCQBiMmHdUCvPN8ZOg2zJJTkC7WIezWv" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/fontawesome.css" integrity="sha384-vd1e11sR28tEK9YANUtpIOdjGW14pS87bUBuOIoBILVWLFnS+MCX9T6MMf0VdPGq" crossorigin="anonymous">

  <script src="https://cdn.jsdelivr.net/npm/cookieconsent@3/build/cookieconsent.min.js"></script>

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<header id="masthead" class="site-header">

    <nav id="utility">
      <div class="container">
        <div class="inner">
          <div>
          <?php
                wp_nav_menu( array(
                  'menu'            => 'Top',
                  'theme_location' => 'top',
                  'container'       => 'ul',
                  'menu_class'     => 'nav',
                  'menu_id'         => false,
                  'depth'          => 1,
                  'fallback_cb'     => 'bs4navwalker::fallback',
                  'walker'          => new bs4navwalker()
                ) );
              ?>
          </div>
        </div>
      </div>
    </nav>
		<div id="site-branding">
			<div class="container">
				
				<a href="<?=get_site_url();?>" id="logo" rel="home" itemprop="url">
					<img src="<?=get_site_url();?>/wp-content/themes/sovaldi/assets/images/sovaldi-logo.png" alt="Sovaldi">
				</a>
				<nav role="navigation">
					<button type="button" class="menu-toggle" aria-label="Toggle navigation">
						<span></span>
						<span></span>
						<span></span>
					</button>
					<div id="menu-container">
						<?php
							wp_nav_menu( array(
								'menu'            => 'Primary',
								'theme_location' => 'primary',
								'container'       => 'ul',
								'menu_class'     => 'nav',
								'menu_id'         => false,
								'depth'          => 2,
								'fallback_cb'     => 'bs4navwalker::fallback',
								'walker'          => new bs4navwalker()
							) );
						?>
					</div>
				</nav>	
			</div>
		</div><!-- .site-branding -->

	</header><!-- #masthead -->

	<div id="content" class="site-content">
