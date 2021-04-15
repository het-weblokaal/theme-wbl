<?php

use ClimateCampus\App;

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
					<?php App::display_template( 'components/meta-project-tax', 'project_type' ); ?>
					<?php App::display_template( 'components/meta-project-tax', 'project_effect' ); ?>
					<?php App::display_template( 'components/meta-project-tax', 'project_location' ); ?>
					<?php App::display_template( 'components/meta-project-tax', 'project_status' ); ?>
					<?php App::display_template( 'components/meta-project-tax', 'project_audience' ); ?>
				</div>
			</div>

			<?php App::display_template( 'components/page-image' ); ?>

			<?php the_content(); ?>

			<?php App::display_template( 'components/social-media-sharing' ); ?>

			<?php App::display_template( 'components/related-entries', get_post_type(), [] ); ?>

		</div>
	</div>

</article>
