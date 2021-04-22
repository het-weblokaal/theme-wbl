<?php

namespace WBL\Theme;

?>
<div class="site">
	<div class="site__inner">

		<?php Template::display( 'components/site-skip-to-content' ) ?>

		<?php Template::display( 'site/main', get_template_mod() ) ?>

	</div>
</div>