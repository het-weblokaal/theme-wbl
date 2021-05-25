<?php

namespace WBL\Theme;

?>
<div class="page__content">

	<?php if (is_singular('post')) : ?>
		
		<div class="page__meta">
			<?= render_entry_author( [ 'class' => 'meta meta--author' ] ) ?>
			<?= render_entry_date( [ 'class' => 'meta meta--date' ]) ?>
			<?= render_entry_terms( [ 'class' => 'meta meta--category', 'taxonomy' => 'category' ] ) ?>
		</div>

	<?php endif; ?>

	<?php Template::display( 'components/page-image' ); ?>

	<?php the_content(); ?>

</div>
