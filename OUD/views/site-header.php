<?php

use Theme_WBL\App;

?>
<header class="site-header">
	<div class="site-header__inner">

		<?php App::display_template( 'components/site-branding' ) ?>

		<?php App::display_template( 'components/site-nav-toggle' ) ?>

		<?php App::display_template( 'components/site-nav' ) ?>

	</div>
</header>
