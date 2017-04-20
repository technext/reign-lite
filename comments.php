<?php
/**
 * The template for displaying comments
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package WordPress
 * @subpackage reign
 * @since Re!gn 1.0
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
    return;
}

$number_of_comments = get_comments_number();
?>

<div id="comments" class="comments-area">

    <?php if ( have_comments() ) : ?>
        <h4 class="comments-title">
            <?php echo get_comments_number().' Comments' ?>
        </h4>

        <ul class="comment-list">
            <?php
            wp_list_comments( array(
                'walker'      => new ReignCommentWalker(),
                'style'       => '',
                'short_ping'  => true,
                'avatar_size' => 60,
                'reply_to_title' => ''
            ) );
            ?>
        </ul><!-- .comment-list -->
<!--        --><?php //reign_comment_nav(); ?>

    <?php endif; // have_comments() ?>

    <?php
    // If comments are closed and there are comments, let's leave a little note, shall we?
    if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
        ?>
        <p class="no-comments"><?php _e( 'Comments are closed.', 'reign-light' ); ?></p>
    <?php endif; ?>
    <div class="row">
        <?php
        $commenter = wp_get_current_commenter();
        $req = get_option( 'require_name_email' );
        $aria_req = ( $req ? " aria-required='true'" : '' );
        comment_form(array(
            'fields'            => array(
                'author'            => '<p class="comment-form-author">' . '<input placeholder="Name '.( $req ? '*' : '' ).'" id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></p>',
                'email'            => '<p class="comment-form-email">' . '<input placeholder="Email '.( $req ? '*' : '' ).'" id="email" name="email" type="text" value="' . esc_attr( isset($commenter['comment_email']) ? $commenter['comment_email'] : '' ) . '" size="30"' . $aria_req . ' /></p>',
            ),
            'title_reply'       => __('', 'reign-light'),
            'title_reply_to'    => __('', 'reign-light'),
            'class_submit'      => 'submit btn btn-dark',
            'label_submit'      => __('Post a comment', 'reign-light'),
            'comment_field'     =>  '<p class="comment-form-comment">'.get_avatar(get_current_user_id(), 60).'<input id="comment" name="comment" cols="45" rows="1" aria-required="true" placeholder="Share Your Thoughts">' .
                '</p>',
        )); ?>
<!--        --><?php //comment_form(); ?>
        <div class="clear-fix"></div>
    </div>
    <div class="clear-fix"></div>
</div><!-- .comments-area -->
