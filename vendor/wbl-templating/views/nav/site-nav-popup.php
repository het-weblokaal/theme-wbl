<?php

use ClimateCampus\App;
use function ClimateCampus\get_header_option;

$extra_content = get_header_option( 'extra_content');

remove_filter( 'the_content', 'wpautop' );
$extra_content = apply_filters( 'the_content', $extra_content );
add_filter( 'the_content', 'wpautop' );

?>
<div class="site-nav-popup">
	<div class="site-nav-popup__inner">

		<?php App::display_template( 'components/site-nav-primary' ) ?>

		<?php App::display_template( 'components/site-nav-secondary' ) ?>

		<div class="site-nav-popup__extra-content">
			<?= $extra_content ?>
		</div>

	</div>
</div>
