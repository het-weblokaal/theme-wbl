<?php

$categories = Theme_WBL\render_categories( [ 'sep' => '' ] );

?>

<?php if ($categories) : ?>
	<div class="meta meta--categories">
		<span class="meta__label">Onderwerpen</span>
		<span class="meta__content"><?= $categories ?></span>
	</div>
<?php endif; ?>
