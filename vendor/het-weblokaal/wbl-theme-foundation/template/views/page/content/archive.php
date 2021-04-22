<?php

use WBL\Theme\Template;

?>
<div class="page-content">
	<div class="page-content__inner">

		<?php the_archive_description(); ?>

		<?php Template::display( 'loop/blog' ); ?>

	</div>
</div>
