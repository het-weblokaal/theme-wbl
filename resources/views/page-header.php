<?php

use Theme_WBL\View;

$title = Theme_WBL\get_page_title();

// Don't show when no title or landing-page
$hide_header = ( !$title || get_page_template_slug() == 'template-landing-page.php' );
?>

<?php if (! $hide_header) : ?>

<header class="page-header">
	<div class="page-header__inner">

		<h1 class="page-title page-header__title">
			<?= $title ?>
		</h1>

		<?php if (is_singular('post')) : ?>
			<div class="page-header__meta-group">
				<?php View::display( 'components/meta-author' ); ?>
				<?php View::display( 'components/meta-date' ); ?>
			</div>
		<?php endif; ?>

	</div>
</header>

<?php endif; ?>
