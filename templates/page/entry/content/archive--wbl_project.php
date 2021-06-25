<?php

namespace WBL\Theme;

?>
<div class="page__content entry__content">

	<?php the_archive_description('<p class="archive-description">', '</p>'); ?>

	<?php Template::display( 'loop/grid' ); ?>

</div>