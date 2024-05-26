<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, usePage } from '@inertiajs/vue3';

const { props } = usePage();
const employee = props.employee;
</script>

<template>
    <Head title="Employee Details" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Employee Details</h2>
        </template>

        <div class="py-12">
            <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <div class="mb-4">
                            <h3 class="text-lg font-medium">Name</h3>
                            <p>{{ employee.first_name }} {{ employee.last_name }}</p>
                        </div>
                        <div class="mb-4">
                            <h3 class="text-lg font-medium">Email</h3>
                            <p>{{ employee.email }}</p>
                        </div>
                        <div class="mb-4">
                            <h3 class="text-lg font-medium">Phone</h3>
                            <p>{{ employee.phone }}</p>
                        </div>
                        <div class="mb-4">
                            <h3 class="text-lg font-medium">Address</h3>
                            <p>{{ employee.address }}</p>
                        </div>
                        <div class="mb-4">
                            <h3 class="text-lg font-medium">Position</h3>
                            <p>{{ employee.position }}</p>
                        </div>
                        <div class="flex justify-end space-x-4">
                                <Link :href="route('employees.index')" class="bg-red-500 text-white px-4 py-2 rounded">Cancel</Link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
