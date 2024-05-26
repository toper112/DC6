<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, usePage } from '@inertiajs/vue3';
import { ref } from 'vue';

const { props } = usePage();
const employees = ref(props.employees);

const deleteEmployee = async (id) => {
    if (confirm('Are you sure you want to delete this employee?')) {
        await axios.delete(route('employees.destroy', { id }));
        employees.value = employees.value.filter((employee) => employee.id !== id);
    }
};
</script>

<template>
    <Head title="Employee List" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Employee List</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <h1 class="text-2xl font-semibold mb-4">Employee List</h1>
                        <div class="flex justify-end mb-4">
                            <Link href="/employees/create" class="bg-blue-500 text-white px-4 py-2 rounded">Add Employee</Link>
                        </div>
                        <div class="overflow-hidden border border-gray-200 sm:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Last Name</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">First Name</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    <tr v-for="employee in employees" :key="employee.id">
                                        <td class="px-6 py-4 whitespace-nowrap">{{ employee.last_name }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ employee.first_name }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ employee.email }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <Link :href="route('employees.show', { id: employee.id })" class="text-green-600 hover:text-green-900">View</Link>
                                            <Link :href="route('employees.edit', { id: employee.id })" class="text-blue-600 hover:text-blue-900 ml-2">Edit</Link>
                                            <form @submit.prevent="deleteEmployee(employee.id)" class="inline-block">
                                                <button type="submit" class="text-red-600 hover:text-red-900 ml-2">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
