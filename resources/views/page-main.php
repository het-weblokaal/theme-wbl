<?php

use Theme_WBL\App;

?>
<div class="page-main">
	<div class="page-main__inner">

		<?php

		if (is_singular('post')) {
			App::display_template( 'components/page-image' );
		}

		// SINGULAR
		if (is_singular()) {
			the_content();
		}

		// ARCHIVE
		elseif (\is_archive() || \is_home()) {

			the_archive_description();

			App::display_template( 'components/posts-loop' );
		}

		// SEARCH
		elseif (\is_search()) {

			get_search_form();

			if (get_search_query()) {
				App::display_template( 'components/posts-loop' );
			}
		}

		// 404
		elseif (\is_404()) {
			echo apply_filters( 'the_content', Theme_WBL\Config::get('template-content', '404', 'content') );
		}

		else {
			the_content();
		}

		?>

	</div>
</div>
