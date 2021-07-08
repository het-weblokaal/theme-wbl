<?php

namespace WBL\Theme;

?>

<article class="loop__entry entry entry--blog entry--<?= get_post_type() ?> <?= html_classes($args['extra_classes']) ?>" <?= html_attributes($args['attr']) ?>>

	<header class="entry__header">			
		<h3 class="entry__title">
			<a href="<?php the_permalink() ?>"><?php the_title() ?></a>
		</h3>
	</header>

	<div class="entry__image">
		<?= render_featured_image([ 'size' => 'large' ]) ?>
	</div>

	<div class="entry__main">
		<?php the_excerpt(); ?>
	</div>

	<footer class="entry__footer">
		<?= get_post_type() ?>
		<?= render_entry_password_protection_status() ?>
	</footer>

</article>
