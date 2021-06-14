<?php

namespace WBL\Theme;

?>
<footer class="page__footer">

	<
	<?= render_entry_terms( [ 'class' => 'entry-meta__category', 'taxonomy' => 'category' ] ) ?>

	<?php Template::display( 'components/entry-navigation' ) ?>

</footer>