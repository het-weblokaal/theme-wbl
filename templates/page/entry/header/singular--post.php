<header class="page__header entry__header">

	<div class="page__label entry__label"><?= WBL\Theme\get_post_type_archive_link() ?></div>

	<h1 class="page__title entry__title"><?= get_the_title() ?></h1>

	<div class="page__meta entry__meta">

		<?php WBL\Theme\Template::display( 'components/entry-author', null, [ 'label' => 'door' ] ) ?>
		<?php WBL\Theme\Template::display( 'components/entry-date' ) ?>
	</div>

</header>