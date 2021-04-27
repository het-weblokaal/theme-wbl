<?php

namespace WBL\Theme;

?>
<div class="page-content">
	<div class="page-content__inner">

		<div class="page-meta">
			<div class="page-meta__inner">
				<?= render_entry_author( [ 'class' => 'page-meta__author meta meta--author' ] ) ?>
				<?= render_entry_date( [ 'class' => 'page-meta__date meta meta--date' ]) ?>
				<?= render_entry_terms( [ 'class' => 'page-meta__category meta meta--category', 'taxonomy' => 'category' ] ) ?>
			</div>
		</div>

		<?php the_content(); ?>

	</div>
</div>
