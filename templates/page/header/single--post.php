<?php

namespace WBL\Theme;

?>
<header class="page-header entry__header">

	<h1 class="page-title entry__title"><?= get_page_title() ?></h1>

	<div class="page-header__meta">

		<?php Template::display( 'components/entry-author', null, [ 'label' => 'door' ] ) ?>
		<?php Template::display( 'components/entry-date' ) ?>
	</div>

</header>