<?php

$status_render = WBL\Templating\render_password_protection_status();

?>

<?php if ($status_render) : ?>
	<div class="meta meta--password-protection-status">
		<span class="meta__label">Password Protection</span>
		<span class="meta__content"><?= $status_render ?></span>
	</div>
<?php endif; ?>
