<?php

use WBL\Theme\Template;

the_post(); // Setup postdata (only on singular templates)

?>
<article class="page">

	<div class="page-main">
		<div class="page-main__inner">

			<?php Template::display( 'components/page-image' ); ?>

			<?php the_content(); ?>

			<?php Template::display( 'components/social-media-sharing' ); ?>

		</div>
	</div>

</article>
