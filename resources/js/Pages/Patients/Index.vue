<script>
import PatientsLayout from '@/Layouts/PatientsLayout.vue';
export default {
    layout: PatientsLayout
}
</script>

<script setup>
import {InertiaLink, usePage} from "@inertiajs/inertia-vue3";
import {getCurrentInstance, onMounted} from "vue";

const props = defineProps({
    patients: Array,
});

const pages = [
    { name: 'Patients', routeName: 'patients.index' },
]

const emitter = getCurrentInstance().appContext.config.globalProperties.emitter;

onMounted(() => {
    emitter.emit('page_loaded', {
        patients: JSON.parse(JSON.stringify(props.patients)),
        pages: pages
    });
});

</script>

<template>
    <div class="container mx-auto sm:px-6 lg:px-8">
        <div class="px-4 py-5 sm:p-6 xl:px-44">
            <InertiaLink preserve-scroll replace preserve-state href="/patients/create" method="get" as="button" type="button" class="relative block w-full border-2 border-gray-300 border-dashed rounded-lg p-12 text-center hover:border-gray-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                <svg width="100%" height="100%" class="mx-auto h-16 w-16 text-gray-400 flex items-center align-middle" xmlns="http://www.w3.org/2000/svg" stroke="currentColor" fill="none" viewBox="0 0 24 26" aria-hidden="true">
                    <path width="100%" height="100%" d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" />
                </svg>
                <span class="mt-2 block text-sm font-medium text-gray-900"> Select or create a new patient </span>
            </InertiaLink>
        </div>
    </div>
</template>
