<?php
class ReignCommentWalker extends Walker_Comment {
    var $tree_type = 'comment';
    var $db_fields = array( 'parent' => 'comment_parent', 'id' => 'comment_ID' );

    // constructor – wrapper for the comments list
    function __construct() { ?>

<!--        <ul class="comments-list">-->

    <?php }

    // start_lvl – wrapper for child comments list
function start_lvl( &$output, $depth = 0, $args = array() ) {
    $GLOBALS['comment_depth'] = $depth + 2; ?>

    <ul class="child-comments comments-list">

<?php }

    // end_lvl – closing wrapper for child comments list
function end_lvl( &$output, $depth = 0, $args = array() ) {
    $GLOBALS['comment_depth'] = $depth + 2; ?>

    </ul>

<?php }

    // start_el – HTML for comment template
function start_el( &$output, $comment, $depth = 0, $args = array(), $id = 0 ) {
    $depth++;
    $GLOBALS['comment_depth'] = $depth;
    $GLOBALS['comment'] = $comment;
    $parent_class = ( empty( $args['has_children'] ) ? '' : 'parent' );

    if ( 'article' == $args['style'] ) {
        $tag = 'article';
        $add_below = 'comment';
    } else {
        $tag = 'article';
        $add_below = 'comment';
    } ?>

    <article <?php comment_class(empty( $args['has_children'] ) ? '' :'parent') ?> id="comment-<?php comment_ID() ?>" itemprop="comment" itemscope itemtype="http://schema.org/Comment">
        <div class="row">
            <div class="comment-author col-md-6">
                <?php echo get_avatar( $comment->user_id, 60) ?>
                <div class="comment-meta post-meta" role="complementary">
                    <h2 class="comment-author-name">
                        <a class="comment-author-link" href="<?php comment_author_url(); ?>" itemprop="author"><?php comment_author(); ?></a>
                    </h2>
                    <time class="comment-meta-item" datetime="<?php comment_date('Y-m-d') ?>T<?php comment_time('H:iP') ?>" itemprop="datePublished"><?php comment_date('jS F Y') ?>, <a href="#comment-<?php comment_ID() ?>" itemprop="url"><?php comment_time() ?></a></time>
                    <?php if ($comment->comment_approved == '0') : ?>
                        <p class="comment-meta-item">Your comment is awaiting moderation.</p>
                    <?php endif; ?>
                    <?php echo edit_comment_link('Edit Comment', '<p>', '</p>'); ?>
                </div>
            </div>

            <div class="comment-content post-content col-md-6" itemprop="text">
                <?php comment_text() ?>
                <?php comment_reply_link(array_merge( $args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
            </div>
        </div>

<?php }

    // end_el – closing HTML for comment template
function end_el(&$output, $comment, $depth = 0, $args = array() ) { ?>

    </article>

<?php }

    // destructor – closing wrapper for the comments list
    function __destruct() { ?>

<!--        </ul>-->

    <?php }

}
?>