<template>
  <div class="root-wrapper">
    <header class="header">
      <Nav />
    </header>
    <Nuxt />

    <footer class="footer">
      <div class="footer__container">
        <div class="footer__text">ВСЕ ПРАВА ПРИНАДЛЕЖАТ МОТО-КЛУБУ "VERSTA" MC © 2022.</div>
      </div>
    </footer>
  </div>
</template>

<script>
import 'animate.css';
export default {
  computed: {},
  mounted() {
    document.documentElement.style.setProperty('--animate-duration', '.38s');
  },
};
</script>
