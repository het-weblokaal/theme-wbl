<?php

namespace WBL\Theme;

?>
<main class="site-main <?= html_classes( $args['extra_classes'] ) ?>" <?= html_attributes($args['attr']) ?> id="main">

	<?php
	// Setup postdata (only on singular templates)
	if ( is_singular() ) {
		the_post(); 
	}
	?>

	<?php Template::display( 'page' ) ?>

	<?php Template::display( 'components/call-to-action' ); ?>

</main>
