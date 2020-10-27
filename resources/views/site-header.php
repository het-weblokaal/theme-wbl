<?php

use Theme_WBL\View;

?>
<header class="site-header">
	<div class="site-header__inner">

		<?php View::display( 'components/site-branding' ) ?>

		<?php View::display( 'components/site-nav-toggle' ) ?>

		<?php View::display( 'components/site-nav' ) ?>

	</div>
</header>
