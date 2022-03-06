<template>
  <section>
    <div class="top">
      <div class="top__logo"></div>
      <SliderHeader />
    </div>
    <div class="home">
      <div class="title">Жизнь клуба</div>
      <div class="home__container">
        <img src="~/static/img/picture/talent-motor.png" alt="" class="home__img" />
        <div class="info">
          <!-- <a href="#" class="info__item">
            <div class="info__item-text">Наш гараж</div>
            <img src="~/static/img/picture/pexels-andrea-piacquadio-3822843.png" alt="" class="info__item-img" />
          </a> -->
          <!-- <a href="#" class="info__item">
            <div class="info__item-text">Достижения</div>
            <img src="~/static/img/picture/screen-4.png" alt="" class="info__item-img" />
          </a> -->
          <NuxtLink class="info__item" to="/fest">
            <div class="info__item-text">Фестивали</div>
            <img src="~/static/img/picture/pexels-oleg-magni-1796300.png" alt="" class="info__item-img" />
          </NuxtLink>
          <NuxtLink class="info__item" to="/travels">
            <div class="info__item-text">Путешествия</div>
            <img src="~/static/img/picture/AP-CrfK6nmA.png" alt="" class="info__item-img" />
          </NuxtLink>
        </div>
      </div>
    </div>
    <div class="home">
      <div class="title">Полезное</div>
      <div class="text">ВСЯКОГО РОДА ПОЛЕЗНЫЕ ДЛЯ ЖИЗНИ БАЙКЕРА МАТЕРИАЛЫ, ТЕ, КОТОРЫЕ БЫЛИ НАЙДЕНЫ В ИНТЕРНЕТЕ И ТЕ, КОТОРЫЕ ПРИНЕС ЛИЧНЫЙ ОПЫТ.</div>
      <div class="home__container">
        <div class="useful">
          <NuxtLink class="useful__item" to="/preparation">
            <img src="~/static/img/icon/exhaust-pipe.png" alt="" class="useful__item-icon" />
            <div class="useful__item-text">Подготовка</div>
          </NuxtLink>
          <NuxtLink class="useful__item" to="/repair">
            <img src="~/static/img/icon/hammer-and-wrench.png" alt="" class="useful__item-icon" />
            <div class="useful__item-text">Ремонт</div>
          </NuxtLink>
          <NuxtLink class="useful__item" to="/service">
            <img src="~/static/img/icon/balancing.png" alt="" class="useful__item-icon" />
            <div class="useful__item-text">Обслуживание</div>
          </NuxtLink>
          <!-- <a href="#" class="useful__item">
            <img src="~/static/img/icon/tachometer.png" alt="" class="useful__item-icon" />
            <div class="useful__item-text">Тюнинг</div>
          </a> -->
          <NuxtLink class="useful__item" to="/advice">
            <img src="~/static/img/icon/signaling.png" alt="" class="useful__item-icon" />
            <div class="useful__item-text">Советы бывалых</div>
          </NuxtLink>
          <!-- <a href="#" class="useful__item">
            <img src="~/static/img/icon/key.png" alt="" class="useful__item-icon" />
            <div class="useful__item-text">Выбор мотоцикла</div>
          </a> -->
        </div>
      </div>
    </div>
    <div class="home">
      <div class="title">Наши друзья</div>
      <div class="home__container">
        <SliderFrends />
      </div>
    </div>
    <div class="home">
      <div class="title">Мото-фото</div>
      <Gallery />
    </div>
    <div class="home">
      <div class="home__container home__container--alinStart">
        <Form />
        <div class="contacts">
          <div class="title">Адрес клуба</div>
          <div class="contacts__container">
            <div class="contacts__item">
              <div class="contacts__title">САРАТОВ</div>
              <a href="tel:89033291774" class="contacts__link"><span class="icon-phone"></span>ПИЛОТ (КОНСТАНТИН), 8 (903) 329-17-74</a>
              <a href="https://yandex.ru/maps/-/CCFPvTZe" target="_blank" class="contacts__link"><span class="icon-geo"></span>САРАТОВ, УЛ.БИРЮЗОВАЯ, 5</a>
            </div>
            <div class="contacts__item">
              <div class="contacts__title">НОВОСИБИРСК</div>
              <a href="tel:89137061951" class="contacts__link"><span class="icon-phone"></span>ВОИН (ОЛЕГ), 8 (913) 706-19-51</a>
              <a href="https://yandex.ru/maps/-/CCFPzQ8s" target="_blank" class="contacts__link"><span class="icon-geo"></span>НОВОСИБИРСК, УЛ. БУДКЕРА Д.2</a>
            </div>
            <div class="contacts__item">
              <div class="contacts__title">КАМЫШИН</div>
              <a href="tel:89375339083" class="contacts__link"><span class="icon-phone"></span>КОЧЕВНИК (АРТЕМ), 8 (937) 533-90-83</a>
              <a href="https://yandex.ru/maps/-/CCFPzJZA" target="_blank" class="contacts__link"><span class="icon-geo"></span>КАМЫШИН, УЛ. ПУШКИНА, Д.5</a>
            </div>
          </div>
        </div>
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
