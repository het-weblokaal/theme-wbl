<?php

use ClimateCampus\App;

?>
<header class="site-header">
	<div class="site-header__inner">

		<?php App::display_template( 'components/site-branding' ) ?>
		<?php App::display_template( 'components/site-nav-popup' ) ?>

		<div class="site-nav-container">

			<?php App::display_template( 'components/site-nav-desktop-quickmenu' ) ?>

			<?php App::display_template( 'components/site-nav-toggle' ) ?>

		</div>


	</div>
</header>

