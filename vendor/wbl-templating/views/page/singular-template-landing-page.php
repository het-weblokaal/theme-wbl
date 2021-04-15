<?php

use ClimateCampus\App;

the_post(); // Setup postdata (only on singular templates)

?>
<article class="page">

	<div class="page-main">
		<div class="page-main__inner">

			<?php App::display_template( 'components/page-image' ); ?>

			<?php the_content(); ?>

			<?php App::display_template( 'components/social-media-sharing' ); ?>

		</div>
	</div>

</article>
