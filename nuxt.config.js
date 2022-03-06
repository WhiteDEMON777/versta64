export default {
  // Disable server-side rendering: https://go.nuxtjs.dev/ssr-mode
  ssr: false,
  // target: 'server',
  loading: '~/components/Loading.vue',
  // Target: https://go.nuxtjs.dev/config-target

  // Global page headers: https://go.nuxtjs.dev/config-head
  head: {
    title: 'versta64',
    htmlAttrs: {
      lang: 'ru',
    },
    meta: [
      { charset: 'utf-8' },
      { name: 'viewport', content: 'width=device-width, initial-scale=1' },
      { hid: 'description', name: 'description', content: '' },
      { name: 'format-detection', content: 'telephone=no' },
    ],
    link: [{ rel: 'icon', type: 'image/x-icon', href: '/favicon.ico' }],
  },

  // Global CSS: https://go.nuxtjs.dev/config-css
  css: ['@/assets/style-icon.css', 'swiper/css/swiper.css', 'vue-select/dist/vue-select.css', '@/assets/scss/style.scss'],

  // Plugins to run before rendering page: https://go.nuxtjs.dev/config-plugins
  plugins: [
    { ssr: false, src: '~/plugins/swiper.js' },
    { ssr: false, src: '~/plugins/vue-select.js' },
    { ssr: false, src: '~/plugins/vue-picture-swipe.js' },
    { ssr: false, src: '~/plugins/isotope.js' },
  ],

  // Auto import components: https://go.nuxtjs.dev/config-components
  components: true,

  // Modules for dev and build (recommended): https://go.nuxtjs.dev/config-modules
  buildModules: [
    // https://go.nuxtjs.dev/eslint
    '@nuxtjs/eslint-module',
    // '@nuxtjs/composition-api/module',
  ],

  // Modules: https://go.nuxtjs.dev/config-modules
  modules: [
    '@nuxtjs/axios',
    '@nuxtjs/proxy',
    '@nuxtjs/dotenv',
    // [
    //   '@nuxtjs/recaptcha',
    //   {
    //     siteKey: '6LeZZLUeAAAAAJDqY8GkEAXlraXIyypeRlCnJfYt',
    //     hideBadge: false,
    //     version: 3,
    //   },
    // ],
  ],
  proxy: {
    // '/api/v1': { target: 'API_URL', pathRewrite: {'^/api/v1': ''} }
    '/wp-admin': {
      target: 'https://admin.versta64.ru',
    },
    // '/captcha-api/': {
    //   target: 'https://www.google.com/recaptcha/api',
    //   pathRewrite: {
    //     '^/captcha-api': '',
    //   },
    // },
  },
  // Axios module configuration: https://go.nuxtjs.dev/config-axios
  axios: {
    proxy: true, // Can be also an object with default options
    // credentials: true, // authentication information
    // baseURL: `http://${'versta64.ru' || 'localhost'}:${null || 3000}`,
    // headers: {
    //   'Content-Type': 'application/json; charset=utf-8',
    // },
  },

  // Build Configuration: https://go.nuxtjs.dev/config-build
  build: {},
};
