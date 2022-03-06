<template>
  <div class="sliderFrends">
    <swiper ref="sliderFrends" class="swiper sliderFrends__container" :options="swiperOption">
      <swiper-slide class="sliderFrends__slide">
        <a href="https://vk.com/fbmc64" target="_blank" class="sliderFrends__slide-link">
          <img src="~/static/img/picture/clubs/partner08.png" alt="" class="sliderFrends__slide-img" />
        </a>
      </swiper-slide>
      <swiper-slide class="sliderFrends__slide">
        <a href="https://legion-mc.ru/" target="_blank" class="sliderFrends__slide-link">
          <img src="~/static/img/picture/clubs/partner03.png" alt="" class="sliderFrends__slide-img" />
        </a>
      </swiper-slide>
      <swiper-slide class="sliderFrends__slide">
        <a href="https://vk.com/rtmcc" target="_blank" class="sliderFrends__slide-link">
          <img src="~/static/img/picture/clubs/partner01.png" alt="" class="sliderFrends__slide-img" />
        </a>
      </swiper-slide>
      <swiper-slide class="sliderFrends__slide">
        <a href="http://rwamc.ru/" target="_blank" class="sliderFrends__slide-link">
          <img src="~/static/img/picture/clubs/partner02.png" alt="" class="sliderFrends__slide-img" />
        </a>
      </swiper-slide>
      <swiper-slide class="sliderFrends__slide">
        <a href="https://vk.com/babay_64" target="_blank" class="sliderFrends__slide-link">
          <img src="~/static/img/picture/clubs/partner04.png" alt="" class="sliderFrends__slide-img" />
        </a>
      </swiper-slide>
      <swiper-slide class="sliderFrends__slide">
        <a href="https://vk.com/choppersclan" target="_blank" class="sliderFrends__slide-link">
          <img src="~/static/img/picture/clubs/partner05.png" alt="" class="sliderFrends__slide-img" />
        </a>
      </swiper-slide>
      <swiper-slide class="sliderFrends__slide">
        <a href="https://vk.com/mimc64" target="_blank" class="sliderFrends__slide-link">
          <img src="~/static/img/picture/clubs/partner06.png" alt="" class="sliderFrends__slide-img" />
        </a>
      </swiper-slide>
      <swiper-slide class="sliderFrends__slide">
        <a href="https://vk.com/svoboda.brat" target="_blank" class="sliderFrends__slide-link">
          <img src="~/static/img/picture/clubs/partner07.png" alt="" class="sliderFrends__slide-img" />
        </a>
      </swiper-slide>
    </swiper>
    <div slot="button-prev" class="swiper-button-prev sliderFrends__prev"></div>
    <div slot="button-next" class="swiper-button-next sliderFrends__next"></div>
  </div>
</template>

<script>
export default {
  name: 'sliderFrends',
  data() {
    return {
      swiperOption: {
        loop: true,
        slidesPerView: 6,
        spaceBetween: 30,
        breakpoints: {
          // when window width is >= 320px
          320: {
            slidesPerView: 2,
            spaceBetween: 15,
          },
          470: {
            slidesPerView: 3,
            spaceBetween: 15,
          },
          // when window width is >= 480px
          768: {
            slidesPerView: 4,
            spaceBetween: 20,
          },
          // when window width is >= 640px
          992: {
            slidesPerView: 6,
            spaceBetween: 30,
          },
        },
        navigation: {
          nextEl: '.sliderFrends__next',
          prevEl: '.sliderFrends__prev',
        },
      },
    };
  },
  computed: {},
  mounted() {},
};
</script>
