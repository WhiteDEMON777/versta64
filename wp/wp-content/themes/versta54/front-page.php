<?php
/**
 * @package WordPress
 * @subpackage Classic_Theme
 */
get_header();
?>

  <div id="home">
	<!--<div class="row">
		<div id="verstak" class="col-lg-4 col-xs-5"> 
			<img src="<?php  echo bloginfo('template_url'); ?>/images/versta.gif" class="img-responsive"> 
		</div>
	</div>-->
    <div id="slider_wrapper">
      <div id="slider">
        <div id="flexslider">
          <ul class="slides clearfix">
		
            <?php 
            if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('homepage-slider')) :
            endif; ?>
          </ul>
        </div>
      </div>
    </div>
  </div>

  <div class="px2"></div>

  <div id="about">
    <div class="container">

      <div class="title_wrapper animated" data-animation="fadeInUp" data-animation-delay="200">
        <div class="title ">Жизнь клуба</div>
      </div>

      <div class="title2 animated" data-animation="fadeInUp" data-animation-delay="300">Все, что размещено в этом блоке является ничем иным, как жизнью нашего клуба.<br> 
      </div>

      <br>

      <div id="banner_wrapper">
        <div id="banner_inner">
          <div class="">
            <div id="banner">
              <a class="banner_prev"  href="#"  id="banner_prev" onclick = "return false;"></a>
              <a class="banner_next"  href="#"  id="banner_next" onclick = "return false;"></a>
              <div class="">
                <div class="carousel-box">
                  <div class="inner">
                    <div class="carousel main">
                      <ul>
                        <?php
                        if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('homepage-club')) :
                        endif; ?>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>


    </div>
  </div>

  <div class="px2"></div>

  <div id="services">

    <div id="parallax1" class="parallax">
      <div class="bg1 parallax-bg"></div>
      <div class="parallax-content">
        <div class="container">

          <div class="title_wrapper animated" data-animation="fadeInUp" data-animation-delay="100">
            <div class="title">Полезное</div>
          </div>

          <div class="title2 animated" data-animation="fadeInUp" data-animation-delay="200">Всякого рода полезные для жизни Байкера материалы, <br> те, которые были найдены в интернете и те, которые принес личный опыт.
          </div>

     
          <br><br>

          <div class="row">
            <?php
            if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('homepage-links')) :
            endif; ?>
          </div>

        </div>
      </div>
    </div>

  </div>
<div class="px2"></div>
  <div id="partners_wrapper">
    <div id="partners_inner">
	  <div class="">
        <div id="partners">
          <div class="">
            <a class="partners_prev" href="#" id="partners_prev" onclick = "return false;"></a>
			<a class="partners_next" href="#" id="partners_next" onclick = "return false;"></a>
            <div class="carousel-box container">
              <div class="inner">
	<div class="title_wrapper animated" data-animation="fadeInUp" data-animation-delay="200">
        <div class="title black-text">Наши друзья</div>
    </div>
				   <br>
                <div class="carousel main">
                  <ul> 
				 
                    <?php
                    if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('homepage-partners')) :
                    endif; ?>
                  </ul>
					 <br>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="px2"></div>

  <div id="gallery">

    <div class="gallery_inner">
      <div class="container">

        <div class="title_wrapper animated" data-animation="fadeInUp" data-animation-delay="200">
          <div class="title ">Мото-Фото</div>
        </div>

        <br><br>

        <div id="options" class="clearfix">
          <ul id="filters" class="pagination option-set clearfix" data-option-key="filter">
            <li><a href="#filter" data-option-value="*" class="selected">ВСЕ ФОТО</a></li>
            <li><a href="#filter" data-option-value=".isotope-filter1">МЕРОПРИЯТИЯ</a></li>
            <li><a href="#filter" data-option-value=".isotope-filter2">ГАРАЖ</a></li>
            <li><a href="#filter" data-option-value=".isotope-filter3">ДРУЗЬЯ</a></li>
            <li><a href="#filter" data-option-value=".isotope-filter4">ПУТЕШЕСТВИЯ</a></li>
          </ul>
        </div>


      </div>
    </div>


    <div class="gallery_inner2">
      <div class="">

        <div class="isotope-box">
          <div id="container" class="clearfix">
            <ul class="thumbnails" id="isotope-items">
              <li class="element isotope-filter1">
                <div class="thumb-isotope">
                  <div class="thumbnail clearfix">
                  <a href="http://localhost:5500/%D0%B3%D0%B0%D0%BB%D0%B5%D1%80%D0%B5%D1%8F-%D0%B2%D0%BE%D0%BB%D0%BD%D0%B0-%D0%BF%D0%B0%D0%BC%D1%8F%D1%82%D0%B8/">
                      <figure>
                        <img src="images/gallery01.jpg" alt="" class="img1">
                        <!-- <img src="images/gallery01_over.jpg" alt="" class="img2"> -->
                        <em >ВОЛНА ПАМЯТИ</em>
                      </figure>
                    </a>
                  </div>
                </div>
              </li>
              <li class="element isotope-filter2">
                <div class="thumb-isotope">
                  <div class="thumbnail clearfix">
                    <a href="http://localhost:5500/%D0%B3%D0%B0%D0%BB%D0%B5%D1%80%D0%B5%D1%8F-%D0%B3%D0%B0%D1%80%D0%B0%D0%B6/">
                      <figure>
                        <img src="images/gallery02.jpg" alt="" class="img1">
                       
                        <em>ГАРАЖ</em>
                      </figure>
                    </a>
                  </div>
                </div>
              </li>
              <li class="element isotope-filter3">
                <div class="thumb-isotope">
                  <div class="thumbnail clearfix">
                    <a href="http://localhost:5500/%D0%B3%D0%B0%D0%BB%D0%B5%D1%80%D0%B5%D1%8F-%D0%B4%D1%80%D1%83%D0%B7%D1%8C%D1%8F/">
                      <figure>
                        <img src="images/gallery03.jpg" alt="" class="img1">
                       
                        <em>ДРУЗЬЯ</em>
                      </figure>
                    </a>
                  </div>
                </div>
              </li>
              <li class="element isotope-filter4">
                <div class="thumb-isotope">
                  <div class="thumbnail clearfix">
                    <a href="http://localhost:5500/%D0%B3%D0%B0%D0%BB%D0%B5%D1%80%D0%B5%D1%8F-%D0%BC%D0%BE%D1%82%D0%BE%D0%BF%D1%83%D1%82%D0%B5%D1%88%D0%B5%D1%81%D1%82%D0%B2%D0%B8%D1%8F/" >
                      <figure>
                        <img src="images/gallery04.jpg" alt="" class="img1">
                        
                        <em>ПУТЕШЕСТВИЯ</em>
                      </figure>
                    </a>
                  </div>
                </div>
              </li>
              <li class="element isotope-filter1">
                <div class="thumb-isotope">
                  <div class="thumbnail clearfix">
                    <a href="http://localhost:5500/%D0%B3%D0%B0%D0%BB%D0%B5%D1%80%D0%B5%D1%8F-%D0%BC%D0%BE%D1%82%D0%BE%D1%82%D1%83%D1%81%D0%BE%D0%B2%D0%BA%D0%B8/" >
                      <figure>
                        <img src="images/gallery05.jpg" alt="" class="img1">
                     
                        <em>МОТОТУСОВКИ</em>
                      </figure>
                    </a>
                  </div>
                </div>
              </li>
              <li class="element isotope-filter2">
                <div class="thumb-isotope">
                  <div class="thumbnail clearfix">
                    <a href="http://localhost:5500/%D0%B3%D0%B0%D0%BB%D0%B5%D1%80%D0%B5%D1%8F-%D1%8E%D0%BC%D0%BE%D1%80/"  >
                      <figure>
                        <img src="images/gallery06.jpg"alt="" class="img1">
                     
                        <em>ЮМОР</em>
                      </figure>
                    </a>
                  </div>
                </div>
              </li>
              <li class="element isotope-filter3">
                <div class="thumb-isotope">
                  <div class="thumbnail clearfix">
                    <a href="http://localhost:5500/%D0%B3%D0%B0%D0%BB%D0%B5%D1%80%D0%B5%D1%8F-%D1%8F-%D0%B8-%D0%BC%D0%BE%D1%82%D0%BE%D1%86%D0%B8%D0%BA%D0%BB/" >
                      <figure>
                        <img src="images/gallery07.jpg" alt="" class="img1">
                       
                        <em>Я И МОТОЦИКЛ</em>
                      </figure>
                    </a>
                  </div>
                </div>
              </li>
              <li class="element isotope-filter4">
                <div class="thumb-isotope">
                  <div class="thumbnail clearfix">
                    <a href="http://localhost:5500/%d0%b3%d0%b0%d0%bb%d0%b5%d1%80%d0%b5%d1%8f-%d1%80%d0%b7%d0%bd%d0%be%d0%b5/" >
                      <figure>
                        <img src="images/gallery08.jpg" alt="" class="img1">
                      
                        <em>РАЗНОЕ</em>
                      </figure>
                    </a>
                  </div>
                </div>
              </li>

              
              <!-- <li class="element isotope-filter1">
                <div class="thumb-isotope">
                  <div class="thumbnail clearfix">
                    <a href="images/gallery09.jpg" rel="prettyPhoto[mix]" title="Photo" class="p">
                      <figure>
                        <img src="images/gallery09.jpg" alt="" class="img1">
                        <img src="images/gallery09_over.jpg" alt="" class="img2">
                        <em></em>
                      </figure>
                    </a>
                  </div>
                </div>
              </li> -->
             <!--  <li class="element isotope-filter2">
                <div class="thumb-isotope">
                  <div class="thumbnail clearfix">
                    <a href="images/gallery10.jpg" rel="prettyPhoto[mix]" title="Photo" class="p">
                      <figure>
                        <img src="images/gallery10.jpg" alt="" class="img1">
                        <img src="images/gallery10_over.jpg" alt="" class="img2">
                        <em></em>
                      </figure>
                    </a>
                  </div>
                </div>
              </li> -->
              <!-- <li class="element isotope-filter3">
                <div class="thumb-isotope">
                  <div class="thumbnail clearfix">
                    <a href="images/gallery11.jpg" rel="prettyPhoto[mix]" title="Photo" class="p">
                      <figure>
                        <img src="images/gallery11.jpg" alt="" class="img1">
                        <img src="images/gallery11_over.jpg" alt="" class="img2">
                        <em></em>
                      </figure>
                    </a>
                  </div>
                </div>
              </li> -->
             <!--  <li class="element isotope-filter4">
                <div class="thumb-isotope">
                  <div class="thumbnail clearfix">
                    <a href="images/gallery12.jpg" rel="prettyPhoto[mix]" title="Photo" class="p">
                      <figure>
                        <img src="images/gallery12.jpg" alt="" class="img1">
                        <img src="images/gallery12_over.jpg" alt="" class="img2">
                        <em></em>
                      </figure>
                    </a>
                  </div>
                </div>
              </li> -->
            </ul>
          </div>
        </div>


      </div>
    </div>


  </div>

  <div class="px2"></div>

  <div id="contacts">
    <div class="container">

      <div class="title_wrapper animated" data-animation="fadeInUp" data-animation-delay="200">
        <div class="title ">Контакты</div>
      </div>

      <br>

      <div class="row">
        <div class="col-sm-4 animated" data-animation="fadeInLeft" data-animation-delay="200">

          <div class="title4">&nbsp;</div>

          <div class="thumb1">
            <div class="thumbnail clearfix">
              <figure><img src="images/contacts01.jpg" alt="" class="img-responsive"></figure>
              <!--<div class="caption">
                <p>
                  8901 Marmora Road,<br>Glasgow, D04 89GR.
                </p>
                <p>
                  Telephone: +1 800 123 1234<br>E-mail: <a href="#">info@companyname.com</a>
                </p>
              </div>-->
            </div>
          </div>


        </div>
        <div class="col-sm-4 animated" data-animation="fadeInUp" data-animation-delay="300">

          <div class="title4">Адреса клуба</div>
          <?php
          if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('homepage-contacts')) :
          endif; ?>

        </div>
        <div class="col-sm-4 animated" data-animation="fadeInRight" data-animation-delay="400">

          <div class="title4">Напишите нам</div>

         <div id="note"></div>
          <div id="fields">
            <?php
            if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('homepage-form')) :
            endif; ?>

            <form id="ajax-contact-form" class="form-horizontal" action="javascript:alert('success!');">
               <!--<div class="row">
                <div class="col-sm-12">
                  <div class="form-group">
                    <label for="inputName">Ваше имя</label>
                    <input type="text" class="form-control" id="inputName" name="name" value="Full Name"
                           onBlur="if(this.value=='') this.value='Full Name'"
                           onFocus="if(this.value =='Full Name' ) this.value=''">
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="inputEmail">Эл. адрес</label>
                    <input type="text" class="form-control" id="inputEmail" name="email" value="E-mail address"
                           onBlur="if(this.value=='') this.value='E-mail address'"
                           onFocus="if(this.value =='E-mail address' ) this.value=''">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="inputPhone">Телефон</label>
                    <input type="text" class="form-control" id="inputPhone" name="phone" value="Phone"
                           onBlur="if(this.value=='') this.value='Phone'"
                           onFocus="if(this.value =='Phone' ) this.value=''">
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-sm-12">
                  <div class="form-group">
                    <label for="inputMessage">Ваше сообщение</label>
                    <textarea class="form-control" rows="5" id="inputMessage" name="content"
                              onBlur="if(this.value=='') this.value='Message'"
                              onFocus="if(this.value =='Message' ) this.value=''">Message</textarea>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-sm-12">
                  <div class="form-group capthca">
                    <label for="inputCapthca" class="sr-only">Capthca</label>
                    <input type="text" class="form-control" id="inputCapthca" name="capthca" value="Capthca"
                           onBlur="if(this.value=='') this.value='Capthca'"
                           onFocus="if(this.value =='Capthca' ) this.value=''">
                  </div>
                  <div class="form-group img">
                    <img src="<?php  echo bloginfo('template_url'); ?>/captcha/captcha.php">
                  </div>
                </div>
              </div>

              <button type="submit" class="btn-default btn-cf-submit">Submit</button>
            </form>
          </div>-->


        </div>
      </div>


    </div>
  </div>

<?php get_footer(); ?>