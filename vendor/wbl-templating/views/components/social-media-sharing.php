<?php

use function ClimateCampus\get_social_media_share_platforms;
use function ClimateCampus\render_social_media_share_link;

if (is_front_page()) {
	return;
}

$platforms = get_social_media_share_platforms();

if ( ! $platforms ) {
	return;
}

?>
<aside class="social-media-sharing">

	<h3><?= __('Delen', 'clc') ?></h3>

	<ul class="social-media-share-list">

		<?php foreach ($platforms as $platform_id => $platform) : ?>

		<li class="social-media-share-list__item"><?= render_social_media_share_link( $platform_id ); ?></li>

		<?php endforeach; ?>

	</ul>

</aside>
