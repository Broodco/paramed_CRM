<script>
import PatientsLayout from '@/Layouts/PatientsLayout';
export default {
    layout: PatientsLayout
}
</script>

<script setup>
import {getCurrentInstance, onMounted} from "vue";

const props = defineProps({
    patients: Array,
    patient: Object,
})

const pages = [
    { name: 'Patients', routeName: 'patients.index' },
    { name: 'Details', routeName: 'patients.show', parameters: [props.patient.id] },
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
    <article>
        Hello World

        {{ patient.name }}
    </article>
</template>
