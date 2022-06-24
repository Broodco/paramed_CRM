<script>
import PatientsLayout from '@/Layouts/PatientsLayout';
export default {
    layout: PatientsLayout
}
</script>

<script setup>
import CreatePatientForm from '@/Pages/Patients/Partials/CreatePatientForm.vue';
import {getCurrentInstance, onMounted} from "vue";

const props = defineProps({
    patients: Array,
    patient: Object,
})

const pages = [
    { name: 'Patients', routeName: 'patients.index' },
    { name: 'Create', routeName: 'patients.create' },
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
    <div class="max-w-7xl mx-auto py-6 sm:px-6 px-2 lg:px-8">
        <CreatePatientForm />
    </div>
</template>
