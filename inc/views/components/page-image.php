<?php

namespace WBL\Theme;

if ( ! has_post_thumbnail() ) {
	return;
}

?>
<div class="page-image">

	<?php the_post_thumbnail('large') ?>

</div>
