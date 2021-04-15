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
				<?php if ( !$featured_image_src ) : ?>
					<?php the_excerpt(); ?>
				<?php endif; ?>
			</a>
			<?php Template::display( 'components/meta-project-tax', 'project_type', [ 'link' => false ] ); ?>
		</div>

		<div class="entry__main">

			<header class="entry__header">
				<h3 class="entry__title">
					<a href="<?php the_permalink() ?>"><?php the_title() ?></a>
				</h3>
			</header>

		</div>

		<footer class="entry__footer">
			<?php Template::display( 'components/meta-project-tax', 'project_effect', [ 'link' => false ] ); ?>
			<?php Template::display( 'components/meta-project-tax', 'project_location', [ 'link' => false ] ); ?>
			<?php Template::display( 'components/meta-project-tax', 'project_audience', [ 'link' => false ] ); ?>
		</footer>

	</div>
</article>
