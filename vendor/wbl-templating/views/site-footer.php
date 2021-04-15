<?php

use ClimateCampus\App;
use function ClimateCampus\render_footer_menu_1;
use function ClimateCampus\render_footer_menu_2;
use function ClimateCampus\render_footer_content_1;
use function ClimateCampus\render_footer_content_2;
use function ClimateCampus\display_site_copyright;
use function ClimateCampus\display_language_switcher;

?>
<footer class="site-footer">
	<div class="site-footer__inner">

		<?php App::display_template( 'components/site-newsletter-subscription' ) ?>

		<div class="site-footer-boxes">
			<div class="site-footer-boxes__inner grid">

				<div class="grid__item">
			        <?= render_footer_menu_1() ?>
				</div>
				<div class="grid__item">
					<?= render_footer_menu_2() ?>
				</div>
				<div class="grid__item">
					<?= render_footer_content_1() ?>
				</div>
				<div class="grid__item">
					<?= render_footer_content_2() ?>
				</div>

			</div>
		</div>

		<div class="site-footer-line">
			<div class="site-footer-line__inner flex">

				<?php display_site_copyright( ['extra_classes' => 'flex__item'] ); ?>

				<?php display_language_switcher( ['extra_classes' => 'flex__item'] ); ?>
			</div>
		</div>

	</div>
</footer>
