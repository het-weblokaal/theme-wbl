<?php

use Theme_WBL\App;

?>
<footer class="page-footer">
	<div class="page-footer__inner">

		<?php if (is_singular('post')) : ?>
			<?php App::display_template( 'components/meta-categories' ); ?>
			<?php App::display_template( 'components/post-navigation' ); ?>
		<?php endif; ?>

	</div>
</footer>
