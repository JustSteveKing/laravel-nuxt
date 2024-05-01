// https://nuxt.com/docs/api/configuration/nuxt-config
export default defineNuxtConfig({
  devtools: { enabled: true },
  modules: ["@nuxt/ui", "nuxt-auth-sanctum"],
  sanctum: {
    baseUrl: 'http://localhost:8000',
  },
})