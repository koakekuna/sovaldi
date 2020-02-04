<?php
if( have_rows('social_media', 'option') ):
	echo '<ul class="footer-nav__links">';
	while ( have_rows('social_media', 'option') ) : the_row();
		$socialchannel = get_sub_field('social_channel', 'option');
		$socialurl = get_sub_field('social_url', 'option');
		echo '<li class="footer-nav__links__link footer-nav__links__link--' . $socialchannel . '">';
		echo '<a class="nav-link" rel="nofollow noopener noreferrer" href="' . $socialurl . '" target="_blank">';
		echo '<i class="fab fa-' . $socialchannel . '" aria-hidden="true"></i>';
		echo '<span class="sr-only hidden">' . ucfirst($socialchannel) . '</span>';
		echo '</a></li>';
  endwhile;
endif;
?>