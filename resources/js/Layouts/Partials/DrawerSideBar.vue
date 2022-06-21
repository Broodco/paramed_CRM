<script setup>
import { ref } from 'vue'
import { Dialog, DialogPanel, TransitionChild, TransitionRoot } from '@headlessui/vue'
import {
    XIcon,
} from '@heroicons/vue/outline'

defineProps({
    user: Object,
    navigation: Array,
    secondaryNavigation: Array,
});

const sidebarOpen = ref(false)

defineExpose({
    sidebarOpen
})
</script>

<template>
    <TransitionRoot as="template" :show="sidebarOpen">
        <Dialog as="div" class="relative z-40 lg:hidden" @close="sidebarOpen = false">
            <TransitionChild as="template" enter="transition-opacity ease-linear duration-300" enter-from="opacity-0" enter-to="opacity-100" leave="transition-opacity ease-linear duration-300" leave-from="opacity-100" leave-to="opacity-0">
                <div class="fixed inset-0 bg-gray-600 bg-opacity-75" />
            </TransitionChild>

            <div class="fixed inset-0 flex z-40">
                <TransitionChild as="template" enter="transition ease-in-out duration-300 transform" enter-from="-translate-x-full" enter-to="translate-x-0" leave="transition ease-in-out duration-300 transform" leave-from="translate-x-0" leave-to="-translate-x-full">
                    <DialogPanel class="relative flex-1 flex flex-col max-w-xs w-full bg-white focus:outline-none">
                        <TransitionChild as="template" enter="ease-in-out duration-300" enter-from="opacity-0" enter-to="opacity-100" leave="ease-in-out duration-300" leave-from="opacity-100" leave-to="opacity-0">
                            <div class="absolute top-0 right-0 -mr-12 pt-2">
                                <button type="button" class="ml-1 flex items-center justify-center h-10 w-10 rounded-full focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" @click="sidebarOpen = false">
                                    <span class="sr-only">Close sidebar</span>
                                    <XIcon class="h-6 w-6 text-white" aria-hidden="true" />
                                </button>
                            </div>
                        </TransitionChild>
                        <div class="flex-1 h-0 pt-5 pb-4 overflow-y-auto">
                            <div class="flex-shrink-0 flex items-center px-4">
                                <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/workflow-logo-pink-500-mark-gray-900-text.svg" alt="Workflow" />
                            </div>
                            <nav aria-label="Sidebar" class="mt-5">
                                <div class="px-2 space-y-1">
                                    <a v-for="item in navigation" :key="item.name" :href="item.href" :class="[item.current ? 'bg-gray-100 text-gray-900' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900', 'group flex items-center px-2 py-2 text-base font-medium rounded-md']" :aria-current="item.current ? 'page' : undefined">
                                        <component :is="item.icon" :class="[item.current ? 'text-gray-500' : 'text-gray-400 group-hover:text-gray-500', 'mr-4 h-6 w-6']" aria-hidden="true" />
                                        {{ item.name }}
                                    </a>
                                </div>
                                <hr class="border-t border-gray-200 my-5" aria-hidden="true" />
                                <div class="px-2 space-y-1">
                                    <a v-for="item in secondaryNavigation" :key="item.name" :href="item.href" class="text-gray-600 hover:bg-gray-50 hover:text-gray-900 group flex items-center px-2 py-2 text-base font-medium rounded-md">
                                        <component :is="item.icon" class="text-gray-400 group-hover:text-gray-500 mr-4 flex-shrink-0 h-6 w-6" aria-hidden="true" />
                                        {{ item.name }}
                                    </a>
                                </div>
                            </nav>
                        </div>
                        <div class="flex-shrink-0 flex border-t border-gray-200 p-4">
                            <a href="#" class="flex-shrink-0 group block">
                                <div class="flex items-center">
                                    <div>
                                        <img class="inline-block h-10 w-10 rounded-full" :src="user.imageUrl" alt="" />
                                    </div>
                                    <div class="ml-3">
                                        <p class="text-base font-medium text-gray-700 group-hover:text-gray-900">
                                            {{ user.name }}
                                        </p>
                                        <p class="text-sm font-medium text-gray-500 group-hover:text-gray-700">View profile</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </DialogPanel>
                </TransitionChild>
                <div class="flex-shrink-0 w-14" aria-hidden="true">
                    <!-- Force sidebar to shrink to fit close icon -->
                </div>
            </div>
        </Dialog>
    </TransitionRoot>
</template>
