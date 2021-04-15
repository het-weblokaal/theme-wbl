<?php

use WBL\Theme\Template;

?>
<header class="site-header">
	<div class="site-header__inner">

		<?php Template::display( 'components/site-branding' ) ?>
		<?php Template::display( 'components/site-nav-popup' ) ?>

		<div class="site-nav-container">

			<?php Template::display( 'components/site-nav-desktop-quickmenu' ) ?>

			<?php Template::display( 'components/site-nav-toggle' ) ?>

		</div>


	</div>
</header>

