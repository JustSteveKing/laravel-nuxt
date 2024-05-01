// https://nuxt.com/docs/api/configuration/nuxt-config
export default defineNuxtConfig({
  app: {
    layoutTransition: {
      name: 'layout',
      mode: 'out-in'
    },
    pageTransition: {
      name: 'page',
      mode: 'out-in'
    }
  },
  devtools: { enabled: true },
  experimental: {
    viewTransition: true
  },
  modules: [
    "@pinia/nuxt",
    "@nuxt/ui",
    "nuxt-auth-sanctum"
  ],
  sanctum: {
    baseUrl: 'http://localhost:8000',
  },
})