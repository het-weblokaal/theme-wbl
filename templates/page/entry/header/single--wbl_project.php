<header class="page__header entry__header">

	<div class="page__label entry__label"><?= WBL\Theme\get_post_type_archive_link() ?></div>

	<h1 class="page__title entry__title"><?= WBL\Theme\get_page_title() ?></h1>

	<div class="page__meta entry__meta">
		<?php echo WBL\Theme\render_entry_terms( [ 'taxonomy' => 'project_category', 'link' => false, 'sep' => '' ] ); ?>
	</div>

</header>