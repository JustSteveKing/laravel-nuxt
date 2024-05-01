<script setup lang="ts">
useHead({
  bodyAttrs: {
    class: 'h-full bg-slate-50 dark:bg-slate-900 text-slate-900 dark:text-slate-50 font-sans antialiased'
  },
  htmlAttrs: {
    class: 'h-full bg-slate-50 dark:bg-slate-900'
  }
})
</script>

<template>
  <div class="h-screen">
    <NuxtLayout>
      <NuxtPage />
    </NuxtLayout>
  </div>
</template>

<style>
.page-enter-active,
.page-leave-active {
  transition: all 0.4s;
}
.page-enter-from,
.page-leave-to {
  opacity: 0;
  filter: blur(1rem);
}
</style>
