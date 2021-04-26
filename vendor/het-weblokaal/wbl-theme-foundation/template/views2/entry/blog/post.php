<?php

namespace WBL\Theme;

?>

<article class="entry <?php display_extra_entry_classes() ?>">
	<div class="entry__inner">

		<header class="entry__header">			
			<h3 class="entry__title">
				<a href="<?php the_permalink() ?>"><?php the_title() ?></a>
			</h3>
		</header>

		<div class="entry__image">
			<?= render_featured_image([ 'size' => $args['large'] ]) ?>
		</div>

		<div class="entry__main">
			<?php the_excerpt(); ?>
		</div>

		<footer class="entry__footer">
			<?= render_author() ?>
			<?= render_date() ?>
			<?= render_terms( [ 'taxonomy' => 'category' ] ) ?>
			<?= render_password_protection_status() ?>
		</footer>

	</div>
</article>
