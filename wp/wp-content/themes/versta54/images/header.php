<?php
/**
 * @package WordPress
 * @subpackage Classic_Theme
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

	<title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>

	<style type="text/css" media="screen">
		@import url( <?php bloginfo('stylesheet_url'); ?> );
	</style>

	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<?php wp_get_archives('type=monthly&format=link'); ?>
	<?php //comments_popup_script(); // off by default ?>

    <script src="<?php echo bloginfo('template_url'); ?>/js/jquery.js"></script>
    <script src="<?php echo bloginfo('template_url'); ?>/js/jquery-migrate-1.2.1.min.js"></script>
    <script src="<?php echo bloginfo('template_url'); ?>/js/jquery.easing.1.3.js"></script>
    <script src="<?php echo bloginfo('template_url'); ?>/js/superfish.js"></script>

    <script src="<?php echo bloginfo('template_url'); ?>/js/jquery.flexslider.js"></script>

    <script src="<?php echo bloginfo('template_url'); ?>/js/jquery.sticky.js"></script>

    <script src="<?php echo bloginfo('template_url'); ?>/js/jquery.queryloader2.js"></script>

    <script src="<?php echo bloginfo('template_url'); ?>/js/jquery.appear.js"></script>

    <script src="<?php echo bloginfo('template_url'); ?>/js/jquery.ui.totop.js"></script>
    <script src="<?php echo bloginfo('template_url'); ?>/js/jquery.equalheights.js"></script>

    <script src="<?php echo bloginfo('template_url'); ?>/js/jquery.caroufredsel.js"></script>
    <script src="<?php echo bloginfo('template_url'); ?>/js/jquery.touchSwipe.min.js"></script>

    <script src="<?php echo bloginfo('template_url'); ?>/js/jquery.parallax-1.1.3.resize.js"></script>

    <script src="<?php echo bloginfo('template_url'); ?>/js/SmoothScroll.js"></script>

    <script src="<?php echo bloginfo('template_url'); ?>/js/jquery.prettyPhoto.js"></script>
    <script src="<?php echo bloginfo('template_url'); ?>/js/jquery.isotope.min.js"></script>

    <script src="<?php echo bloginfo('template_url'); ?>/js/cform.js"></script>

    <script src="<?php echo bloginfo('template_url'); ?>/js/scripts.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

	<?php wp_head(); ?>
</head>

<body class="onepage front" data-spy="scroll" data-target="#top1" data-offset="60">

<div id="load"></div>

<div id="main">
<div id="top1">
    <div class="top1_wrapper">
        <div class="px1"></div>
    </div>

    <div class="top3_wrapper">
        <div class="top3_inner">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8 col-xs-8  coin ">
                    <img src="<?php  echo bloginfo('template_url'); ?>/images/1.gif" alt="" class="img-responsive " >
                    </div>
                    <!-- <div class="col-md-8">
                    <div class="top3 clearfix">
                    <header>
                       <!--  <div class="logo_wrapper col-lg-2  ">
                           <!--  <a href="<?php bloginfo('url'); ?>/" class="logo scroll-to">
                               <!--  <img src="<?php /* echo bloginfo('template_url'); */ ?>/images/logo_v.png" alt="" class="img-responsive"> -->
                       <!-- <img src="<?php  echo bloginfo('template_url'); ?>/images/Logo_text.gif" class="img-responsive"> -->
							   
							  
                           <!--  </a>
                        </div>
                    </header>
                </div>-->
                    </div>
                </div>
             
            </div>
        </div>
    </div>

    <div class="top2_wrapper" id="top2">
        <div class="container-fluid">

            <div class="top2 clearfix">



                <div class="navbar navbar_ navbar-default">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <div class="navbar-collapse navbar-collapse_ collapse">
                        <?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>
                        <!--<ul class="nav navbar-nav sf-menu clearfix">
                            <li class="active"><a href="#home">Home</a></li>
                            <li class="sub-menu sub-menu-1"><a href="#about">About<em></em></a>
                                <ul>
                                    <li><a href="blog.html">Rght Blog</a></li>
                                    <li class="sub-menu sub-menu-2"><a href="blog.html">Left Blog<em></em></a>
                                        <ul>
                                            <li><a href="blog.html">lorem ipsum</a></li>
                                            <li><a href="blog.html">sit amet</a></li>
                                            <li><a href="blog.html">adipiscing</a></li>
                                            <li><a href="blog.html">nunc suscipit</a></li>
                                        </ul>
                                    </li>
                                    <li class="sub-menu sub-menu-2"><a href="blog.html">Blog’s Article<em></em></a>
                                        <ul>
                                            <li><a href="blog.html">lorem ipsum</a></li>
                                            <li><a href="blog.html">sit amet</a></li>
                                            <li><a href="blog.html">adipiscing</a></li>
                                            <li><a href="blog.html">nunc suscipit</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="blog.html">Qorem ipsum argo</a></li>
                                </ul>
                            </li>
                            <li><a href="#services">Our Services</a></li>
                            <li><a href="#prices">Prices</a></li>
                            <li><a href="#gallery">Gallery</a></li>
                            <li><a href="#contacts">Contacts</a></li>
                        </ul>-->
                    </div>
                </div>



            </div>

        </div>
    </div>

</div>
<!-- end header -->