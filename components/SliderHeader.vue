<template>
  <div class="sliderHeader">
    <swiper ref="sliderHeader" class="swiper sliderHeader__container" :options="swiperOption">
      <swiper-slide data-name="Cаратов" class="sliderHeader__slide">
        <div class="sliderHeader__slide-container">
          <div class="sliderHeader__slide-item">
            <div class="sliderHeader__slide-title">Versta 64 MC г.Cаратов</div>
            <div class="sliderHeader__slide-text">
              Мотоклуб "VERSTA" MC является объединением физических лиц на добровольной основе, заинтересованных в развитии и популяризации мотодвижения, спортивном и патриотическом воспитании
              молодёжи в свете байкерского духа и братства, пропагандой здорового образа жизни...
            </div>
            <NuxtLink class="sliderHeader__slide-btn btn" to="/clubInfo">подробнее</NuxtLink>
          </div>
          <img src="~/static/img/picture/moto.png" alt="" class="sliderHeader__slide-img" />
        </div>
      </swiper-slide>
      <swiper-slide data-name="КАМЫШИН" class="sliderHeader__slide">
        <div class="sliderHeader__slide-container">
          <div class="sliderHeader__slide-item">
            <div class="sliderHeader__slide-title">Versta 34 MC г.Камышин</div>
            <div class="sliderHeader__slide-text">
              История начинается с посещения небольшого сабантуя, посвященного закрытию сезона 2018г одними из организаторов которого был "VERSTA" MC Саратов, он проходил в г. Балаково 29 сентября
              2018. Из г. Камышина выдвинулись двое: Артем Кочевинов и Антон Белицкий, тогда они еще были «свободными» мотоциклистами...
            </div>
            <NuxtLink class="sliderHeader__slide-btn btn" to="/clubInfo">подробнее</NuxtLink>
          </div>
          <img src="~/static/img/picture/5a24a0f14a32e1.6195840415123499373039.png" alt="" class="sliderHeader__slide-img" />
        </div>
      </swiper-slide>
      <swiper-slide data-name="Новосибирск" class="sliderHeader__slide">
        <div class="sliderHeader__slide-container">
          <div class="sliderHeader__slide-item">
            <div class="sliderHeader__slide-title">Versta 54 MC г.Новосибирск</div>
            <div class="sliderHeader__slide-text">
              Начало новосибирского клуба было заложено беседой между Президентом уже существующего клуба "VERSTA" MC Саратов Константином (Пилот) и дальнобойщиком мотоциклистом из Новосибирска Олегом
              (Воин), который совершал мотопробег до Крыма и остановился на ночлег в Клубном Доме "VERSTA" MC Саратов...
            </div>
            <NuxtLink class="sliderHeader__slide-btn btn" to="/clubInfo">подробнее</NuxtLink>
          </div>
          <img src="~/static/img/picture/png-clipart-motorcycle-motorcycle-thumbnail.png" alt="" class="sliderHeader__slide-img" />
        </div>
      </swiper-slide>
    </swiper>
    <div class="sliderHeader__navigation">
      <div slot="button-prev" class="swiper-button-prev sliderHeader__prev icon-arrow"></div>
      <div slot="pagination" class="swiper-pagination swiper-pagination-bullets sliderHeader__pagination"></div>
      <div slot="button-next" class="swiper-button-next sliderHeader__next icon-arrow"></div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'SwiperHeader',
  data() {
    return {
      swiperOption: {
        loop: true,
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
            return '<span class="' + className + '">' + city[index + 1] + '</span>';
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
