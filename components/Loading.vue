<template>
  <div v-if="loading" class="loading">
    <div class="loading__logo"></div>
    <div class="loading__container">
      <div class="loading__spinner">
        <div class="loading__spinner">
          <div class="loading__spinner">
            <div class="loading__spinner">
              <div class="loading__spinner">
                <div class="loading__spinner"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      num: 0,
    };
  },
  computed: {
    loading() {
      return this.$store.state.loading;
    },
  },
  mounted() {
    this.$nextTick(() => {
      this.$nuxt.$loading.start();
      setTimeout(() => this.$nuxt.$loading.finish(), 2000);
    });
  },
  methods: {
    start() {
      this.$store.commit('loading', true);
    },
    finish() {
      this.$store.commit('loading', false);
    },
  },
};
</script>
