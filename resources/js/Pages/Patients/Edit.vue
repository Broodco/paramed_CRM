<script>
import PatientsLayout from '@/Layouts/PatientsLayout';
export default {
    layout: PatientsLayout
}
</script>

<script setup>
import {getCurrentInstance, onMounted, ref} from "vue";
import PatientHeader from "@/Pages/Patients/Partials/PatientHeader";
import Tabs from "@/Components/Tabs";
import PatientDescription from "@/Pages/Patients/Partials/PatientDescription";

const props = defineProps({
    patients: Array,
    patient: Object,
});

const pages = [
    { name: 'Patients', routeName: 'patients.index' },
    { name: 'Details', routeName: 'patients.show', parameters: [props.patient.id] },
];

const emitter = getCurrentInstance().appContext.config.globalProperties.emitter;

const tabs = ref([
    { name: 'Information', current: true, disabled: false },
    { name: 'Notes', current: false, disabled: true },
    { name: 'Documents', current: false, disabled: true },
    { name: 'Timeline', current: false, disabled: true },
]);

onMounted(() => {
    emitter.emit('page_loaded', {
        patients: JSON.parse(JSON.stringify(props.patients)),
        pages: pages
    });
});

const updateCurrentTab = (tabName) => {
    tabs.value.forEach((tab) => {
        if (tab.name === tabName) {
            tab.current = true;
        } else {
            tab.current = false;
        }
    })
};

</script>

<template>
    <article>
        <!--    Header-->
        <PatientHeader :patient="props.patient"/>
        <!--    Tabs -->
        <Tabs :tabs="tabs" @update:currentTab="updateCurrentTab" />
        <!--    First Tab Component -> Details-->
        <div v-if="(tabs.find((tab) => tab.name === 'Information')).current === true">
            <PatientDescription :patientData="props.patient" />
        </div>
    </article>
</template>
