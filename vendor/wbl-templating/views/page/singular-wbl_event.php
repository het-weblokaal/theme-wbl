<?php

use ClimateCampus\App;
use function ClimateCampus\get_agenda_archive_page_slug;

the_post(); // Setup postdata (only on singular templates)

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

			<div class="page-meta page-meta--wbl_project">
				<div class="page-meta__inner">
					<?php App::display_template( 'components/meta-agenda-location' ); ?>
					<?php App::display_template( 'components/meta-agenda-date' ); ?>
					<?php App::display_template( 'components/meta-agenda-time' ); ?>
				</div>
			</div>

			<?php App::display_template( 'components/page-image' ); ?>

			<?php the_content(); ?>

			<?php App::display_template( 'components/social-media-sharing' ); ?>

			<?php App::display_template( 'components/related-entries', get_post_type(), [] ); ?>

		</div>
	</div>

</article>
