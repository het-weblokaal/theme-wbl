<?php

namespace WBL\Theme;

?>
<article class="page__entry entry entry--<?= get_post_type()?> <?= html_classes( $args['extra_classes'] ) ?>" <?= html_attributes($args['attr']) ?>>

	<?php Template::display( 'page/entry/image' ); ?>

	<?php Template::display( 'page/entry/header' ); ?>

	<?php Template::display( 'page/entry/content' ); ?>

	<?php Template::display( 'page/entry/footer' ); ?>

</article>
