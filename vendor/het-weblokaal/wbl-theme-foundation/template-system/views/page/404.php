<?php

use WBL\Theme\Template;

?>
<article class="page">

	<header class="page-header">
		<div class="page-header__inner">

			<?php Template::display( 'components/page-breadcrumbs' ) ?>

			<?php Template::display( 'components/page-title' ) ?>

		</div>
	</header>

	<div class="page-main">
		<div class="page-main__inner">

			<?= apply_filters('the_content', Theme::config('site-content', '404', 'content' ) ); ?>

		</div>
	</div>

</article>

