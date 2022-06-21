<script setup>
import { InertiaLink } from '@inertiajs/inertia-vue3'

    defineProps({
        user: Object,
        navigation: Array,
        secondaryNavigation: Array,
    });

</script>

<template>
    <div class="flex-1 flex flex-col min-h-0 border-r border-gray-200 bg-gray-100">
        <div class="flex-1 flex flex-col pt-5 pb-4 overflow-y-auto">
            <div class="flex items-center flex-shrink-0 px-4">
                <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/workflow-logo-pink-500-mark-gray-900-text.svg" alt="Workflow" />
            </div>
            <nav class="mt-5 flex-1" aria-label="Sidebar">
                <div class="px-2 space-y-1">
                    <InertiaLink v-for="item in navigation" :key="item.name" :href="item.href" :class="[item.current ? 'bg-gray-200 text-gray-900' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900', 'group flex items-center px-2 py-2 text-sm font-medium rounded-md']" :aria-current="item.current ? 'page' : undefined">
                        <component :is="item.icon" :class="[item.current ? 'text-gray-500' : 'text-gray-400 group-hover:text-gray-500', 'mr-3 flex-shrink-0 h-6 w-6']" aria-hidden="true" />
                        {{ item.name }}
                    </InertiaLink>
                </div>
                <hr class="border-t border-gray-200 my-5" aria-hidden="true" />
                <div class="flex-1 px-2 space-y-1">
                    <InertiaLink v-for="item in secondaryNavigation" :key="item.name" :href="item.href" class="text-gray-600 hover:bg-gray-50 hover:text-gray-900 group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                        <component :is="item.icon" class="text-gray-400 group-hover:text-gray-500 mr-3 flex-shrink-0 h-6 w-6" aria-hidden="true" />
                        {{ item.name }}
                    </InertiaLink>
                </div>
            </nav>
        </div>
        <div class="flex-shrink-0 flex border-t border-gray-200 p-4">
            <a href="#" class="flex-shrink-0 w-full group block">
                <div class="flex items-center">
                    <div>
                        <img class="inline-block h-9 w-9 rounded-full" v-if="user.imageUrl" :src="user.imageUrl" alt="" />
                        <div v-else>
                                <span class="inline-block h-9 w-9 rounded-full overflow-hidden bg-gray-100">
                                    <svg class="h-full w-full text-gray-300" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" />
                                    </svg>
                                </span>
                        </div>

                    </div>
                    <div class="ml-3">
                        <p class="text-sm font-medium text-gray-700 group-hover:text-gray-900">
                            {{ user.name }}
                        </p>
                        <p class="text-xs font-medium text-gray-500 group-hover:text-gray-700">View profile</p>
                    </div>
                </div>
            </a>
        </div>
    </div>
</template>
