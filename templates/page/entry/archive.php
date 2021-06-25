<?php

namespace WBL\Theme;

?>
<article class="page__entry entry entry--archive entry--<?= get_post_type()?> <?= html_classes( $args['extra_classes'] ) ?>" <?= html_attributes($args['attr']) ?>>

	<?php Template::display( 'page/entry/header' ); ?>

	<?php Template::display( 'page/entry/content' ); ?>

</article>
