<?php
/**
 * @author  Rainbow-Themes
 * @since   1.0
 * @version 1.0
 * @package inbio
 */

?>

<?php $tag = ('div' === $args['style']) ? 'div' : 'li'; ?>
<<?php echo esc_html($tag); ?> id="comment-<?php comment_ID(); ?>" <?php comment_class($args['has_children'] ? 'parent main-comments' : 'main-comments', $comment); ?>>
<div id="respond-<?php comment_ID(); ?>" class="each-comment">
    <?php if (get_option('show_avatars')): ?>
        <div class="pull-left imgholder">
            <?php if (0 != $args['avatar_size']) echo get_avatar($comment, $args['avatar_size'], "", false, array('class' => 'media-object')); ?>
        </div>
    <?php endif; ?>

    <div class="media-body comments-body">
        <h3 class="comment-meta clearfix">
			<span class="comment-meta-left">
				<?php echo get_comment_author_link($comment); ?>,
				<span class="comment-meta-datetitme"><?php printf('%1$s @ %2$s', get_comment_date('', $comment), get_comment_time()); ?></span></span>
            <?php
            comment_reply_link(
                array_merge($args, array(
                    'add_below' => 'respond',
                    'depth' => $depth,
                    'max_depth' => $args['max_depth'],
                    'before' => '<span class="comments-reply-btn">',
                    'after' => '</span>'
                ))
            );
            ?>
        </h3>
        <div class="comment-text">
            <?php if ('0' == $comment->comment_approved) : ?>
                <p class="comment-awaiting-moderation"><?php esc_html_e('Your comment is awaiting moderation.', 'inbio'); ?></p>
            <?php endif; ?>
            <?php comment_text(); ?>
        </div>
    </div>
    <div class="clear"></div>
</div>