<?php

namespace WBL\Theme;

$call_to_action_title = render_call_to_action_title();
$call_to_action_content = render_call_to_action_content();

?>
<aside class="page__call-to-action call-to-action has-secondary-background-color has-primary-color">
	<h2><?= $call_to_action_title ?></h2>
	<?= $call_to_action_content ?>
</aside>