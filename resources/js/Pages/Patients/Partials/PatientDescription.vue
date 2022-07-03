<script setup>

import DescriptionField from "@/Components/DescriptionField.vue";

const props = defineProps({
    patientData: Object,
})

</script>

<template>
    <div class="mt-6 max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        <dl class="grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-2">
            <DescriptionField :field-name="'First Name'" :field-value="patientData.first_name" />
            <DescriptionField :field-name="'Last Name'" :field-value="patientData.last_name" />
            <DescriptionField :field-name="'Birth Date'" :field-value="patientData.birth_date" />
            <DescriptionField :field-name="'Gender'" :field-value="patientData.gender" />
        </dl>
    </div>
</template>
