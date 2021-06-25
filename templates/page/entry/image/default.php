<?php

namespace WBL\Theme;

// Get featured image
$page_image = render_featured_image([ 'size' => 'max' ]);

if (! $page_image) {
	return;
}
?>
<div class="page__image entry__image">
	<?= $page_image ?>
</div>
