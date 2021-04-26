<?php

namespace WBL\Theme;

?>
<div class="site">
	<div class="site__inner">

		<?php Template::display( 'components/page-skip-to-content' ) ?>

		<?php Template::display( 'site/header', get_template_types() ) ?>

		<?php Template::display( 'site/main', get_template_types() ) ?>

		<?php Template::display( 'site/footer', get_template_types() ) ?>

	</div>
</div>