<template>
  <div class="gallery">
    <div v-if="showTabs" class="gallery__tabs">
      <div v-for="tabBtn in option.categories" class="gallery__tabs-tab" :key="tabBtn.id" :class="[tabBtn.value === filterOption ? 'gallery__tabs-tab--active' : '']" @click="filter(tabBtn.value)">
        {{ tabBtn.text }}
      </div>
    </div>

    <v-select
      v-model="selected"
      v-if="showTabsMobile"
      @option:selected="selectedTab"
      :options="
        option.categories.map((e) => {
          return e.text;
        })
      "
    >
    </v-select>
    <div class="gallery__container">
      <isotope ref="cpt" id="gallery" :item-selector="'gallery__link'" :list="list" :options="option" @filter="filterOption = arguments[0]">
        <NuxtLink v-for="(element, index) in list" :key="index" :to="`/${element.link}`">
          <img :src="element.img" alt="" class="gallery__link-img" />
          <div class="gallery__link-text">{{ element.name }}</div>
        </NuxtLink>
      </isotope>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      showTabs: true,
      showTabsMobile: false,
      list: [
        {
          name: 'ВОЛНА ПАМЯТИ',
          img: 'img/picture/gallery/gallery01.jpg',
          category: 'events',
          link: 'galleryWave',
        },
        {
          name: 'ГАРАЖ',
          img: 'img/picture/gallery/gallery02.jpg',
          category: 'garage',
          link: 'galleryGarage',
        },
        {
          name: 'ДРУЗЬЯ',
          img: 'img/picture/gallery/gallery03.jpg',
          category: 'frends',
          link: 'galleryFriends',
        },
        {
          name: 'ПУТЕШЕСТВИЯ',
          img: 'img/picture/gallery/gallery04.jpg',
          category: 'travels',
          link: 'galleryTravel',
        },
        {
          name: 'МОТОТУСОВКИ',
          img: 'img/picture/gallery/gallery05.jpg',
          category: 'events',
          link: 'galleryParty',
        },
        {
          name: 'ЮМОР',
          img: 'img/picture/gallery/gallery06.jpg',
          category: 'garage',
          link: 'galleryHumor',
        },
        {
          name: 'Я И МОТОЦИКЛ',
          img: 'img/picture/gallery/gallery07.jpg',
          category: 'frends',
          link: 'galleryMoto',
        },
        {
          name: 'РАЗНОЕ',
          img: 'img/picture/gallery/gallery08.jpg',
          category: 'travels',
          link: 'galleryMiscellaneous',
        },
      ],
      filterOption: 'all',
      selected: 'ВСЕ ФОТО',
      option: {
        categories: [
          { text: 'ВСЕ ФОТО', value: 'all' },
          { text: 'МЕРОПРИЯТИЯ', value: 'events' },
          { text: 'ГАРАЖ', value: 'garage' },
          { text: 'ДРУЗЬЯ', value: 'frends' },
          { text: 'ПУТЕШЕСТВИЯ', value: 'travels' },
        ],
        getFilterData: {
          all() {
            return true;
          },
          events(el) {
            return el.category === 'events';
          },
          garage(el) {
            return el.category === 'garage';
          },
          frends(el) {
            return el.category === 'frends';
          },
          travels(el) {
            return el.category === 'travels';
          },
        },
      },
    };
  },
  mounted() {
    if (window.innerWidth <= 992) {
      this.showTabsMobile = true;
      this.showTabs = false;
    }
  },
  methods: {
    selectedTab(key) {
      const tab = this.option.categories
        .filter((item) => {
          return item.text === key;
        })
        .find((e) => {
          return e;
        });
      this.$refs.cpt.filter(tab.value);
    },
    filter(key) {
      this.$refs.cpt.filter(key);
    },
  },
};
</script>
