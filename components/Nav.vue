<template>
  <nav class="nav">
    <NuxtLink class="nav__logo" to="/" />
    <transition name="custom-classes-transition" enter-active-class="animate__animated animate__fadeInRight" leave-active-class="animate__animated animate__fadeOutRight">
      <ul v-if="menu" class="nav__list" v-on-clickaway="away">
        <li @click="menuIsOpen">
          <NuxtLink :class="[this.$route.path === '/' ? 'nav__list-link--active' : '']" class="nav__list-link" to="/">Главная</NuxtLink>
        </li>

        <li @click="menuIsOpen">
          <NuxtLink :class="[this.$route.path === '/calendar' ? 'nav__list-link--active' : '']" class="nav__list-link" to="/calendar">Календарь</NuxtLink>
        </li>
        <li @click="menuIsOpen">
          <NuxtLink :class="[this.$route.path === '/necessary' ? 'nav__list-link--active' : '']" class="nav__list-link" to="/necessary">Нужное</NuxtLink>
        </li>
        <li @click="menuIsOpen">
          <NuxtLink :class="[this.$route.path === '/news' ? 'nav__list-link--active' : '']" class="nav__list-link" to="/news">Новости</NuxtLink>
        </li>
        <li @click="menuIsOpen">
          <NuxtLink :class="[this.$route.path === '/interesting' ? 'nav__list-link--active' : '']" class="nav__list-link" to="/interesting">Интересное</NuxtLink>
        </li>
        <li @click="menuIsOpen">
          <NuxtLink :class="[this.$route.path === '/clubInfo' ? 'nav__list-link--active' : '']" class="nav__list-link" to="/clubInfo">о клубе</NuxtLink>
        </li>
      </ul>
    </transition>

    <div class="nav__item">
      <div class="nav__social">
        <a href="https://vk.com/mcversta" target="_blank" class="nav__social-link icon-vk"></a>
      </div>
      <div class="nav__burger" :class="[this.menu === true ? 'nav__burger--open' : '']" @click="menuIsOpen">
        <div class="nav__burger-line"></div>
      </div>
    </div>
  </nav>
</template>

<script>
import { mixin as clickaway } from 'vue-clickaway';
import api from '@/api_client/api';
export default {
  mixins: [clickaway],
  data() {
    return {
      menu: true,
    };
  },
  computed: {},
  mounted() {
    if (window.innerWidth <= 992) {
      this.menu = false;
    }
  },

  methods: {
    menuIsOpen() {
      if (window.innerWidth <= 992) {
        this.menu = !this.menu;
      }
    },
    away() {
      if (window.innerWidth <= 992) {
        this.menu = false;
      }
    },
  },
};
</script>
