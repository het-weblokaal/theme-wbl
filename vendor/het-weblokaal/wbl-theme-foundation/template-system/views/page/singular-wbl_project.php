<?php

use WBL\Theme\Template;

the_post(); // Setup postdata (only on singular templates)

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

			<div class="page-meta page-meta--wbl_project">
				<div class="page-meta__inner">
					<?php Template::display( 'components/meta-project-tax', 'project_type' ); ?>
					<?php Template::display( 'components/meta-project-tax', 'project_effect' ); ?>
					<?php Template::display( 'components/meta-project-tax', 'project_location' ); ?>
					<?php Template::display( 'components/meta-project-tax', 'project_status' ); ?>
					<?php Template::display( 'components/meta-project-tax', 'project_audience' ); ?>
				</div>
			</div>

			<?php Template::display( 'components/page-image' ); ?>

			<?php the_content(); ?>

			<?php Template::display( 'components/social-media-sharing' ); ?>

			<?php Template::display( 'components/related-entries', get_post_type(), [] ); ?>

		</div>
	</div>

</article>
