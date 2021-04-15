<?php

use WBL\Theme\Template;
use function WBL\Theme\get_newsletter_option;

if ( ! get_newsletter_option( 'active' ) ) {
	return;
}

$heading = get_newsletter_option('heading');
$content = get_newsletter_option('content');
$button_text = get_newsletter_option('button_text');
$link = get_newsletter_option('link');

$content = apply_filters( 'the_content', $content );

?>

<aside class="newsletter-subscription">
	<div class="newsletter-subscription__inner">

		<h2><?= $heading ?></h2>
		<?= $content ?>
		<p>
			<a class="button is-style-button-link" href="<?= $link ?>" target="_blank"><?= $button_text ?></a>
		</p>

	</div>
</aside>
