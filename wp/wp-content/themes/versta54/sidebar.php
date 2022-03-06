<?php
/**
 * @package WordPress
 * @subpackage Classic_Theme
 */
?>
<!-- begin sidebar -->


<?php 	/* Widgetized sidebar, if you have the plugin installed. */
		if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar() ) : ?>
    <div class="sidebar-block sidebar-block-categories">
      <div class="sidebar-block-title">
        Categories
      </div>
      <div class="sidebar-block-content">
        <?php wp_list_categories('title_li=' . __('Categories:')); ?>
      </div>
    </div>
<?php endif; ?>
<!-- end sidebar -->
