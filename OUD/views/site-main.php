<?php

use Theme_WBL\App;

?>

<main class="site-main">

<?php if ( is_singular() ) { the_post(); } ?>

<?php App::display_template( 'page' ) ?>

<?php App::display_template( 'components/call-to-action' ); ?>

</main>
