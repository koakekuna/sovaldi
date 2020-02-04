<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package sovaldi
 */

?>

<div id="exitModal" class="modal" aria-hidden="true">
	  	<div class="modal-dialog">
		    <div class="modal-body">
		     	<div class="textwidget custom-html-widget">
             <p class="primary-color">This is not a real site! None of this information is intended for patients.
             </p>
					    <a id="exitClose" tabindex="0" class="modal-close btn btn-primary">I understand</a>
				</div>			
			</div>
	  	</div>
  </div>

<div id="sticky-isi" class="container-fluid">
  <?php get_template_part( 'template-parts/content', 'isi' ); ?>
</div>

	</div><!-- #content -->

  <footer id="colophon" class="footer">
		<div class="footer__container">
				<div class="footer__logo">
					<a href="https://www.gilead.com/" target="_blank"><img alt="Gilead" src="<?=get_site_url();?>/wp-content/themes/sovaldi/assets/images/gilead-logo.png"></a>
          <p>This site is intended for residents of the US only. The information on this site is not intended to make a&nbsp;diagnosis.<br />
					&copy;<?php echo date("Y"); ?> Gilead Sciences. All rights reserved.</p>
				</div>
        <nav class="footer-nav footer-nav--aoi">
          <?php
            wp_nav_menu( array(
              'menu'            => 'Footer Areas of Interest',
              'theme_location' => 'Footer Areas of Interest',
              'container'       => 'ul',
              'menu_class'     => 'footer-nav__links',
              'menu_id'         => false,
              'depth'          => 1,
              'fallback_cb'     => 'bs4navwalker::fallback',
              'walker'          => new bs4navwalker()
            ) );
          ?>
        </nav>

        <nav class="footer-nav footer-nav--info">
          <?php
            wp_nav_menu( array(
              'menu'            => 'Footer Info',
              'theme_location' => 'Footer Info',
              'container'       => 'ul',
              'menu_class'     => 'footer-nav__links',
              'menu_id'         => false,
              'depth'          => 1,
              'fallback_cb'     => 'bs4navwalker::fallback',
              'walker'          => new bs4navwalker()
            ) );
          ?>
        </nav>

        <nav class="footer-nav footer-nav--legal">
          <?php
            wp_nav_menu( array(
              'menu'            => 'Footer Legal',
              'theme_location' => 'Footer Legal',
              'container'       => 'ul',
              'menu_class'     => 'footer-nav__links',
              'menu_id'         => false,
              'depth'          => 1,
              'fallback_cb'     => 'bs4navwalker::fallback',
              'walker'          => new bs4navwalker()
            ) );
          ?>
        </nav>

        <nav class="footer-nav footer-nav--social">
          <?php get_template_part( 'template-parts/content', 'social') ?>
        </nav>
    </div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
