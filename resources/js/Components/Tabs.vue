<script setup>
import {reactive, ref} from "vue";

const props = defineProps({
    tabs: Array,
})

defineEmits(['update:currentTab']);

</script>

<template>
    <div class="mt-2 2xl:mt-5">
        <div class="border-b border-gray-200">
            <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
                <nav class="-mb-px flex space-x-8" aria-label="Tabs">
                    <button
                        v-for="tab in tabs" :key="tab.name"
                        :class="[tab.current ? 'border-pink-500 text-gray-900' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300', 'whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm']"
                        :aria-current="tab.current ? 'page' : undefined"
                        @click="$emit('update:currentTab', tab.name)"
                    >
                        {{ tab.name }}
                    </button>
                </nav>
            </div>
        </div>
    </div>
</template>
