<?php

namespace WBL\Theme;

use function WBL\Theme\display_site_copyright;
use function WBL\Theme\display_language_switcher;

?>
<footer class="site-footer">
	<div class="site-footer__inner">

		<?php Template::display( 'components/site-newsletter-subscription' ) ?>

		<div class="site-footer-line">
			<div class="site-footer-line__inner flex">

				<?php display_site_copyright( ['extra_classes' => 'flex__item'] ); ?>

				<?php display_language_switcher( ['extra_classes' => 'flex__item'] ); ?>
			</div>
		</div>

	</div>
</footer>
