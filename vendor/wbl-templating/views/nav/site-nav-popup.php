<?php

use WBL\Templating\Template;
use function WBL\Templating\get_header_option;

$extra_content = get_header_option( 'extra_content');

remove_filter( 'the_content', 'wpautop' );
$extra_content = apply_filters( 'the_content', $extra_content );
add_filter( 'the_content', 'wpautop' );

?>
<div class="site-nav-popup">
	<div class="site-nav-popup__inner">

		<?php Template::display( 'components/site-nav-primary' ) ?>

		<?php Template::display( 'components/site-nav-secondary' ) ?>

		<div class="site-nav-popup__extra-content">
			<?= $extra_content ?>
		</div>

	</div>
</div>
