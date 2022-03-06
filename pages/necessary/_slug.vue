<template>
  <section class="content content--mt">
    <div class="breadCrumbs">
      <NuxtLink class="breadCrumbs__link" to="/">Главная</NuxtLink>
      <NuxtLink class="breadCrumbs__link" to="/necessary">Нужное</NuxtLink>
      <div class="breadCrumbs__link">{{ title }}</div>
    </div>
    <div class="title">{{ title }}</div>
    <div class="content__container content__container--notFlex">
      <div v-html="content"></div>
      <vue-picture-swipe :items="items" :options="options"></vue-picture-swipe>
    </div>
  </section>
</template>

<script>
import api from '@/api_client/api';

export default {
  data() {
    return {
      title: '',
      content: '',
      options: {
        bgOpacity: 0.7,
        showHideOpacity: true,
        closeOnScroll: false,
        showAnimationDuration: 0,
      },
      items: [],
    };
  },

  head() {
    return {
      title: this.title,
    };
  },

  mounted() {
    const currentSlug = this.$nuxt.$route.params.slug;
    this.$store.commit('loading', true);
    api.metods().getPages(currentSlug, 1, (res) => {
      const newDoc = new DOMParser().parseFromString(res.data.content.rendered, 'text/html');
      const dataThumbnail = Array.from(newDoc.querySelectorAll('[data-thumbnail]')).map((e) => {
        return e.dataset.thumbnail;
      });
      const dataPopup = Array.from(newDoc.querySelectorAll('[data-popup]')).map((e) => {
        return e.dataset.popup;
      });
      this.items = dataThumbnail.map((index, id) => {
        return {
          src: dataPopup[id],
          thumbnail: index,
          w: 700,
          h: 500,
        };
      });
      this.content = res.data.content.rendered;
      this.title = res.data.title.rendered;
      setTimeout(() => {
        this.$store.commit('loading', false);
      }, 1000);
    });
  },
};
</script>
