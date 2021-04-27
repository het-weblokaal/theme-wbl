<?php

namespace WBL\Theme;

$args = wp_parse_args($args, [
	'extra_classes' => [],
	'attr' => []
]);

?>

<article class="entry <?= html_classes($args['extra_classes']) ?>" <?= html_attributes($args['attr']) ?>>
	<div class="entry__inner">

		<div class="entry__media <?= ($media_image_class) ?>" style="<?= $featured_image_css ?>">
			<a href="<?php the_permalink() ?>" class="entry__media-link">
				<?php Template::display( 'components/meta-date' ); ?>
			</a>
		</div>

		<div class="entry__main">

			<header class="entry__header">
				<h3 class="entry__title">
					<a href="<?php the_permalink() ?>"><?php the_title() ?></a>
				</h3>
			</header>

			<div class="entry__content">
				<?php the_excerpt(); ?>
			</div>

		</div>

		<footer class="entry__footer">
			<?php Template::display( 'components/meta-author', null, [ 'link' => false ] ); ?>
			<?php Template::display( 'components/meta-categories', null, [ 'link' => false ] ); ?>
			<?php Template::display( 'components/meta-password-protection', null, [ 'link' => false ] ); ?>
		</footer>

	</div>
</article>
