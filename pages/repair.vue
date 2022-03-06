<template>
  <section class="content content--mt">
    <div class="breadCrumbs">
      <NuxtLink class="breadCrumbs__link" to="/">Главная</NuxtLink>
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
      title: 'Ремонт',
    };
  },
  mounted() {
    this.$store.commit('loading', true);
    api.metods().getPages('179', 100, (res) => {
      this.title = res.data.title.rendered;
      this.content = res.data.content.rendered;
      setTimeout(() => {
        this.$store.commit('loading', false);
      }, 1000);
    });
  },
  methods: {},
};
</script>
