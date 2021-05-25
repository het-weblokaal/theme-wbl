<?php

namespace WBL\Theme;

?>
<div class="page__footer">
	
	<?php if (is_singular('post')) : ?>
		<?php View::display( 'components/meta-categories' ); ?>
		<?php View::display( 'components/post-navigation' ); ?>
	<?php endif; ?>

</div>

	