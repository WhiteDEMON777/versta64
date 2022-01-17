<template>
  <swiper ref="sliderFrends" class="swiper sliderFrends" :options="swiperOption">
    <swiper-slide class="sliderFrends__slide">
      <a href="#" class="sliderFrends__slide-link">
        <img src="~/static/img/picture/clubs/item.png" alt="" class="sliderFrends__slide-img" />
      </a>
    </swiper-slide>
    <swiper-slide class="sliderFrends__slide">
      <a href="#" class="sliderFrends__slide-link">
        <img src="~/static/img/picture/clubs/item.png" alt="" class="sliderFrends__slide-img" />
      </a>
    </swiper-slide>
    <swiper-slide class="sliderFrends__slide">
      <a href="#" class="sliderFrends__slide-link">
        <img src="~/static/img/picture/clubs/item.png" alt="" class="sliderFrends__slide-img" />
      </a>
    </swiper-slide>
    <swiper-slide class="sliderFrends__slide">
      <a href="#" class="sliderFrends__slide-link">
        <img src="~/static/img/picture/clubs/item.png" alt="" class="sliderFrends__slide-img" />
      </a>
    </swiper-slide>
    <swiper-slide class="sliderFrends__slide">
      <a href="#" class="sliderFrends__slide-link">
        <img src="~/static/img/picture/clubs/item.png" alt="" class="sliderFrends__slide-img" />
      </a>
    </swiper-slide>
    <swiper-slide class="sliderFrends__slide">
      <a href="#" class="sliderFrends__slide-link">
        <img src="~/static/img/picture/clubs/item.png" alt="" class="sliderFrends__slide-img" />
      </a>
    </swiper-slide>
    <swiper-slide class="sliderFrends__slide">
      <a href="#" class="sliderFrends__slide-link">
        <img src="~/static/img/picture/clubs/item.png" alt="" class="sliderFrends__slide-img" />
      </a>
    </swiper-slide>
    <swiper-slide class="sliderFrends__slide">
      <a href="#" class="sliderFrends__slide-link">
        <img src="~/static/img/picture/clubs/item.png" alt="" class="sliderFrends__slide-img" />
      </a>
    </swiper-slide>
    <div slot="button-prev" class="swiper-button-prev sliderFrends__prev"></div>
    <div slot="button-next" class="swiper-button-next sliderFrends__next"></div>
  </swiper>
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
        navigation: {
          nextEl: '.sliderFrends__next',
          prevEl: '.sliderFrends__prev',
        },
      },
    };
  },
  computed: {},
  mounted() {
    // console.log('city', this.swiper);
  },
};
</script>
