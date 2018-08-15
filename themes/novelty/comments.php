<?php

if ( post_password_required() )
    return;
?>

<?php if ( have_comments() || comments_open() ) : ?>

<div class="comments-area">

    <h2 class="perfect-form-title"><?php _ex('Comments', 'single post', 'novelty'); ?>  <span>(<?php echo get_comments_number(); ?>)</span></h2>

    <?php

    $user = wp_get_current_user();
    $user_identity = $user->exists() ? $user->display_name : '';

    comment_form(array(
        'fields'               => array(
                                      'author' => '<input type="text" name="author" class="perfect-line"><span>'._x('Name','comments','novelty').'</span>',
                                      'email'  => '<input type="text" name="email" class="perfect-line"><span>'._x('E-mail','comments','novelty').'</span>',
                                      'url'    => '<input type="text" name="url" class="perfect-line"><span>'._x('Website','comments','novelty').'</span>',
                                  ),
        'comment_field'        => '<textarea name="comment" class="perfect-area"></textarea><span>'._x('Comment','comments','novelty').'</span><div class="clear"></div>',
        'title_reply'          => _x('write a comment', 'comments', 'novelty'),
        'title_reply_to'       => _x('write a reply to %s', 'comments', 'novelty'),
        'comment_notes_before' => '',
        'comment_notes_after'  => '',
        'logged_in_as'         => '',
        'label_submit'         => _x('write', 'comments submit', 'novelty'),
    ));

    ?>

        <div>
            <!-- <h1><?php _ex('comments ','comments','novelty'); ?><span>( <?php echo get_comments_number(); ?> )</span></h1> -->
            <ul class="commentlist">
                <?php wp_list_comments(array('callback' => 'novelty_comment', 'end-callback' => 'novelty_comment_end')); ?>
            </ul>
        </div>

        <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
        <nav class="navigation comment-navigation" role="navigation">
            <h1 class="screen-reader-text section-heading"><?php _ex( 'Comment navigation', 'comments', 'novelty' ); ?></h1>
            <div class="nav-previous"><?php previous_comments_link( _x( '&larr; Older Comments', 'comments', 'novelty' ) ); ?></div>
            <div class="nav-next"><?php next_comments_link( _x( 'Newer Comments &rarr;', 'comments', 'novelty' ) ); ?></div>
        </nav>
        <?php endif; ?>

        <?php if ( ! comments_open() && get_comments_number() ) : ?>
        <p class="no-comments"><?php _ex( 'Comments are closed.', 'comments' , 'novelty' ); ?></p>
        <?php endif; ?>

</div>

<?php endif; ?>