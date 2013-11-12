<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains comments and the comment form.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

/*
 * If the current post is protected by a password and the visitor has not yet
 * entered the password we will return early without loading the comments.
 */
if ( post_password_required() )
	return;
?>

<div id="comments" class="comments-area">

	<?php if ( have_comments() ) : ?>
		<h2 class="comments-title">
			<?php
				printf( _nx( 'Athugasemd varðandi &ldquo;%2$s&rdquo;', '%1$s athugasemdir varðandi &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', 'gardyrkja' ),
					number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );
			?>
		</h2>
		<ul class="comment-list">
			<?php
				wp_list_comments( array(
					'style'       => 'ul',
					'short_ping'  => false,
					'avatar_size' => 0,
				) );
			?>
		</ul><!-- .comment-list -->

		<?php
			// Are there comments to navigate through?
			if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
		?>
		<nav class="navigation comment-navigation" role="navigation">
			<h1 class="screen-reader-text section-heading"><?php _e( 'Comment navigation', 'twentythirteen' ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'twentythirteen' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'twentythirteen' ) ); ?></div>
		</nav><!-- .comment-navigation -->
		<?php endif; // Check for comment navigation ?>

		<?php if ( ! comments_open() && get_comments_number() ) : ?>
		<p class="no-comments"><?php _e( 'Comments are closed.' , 'twentythirteen' ); ?></p>
		<?php endif; ?>

	<?php endif; // have_comments() ?>

	<?php 
		$args = array(
			'id_form'           	=> 'commentform',
			'id_submit'         	=> 'submit',
			'title_reply'       	=> __( 'Leave a Reply' ),
			'title_reply_to'    	=> __( 'Leave a Reply to %s' ),
			'cancel_reply_link' 	=> __( 'Cancel Reply' ),
			'label_submit'      	=> __( 'Skrá athugasemd' ),
			'comment_field'			=>  '<p>Hér getur þú bætt við athugasemd fyrir þessa fundargerð</p><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea>',
			'logged_in_as'			=> '',
			'comment_notes_before' 	=>	'',
			'comment_notes_after'	=> ''

		);

		comment_form($args); 

	?>

</div><!-- #comments -->