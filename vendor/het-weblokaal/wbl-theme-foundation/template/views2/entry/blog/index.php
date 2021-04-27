<?php

namespace WBL\Theme;

$args = wp_parse_args($args, [
	'extra_classes' => [],
	'attr' => []
]);

?>

<article class="entry <?= html_classes($args['extra_classes']) ?>" <?= html_attributes($args['attr']) ?>>
	<div class="entry__inner">

		<header class="entry__header">			
			<h3 class="entry__title">
				<a href="<?php the_permalink() ?>"><?php the_title() ?></a>
			</h3>
		</header>

		<div class="entry__main">
			<?php the_excerpt(); ?>
		</div>

		<footer class="entry__footer">
			<?= get_post_type() ?>
		</footer>
	</div>
</article>
