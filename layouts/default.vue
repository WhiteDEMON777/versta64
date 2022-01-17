<template>
  <div class="root-wrapper">
    <header class="header">
      <Nav />
    </header>
    <Nuxt />

    <footer class="footer"></footer>
  </div>
</template>

<script>
import 'animate.css';
document.documentElement.style.setProperty('--animate-duration', '.38s');
export default {
  computed: {},
  mounted() {},
};
</script>
