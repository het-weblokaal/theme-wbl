<div class="posts">
	<div class="posts__inner">

		<?php if ( have_posts() ) : ?>

			<?php while ( have_posts() ) : the_post(); ?>

				<?php \Theme_WBL\App::display( 'components/posts-post' ); ?>

			<?php endwhile; ?>

			<?php \Theme_WBL\App::display( 'components/posts-navigation' ); ?>

		<?php else : ?>

			<p><?= __('No results', 'theme-wbl') ?></p>

		<?php endif; ?>

	</div>
</div>
