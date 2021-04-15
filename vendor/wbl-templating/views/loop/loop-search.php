<?php

use ClimateCampus\App;
use function ClimateCampus\display_extra_loop_classes;

?>

<div class="loop <?php display_extra_loop_classes() ?>">
	<div class="loop__inner">

		<?php if ( have_posts() ) : ?>

			<?php while ( have_posts() ) : the_post(); ?>

				<?php App::display_template( 'loop/entry', 'search' ); ?>

			<?php endwhile; ?>

			<?php App::display_template( 'components/loop-navigation' ); ?>

		<?php else : ?>

			<p><?= __('Geen resultaten', 'clc') ?></p>

		<?php endif; ?>

	</div>
</div>
