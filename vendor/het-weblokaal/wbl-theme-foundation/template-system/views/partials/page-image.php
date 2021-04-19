<?php

// Get featured image
$page_image = WBL\Theme\render_featured_image([ 'size' => $args['large'] ]);

?>

<?php if ($page_image) : ?>
	<div class="page-image">
		<div class="page-image__inner">
			<?= $page_image ?>
		</div>
	</div>
<?php endif; ?>
