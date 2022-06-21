<script setup>
import { ref } from 'vue'
import { Dialog, DialogPanel, TransitionChild, TransitionRoot } from '@headlessui/vue'
import {
    CalendarIcon, CogIcon,
    HomeIcon,
    MenuIcon, SearchCircleIcon, UserGroupIcon, ViewGridAddIcon,
} from '@heroicons/vue/outline'
import { ChevronLeftIcon } from '@heroicons/vue/solid'
import DesktopSideBar from "@/Layouts/Partials/DesktopSideBar";
import DrawerSideBar from "@/Layouts/Partials/DrawerSideBar";
import Breadcrumb from "@/Layouts/Partials/Breadcrumb";

const drawerSiderBar = ref(null);

const navigation = [
    { name: 'Dashboard', href: '/dashboard', icon: HomeIcon, current: false },
    { name: 'Calendar', href: '#', icon: CalendarIcon, current: false },
    { name: 'Patients', href: '/patients', icon: SearchCircleIcon, current: true },
    { name: 'Teams', href: '#', icon: UserGroupIcon, current: false },
];

const secondaryNavigation = [
    { name: 'Apps', href: '#', icon: ViewGridAddIcon },
    { name: 'Settings', href: '#', icon: CogIcon },
];

</script>

<template>
    <div class="h-full flex">
        <DrawerSideBar :user="$page.props.user" :navigation="navigation" :secondary-navigation="secondaryNavigation" ref="drawerSiderBar"/>

        <!-- Static sidebar for desktop -->
        <div class="hidden lg:flex lg:flex-shrink-0">
            <div class="flex flex-col w-64">
                <!-- Sidebar component, swap this element with another sidebar if you like -->
                <DesktopSideBar :user="$page.props.user" :navigation="navigation" :secondary-navigation="secondaryNavigation"/>
            </div>
        </div>
        <div class="flex flex-col w-full">
            <div class="flex flex-col min-w-0 flex-1 overflow-hidden">
                <div class="lg:hidden">
                    <div class="flex items-center justify-between bg-gray-50 border-b border-gray-200 px-4 py-1.5 h-12">
                        <div>
                            <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/workflow-mark-pink-500.svg" alt="Workflow" />
                        </div>
                        <div>
                            <button type="button" class="-mr-3 h-12 w-12 inline-flex items-center justify-center rounded-md text-gray-500 hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-pink-600" @click="drawerSiderBar.sidebarOpen = true">
                                <span class="sr-only">Open sidebar</span>
                                <MenuIcon class="h-6 w-6" aria-hidden="true" />
                            </button>
                        </div>
                    </div>
                </div>
                <slot name="breadcrumb" />

                <div class="flex-1 relative z-0 flex overflow-hidden">
                    <main class="flex-1 relative z-0 overflow-y-auto focus:outline-none xl:order-last">
                        <slot />
                    </main>
                    <slot name="aside" />
                </div>
            </div>

        </div>
    </div>
</template>
