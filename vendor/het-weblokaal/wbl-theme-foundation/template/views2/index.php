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

	<?php Template::display( 'template/' . get_template_type(), get_template_mod() ); ?>
	
	<?php Template::display( 'components/site-debug-info' ) ?>

	<?php wp_footer(); ?>
	
</body>

</html>
