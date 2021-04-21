<?php

namespace WBL\Theme;

?>
<div class="site">
	<div class="site__inner">

		<?php Template::display( 'components/skip-to-content' ) ?>

		<?php Template::display( 'site/header' ) ?>

		<main class="site-main" id="main">

			<?php the_post(); // Setup postdata (only on singular templates) ?>

			<article class="page">

				<?php Template::display( 'page/header', 'singular' ) ?>

				<?php Template::display( 'page/content', 'singular' ) ?>

			</article>

		</main>

		<?php Template::display( 'site/footer' ) ?>

	</div>
</div>
