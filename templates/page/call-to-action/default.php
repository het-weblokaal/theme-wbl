<?php

namespace WBL\Theme;

$call_to_action_title = render_call_to_action_title();
$call_to_action_content = render_call_to_action_content();

?>
<aside class="page__call-to-action call-to-action has-secondary-background-color has-primary-color">
	<div class="call-to-action__inner">
		<h2 class="call-to-action__title"><?= $call_to_action_title ?></h2>
		<div class="call-to-action__content">
			<?= $call_to_action_content ?>
		</div>
	</div>
</aside>