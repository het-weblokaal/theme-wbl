<?php

use ClimateCampus\App;
use function ClimateCampus\get_post_type_on_archive;

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

			<?php the_archive_description(); ?>

			<?php App::display_template( 'loop/loop', get_post_type_on_archive() ); ?>

		</div>
	</div>

</article>
