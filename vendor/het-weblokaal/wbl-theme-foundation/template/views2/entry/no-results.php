<?php

namespace WBL\Theme;

$args = wp_parse_args($args, [
	'extra_classes' => ['entry--no-results'],
	'attr' => []
]);

?>

<article class="entry  <?= html_classes($args['extra_classes']) ?>" <?= html_attributes($args['attr']) ?>>
	<div class="entry__inner">

		<header class="entry__header">			
			<h3 class="entry__title">
				Geen resultaten
			</h3>
		</header>

		<div class="entry__main">
			<p>Geen resultaten...</p>
		</div>

	</div>
</article>
