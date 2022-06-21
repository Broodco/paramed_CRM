<script setup>
    import { useForm } from '@inertiajs/inertia-vue3';

    const form = useForm({
        first_name: null,
        last_name: null,
        birth_date: null,
        gender: null,
    });
</script>

<template>
    <form class="space-y-8 py-0.5 divide-y divide-gray-200" @submit.prevent="form.post('/patients')">
        <div class="space-y-8 divide-y divide-gray-200">
            <div>
                <div>
                    <h3 class="text-lg leading-6 font-medium text-gray-900">New Patient</h3>
                    <p class="mt-1 text-sm text-gray-500">Register a new patient for your team here.</p>
                </div>
            </div>

            <div class="pt-8">
                <div>
                    <h3 class="text-lg leading-6 font-medium text-gray-900">Personal Information</h3>
                </div>
                <div class="mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                    <div class="sm:col-span-3">
                        <label for="first_name-name" class="block text-sm font-medium text-gray-700"> First Name </label>
                        <div class="mt-1">
                            <input placeholder="First Name" type="text" name="first-name" id="first-name" autocomplete="given-name" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" />
                        </div>
                    </div>

                    <div class="sm:col-span-3">
                        <label for="last_name" class="block text-sm font-medium text-gray-700"> Last Name </label>
                        <div class="mt-1">
                            <input placeholder="Last Name" type="text" name="last-name" id="last-name" autocomplete="family-name" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" />
                        </div>
                    </div>

                    <div class="sm:col-span-3">
                        <label for="gender" class="block text-sm font-medium text-gray-700"> Gender </label>
                        <div class="mt-1">
                            <select id="gender" name="gender" autocomplete="gender" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                                <option :value="null" disabled selected>Select gender</option>
                                <option>female</option>
                                <option>male</option>
                                <option>other</option>
                            </select>
                        </div>
                    </div>

                    <div class="sm:col-span-3">
                        <label for="birth_date" class="block text-sm font-medium text-gray-700"> Birth Date </label>
                        <div class="mt-1">
                            <input type="date" name="birth_date" id="birth_date" placeholder="dd-mm-yyyy" min="1900-01-01" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" />
                        </div>
                    </div>


                </div>
            </div>
        </div>

        <div class="pt-5">
            <div class="flex justify-end">
                <button type="button" class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Cancel</button>
                <button type="submit" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Save</button>
            </div>
        </div>
    </form>
</template>
