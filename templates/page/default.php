<?php

namespace WBL\Theme;

// Setup postdata (only on singular templates)
if ( is_singular() ) {
	the_post(); 
}
?>
<div class="page <?= html_classes( $args['extra_classes'] ) ?>" <?= html_attributes($args['attr']) ?>>

	<?php Template::display( 'page/entry' ) ?>

	<?php Template::display( 'page/call-to-action', null ); ?>

</div>