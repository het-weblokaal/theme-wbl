<?php

namespace WBL\Theme;

?>
<div class="page-content">
	<div class="page-content__inner">

		<div class="page-meta">
			<div class="page-meta__inner">
				<?php Template::display( 'meta/date', get_post_type(), [ 'link' => false ] ); ?>
				<?php Template::display( 'meta/author', get_post_type(), [ 'link' => false ]  ); ?>
				<?php Template::display( 'meta/categories' ), get_post_type(); ?>
			</div>
		</div>

		<?php Template::display( 'components/page-image' ); ?>

		<?php the_content(); ?>

		<?php Template::display( 'components/social-media-sharing' ); ?>

		<?php Template::display( 'components/related', get_post_type(), [] ); ?>

	</div>
</div>
