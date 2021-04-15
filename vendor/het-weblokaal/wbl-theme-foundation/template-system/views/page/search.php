<?php

use WBL\Theme\Template;

?>
<article class="page">

	<header class="page-header">
		<div class="page-header__inner">

			<?php Template::display( 'components/page-breadcrumbs' ) ?>

			<?php Template::display( 'components/page-title' ) ?>

		</div>
	</header>

	<div class="page-main">
		<div class="page-main__inner">

			<?php

			get_search_form();

			if (get_search_query()) {
				Template::display( 'loop/loop', 'search' );
			}

			?>

		</div>
	</div>

</article>
