<?php

use ClimateCampus\App;

/// Only show site version on development
if ( ! App::is_debug_mode() ) {
	return;
}

?>

<div class="debug-info">
	<div class="debug-info__grid">

	</div>
	<div class="debug-info__version">
		<?= App::get_version() ?>
	</div>
	<div class="debug-info__responsiveness">

	</div>
</div>
