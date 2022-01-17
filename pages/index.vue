<template>
  <section>
    <div class="top">
      <div class="top__logo"></div>
      <SliderHeader />
    </div>
    <div class="content">
      <div class="title">Жизнь клуба</div>
      <div class="content__container">
        <img src="~/static/img/picture/talent-motor.png" alt="" class="content__img" />
        <div class="info">
          <a href="#" class="info__item">
            <div class="info__item-text">Наш гараж</div>
            <img src="~/static/img/picture/pexels-andrea-piacquadio-3822843.png" alt="" class="info__item-img" />
          </a>
          <a href="#" class="info__item">
            <div class="info__item-text">Достижения</div>
            <img src="~/static/img/picture/screen-4.png" alt="" class="info__item-img" />
          </a>
          <a href="#" class="info__item">
            <div class="info__item-text">Фестивали</div>
            <img src="~/static/img/picture/pexels-oleg-magni-1796300.png" alt="" class="info__item-img" />
          </a>
          <a href="#" class="info__item">
            <div class="info__item-text">Путешествия</div>
            <img src="~/static/img/picture/AP-CrfK6nmA.png" alt="" class="info__item-img" />
          </a>
        </div>
      </div>
    </div>
    <div class="content">
      <div class="title">Полезное</div>
      <div class="text">ВСЯКОГО РОДА ПОЛЕЗНЫЕ ДЛЯ ЖИЗНИ БАЙКЕРА МАТЕРИАЛЫ, ТЕ, КОТОРЫЕ БЫЛИ НАЙДЕНЫ В ИНТЕРНЕТЕ И ТЕ, КОТОРЫЕ ПРИНЕС ЛИЧНЫЙ ОПЫТ.</div>
      <div class="content__container">
        <div class="useful">
          <a href="#" class="useful__item">
            <img src="~/static/img/icon/exhaust-pipe.png" alt="" class="useful__item-icon" />
            <div class="useful__item-text">Полезное</div>
          </a>
          <a href="#" class="useful__item">
            <img src="~/static/img/icon/hammer-and-wrench.png" alt="" class="useful__item-icon" />
            <div class="useful__item-text">Ремонт</div>
          </a>
          <a href="#" class="useful__item">
            <img src="~/static/img/icon/balancing.png" alt="" class="useful__item-icon" />
            <div class="useful__item-text">Обслуживание</div>
          </a>
          <a href="#" class="useful__item">
            <img src="~/static/img/icon/tachometer.png" alt="" class="useful__item-icon" />
            <div class="useful__item-text">Тюнинг</div>
          </a>
          <a href="#" class="useful__item">
            <img src="~/static/img/icon/signaling.png" alt="" class="useful__item-icon" />
            <div class="useful__item-text">Советы бывалых</div>
          </a>
          <a href="#" class="useful__item">
            <img src="~/static/img/icon/key.png" alt="" class="useful__item-icon" />
            <div class="useful__item-text">Выбор мотоцикла</div>
          </a>
        </div>
      </div>
    </div>
    <div class="content">
      <div class="title">Наши друзья</div>
      <div class="content__container">
        <SliderFrends />
      </div>
    </div>
  </section>
</template>

<script>
export default {
  data() {
    return {};
  },
  head() {
    return {
      title: 'Versta64',
    };
  },

  mounted() {},
  methods: {},
};
</script>
