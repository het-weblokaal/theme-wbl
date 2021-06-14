<?php

namespace WBL\Theme;

?>
<div class="entry-meta">
	<?= render_entry_author( [ 'class' => 'entry-meta__author' ] ) ?>
	<?= render_entry_date( [ 'class' => 'entry-meta__date' ]) ?>
	<?= render_entry_terms( [ 'class' => 'entry-meta__category', 'taxonomy' => 'category' ] ) ?>
</div>