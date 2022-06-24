<script setup>
import { onMounted, ref } from 'vue';

defineProps({
    modelValue: String,
    availableOptions: Array,
});
const notificationMethods = [
    { id: 'email', title: 'Email' },
    { id: 'sms', title: 'Phone (SMS)' },
    { id: 'push', title: 'Push notification' },
];

defineEmits(['update:modelValue']);

const input = ref(null);

onMounted(() => {
    if (input.value.hasAttribute('autofocus')) {
        input.value.focus();
    }
});

defineExpose({ focus: () => input.value.focus() });
</script>

<template>
    <fieldset class="mt-4">
        <legend class="sr-only">Notification method</legend>
        <div class="space-y-4 sm:flex sm:items-center sm:space-y-0 sm:space-x-10">
            <div class="space-y-4">
                <div v-for="notificationMethod in notificationMethods" :key="notificationMethod.id" class="flex items-center">
                    <input :id="notificationMethod.id" name="notification-method" type="radio" :checked="notificationMethod.id === 'email'" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300" />
                    <label :for="notificationMethod.id" class="ml-3 block text-sm font-medium text-gray-700">
                        {{ notificationMethod.title }}
                    </label>
                </div>
            </div>
        </div>
    </fieldset>
</template>
