<?php

use WBL\Templating\Template;

?>

<main class="site-main">

<?php

	// Display 404 template
	if (is_404()) {
		Template::display( 'page/404' );
	}

	// Display search page template
	elseif (is_search()) {
		Template::display( 'page/search' );
	}

	// Display archive pages template
	elseif (is_archive() || is_home()) {
		Template::display( 'page/archive', get_post_type() );
	}

	// Display custom page-template
	elseif ( $page_template = get_page_template_slug() ) {

		// Strip potential .php extension from template name
		$page_template = rtrim($page_template, '.php');

		Template::display( 'page/singular', "template-{$page_template}" );
	}

	// Otherwise we assume single page
	else {
		Template::display( 'page/singular', get_post_type() );
	}

?>

</main>
