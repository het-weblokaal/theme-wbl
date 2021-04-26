<?php

namespace WBL\Theme;

?>
<div class="site">
	<div class="site__inner">

		<?php Template::display( 'components/page-skip-to-content' ) ?>

		<?php Template::display( 'site/header', Template::hierarchy() ) ?>

		<?php Template::display( 'site/main', Template::hierarchy() ) ?>

		<?php Template::display( 'site/footer', Template::hierarchy() ) ?>

	</div>
</div>