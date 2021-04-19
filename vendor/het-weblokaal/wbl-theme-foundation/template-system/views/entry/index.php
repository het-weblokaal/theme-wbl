<?php

use WBL\Theme\Template;
use function WBL\Theme\display_extra_entry_classes;

?>

<article class="entry <?php display_extra_entry_classes() ?>">
	<div class="entry__inner">

		<header class="entry__header">
			<h3 class="entry__title">
				<a href="<?php the_permalink() ?>"><?php the_title() ?></a>
			</h3>
		</header>

		<div class="entry__main">
			<?php the_excerpt(); ?>
		</div>

	</div>
</article>
