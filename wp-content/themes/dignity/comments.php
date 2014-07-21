<?php
if ( post_password_required() )
	return;
?>

<div class="comments-section">
	<?php if ( have_comments() ) : ?>
		<h2 class="blog-caps">
			<?php
				printf( _nx( 'One thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', 'twentythirteen' ),
					number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );
			?>
		</h2>

		<div class="comments">
			<ul class="commentlists">
			<?php
				$args = array(
					'walker'            => null,
					'max_depth'         => '',
					'style'             => 'ul',
					'callback'          => 'format_comments',
					'end-callback'      => null,
					'type'              => 'all',
					'reply_text'        => 'Reply',
					'page'              => '',
					'per_page'          => '',
					'avatar_size'       => 32,
					'reverse_top_level' => null,
					'reverse_children'  => '',
					'format'            => 'xhtml', //or html5 @since 3.6
					'short_ping'        => false // @since 3.6
				);			
				wp_list_comments($args); 
			?>
		</ul><!-- .comment-list -->
        </div>
		<?php
			// Are there comments to navigate through?
			if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
		?>
		<nav class="navigation comment-navigation" role="navigation">
			<h1 class="screen-reader-text section-heading"><?php _e( 'Comment navigation', 'dignitylang' ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'dignitylang' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'dignitylang' ) ); ?></div>
		</nav><!-- .comment-navigation -->
		<?php endif; // Check for comment navigation ?>

		<?php if ( ! comments_open() && get_comments_number() ) : ?>
		<p class="no-comments"><?php _e( 'Comments are closed.' , 'dignitylang' ); ?></p>
		<?php endif; ?>

	<?php endif; // have_comments() ?>


</div><!-- #comments -->
<div class="respond">

	<?php 	
	$commenter = wp_get_current_commenter();
	$args = array( 'fields' => apply_filters( 'comment_form_default_fields', 

		array(
		'author' => '<div class="comment-input"><div class="control-group"><label for="input-name" class="control-label">' . __( 'Name:' ,'dignitylang') . '</label>' .
					'     <div class="control"><div class="input-border"><input class="textbox" id="author" name="author" type="text" value="' .esc_attr( $commenter['comment_author'] ) . '"  /></div></div></div>',

		'email'  => '<div class="control-group"><label for="input-name" class="control-label">' . __( 'Email:','dignitylang' ) . '</label> ' .
					'<div class="control"><div class="input-border"><input id="email" class="textbox" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" /></div></div></div>',
		'url'    => '<div class="control-group"><label for="input-name" class="control-label">' . __( 'Website:','dignitylang' ) . '</label>' .
					'<div class="control"><div class="input-border"><input id="url" class="textbox" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" /></div></div></div></div>' ) ),
		'comment_field' =>'<div class="comment-text"><label for="text-comment" class="control-label">' . __( 'Comment:','dignitylang') . '</label><div class="control">
													<div class="input-border"><textarea id="comment" class="textbox" name="comment" cols="45" rows="10" tabindex="4" aria-required="true"></textarea></div></div></div>',
		'must_log_in' => '<p class="must-log-in">' .  sprintf( __( 'You must be logged in to post a comment.' ,'dignitylang') ) . '</p>',
		'logged_in_as' => '<p class="logged-in-as">' . sprintf( __( 'Logged in as <a href="%s">%s</a>.</p>','dignitylang' ), admin_url( 'profile.php' ), $user_identity ),
		'comment_notes_before' => '',
		'comment_notes_after' => '',
		'id_form' => 'comments-form',
		'class_form' => 'commentform',
		'id_submit' => 'post-comment',
		'title_reply' => __( 'Leave a reply' ,'dignitylang'),
		'title_reply_to' => __( 'Leave a reply to %s' ,'dignitylang'),
		'cancel_reply_link' => __( 'Cancel reply' ,'dignitylang'),
		'label_submit' => __( 'Post Comment' ,'dignitylang'),
	);
	comment_form($args);?>


</div>