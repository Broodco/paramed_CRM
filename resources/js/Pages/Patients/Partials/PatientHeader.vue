<script setup>
import { Inertia } from '@inertiajs/inertia'
import { InertiaLink} from "@inertiajs/inertia-vue3";
import {getCurrentInstance} from "vue";
import { PencilIcon, ArchiveIcon, ArrowLeftIcon, SaveIcon } from "@heroicons/vue/solid";

const props = defineProps({
    patient: Object,
    edit: Boolean,
    tabs: Array,
})

const openDeletionModal = () => {
    if (confirm('Are you sure you want to archive this patient?')) {
        Inertia.delete(route('patients.destroy', props.patient.id));
    }
}
const emitter = getCurrentInstance().appContext.config.globalProperties.emitter;

const emitUpdateSubmit = () => {
    emitter.emit('update_patient_submit');
}

</script>

<template>
    <div class="flex items-center align-middle justify-between">
        <div class="flex items-center align-middle">
            <div class="flex pt-4 ml-6">
                <img v-if="patient.imageUrl" class="h-16 w-16 rounded-full ring-4 ring-white sm:h-32 sm:w-32" :src="patient.imageUrl" alt="" />
                <span v-else class="inline-block h-16 w-16 rounded-full overflow-hidden bg-gray-100">
                <svg class="h-full w-full text-gray-300" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" />
                </svg>
            </span>
            </div>

            <div class="max-w-5xl px-4 sm:px-6 lg:px-8">
                <div class="sm:flex sm:items-end sm:space-x-5">
                    <div class="mt-4 sm:flex-1 sm:min-w-0 sm:flex sm:items-center sm:justify-end sm:space-x-6 sm:pb-1">
                        <div class="sm:hidden 2xl:block mt-6 min-w-0 flex-1">
                            <h1 class="text-2xl font-bold text-gray-900 truncate">
                                {{ patient.first_name }} {{ patient.last_name }}
                            </h1>
                        </div>
                    </div>
                </div>
                <div class="hidden sm:block 2xl:hidden min-w-0 flex-1">
                    <h1 class="text-2xl font-bold text-gray-900 truncate">
                        {{ patient.first_name }} {{ patient.last_name }}
                    </h1>
                </div>
            </div>
        </div>
        <div v-if="edit === false">
            <div class="flex items-between align-middle justify-around space-x-4 mr-4">
                <InertiaLink
                    :href="route('patients.edit', patient.id)"
                    method="get"
                    as="button"
                    type="button"
                    preserve-scroll replace preserve-state
                    class="inline-flex items-center mt-5 px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                >
                    <PencilIcon class="-ml-1 mr-2 h-5 w-5 text-gray-400" aria-hidden="true" />
                    <span>Edit</span>
                </InertiaLink>

                <button
                    v-on:click="openDeletionModal"
                    class="inline-flex items-center mt-5 px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                >
                    <ArchiveIcon class="-ml-1 mr-2 h-5 w-5 text-gray-400" aria-hidden="true" />
                    <span>Archive</span>
                </button>
            </div>
        </div>

        <div v-if="edit === true">
            <div class="flex items-between align-middle justify-around space-x-4 mr-4">
                <InertiaLink
                    :href="route('patients.show', patient.id)"
                    method="get"
                    as="button"
                    type="button"
                    preserve-scroll replace preserve-state
                    class="inline-flex items-center mt-5 px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                >
                    <ArrowLeftIcon class="-ml-1 mr-2 h-5 w-5 text-gray-400" aria-hidden="true" />
                    <span>Undo</span>
                </InertiaLink>
                <button
                    class="inline-flex items-center mt-5 px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    v-on:click="emitUpdateSubmit()"
                >
                    <SaveIcon class="-ml-1 mr-2 h-5 w-5 text-gray-400" aria-hidden="true" />
                    <span>Save</span>
                </button>
            </div>
        </div>
    </div>
</template>
