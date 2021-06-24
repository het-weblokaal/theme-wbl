<?php

namespace WBL\Theme;

?>
<article class="page entry entry--<?= get_post_type()?> <?= html_classes( $args['extra_classes'] ) ?>" <?= html_attributes($args['attr']) ?>>

	<?php

	// Get featured image
	$page_image = render_featured_image([ 'size' => 'max' ]);

	?>

	<?php if ($page_image) : ?>
		<div class="page-image">
			<?= $page_image ?>
		</div>
	<?php endif; ?>

	<?php Template::display( 'page/header' ); ?>

	<?php Template::display( 'page/content' ); ?>

	<?php Template::display( 'page/footer' ); ?>

</article>
