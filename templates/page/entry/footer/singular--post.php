<?php

namespace WBL\Theme;

?>
<footer class="page__footer entry__footer">

	<?php Template::display( 'components/entry-terms', null, [ 'taxonomy' => 'category', 'link' => true ] ) ?>

	<?php Template::display( 'components/entry-navigation' ) ?>

</footer>