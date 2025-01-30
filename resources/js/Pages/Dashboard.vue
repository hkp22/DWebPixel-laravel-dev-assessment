<script setup lang="ts">
import Hero from '@/Components/Dashboard/Hero.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { JobListing } from '@/types/job-listing';
import { Paginated } from '@/types/pagination';

defineProps<{
    jobs: Paginated<JobListing>;
}>();


</script>

<template>

    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <!-- Hero -->
        <Hero />

        <!-- Job List -->
        <div class="bg-white">
            <div class="container py-5">

                <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                    <div v-for="job in jobs.data" class="max-w-2xl p-6 mx-auto mb-4 bg-white rounded-lg shadow-md">
                        <!-- Card Header -->
                        <div class="flex items-start justify-between mb-4">
                            <div class="flex items-start gap-4">
                                <!-- Company Logo -->
                                <div v-if="job.company_logo"
                                    class="flex items-center justify-center w-12 h-12 bg-gray-200 rounded-lg">
                                    <img :src="job.company_logo" :alt="job.company_name" />
                                </div>

                                <!-- Job Title & Company -->
                                <div>
                                    <h2 class="text-lg font-bold text-gray-800">{{ job.title }}</h2>
                                    <p class="text-sm text-gray-500">{{ job.company_name }}</p>
                                </div>
                            </div>

                            <div class="flex flex-wrap gap-2 mb-4">
                                <span v-for="extraInfo in job.extra"
                                    class="px-3 py-1 text-sm text-gray-600 bg-gray-200 rounded-full">
                                    {{ extraInfo }}
                                </span>
                            </div>
                        </div>

                        <!-- Job Details -->
                        <div class="flex flex-wrap gap-2 mb-4">
                            <div
                                class="flex items-center pr-2 space-x-1 text-sm text-gray-600 border-r border-gray-300">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 0 0 .75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 0 0-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0 1 12 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 0 1-.673-.38m0 0A2.18 2.18 0 0 1 3 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 0 1 3.413-.387m7.5 0V5.25A2.25 2.25 0 0 0 13.5 3h-3a2.25 2.25 0 0 0-2.25 2.25v.894m7.5 0a48.667 48.667 0 0 0-7.5 0M12 12.75h.008v.008H12v-.008Z" />
                                </svg>

                                <span>
                                    {{ job.experience }}
                                </span>
                            </div>

                            <div
                                class="flex items-center pr-2 space-x-1 text-sm text-gray-600 border-r border-gray-300">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15 8.25H9m6 3H9m3 6-3-3h1.5a3 3 0 1 0 0-6M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>

                                <span>
                                    {{ job.salary }}
                                </span>
                            </div>

                            <div class="flex items-center pr-2 space-x-1 text-sm text-gray-600">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                                </svg>

                                <span>
                                    {{ job.location }}
                                </span>
                            </div>
                        </div>

                        <!-- Description Excerpt -->
                        <p class="mb-4 text-gray-600 line-clamp-2">
                            {{ job.description }}
                        </p>

                        <!-- Tech Stack -->
                        <div class="flex flex-wrap mb-4">
                            <div v-for="(skill, index) in job.skills" class="flex items-center text-sm text-gray-500">
                                <span>{{ skill.name }}</span>
                                <span class="mx-2 text-6xl leading-3 text-gray-300"
                                    v-if="index < job.skills.length - 1">
                                    &middot;
                                </span>
                            </div>
                        </div>

                        <!-- Posted Time -->
                        <div class="text-sm text-right text-gray-500">
                            {{ job.created_at }}
                        </div>
                    </div>
                </div>

                <!--
                <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
                    <div v-for="job in jobs.data" :key="job.id" class="p-6 bg-gray-100 rounded-lg shadow-md">
                        <div class="flex items-center mb-4">
                            <img v-if="job.company_logo" :src="job.company_logo" :alt="job.company_name"
                                class="w-12 h-12 mr-4 rounded-full">
                            <div>
                                <h3 class="text-xl font-bold">{{ job.company_name }}</h3>
                                <p class="text-gray-600">{{ job.location }}</p>
                            </div>
                        </div>
                        <h2 class="mb-2 text-2xl font-semibold">{{ job.title }}</h2>
                        <p class="mb-4 text-gray-700">{{ job.description }}</p>
                        <div class="mb-4">
                            <span class="inline-block px-2 py-1 text-xs text-blue-800 bg-blue-100 rounded-full">{{
                                job.experience }}</span>
                            <span class="inline-block px-2 py-1 text-xs text-green-800 bg-green-100 rounded-full">{{
                                job.salary }}</span>
                        </div>
                        <div class="mb-4">
                            <h4 class="font-semibold">Skills:</h4>
                            <ul class="list-disc list-inside">
                                <li v-for="skill in job.skills" :key="skill.id">{{ skill.name }}</li>
                            </ul>
                        </div>
                        <p class="text-gray-600">{{ job.extra }}</p>
                    </div>
                </div> -->
            </div>
        </div>
    </AuthenticatedLayout>
</template>
