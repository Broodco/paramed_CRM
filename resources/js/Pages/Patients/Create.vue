<script setup>
import PatientsLayout from '@/Layouts/PatientsLayout';
import PatientsDirectory from "@/Layouts/Partials/PatientsDirectory";
import Breadcrumb from "@/Layouts/Partials/Breadcrumb";
import CreatePatientForm from '@/Pages/Patients/Partials/CreatePatientForm.vue';

const props = defineProps({
    patients: Array,
    patient: Object,
})

const pages = [
    { name: 'Patients', routeName: 'patients.index' },
    { name: 'Create', routeName: 'patients.create' },
]

</script>

<template>
    <PatientsLayout>
        <template v-slot:aside>
            <PatientsDirectory class="hidden md:block w-full sm:w-90" :patients="patients"/>
        </template>
        <template v-slot:breadcrumb>
            <Breadcrumb :pages="pages" />
        </template>
        <div class="max-w-7xl mx-auto py-6 sm:px-6 px-2 lg:px-8">
            <CreatePatientForm />
        </div>
    </PatientsLayout>
</template>
