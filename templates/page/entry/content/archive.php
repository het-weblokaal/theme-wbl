<?php

namespace WBL\Theme;

?>
<div class="page__content entry__content">

	<?php echo apply_filters( 'the_content', get_the_archive_description() ); ?>

	<?php Template::display( 'loop/blog' ); ?>

</div>