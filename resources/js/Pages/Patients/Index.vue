<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Link } from '@inertiajs/inertia-vue3'

defineProps({
    patients: Object,
});
</script>

<template>
    <AppLayout title="Create Patient">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Patients of your team
            </h2>
        </template>

        <Link href="/patients/create" method="get" as="button" type="button">Create a new patient</Link>

        <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                <div v-for="patient in patients">
                    {{patient.first_name}}
                    {{patient.last_name}}
                    {{patient.birth_date}}
                    {{patient.gender}}
                </div>
            </div>
        </div>

    </AppLayout>
</template>
