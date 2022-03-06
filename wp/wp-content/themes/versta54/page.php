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
                <?php if (has_post_thumbnail()) {
                  '<div class="post-image">';
                  the_post_thumbnail('thumbnail', array('class' => 'img-responsive'));
                  '</div>';
                }
                ?>
                <div class="post-story">
                  <div <?php post_class() ?> id="post-<?php the_ID(); ?>">
                    <h2><?php the_title(); ?></h2>
                    <div class="post-story-body">
                      <?php the_content(__('(more...)')); ?>
                    </div>
                  </div>

                </div>
              </div>

            <?php endwhile; else: ?>
              <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
            <?php endif; ?>

          </div>
        </div>
    
      </div>
    </div>
	<div id="custom_html-2" class="widget_text sidebar-block widget widget_custom_html">
		<!--<div class="sidebar-block-title">Социальные сети</div>-->
			<div class="textwidget custom-html-widget">
				<ul class="social-widget clearfix">
							<li><a href="#"><img src="/images/w1.jpg" alt=""></a></li>
							<li><a href="#"><img src="/images/w2.jpg" alt=""></a></li>
							<li><a href="#"><img src="/images/w3.jpg" alt=""></a></li>
							<li><a href="#"><img src="/images/w4.jpg" alt=""></a></li>
						
				</ul>
		    </div>
	</div>
  </div>

<?php get_footer(); ?>