<?php

if ( post_password_required() || ( ! have_comments() && ! comments_open() && ! pings_open() ) ) {
	return;
}

if (! is_singular('post')) {
	return;
}
?>

<section class="page-comments">
	<div class="page-comments__inner">

		<h2 class="page-comments__title">Reacties</h2>

		<div id="comments" class="comments">

			<?php if ( have_comments() ) : ?>

				<?php //Hybrid\render_view( 'partials', 'pagination-comments' ) ?>

				<ul class="comments__list">

					<?php wp_list_comments( [
						'callback' => function( $comment, $args, $depth ) {
							Theme_WBL\App::display( 'components/comment', null, compact( 'comment', 'args', 'depth' ) );
						}
					] ) ?>

				</ul>

			<?php else : ?>

				<p>Nog geen reacties</p>

			<?php endif ?>

			<?php if ( ! comments_open() ) : ?>

				<p class="comments__closed">
					<?php esc_html_e( 'Comments are closed.' ) ?>
				</p>

			<?php endif ?>

		</div>

		<?php comment_form( [
				// 'cancel_reply_link' => '<span class="icon icon-remove"></span>',
				// 'cancel_reply_before' => '',
				// 'cancel_reply_after' => '',
				// 'comment_notes_before' => '',
				// 'comment_notes_after' => '',
			] ); // Loads the comment form. ?>

	</div>
</section>
