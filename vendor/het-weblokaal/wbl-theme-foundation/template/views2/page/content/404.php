<?php

namespace WBL\Theme;

?>
<div class="page-content">
	<div class="page-content__inner">

		<p>Pagina niet gevonden</p>

		<?php 
			Template::display( 'loop/blog', null, [ 'query' => [
				'post_type' => 'page'
			]]); 
		?>
		<hr>
		<?php
			Template::display( 'loop/blog', null, [ 'query' => [
				'post_type' => 'post'
			]]); 
		?>

	</div>
</div>
