<script setup>
import {
    FilterIcon, SearchIcon, PlusIcon,
} from '@heroicons/vue/outline'
import { InertiaLink } from '@inertiajs/inertia-vue3'
import {getCurrentInstance, onMounted, ref} from "vue";

let patients = ref([]);
let directory = ref({});
const emitter = getCurrentInstance().appContext.config.globalProperties.emitter;

onMounted(() => {
    emitter.on('page_loaded', e => {
        patients.value = e.patients;
        directory.value = e.patients.reduce((r, e) => {
            let group = e.last_name[0];

            if (!r[group]) {
                r[group] = {group, children: [e]}
            } else {
                r[group].children.push(e);
            }
            return r;
        }, {});
    });
})

</script>

<template>
    <aside class="order-first flex flex-col flex-shrink-0 w-full sm:w-80 border-r border-gray-200">
        <div class="px-4 pt-5 pb-6">
            <h2 class="text-lg font-medium text-gray-900">Directory</h2>
            <p class="mt-1 text-sm text-gray-600">Search directory of {{patients.length}} patients.</p>
            <div class="flex space-x-3">
                <form class="mt-3 flex space-x-3" action="#">
                    <div class="flex-1 min-w-0">
                        <label for="search" class="sr-only">Search</label>
                        <div class="relative rounded-md shadow-sm">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <SearchIcon class="h-5 w-5 text-gray-400" aria-hidden="true" />
                            </div>
                            <input type="search" name="search" id="search" class="focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 sm:text-sm border-gray-300 rounded-md" placeholder="Search" />
                        </div>
                    </div>
                    <button type="submit" class="inline-flex justify-center px-3.5 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        <FilterIcon class="h-5 w-5 text-gray-400" aria-hidden="true" />
                        <span class="sr-only">Search</span>
                    </button>
                </form>
                <InertiaLink
                    :href="route('patients.create')"
                    method="get"
                    as="button"
                    type="button"
                    preserve-scroll replace preserve-state
                    class="px-3.5 py-2 mt-3 border border-gray-300 shadow-sm text-sm font-medium rounded-md bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500"
                >
                    <div class="rounded-md inset-y-0 left-0 pointer-events-none">
                        <PlusIcon class="h-5 w-5 text-gray-400" aria-hidden="true" />
                    </div>
                </InertiaLink>
            </div>
        </div>

        <!-- Directory list -->
        <nav class="flex-1 min-h-0 overflow-y-auto h-full" aria-label="Directory" scroll-region>
            <div v-for="letter in Object.keys(directory)" :key="letter" class="relative">
                <div class="z-10 sticky top-0 border-t border-b border-gray-200 bg-gray-50 px-6 py-1 text-sm font-medium text-gray-500">
                    <h3>{{ letter }}</h3>
                </div>
                <ul role="list" class="relative z-0 divide-y divide-gray-200">
                    <li v-for="patient in directory[letter].children" :key="patient.id">
                        <div class="relative px-6 py-5 flex items-center space-x-3 hover:bg-gray-50 focus-within:ring-2 focus-within:ring-inset focus-within:ring-blue-500">
                            <div v-if="patient.imageUrl" class="flex-shrink-0">
                                <img class="h-10 w-10 rounded-full" :src="patient.imageUrl" alt="" />
                            </div>
                            <div v-else class="flex-shrink-0">
                                <span class="inline-block h-10 w-10 rounded-full overflow-hidden bg-gray-100">
                                    <svg class="h-full w-full text-gray-300" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" />
                                    </svg>
                                </span>
                            </div>
                            <div class="flex-1 min-w-0">
                                <InertiaLink
                                    :href="route('patients.show', patient.id)"
                                    preserve-scroll replace preserve-state
                                    class="focus:outline-none"
                                >
                                    <!-- Extend touch target to entire panel -->
                                    <span class="absolute inset-0" aria-hidden="true" />
                                    <p class="text-sm font-medium text-gray-900">
                                        {{ patient.first_name }} {{ patient.last_name}}
                                    </p>
                                    <p class="text-sm text-gray-500 truncate">
                                        {{ patient.birth_date }}
                                    </p>
                                </InertiaLink>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </aside>
</template>
