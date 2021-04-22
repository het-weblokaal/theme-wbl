<?php

namespace WBL\Theme;

?>
<main class="site-main" id="main">

	<?php the_post(); // Setup postdata (only on singular templates) ?>

	<?php Template::display( 'template/page', get_template_mod() ) ?>

</main>
