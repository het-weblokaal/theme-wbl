<?php

namespace WBL\Theme;

?>
<article class="entry <?= html_classes( $args['extra_classes'] ) ?>" <?= html_attributes($args['attr']) ?>>

	<?php if ('landing-page' != get_page_template_slug()) : ?>

		<?php Template::display( 'entry/single/header' ) ?>

	<?php endif; ?>

	<?php Template::display( 'entry/single/content' ) ?>

	<?php if (is_singular('post')) : ?>

		<?php Template::display( 'entry/single/footer' ) ?>

	<?php endif; ?>

	<?php Template::display( 'components/call-to-action' ); ?>

</article>