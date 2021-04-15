<?php

use WBL\Theme\Template;
use function WBL\Theme\get_featured_image_src;
use function WBL\Theme\display_extra_entry_classes;

$featured_image_src = get_featured_image_src( 'medium' );
$featured_image_css = ( $featured_image_src ) ? "background-image: url({$featured_image_src});" : '';
$media_image_class = ( !$featured_image_src ) ? 'has-no-featured-image' : '';

?>

<article class="entry <?php display_extra_entry_classes() ?>">
	<div class="entry__inner">

		<div class="entry__media <?= ($media_image_class) ?>" style="<?= $featured_image_css ?>">
			<a href="<?php the_permalink() ?>" class="entry__media-link">
			</a>
		</div>

		<div class="entry__main">

			<div class="entry__calendar">
				<?php Template::display( 'components/meta-agenda-date-calendar' ); ?>
			</div>

			<div class="entry__header-content-container">

				<header class="entry__header">
					<h3 class="entry__title">
						<a href="<?php the_permalink() ?>"><?php the_title() ?></a>
					</h3>
				</header>

				<div class="entry__content">
					<?php the_excerpt(); ?>
				</div>

			</div>

		</div>

		<footer class="entry__footer">
			<?php Template::display( 'components/meta-agenda-location' ); ?>
			<?php Template::display( 'components/meta-agenda-date' ); ?>
			<?php Template::display( 'components/meta-agenda-time' ); ?>
		</footer>

	</div>
</article>
