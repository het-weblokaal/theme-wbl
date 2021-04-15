<?php

use ClimateCampus\App;

?>
<article class="page">

	<header class="page-header">
		<div class="page-header__inner">

			<?php App::display_template( 'components/page-breadcrumbs' ) ?>

			<?php App::display_template( 'components/page-title' ) ?>

		</div>
	</header>

	<div class="page-main">
		<div class="page-main__inner">

			<?= apply_filters('the_content', App::config('site-content', '404', 'content' ) ); ?>

		</div>
	</div>

</article>

