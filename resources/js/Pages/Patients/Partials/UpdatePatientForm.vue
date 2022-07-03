<script setup>
import { useForm } from '@inertiajs/inertia-vue3';
import EditField from "../../../Components/Form/EditField.vue";
import InputError from "@/Components/Form/InputError.vue";
import FieldLabel from "@/Components/Form/FieldLabel.vue";
import {getCurrentInstance, onMounted, onUnmounted} from "vue";

const props = defineProps({
    patientData: Object,
})

const form = useForm({
    first_name: props.patientData.first_name,
    last_name: props.patientData.last_name,
    birth_date: props.patientData.birth_date,
    gender: props.patientData.gender,
});

const updatePatient = () => {
    form.put(route('patients.update', props.patientData.id), {
        preserveScroll: true,
    });
};

const emitter = getCurrentInstance().appContext.config.globalProperties.emitter;

onMounted(() => {
    emitter.on('update_patient_submit', e => {
        console.log('Update patient submission !');
        updatePatient();
    });
})

onUnmounted(() => {
    emitter.off('update_patient_submit');
});


</script>

<template>
    <div class="mt-6 max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        <form class="mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6" @submit.prevent="updatePatient" ref="updatePatient">
            <!-- First Name -->
            <div class="sm:col-span-3">
                <field-label fieldName="first-name" labelValue="First Name" />
                <div class="mt-1">
                    <EditField
                        placeholder="First Name"
                        type="text"
                        id="first-name"
                        v-model="form.first_name"
                    />
                </div>
                <InputError :message="form.errors.first_name" />

            </div>

            <!-- Last Name -->
            <div class="sm:col-span-3">
                <field-label fieldName="last-name" labelValue="Last Name" />
                <div class="mt-1">
                    <EditField
                        placeholder="Last Name"
                        type="text"
                        id="last-name"
                        v-model="form.last_name"
                    />
                </div>
                <InputError :message="form.errors.last_name" />

            </div>

            <!-- Birth Date -->
            <div class="sm:col-span-3">
                <field-label fieldName="birth_date" labelValue="Birth Date" />
                <div class="mt-1">
                    <EditField
                        type="date"
                        id="birth_date"
                        v-model="form.birth_date"
                    />
                </div>
                <InputError :message="form.errors.birth_date" />

            </div>

            <!-- Gender -->
            <div class="sm:col-span-3">
                <field-label fieldName="gender" labelValue="Gender" />
                <div class="mt-1">
                    <select id="gender" name="gender" autocomplete="gender" v-model="form.gender"
                            class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"
                    >
                        <option :value="null" disabled selected>Select gender</option>
                        <option>female</option>
                        <option>male</option>
                        <option>other</option>
                    </select>
                </div>
                <InputError :message="form.errors.gender" />

            </div>

        </form>
    </div>
</template>
