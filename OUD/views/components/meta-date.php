<?php

$date = Theme_WBL\render_post_date();

?>

<?php if ($date) : ?>
	<div class="meta meta--date">
		<span class="meta__label">Datum</span>
		<span class="meta__content"><?= $date ?></span>
	</div>
<?php endif; ?>
