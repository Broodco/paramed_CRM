<script setup>
const props = defineProps({
    fieldName: String,
    labelValue: String,
})
</script>

<template>
    <label :for="fieldName" class="block text-sm font-medium text-gray-500"> {{ labelValue }} </label>
</template>
