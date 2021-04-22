<?php

namespace WBL\Theme;

?>
<div class="site">
	<div class="site__inner">

		<?php Template::display( 'components/site-skip-to-content' ) ?>

		<?php Template::display( 'site/header', get_template_mod() ) ?>

		<main class="site-main" id="main">

			<?php the_post(); // Setup postdata (only on singular templates) ?>

			<article class="page">

				<?php Template::display( 'page/header', get_template_mod() ) ?>

				<?php Template::display( 'page/content', get_template_mod() ) ?>

			</article>

		</main>

		<?php Template::display( 'site/footer' ) ?>

	</div>
</div>
