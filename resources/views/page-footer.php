<?php

use Theme_WBL\View;

?>
<footer class="page-footer">
	<div class="page-footer__inner">

		<?php if (is_singular('post')) : ?>
			<?php View::display( 'components/meta-categories' ); ?>
			<?php View::display( 'components/post-navigation' ); ?>
		<?php endif; ?>

	</div>
</footer>
