<?php

namespace WBL\Theme;

?>
<article class="page <?= html_classes( $args['extra_classes'] ) ?>" <?= html_attributes($args['attr']) ?>>

	<?php if ('landing-page' != get_page_template_slug()) : ?>

		<?php Template::display( 'page/header' ) ?>

	<?php endif; ?>

	<?php Template::display( 'page/content' ) ?>

	<?php if (is_singular('post')) : ?>

		<?php Template::display( 'page/footer' ) ?>

	<?php endif; ?>

	<?php Template::display( 'components/call-to-action' ); ?>

</article>