<?php

namespace WBL\Theme;

$footer_title = render_footer_title();
$contact_info = render_footer_contact_info();
$social_media = render_social_media();
$credits      = render_credits();
$documents    = render_documents();
$colophon     = render_colophon();

?>
<footer class="site-footer <?= html_classes( $args['extra_classes'] ) ?>" <?= html_attributes($args['attr']) ?>>
	<div class="site-footer__inner">
		<h2 class="site-footer__title"><?= $footer_title ?></h2>

		<div class="site-footer__content">
			<div class="contact-info">
				<?= $contact_info ?>
				<div class="social-media">
					<?= $social_media ?>
				</div>
			</div>
			<div class="credits">
				<?= $credits ?>
			</div>
			<div class="documents">
				<?= $documents ?>
			</div>
			<div class="colophon">
				<?= $colophon ?>
			</div>
		</div>

	</div>
</footer>