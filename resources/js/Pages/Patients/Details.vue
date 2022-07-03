<script>
import PatientsLayout from '@/Layouts/PatientsLayout.vue';
export default {
    layout: PatientsLayout
}
</script>

<script setup>
import {getCurrentInstance, onMounted, ref} from "vue";
import PatientHeader from "@/Pages/Patients/Partials/PatientHeader.vue";
import Tabs from "@/Components/Tabs.vue";
import PatientDescription from "@/Pages/Patients/Partials/PatientDescription.vue";

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
    { name: 'Notes', current: false, disabled: false },
    { name: 'Documents', current: false, disabled: false },
    { name: 'Timeline', current: false, disabled: false },
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
        <PatientHeader :tabs="tabs" :patient="props.patient" :edit="false"/>
<!--    Tabs -->
        <Tabs :tabs="tabs" @update:currentTab="updateCurrentTab" />
<!--    First Tab Component -> Details-->
        <div v-if="(tabs.find((tab) => tab.name === 'Information')).current === true">
            <PatientDescription :patientData="props.patient" />
        </div>
<!--    Second Tab Component -> Notes-->
        <div v-if="(tabs.find((tab) => tab.name === 'Notes')).current === true">
            Notes
        </div>
<!--    Thrid Tab Component -> Documents-->
        <div v-if="(tabs.find((tab) => tab.name === 'Documents')).current === true">
            Docs
        </div>
        <!--    Fourth Tab Component -> Timeline/Calendar-->
        <div v-if="(tabs.find((tab) => tab.name === 'Timeline')).current === true">
            Timeline
        </div>

    </article>
</template>
