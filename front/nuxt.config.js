export default {
  // Global page headers: https://go.nuxtjs.dev/config-head
  head: {
    title: 'Corretora de Imóveis em Salvador, Bahia | Cida Imóveis',
    htmlAttrs: {
      lang: 'pt-BR'
    },
    meta: [
      { charset: 'utf-8' },
      { name: 'viewport', content: 'width=device-width, initial-scale=1' },
      { hid: 'description', name: 'description', content: 'Relação de todos os imóveis que estou trabalhando, disponível para a venda e/ou locação por toda Salvador e região.' },
      { name: 'format-detection', content: 'telephone=no' }
    ],
    link: [
      { rel: 'icon', type: 'image/x-icon', href: '/assets/img/favicon.png' },
      { rel: 'stylesheet', href:"https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" },
      { rel: 'stylesheet', href:"/assets/vendor/animate.css/animate.min.css" },
      { rel: 'stylesheet', href:"/assets/vendor/bootstrap/css/bootstrap.min.css" },
      { rel: 'stylesheet', href:"/assets/vendor/bootstrap-icons/bootstrap-icons.css" },
      { rel: 'stylesheet', href:"/assets/vendor/swiper/swiper-bundle.min.css" },
      { rel: 'stylesheet', href:"/assets/css/style.css" }
    ],
    script: [
      { src: "/assets/vendor/bootstrap/js/bootstrap.bundle.min.js" },
      { src: "/assets/vendor/swiper/swiper-bundle.min.js" },
      { src: "/assets/vendor/php-email-form/validate.js" }
    ]
  },

  // Global CSS: https://go.nuxtjs.dev/config-css
  css: [
  ],

  // Plugins to run before rendering page: https://go.nuxtjs.dev/config-plugins
  plugins: [
  ],

  // Auto import components: https://go.nuxtjs.dev/config-components
  components: true,

  // Modules for dev and build (recommended): https://go.nuxtjs.dev/config-modules
  buildModules: [
  ],

  // Modules: https://go.nuxtjs.dev/config-modules
  modules: [
    // https://go.nuxtjs.dev/axios
    '@nuxtjs/axios'
  ],

  // Axios module configuration: https://go.nuxtjs.dev/config-axios
  axios: {
    // Workaround to avoid enforcing hard-coded localhost:3000: https://github.com/nuxt-community/axios-module/issues/308
    baseURL: 'http://172.24.0.3:8000/api/'
  },

  // Build Configuration: https://go.nuxtjs.dev/config-build
  build: {
  }
}
