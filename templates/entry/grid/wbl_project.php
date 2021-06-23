<?php

namespace WBL\Theme;

?>

<article class="entry entry--<?= get_post_type() ?>">

	<div class="entry__image">
		<?= the_post_thumbnail( 'thumbnail') ?>
	</div>

	<header class="entry__header">			
		<h3 class="entry__title">
			<a href="<?php the_permalink() ?>"><?php the_title() ?></a>
		</h3>
	</header>

	<footer class="entry__footer">

		<div class="entry__categories">

			<?php echo render_entry_terms( [ 'taxonomy' => 'project_category' ] ); ?>

		</div>

	</footer>

</article>
