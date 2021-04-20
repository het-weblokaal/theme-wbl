<?php 

namespace WBL\Theme;

?>

<?php if ( have_posts() ) : ?>

<div class="loop loop--archive <?php display_extra_loop_classes() ?>">
	<div class="loop__inner">

		<?php while ( have_posts() ) : the_post(); ?>

		<?php Template::display( 'entry/blog' ); ?>

		<?php endwhile; ?>

	</div>
</div>

<?php Template::display( 'nav/loop-navigation', get_post_type() ); ?>

<?php else : ?>

<h3 style="text-align:center;"><?= __('Geen resultaten', 'clc') ?></h3>

<?php endif; ?>
