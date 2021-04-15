<?php

use WBL\Templating\Template;
use function WBL\Templating\display_extra_loop_classes;

?>

<div class="loop <?php display_extra_loop_classes() ?>">
	<div class="loop__inner">

		<?php if ( have_posts() ) : ?>

			<?php while ( have_posts() ) : the_post(); ?>

				<?php Template::display( 'loop/entry', 'search' ); ?>

			<?php endwhile; ?>

			<?php Template::display( 'components/loop-navigation' ); ?>

		<?php else : ?>

			<p><?= __('Geen resultaten', 'clc') ?></p>

		<?php endif; ?>

	</div>
</div>
