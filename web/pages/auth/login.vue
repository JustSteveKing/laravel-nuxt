<script setup lang="ts">
import { z } from 'zod'
import type { FormSubmitEvent } from '#ui/types'

type Schema = z.output<typeof schema>

definePageMeta({
  layout: 'guest',
  title: 'Sign in to your account',
  middleware: 'sanctum:guest',
})

const { login } = useSanctumAuth();

const schema = z.object({
  email: z.string().email('Invalid email'),
  password: z.string().min(8, 'Must be at least 8 characters')
})

const state = reactive({
  email: undefined,
  password: undefined
})

async function onSubmit (event: FormSubmitEvent<Schema>) {
  await login(event.data)
}
</script>

<template>
  <section id="form" aria-labelledby="form" class="flex min-h-full flex-1 flex-col justify-center">

    <div class="sm:mx-auto sm:w-full sm:max-w-7xl py-12">
      <img class="mx-auto h-10 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600" alt="Your Company" />
      <h2 class="mt-6 text-center text-2xl font-bold leading-9 tracking-tight">Sign in to your account</h2>
    </div>

    <UContainer :ui="{constrained: 'sm:mx-auto sm:w-full sm:max-w-7xl'}">
      <UCard>
        <UForm :schema="schema" :state="state" class="space-y-4" @submit="onSubmit">
          <UFormGroup label="Email" name="email">
            <UInput v-model="state.email" />
          </UFormGroup>

          <UFormGroup label="Password" name="password">
            <UInput v-model="state.password" type="password" />
          </UFormGroup>

          <UButton type="submit">
            Submit
          </UButton>
        </UForm>
        <template #footer>
          <ULink
              to="/components/link"
              active-class="text-primary"
              inactive-class="text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-200"
          >
            Link
          </ULink>
        </template>
      </UCard>
    </UContainer>
  </section>
</template>
