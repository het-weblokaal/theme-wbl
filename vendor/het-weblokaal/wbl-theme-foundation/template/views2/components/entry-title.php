<?php 
namespace WBL\Theme; 

extract( wp_parse_args($args, [
	'tag' => 'h2'
]) );
?>
<<?= $tag ?> class="entry-title">
	<?= get_the_title() ?>
</h2>
