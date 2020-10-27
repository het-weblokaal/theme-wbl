<?php

use Theme_WBL\View;

?>

<main class="site-main">

<?php if ( is_singular() ) { the_post(); } ?>

<?php View::display( 'page' ) ?>

<?php View::display( 'components/call-to-action' ); ?>

</main>
