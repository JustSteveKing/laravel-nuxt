<script setup lang="ts">
definePageMeta({
  title: 'Sign in to your account',
})

const client = useSanctumClient();

const { data, pending, error, refresh } = await useAsyncData('users', () =>
    client('/api/users')
);
</script>

<template>
  <div>
    <section id="content" aria-labelledby="content" class="py-12">
      <UContainer>
        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
          <div v-for="user in data" :key="user.id" class="relative flex items-center space-x-3 rounded-lg border border-gray-300 bg-white px-6 py-5 shadow-sm focus-within:ring-2 focus-within:ring-indigo-500 focus-within:ring-offset-2 hover:border-gray-400">
            <div class="min-w-0 flex-1">
              <a href="#" class="focus:outline-none">
                <span class="absolute inset-0" aria-hidden="true" />
                <p class="text-sm font-medium text-gray-900">{{ user.name }}</p>
                <p class="truncate text-sm text-gray-500">{{ user.email }}</p>
              </a>
            </div>
          </div>
        </div>
      </UContainer>
    </section>
  </div>
</template>