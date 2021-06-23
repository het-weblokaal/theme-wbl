<?php

namespace WBL\Theme;

?>
<header class="page-header entry__header">

	<h1 class="page-title entry__title"><?= get_page_title() ?></h1>

	<div class="page-header__meta">
		<?php echo render_entry_terms( [ 'taxonomy' => 'project_category', 'link' => true, 'sep' => '' ] ); ?>
	</div>

</header>