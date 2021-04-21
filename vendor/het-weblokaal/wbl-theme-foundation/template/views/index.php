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

	
	<?php 

	// Display 404 template
	if (is_404()) {
		Template::display( '404' );
	}

	// Display search page template
	elseif (is_search()) {
		Template::display( 'search' );
	}

	// Display archive pages template
	elseif (is_archive() || is_home()) {
		Template::display( 'archive', get_post_type() );
	}

	// Display custom page-template
	elseif ( $page_template = get_page_template_slug() ) {

		// Strip potential .php extension from template name
		$page_template = rtrim($page_template, '.php');

		Template::display( 'singular', "template-{$page_template}" );
	}

	// Otherwise we assume single page
	else {
		Template::display( 'singular', get_post_type() );
	}

	?>

	<?php Template::display( 'components/site-debug-info' ) ?>

	<?php wp_footer(); ?>
	
</body>

</html>
