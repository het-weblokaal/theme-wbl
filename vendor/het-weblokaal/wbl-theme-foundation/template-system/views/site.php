<?php

use WBL\Theme\Template;

use function WBL\Theme\display_html_attributes;
use function WBL\Theme\display_body_classes;

?>
<!doctype html>
<html <?php display_html_attributes(); ?>>

<head>
	<?php wp_head(); ?>
</head>

<body class="site <?php display_body_classes(); ?>">
	<div class="site__inner">

<?php Template::display( 'site-header' ) ?>

<?php Template::display( 'site-main' ) ?>

<?php Template::display( 'site-footer' ) ?>

	</div>

	<?php Template::display( 'components/site-debug-info' ) ?>

	<?php wp_footer(); ?>
</body>

</html>
