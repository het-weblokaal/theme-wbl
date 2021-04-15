<?php

use WBL\Theme\Template;
use function WBL\Theme\get_social_media_profile_platforms_with_link;
use function WBL\Theme\render_social_media_profile_link;

$platforms = get_social_media_profile_platforms_with_link();

if ( ! $platforms ) {
	Theme::log('No Social Media Profiles set');
	return;
}

?>

<ul class="social-media-profiles">

	<?php foreach ($platforms as $platform_id => $profile_url) : ?>

		<?php if ( $profile_link = render_social_media_profile_link( $platform_id ) ) : ?>

    		<li class="social-media-profiles__item"><?= $profile_link ?></li>

    	<?php endif; ?>

	<?php endforeach; ?>

</ul>
