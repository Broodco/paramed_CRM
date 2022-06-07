<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import CreatePatientForm from '@/Pages/Patients/Partials/CreatePatientForm.vue';

</script>

<template>
    <AppLayout title="Create Patient">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Create Patient
            </h2>
        </template>

        <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                <CreatePatientForm />
            </div>
        </div>
    </AppLayout>
</template>
