<?php
/**
 * @package WordPress
 * @subpackage Classic_Theme
 */

if (post_password_required()) : ?>
  <p><?php _e('Enter your password to view comments.'); ?></p>
  <?php return; endif; ?>

<div class="num-comments">
  <?php comments_number(__('Нет комментариев'), __('1 комментарий'), __('Комментариев: %')); ?>
</div>

<?php if (have_comments()) : ?>

  <?php foreach ($comments as $comment) : ?>
    <div class="comment-block clearfix" id="comment-<?php comment_ID() ?>">
      <figure>
        <?php echo get_avatar($comment, 85); ?>
      </figure>
      <div class="caption">
        <div class="top clearfix">
          <div class="txt1"><span class="name"><?php comment_author_link() ?></span><span
                class="date"><?php comment_time() ?></span></div>
          <!--<div class="txt2"><a href="#" class="btn-default btn2">Replay</a></div>-->
        </div>
        <div class="txt">
          <?php comment_text() ?>
        </div>
      </div>
    </div>
  <?php endforeach; ?>


<?php else : // If there are no comments yet ?>
  <p><?php _e('Нет комментариев.'); ?></p>
<?php endif; ?>

<?php if (comments_open()) : ?>
  <div class="live-comment">
  <div class="live-comment-title"><?php _e('Добавить комментарий'); ?></div>

  <?php if (get_option('comment_registration') && !is_user_logged_in()) : ?>
    <p><?php printf(__('You must be <a href="%s">logged in</a> to post a comment.'), wp_login_url(get_permalink())); ?></p>
  <?php else : ?>

    <div class="live-comment-form" id="ajax-contact-form3">
      <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" class="form-horizontal" method="post"
            id="commentform">

        <?php if (is_user_logged_in()) : ?>

          <p><?php printf(__('Logged in as %s.'), '<a href="' . get_option('siteurl') . '/wp-admin/profile.php">' . $user_identity . '</a>'); ?>
            <a href="<?php echo wp_logout_url(get_permalink()); ?>"
               title="<?php _e('Log out of this account') ?>"><?php _e('Log out &raquo;'); ?></a></p>

        <?php else : ?>
          <div class="row">
            <div class="col-sm-4">
              <div class="form-group">
                <input type="text" name="author" placeholder="Ваше имя" class="form-control" id="author" value="<?php echo esc_attr($comment_author); ?>" size="22"
                       tabindex="1"/>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="E-mail" name="email" id="email"
                       value="<?php echo esc_attr($comment_author_email); ?>" size="22"
                       tabindex="2"/>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="form-group">
                <input type="text" placeholder="Адрес сайта" class="form-control" name="url" id="url"
                       value="<?php echo esc_attr($comment_author_url); ?>" size="22"
                       tabindex="3"/>
              </div>
            </div>
          </div>
        <?php endif; ?>

        <div class="row">
          <div class="col-sm-12">
            <div class="form-group">
              <textarea name="comment" class="form-control" id="comment" cols="58" rows="10" tabindex="4"></textarea>
            </div>
          </div>
        </div>

        <input name="submit" type="submit" class="btn-default btn-cf-submit3" id="submit" tabindex="5"
               value="<?php esc_attr_e('Добавить комментарий'); ?>"/>
        <input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>"/>

        <?php do_action('comment_form', $post->ID); ?>
    </div>


    </form>
    </div>

  <?php endif; // If registration required and not logged in ?>

<?php else : // Comments are closed ?>
  <p><?php _e('Sorry, the comment form is closed at this time.'); ?></p>
<?php endif; ?>
