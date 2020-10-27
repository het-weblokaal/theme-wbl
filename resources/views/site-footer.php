<?php

$footer_title = Theme_WBL\render_footer_title();
$contact_info = Theme_WBL\render_footer_contact_info();
$social_media = Theme_WBL\render_social_media();
$credits      = Theme_WBL\render_credits();
$documents    = Theme_WBL\render_documents();
$colophon     = Theme_WBL\render_colophon();

?>
<footer class="site-footer">
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

