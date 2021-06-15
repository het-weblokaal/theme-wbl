<?php

namespace WBL\Theme;

?>
<div class="page-content archive__content">

	<?php the_archive_description('<p class="archive-description">', '</p>'); ?>

	<?php Template::display( 'loop/blog' ); ?>

</div>