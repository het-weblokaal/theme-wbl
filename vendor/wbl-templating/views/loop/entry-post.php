<?php

use ClimateCampus\App;
use function ClimateCampus\get_featured_image_src;
use function ClimateCampus\display_extra_entry_classes;

$featured_image_src = get_featured_image_src( 'medium' );
$featured_image_css = ( $featured_image_src ) ? "background-image: url({$featured_image_src});" : '';
$media_image_class = ( !$featured_image_src ) ? 'has-no-featured-image' : '';

?>

<article class="entry <?php display_extra_entry_classes() ?>">
	<div class="entry__inner">

		<div class="entry__media <?= ($media_image_class) ?>" style="<?= $featured_image_css ?>">
			<a href="<?php the_permalink() ?>" class="entry__media-link">
				<?php App::display_template( 'components/meta-date' ); ?>
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
			<?php App::display_template( 'components/meta-author', null, [ 'link' => false ] ); ?>
			<?php App::display_template( 'components/meta-categories', null, [ 'link' => false ] ); ?>
			<?php App::display_template( 'components/meta-password-protection', null, [ 'link' => false ] ); ?>
		</footer>

	</div>
</article>
