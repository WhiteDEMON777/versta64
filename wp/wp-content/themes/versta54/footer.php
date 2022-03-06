<?php
/**
 * @package WordPress
 * @subpackage Classic_Theme
 */
?>

<div class="px2"></div>

<div id="bot1">
  <div class="container">

    <div class="social_wrapper">
      <?php
      if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-sidebar')) :
      endif; ?>
    </div>
	    <div class="copyright">Все права принадлежат Мото-клубу "Верста" МС © 2019.</div>
	

  </div>
</div>

</div>
<script src="<?php echo bloginfo('template_url'); ?>/js/bootstrap.min.js"></script>
<?php wp_footer(); ?>
</body>
</html>