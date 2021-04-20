<?php

namespace WBL\Theme;

?>
<div class="site">
	<div class="site__inner">

		<?php Theme::log($args); ?>

		<?php Template::display( 'partials/skip-to-content' ) ?>

		<?php Template::display( 'site/header' ) ?>

		<?php //Template::display( 'site/main' ) ?>

		<?php //Template::display( 'site/footer' ) ?>

	</div>
</div>
