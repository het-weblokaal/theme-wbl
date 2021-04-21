<?php

namespace WBL\Theme;

?>
<div class="site">
	<div class="site__inner">

		<?php Template::display( 'components/skip-to-content' ) ?>

		<?php Template::display( 'site/header' ) ?>

		<main class="site-main" id="main">

			<article class="page">

				<?php Template::display( 'page/header', '404' ) ?>

				<?php Template::display( 'page/content', '404' ) ?>

			</article>

		</main>

		<?php Template::display( 'site/footer' ) ?>

	</div>
</div>
