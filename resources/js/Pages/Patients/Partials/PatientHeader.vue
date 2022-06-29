<script setup>
const props = defineProps({
    patient: Object,
})
</script>

<template>
    <div class="flex items-center align-middle">
        <div class="flex pt-4 ml-6">
            <img v-if="patient.imageUrl" class="h-16 w-16 rounded-full ring-4 ring-white sm:h-32 sm:w-32" :src="patient.imageUrl" alt="" />
            <span v-else class="inline-block h-16 w-16 rounded-full overflow-hidden bg-gray-100">
                    <svg class="h-full w-full text-gray-300" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                </span>
        </div>

        <div class="max-w-5xl  px-4 sm:px-6 lg:px-8">
            <div class="sm:flex sm:items-end sm:space-x-5">
                <div class="mt-4 sm:flex-1 sm:min-w-0 sm:flex sm:items-center sm:justify-end sm:space-x-6 sm:pb-1">
                    <div class="sm:hidden 2xl:block mt-6 min-w-0 flex-1">
                        <h1 class="text-2xl font-bold text-gray-900 truncate">
                            {{ patient.first_name }} {{ patient.last_name }}
                        </h1>
                    </div>
                </div>
            </div>
            <div class="hidden sm:block 2xl:hidden min-w-0 flex-1">
                <h1 class="text-2xl font-bold text-gray-900 truncate">
                    {{ patient.first_name }} {{ patient.last_name }}
                </h1>
            </div>
        </div>
    </div>
</template>
