<?php

use ClimateCampus\App;

?>
<article class="page">

	<header class="page-header">
		<div class="page-header__inner">

			<?php App::display_template( 'components/page-breadcrumbs' ) ?>

			<?php App::display_template( 'components/page-title' ) ?>

		</div>
	</header>

	<div class="page-main">
		<div class="page-main__inner">

			<?php

			get_search_form();

			if (get_search_query()) {
				App::display_template( 'loop/loop', 'search' );
			}

			?>

		</div>
	</div>

</article>
