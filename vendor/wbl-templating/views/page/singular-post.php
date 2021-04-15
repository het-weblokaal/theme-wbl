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

			<div class="page-meta">
				<div class="page-meta__inner">
					<?php App::display_template( 'components/meta-date', null, [ 'link' => false ] ); ?>
					<?php App::display_template( 'components/meta-author', null, [ 'link' => false ]  ); ?>
					<?php App::display_template( 'components/meta-categories' ); ?>
				</div>
			</div>

			<?php App::display_template( 'components/page-image' ); ?>

			<?php the_content(); ?>

			<?php App::display_template( 'components/social-media-sharing' ); ?>

			<?php App::display_template( 'components/related-entries', get_post_type(), [] ); ?>

		</div>
	</div>

</article>
