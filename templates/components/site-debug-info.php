<?php

namespace WBL\Theme;

// Only show site version on development
if ( ! App::is_debug_mode() ) {
	return;
}

?>

<div class="site-debug-info">
	<div class="site-debug-info__grid-toggle">
		<label for="grid-toggle">Grid</label>
		<input type="checkbox" id="grid-toggle" name="grid-toggle" />
		<!-- <button class="toggle" name="grid-toggle" id="grid-toggle">Show</button> -->
	</div>
	<div class="site-debug-info__version">
		v<?= App::get_version() ?>
	</div>
	<div class="site-debug-info__media-queries">

	</div>
</div>
