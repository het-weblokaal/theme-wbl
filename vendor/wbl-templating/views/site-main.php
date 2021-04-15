<?php

use ClimateCampus\App;

?>

<main class="site-main">

<?php

	// Display 404 template
	if (is_404()) {
		App::display_template( 'page/404' );
	}

	// Display search page template
	elseif (is_search()) {
		App::display_template( 'page/search' );
	}

	// Display archive pages template
	elseif (is_archive() || is_home()) {
		App::display_template( 'page/archive', get_post_type() );
	}

	// Display custom page-template
	elseif ( $page_template = get_page_template_slug() ) {

		// Strip potential .php extension from template name
		$page_template = rtrim($page_template, '.php');

		App::display_template( 'page/singular', "template-{$page_template}" );
	}

	// Otherwise we assume single page
	else {
		App::display_template( 'page/singular', get_post_type() );
	}

?>

</main>
