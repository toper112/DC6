<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';

const form = useForm({
    first_name: '',
    last_name: '',
    email: '',
    phone: '',
    address: '',
    position: ''
});

const submit = () => {
    form.post('/employees');
};
</script>

<template>
    <Head title="Create Employee" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Create Employee</h2>
        </template>

        <div class="py-12">
            <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <form @submit.prevent="submit">
                            <div class="mb-4">
                                <label for="first_name" class="block text-sm font-medium text-gray-700">First Name</label>
                                <input
                                    v-model="form.first_name"
                                    id="first_name"
                                    name="first_name"
                                    type="text"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
                                    required
                                />
                                <div v-if="form.errors.first_name" class="mt-2 text-red-600 text-sm">
                                    {{ form.errors.first_name }}
                                </div>
                            </div>
                            <div class="mb-4">
                                <label for="last_name" class="block text-sm font-medium text-gray-700">Last Name</label>
                                <input
                                    v-model="form.last_name"
                                    id="last_name"
                                    name="last_name"
                                    type="text"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
                                    required
                                />
                                <div v-if="form.errors.last_name" class="mt-2 text-red-600 text-sm">
                                    {{ form.errors.last_name }}
                                </div>
                            </div>
                            <div class="mb-4">
                                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                                <input
                                    v-model="form.email"
                                    id="email"
                                    name="email"
                                    type="email"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
                                    required
                                />
                                <div v-if="form.errors.email" class="mt-2 text-red-600 text-sm">
                                    {{ form.errors.email }}
                                </div>
                            </div>
                            <div class="mb-4">
                                <label for="phone" class="block text-sm font-medium text-gray-700">Phone</label>
                                <input
                                    v-model="form.phone"
                                    id="phone"
                                    name="phone"
                                    type="text"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
                                    required
                                />
                                <div v-if="form.errors.phone" class="mt-2 text-red-600 text-sm">
                                    {{ form.errors.phone }}
                                </div>
                            </div>
                            <div class="mb-4">
                                <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                                <input
                                    v-model="form.address"
                                    id="address"
                                    name="address"
                                    type="text"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
                                    required
                                />
                                <div v-if="form.errors.address" class="mt-2 text-red-600 text-sm">
                                    {{ form.errors.address }}
                                </div>
                            </div>
                            <div class="mb-4">
                                <label for="position" class="block text-sm font-medium text-gray-700">Position</label>
                                <input
                                    v-model="form.position"
                                    id="position"
                                    name="position"
                                    type="text"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
                                    required
                                />
                                <div v-if="form.errors.position" class="mt-2 text-red-600 text-sm">
                                    {{ form.errors.position }}
                                </div>
                            </div>
                            <div class="flex justify-end space-x-4">
                                <Link :href="route('employees.index')" class="bg-red-500 text-white px-4 py-2 rounded">Cancel</Link>
                                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
