<li class="comment">

	<header class="comment__meta-group">

		<div class="comment__author meta"><?php echo get_comment_author_link() ?></div>

		<div class="comment__date meta">
			&nbsp;op <a href="<?= get_comment_link() ?>"><?= Theme_WBL\render_comment_date() ?></a>
		</div>

		<?php if ($edit_comment_link = get_edit_comment_link()) : ?>

			<div class="comment__edit meta">
				<a rel="nofollow" href="<?= $edit_comment_link ?>">Reactie bewerken</a>
			</div>

		<?php endif; ?>

		<?php /* <div class="comment__reply meta"><?= Theme_WBL\render_reply_link() ?></div> */ ?>

	</header>

	<div class="comment__content">

		<?php if ( ! Theme_WBL\is_approved_comment() ) : ?>

			<p class="comment__moderation">
				<?php esc_html_e( 'Your comment is awaiting moderation.', 'theme-wbl' ) ?>
			</p>

		<?php endif ?>

		<?php comment_text() ?>
	</div>

<?php /* No closing </li> is needed.  WordPress will know where to add it. */ ?>
