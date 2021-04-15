<?php

use WBL\Templating\Template;
use function WBL\Templating\display_extra_entry_classes;
use function WBL\Templating\get_post_type_on_archive;

$post_type_object = get_post_type_object( get_post_type() );

# Set labels
$label = $post_type_object->labels->singular_name ?? null;

?>

<article class="entry <?php display_extra_entry_classes() ?>">
	<div class="entry__inner">

		<header class="entry__header">
			<div class="meta-container">
				<span class="meta"><?= $label ?></span>
			</div>
			<h3 class="entry__title">
				<a href="<?php the_permalink() ?>"><?php the_title() ?></a>
			</h3>
		</header>

		<div class="entry__main">
			<?php the_excerpt(); ?>
		</div>

	</div>
</article>
