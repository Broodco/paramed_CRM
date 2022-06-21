<script setup>
    import PatientsLayout from '@/Layouts/PatientsLayout';
    import PatientsDirectory from "@/Layouts/Partials/PatientsDirectory";
    import Breadcrumb from "@/Layouts/Partials/Breadcrumb";

    const props = defineProps({
        patients: Array,
        patient: Object,
    })

    const pages = [
        { name: 'Patients', routeName: 'patients.index' },
        { name: 'Details', routeName: 'patients.show', parameters: [props.patient.id] },
    ]
</script>

<template>
    <PatientsLayout>
        <template v-slot:aside>
            <PatientsDirectory class="hidden md:block md:overflow-auto w-full sm:w-90" :patients="patients"/>
        </template>
        <template v-slot:breadcrumb>
            <Breadcrumb :pages="pages" />
        </template>
        <article>
            Hello World

            {{ patient.name }}
        </article>
    </PatientsLayout>
</template>
