<script setup>
import {defineProps} from "vue";

const props = defineProps({
    fieldName: String,
    fieldValue: String,
})
</script>

<template>
    <div class="sm:col-span-1">
        <dt class="text-sm font-medium text-gray-500">
            {{ fieldName}}
        </dt>
        <dd class="mt-1 text-sm text-gray-900">
            {{ fieldValue }}
        </dd>
    </div>
</template>
