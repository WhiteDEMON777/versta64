<template>
  <section class="content content--mt">
    <div class="breadCrumbs">
      <NuxtLink class="breadCrumbs__link" to="/">Главная</NuxtLink>
      <NuxtLink class="breadCrumbs__link" to="/interesting">Интересное</NuxtLink>
      <div class="breadCrumbs__link">{{ title }}</div>
    </div>
    <div class="title">{{ title }}</div>
    <div class="content__container content__container--notFlex">
      <div v-html="content"></div>
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
      this.content = res.data.content.rendered;
      this.title = res.data.title.rendered;
      setTimeout(() => {
        this.$store.commit('loading', false);
      }, 1000);
    });
  },
};
</script>
