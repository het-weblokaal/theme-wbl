<?php

use Theme_WBL\App;

$post_class = Theme_WBL\render_class( \get_post_class(), false );
$post_image = Theme_WBL\render_featured_image([ 'size' => 'thumbnail' ]);
?>

<article class="posts-post <?= $post_class ?>">

	<div class="posts-post__content-container">
		<header class="posts-post__header">
			<h2 class="posts-post__title">
				<a href="<?php the_permalink() ?>"><?php the_title() ?></a>
			</h2>
		</header>

		<?php if ($post_image) : ?>
			<div class="posts-post__image">
				<?= $post_image ?>
			</div>
		<?php endif; ?>

		<div class="posts-post__main">
			<?php the_excerpt(); ?>
		</div>
	</div>

	<div class="posts-post__meta-group">

		<?php App::display_template( 'components/meta-author' ); ?>
		<?php App::display_template( 'components/meta-date' ); ?>
		<?php App::display_template( 'components/meta-categories' ); ?>
		<?php App::display_template( 'components/meta-password-protection' ); ?>

	</div>

</article>
