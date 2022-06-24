<script setup>
defineProps({
    message: String,
});
</script>

<template>
    <div v-show="message">
        <p class="text-sm text-red-600 pl-1 mt-1/2 -mb-5">
            {{ message }}
        </p>
    </div>
</template>
