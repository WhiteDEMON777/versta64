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

              <div class="post post-full">
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
                  <div <?php post_class() ?> id="post-<?php the_ID(); ?>">
                    <h2><?php the_title(); ?></h2>
                    <div class="post-story-info">
                      <span class="post-story-by"><?php the_category(',') ?></span>
                      <span class="divider1">|</span>
                      <span class="post-story-date"><?php the_time('d.m.Y') ?></span>
                      <span class="divider1">|</span>
                      <span class="post-story-comment-num">
                        <?php comments_popup_link(__('Нет комментариев'), __('1 комментарий'), __('Комментариев: %')); ?>
                      </span>
                    </div>

                    <div class="post-story-body">
                      <?php the_content(__('(more...)')); ?>
                    </div>
                  </div>

                </div>
                <div class="post-posted clearfix">
                  <div class="post-posted-left">
                    <ul class="tags clearfix">
                      <?php the_tags(__(''), '</li>', '<li>'); ?>
                    </ul>
                  </div>
                </div>
              </div>


              <?php comments_template(); // Get wp-comments.php template ?>

            <?php endwhile; else: ?>
              <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
            <?php endif; ?>

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