<?php

namespace WBL\Theme;

?>
<article class="page <?= html_classes( $args['extra_classes'] ) ?>" <?= html_attributes($args['attr']) ?>>

	<?php Template::display( 'page/header', Template::hierarchy() ) ?>

	<?php Template::display( 'page/content', Template::hierarchy() ) ?>

	<?php if (is_singular('post')) : ?>

		<?php Template::display( 'page/footer', Template::hierarchy() ) ?>

	<?php endif; ?>

	<?php Template::display( 'components/call-to-action' ); ?>

</article>