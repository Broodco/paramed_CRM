<script setup>
import { InertiaLink } from '@inertiajs/inertia-vue3';
import {HomeIcon} from "@heroicons/vue/solid";
import {getCurrentInstance, onMounted, ref} from "vue";

let pages = ref([]);
const emitter = getCurrentInstance().appContext.config.globalProperties.emitter;

onMounted(() => {
    emitter.on('page_loaded', e => {
        pages.value = e.pages;
    });
})


</script>

<template>
    <!-- Breadcrumb -->
    <nav class="bg-gray-700 border-b border-gray-200 flex" aria-label="Breadcrumb">
        <ol role="list" class="w-full mx-auto px-4 flex space-x-4 sm:px-6">
            <li class="flex">
                <div class="flex items-center">
                    <InertiaLink href="/dashboard" class="text-white hover:text-gray-200">
                        <HomeIcon class="flex-shrink-0 h-5 w-5" aria-hidden="true" />
                        <span class="sr-only">Home</span>
                    </InertiaLink>
                </div>
            </li>
            <li v-for="page in pages" :key="page.name" class="flex">
                <div class="flex items-center">
                    <svg class="flex-shrink-0 w-6 h-full text-gray-200" viewBox="0 0 24 44" preserveAspectRatio="none" fill="currentColor" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path d="M.293 0l22 22-22 22h1.414l22-22-22-22H.293z" />
                    </svg>
                    <InertiaLink preserve-scroll replace preserve-state :href="route(page.routeName, page.parameters ?? [])" class="text-white ml-4 text-sm font-medium hover:text-gray-200">{{ page.name }}</InertiaLink>
                </div>
            </li>
        </ol>
    </nav>
</template>
