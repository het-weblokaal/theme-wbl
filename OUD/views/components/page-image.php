<?php

// Get featured image
$page_image = Theme_WBL\render_featured_image([ 'size' => $args['large'] ]);

?>

<?php if ($page_image) : ?>
	<div class="page-image">
		<div class="page-image__inner">
			<?= $page_image ?>
		</div>
	</div>
<?php endif; ?>
