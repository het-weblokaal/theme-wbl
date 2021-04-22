<?php

namespace WBL\Theme;

?>
<div class="site">
	<div class="site__inner">

		<?php Template::display( 'components/skip-to-content' ) ?>

		<?php Template::display( 'site/header', get_template_mod() ) ?>

		<main class="site-main" id="main">

			<article class="page">

				<?php Template::display( 'page/header', get_template_mod() ) ?>

				<?php Template::display( 'page/content', get_template_mod() ) ?>

			</article>

		</main>

		<?php Template::display( 'site/footer' ) ?>

	</div>
</div>
