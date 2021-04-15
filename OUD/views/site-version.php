<?php

use Theme_WBL\App;
use Theme_WBL\Utils;

/// Only show site version on development
if ( Utils::get_version_type() != 'development' ) {
	return;
}

?>

<div class="site-version">
	<?= App::get_version() ?>
</div>
