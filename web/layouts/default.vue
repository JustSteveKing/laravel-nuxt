<script setup lang="ts">
import { ref } from 'vue'
import {
  Dialog,
  DialogPanel,
  Menu,
  MenuButton,
  MenuItem,
  MenuItems,
  TransitionChild,
  TransitionRoot,
} from '@headlessui/vue'
import {
  Bars3Icon,
  BellIcon,
  CalendarIcon,
  ChartPieIcon,
  DocumentDuplicateIcon,
  FolderIcon,
  HomeIcon,
  UsersIcon,
  XMarkIcon,
} from '@heroicons/vue/24/outline'
import { ChevronDownIcon, MagnifyingGlassIcon } from '@heroicons/vue/20/solid'

const navigation = [
  { name: 'Dashboard', href: '/', icon: HomeIcon, current: true },
  { name: 'Users', href: '/users', icon: UsersIcon, current: false },
  { name: 'Projects', href: '#', icon: FolderIcon, current: false },
  { name: 'Calendar', href: '#', icon: CalendarIcon, current: false },
  { name: 'Documents', href: '#', icon: DocumentDuplicateIcon, current: false },
  { name: 'Reports', href: '#', icon: ChartPieIcon, current: false },
]
const userNavigation = [
  { name: 'Your profile', href: '#' },
  { name: 'Sign out', href: '#' },
]
const user = useSanctumUser();
const sidebarOpen = ref(false)
</script>

<template>
  <div>
    <TransitionRoot as="template" :show="sidebarOpen">
      <Dialog as="div" class="relative z-50 lg:hidden" @close="sidebarOpen = false">
        <TransitionChild as="template" enter="transition-opacity ease-linear duration-300" enter-from="opacity-0" enter-to="opacity-100" leave="transition-opacity ease-linear duration-300" leave-from="opacity-100" leave-to="opacity-0">
          <div class="fixed inset-0 bg-slate-900/80 dark:bg-slate-50/80" />
        </TransitionChild>

        <div class="fixed inset-0 flex">
          <TransitionChild as="template" enter="transition ease-in-out duration-300 transform" enter-from="-translate-x-full" enter-to="translate-x-0" leave="transition ease-in-out duration-300 transform" leave-from="translate-x-0" leave-to="-translate-x-full">
            <DialogPanel class="relative mr-16 flex w-full max-w-xs flex-1">
              <TransitionChild as="template" enter="ease-in-out duration-300" enter-from="opacity-0" enter-to="opacity-100" leave="ease-in-out duration-300" leave-from="opacity-100" leave-to="opacity-0">
                <div class="absolute left-full top-0 flex w-16 justify-center pt-5">
                  <button type="button" class="-m-2.5 p-2.5" @click="sidebarOpen = false">
                    <span class="sr-only">Close sidebar</span>
                    <XMarkIcon class="h-6 w-6 text-white dark:text-black" aria-hidden="true" />
                  </button>
                </div>
              </TransitionChild>

              <div class="flex grow flex-col gap-y-5 overflow-y-auto bg-slate-50 dark:bg-slate-900 px-6 pb-2 ring-1 ring-black/10 dark:ring-white/10">
                <div class="flex h-16 shrink-0 items-center">
                  <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=500" alt="Your Company" />
                </div>
                <nav class="flex flex-1 flex-col">
                  <ul role="list" class="-mx-2 flex-1 space-y-1">
                    <li v-for="item in navigation" :key="item.name">
                      <a :href="item.href" :class="[item.current ? 'bg-slate-100 dark:bg-slate-800 text-slate-900 dark:text-slate-50' : 'text-slate-400 hover:text-indigo-500 hover:bg-slate-100 dark:hover:bg-slate-800', 'group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold']">
                        <component :is="item.icon" class="h-6 w-6 shrink-0" aria-hidden="true" />
                        {{ item.name }}
                      </a>
                    </li>
                  </ul>
                </nav>
              </div>
            </DialogPanel>
          </TransitionChild>
        </div>
      </Dialog>
    </TransitionRoot>
    <div class="hidden lg:fixed lg:inset-y-0 lg:left-0 lg:z-50 lg:block lg:w-20 lg:overflow-y-auto lg:bg-slate-50 dark:lg:bg-slate-900 lg:pb-4">
      <div class="flex h-16 shrink-0 items-center justify-center">
        <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=500" alt="Your Company" />
      </div>
      <nav class="mt-8">
        <ul role="list" class="flex flex-col items-center space-y-1">
          <li v-for="item in navigation" :key="item.name">
            <a :href="item.href" :class="[item.current ? 'bg-slate-100 dark:bg-slate-800 text-slate-900 dark:text-slate-50' : 'text-slate-400 hover:text-indigo-500 hover:bg-slate-100 dark:hover:bg-slate-800', 'group flex gap-x-3 rounded-md p-3 text-sm leading-6 font-semibold']">
              <component :is="item.icon" class="h-6 w-6 shrink-0" aria-hidden="true" />
              <span class="sr-only">{{ item.name }}</span>
            </a>
          </li>
        </ul>
      </nav>
    </div>

    <div class="lg:pl-20">
      <div class="sticky top-0 z-40 flex h-16 shrink-0 items-center gap-x-4 border-b border-slate-950 dark:border-slate-200 bg-slate-50 dark:bg-slate-900 px-4 shadow-sm sm:gap-x-6 sm:px-6 lg:px-8">
        <button type="button" class="-m-2.5 p-2.5 text-slate-700 dark:text-slate-300 lg:hidden" @click="sidebarOpen = true">
          <span class="sr-only">Open sidebar</span>
          <Bars3Icon class="h-6 w-6" aria-hidden="true" />
        </button>

        <div class="h-6 w-px bg-slate-900/10 dark:bg-slate-50/10 lg:hidden" aria-hidden="true" />

        <div class="flex flex-1 gap-x-4 self-stretch lg:gap-x-6">
          <form class="relative flex flex-1" action="#" method="GET">
            <label for="search-field" class="sr-only">Search</label>
            <MagnifyingGlassIcon class="pointer-events-none absolute inset-y-0 left-0 h-full w-5 text-slate-400" aria-hidden="true" />
            <input id="search-field" class="block h-full w-full border-0 py-0 pl-8 pr-0 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm" placeholder="Search..." type="search" name="search" />
          </form>
          <div class="flex items-center gap-x-4 lg:gap-x-6">
            <button type="button" class="-m-2.5 p-2.5 text-gray-400 hover:text-gray-500">
              <span class="sr-only">View notifications</span>
              <BellIcon class="h-6 w-6" aria-hidden="true" />
            </button>

            <div class="hidden lg:block lg:h-6 lg:w-px bg-slate-900/10 dark:bg-slate-50/10" aria-hidden="true" />

<!--            <Menu as="div" class="relative">-->
<!--              <MenuButton class="-m-1.5 flex items-center p-1.5">-->
<!--                <span class="sr-only">Open user menu</span>-->
<!--                <span class="hidden lg:flex lg:items-center">-->
<!--                  <span class="text-sm font-semibold leading-6" aria-hidden="true">{{user.name}}</span>-->
<!--                  <ChevronDownIcon class="ml-2 h-5 w-5" aria-hidden="true" />-->
<!--                </span>-->
<!--              </MenuButton>-->
<!--              <transition enter-active-class="transition ease-out duration-100" enter-from-class="transform opacity-0 scale-95" enter-to-class="transform opacity-100 scale-100" leave-active-class="transition ease-in duration-75" leave-from-class="transform opacity-100 scale-100" leave-to-class="transform opacity-0 scale-95">-->
<!--                <MenuItems class="absolute right-0 z-10 mt-2.5 w-32 origin-top-right rounded-md bg-slate-100 dark:bg-slate-800 py-2 shadow-lg ring-1 ring-slate-900/5 dark:ring-slate-50/5 focus:outline-none">-->
<!--                  <MenuItem v-for="item in userNavigation" :key="item.name" v-slot="{ active }">-->
<!--                    <a :href="item.href" :class="[active ? 'bg-gray-50' : '', 'block px-3 py-1 text-sm leading-6']">{{ item.name }}</a>-->
<!--                  </MenuItem>-->
<!--                </MenuItems>-->
<!--              </transition>-->
<!--            </Menu>-->
          </div>
        </div>
      </div>

      <slot />
    </div>
  </div>
</template>