<?php

$call_to_action_title = Theme_WBL\render_call_to_action_title();
$call_to_action_content = Theme_WBL\render_call_to_action_content();

?>

<aside class="call-to-action">
	<div class="call-to-action__inner">
		<h2 class="call-to-action__title"><?= $call_to_action_title ?></h2>
		<div class="call-to-action__content">
			<?= $call_to_action_content ?>
		</div>
	</div>
</aside>
