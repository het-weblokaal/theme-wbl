<?php

namespace WBL\Theme;

?>
<div class="site">
	<div class="site__inner">

		<?php Template::display( 'components/skip-to-content' ) ?>

		<?php Template::display( 'site/header' ) ?>

		<main class="site-main" id="main">

			<article class="page">

				<?php Template::display( 'page/header', 'archive' ) ?>

				<?php Template::display( 'page/content', 'archive' ) ?>

			</article>

		</main>

		<?php Template::display( 'site/footer' ) ?>

	</div>
</div>
