<template>
  <swiper ref="sliderHeader" class="swiper sliderHeader" :options="swiperOption">
    <swiper-slide data-name="Новосибирск" class="sliderHeader__slide">
      <div class="sliderHeader__slide-container">
        <div class="sliderHeader__slide-item">
          <div class="sliderHeader__slide-title">Верста MC г.Cаратов</div>
          <div class="sliderHeader__slide-text">
            Начало новосибирского клуба было заложено беседой между Президентом уже существующего клуба «Верста» МС Саратов Константином (Пилот) и дальнобойщиком мотоциклистом из Новосибирска Олегом
            (Воин), который совершал мотопробег до Крыма и остановился на ночлег в Клубном Доме «Верста» МС Саратов. Состоялась душевная беседа за добродушно накрытым столом, вечером 24.
          </div>
          <a href="#" class="sliderHeader__slide-btn btn">подробнее</a>
        </div>
        <img src="~/static/img/picture/moto.png" alt="" class="sliderHeader__slide-img" />
      </div>
    </swiper-slide>
    <swiper-slide data-name="владивосток" class="sliderHeader__slide">
      <div class="sliderHeader__slide-container">
        <div class="sliderHeader__slide-item">
          <div class="sliderHeader__slide-title">Верста MC г.Cаратов</div>
          <div class="sliderHeader__slide-text">
            Начало новосибирского клуба было заложено беседой между Президентом уже существующего клуба «Верста» МС Саратов Константином (Пилот) и дальнобойщиком мотоциклистом из Новосибирска Олегом
            (Воин), который совершал мотопробег до Крыма и остановился на ночлег в Клубном Доме «Верста» МС Саратов. Состоялась душевная беседа за добродушно накрытым столом, вечером 24.
          </div>
          <a href="#" class="sliderHeader__slide-btn btn">подробнее</a>
        </div>
        <img src="~/static/img/picture/moto.png" alt="" class="sliderHeader__slide-img" />
      </div>
    </swiper-slide>
    <swiper-slide data-name="саратов" class="sliderHeader__slide">
      <div class="sliderHeader__slide-container">
        <div class="sliderHeader__slide-item">
          <div class="sliderHeader__slide-title">Верста MC г.Cаратов</div>
          <div class="sliderHeader__slide-text">
            Начало новосибирского клуба было заложено беседой между Президентом уже существующего клуба «Верста» МС Саратов Константином (Пилот) и дальнобойщиком мотоциклистом из Новосибирска Олегом
            (Воин), который совершал мотопробег до Крыма и остановился на ночлег в Клубном Доме «Верста» МС Саратов. Состоялась душевная беседа за добродушно накрытым столом, вечером 24.
          </div>
          <a href="#" class="sliderHeader__slide-btn btn">подробнее</a>
        </div>
        <img src="~/static/img/picture/moto.png" alt="" class="sliderHeader__slide-img" />
      </div>
    </swiper-slide>
    <div slot="button-prev" class="swiper-button-prev sliderHeader__prev"></div>
    <div slot="pagination" class="swiper-pagination swiper-pagination-bullets sliderHeader__pagination"></div>
    <div slot="button-next" class="swiper-button-next sliderHeader__next"></div>
  </swiper>
</template>

<script>
export default {
  name: 'SwiperHeader',
  data() {
    return {
      swiperOption: {
        pagination: {
          el: '.sliderHeader__pagination',
          clickable: true,
          renderBullet(index, className) {
            const slides = Array.from(this.slides).map((e) => {
              return e.dataset;
            });
            const city = slides.map((e) => {
              return e.name;
            });
            return '<span class="' + className + '">' + city[index] + '</span>';
          },
        },
        navigation: {
          nextEl: '.sliderHeader__next',
          prevEl: '.sliderHeader__prev',
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
