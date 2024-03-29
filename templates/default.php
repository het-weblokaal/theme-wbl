<?php

namespace WBL\Theme;

?>
<!doctype html>
<html <?php display_html_attributes(); ?>>

<head>
	<?php wp_head(); ?>
</head>

<body class="<?php display_body_classes(); ?>">

	<?php wp_body_open() ?>

	<div class="site <?= html_classes( $args['extra_classes'] ) ?>" <?= html_attributes($args['attr']) ?>>
		<div class="site__inner">

			<?php Template::display( 'components/skip-to-content' ) ?>

			<?php Template::display( 'site/header' ) ?>

			<?php Template::display( 'site/main' ) ?>

			<?php Template::display( 'site/footer' ) ?>

			<?php Template::display( 'components/site-debug-info' ) ?>

		</div>
	</div>

	<?php wp_footer(); ?>
	
</body>

</html>