<?php

namespace WBL\Theme;
use function WBL\Theme\get_post_type_on_archive;

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

			<?php the_archive_description(); ?>

			<?php Template::display( 'loop/loop', get_post_type_on_archive() ); ?>

		</div>
	</div>

</article>
