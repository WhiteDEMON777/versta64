<?php
/**
 * @package WordPress
 * @subpackage Classic_Theme
 */
get_header();
?>
  <div class="breadcrumbs1_wrapper">
    <div class="container">
      <div class="breadcrumbs1">
        <?php if ( function_exists( 'dimox_breadcrumbs' ) ) dimox_breadcrumbs(); ?>
      </div>
    </div>
  </div>

  <div id="content">
    <div class="container">
      <div class="row">
        <div class="col-sm-9">
          <div class="content-part">

            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

              <div class="post post-short" id="post-<?php the_ID(); ?>">
                <?php
                if ( has_post_thumbnail()) {
                  $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large');
                  echo '<div class="post-image">';
                  echo '<img src="' . $large_image_url[0] . '" title="' . the_title_attribute('echo=0') . '"  class="img-responsive"/>';
                  echo '<div class="post-image-date">';
                  the_date('d\<\s\p\a\n\>M<\/\s\p\a\n\>');
                  echo '</div>';
                  echo '</div>';
                }
                ?>
                <div class="post-story">
                  <h2><?php the_title(); ?></h2>
                  <div class="post-story-info"><span class="post-story-by"><?php the_category(',') ?></span><span
                        class="divider1">|</span><?php the_time('d.m.Y', '<span class="post-story-date">', '</span>'); ?><span
                        class="divider1">|</span><span
                        class="post-story-comment-num"><?php comments_popup_link(__('Нет комментариев'), __('1 комментарий'), __('Комментариев: %')); ?></span></div>
                  <div class="post-story-body">
                    <?php the_content(__('')); ?>
                  </div>
                  <div class="post-story-link">
                    <a href="<?php the_permalink() ?>" rel="bookmark" class="btn-default btn1">Читать полностью</a>
                  </div>
                </div>
              </div>

            <?php endwhile; else: ?>
              <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
            <?php endif; ?>

            <?php wp_pagenavi() ?>

          </div>
        </div>
        <div class="col-sm-3">
          <div class="sidebar-part">
            <?php
            if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('right-sidebar')) :
            endif; ?>
          </div>
        </div>
      </div>
    </div>
  </div>

<?php get_footer(); ?>