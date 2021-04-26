<?php

namespace WBL\Theme;

?>
<div class="page-content">
	<div class="page-content__inner">

		<div class="page-meta">
			<div class="page-meta__inner">
				<?= render_author() ?>
				<?= render_date() ?>
				<?= render_terms( [ 'taxonomy' => 'category' ] ) ?>
			</div>
		</div>

		<?php the_content(); ?>

	</div>
</div>
