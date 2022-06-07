<script setup>
import { useForm } from '@inertiajs/inertia-vue3';
import JetButton from '@/Jetstream/Button.vue';
import JetFormSection from '@/Jetstream/FormSection.vue';
import JetInput from '@/Jetstream/Input.vue';
import JetInputError from '@/Jetstream/InputError.vue';
import JetLabel from '@/Jetstream/Label.vue';

const form = useForm({
    first_name: '',
    last_name: '',
    birth_date: '',
    gender: '',
});

const createTeam = () => {
    form.post(route('patients.store'), {
        errorBag: 'createPatient',
        preserveScroll: true,
    });
};
</script>

<template>
    <JetFormSection @submitted="createTeam">
        <template #title>
            New Patient
        </template>

        <template #description>
            Register a new patient for your team.
        </template>

        <template #form>
            <div class="col-span-6">
                <JetLabel value="Current Team" />

                <div class="flex items-center mt-2">
                    <div class="ml-4 leading-tight">
                        <div>{{ $page.props.user.current_team.name }}</div>
                    </div>
                </div>
            </div>

            <div class="col-span-6 sm:col-span-4">
                <JetLabel for="first_name" value="First Name" />
                <JetInput
                    id="first_name"
                    v-model="form.first_name"
                    type="text"
                    class="block w-full mt-1"
                    autofocus
                />
                <JetInputError :message="form.errors.first_name" class="mt-2" />
            </div>
            <div class="col-span-6 sm:col-span-4">
                <JetLabel for="last_name" value="Last Name" />
                <JetInput
                    id="last_name"
                    v-model="form.last_name"
                    type="text"
                    class="block w-full mt-1"
                    autofocus
                />
                <JetInputError :message="form.errors.last_name" class="mt-2" />
            </div>
            <div class="col-span-6 sm:col-span-4">
                <JetLabel for="gender" value="Gender" />
                <JetInput
                    id="gender"
                    v-model="form.gender"
                    type="text"
                    class="block w-full mt-1"
                    autofocus
                />
                <JetInputError :message="form.errors.gender" class="mt-2" />
            </div>
            <div class="col-span-6 sm:col-span-4">
                <JetLabel for="birth_date" value="Birth Date" />
                <JetInput
                    id="birth_date"
                    v-model="form.birth_date"
                    type="text"
                    class="block w-full mt-1"
                    autofocus
                />
                <JetInputError :message="form.errors.birth_date" class="mt-2" />
            </div>
        </template>

        <template #actions>
            <JetButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                Create
            </JetButton>
        </template>
    </JetFormSection>
</template>
