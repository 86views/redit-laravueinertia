<template>
    <Head title="Community" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                All Communities
            </h2>
            <div class="flex justify-end">
                <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
                    <Link
                        :href="route('communities.create')"
                        class="inline-block px-4 py-3 mb-4 text-white bg-blue-500 rounded"
                    >
                        Add New Community</Link
                    >
                </div>
            </div>
        </template>
        <div class="py-12">
            <div class="mx-auto bg-white max-w-7xl sm:px-6 lg:px-8">
                <div
                    class="mb-5 overflow-hidden bg-white shadow-sm sm:rounded-lg"
                >
                    <table
                        class="w-full mt-4 text-sm text-left text-gray-500 dark:text-gray-400"
                    >
                        <thead
                            class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400"
                        >
                            <tr>
                                <th scope="col" class="px-6 py-3">Id</th>
                                <!-- <th scope="col" class="px-6 py-3">User Id</th> -->
                                <th scope="col" class="px-6 py-3">Name</th>
                                <th scope="col" class="px-6 py-3">Slug</th>
                                <th scope="col" class="px-6 py-3">
                                    Description
                                </th>
                                <th scope="col" class="px-6 py-3">Created</th>
                                <th scope="col" class="px-6 py-3">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr
                                v-for="community in communities.data"
                                :key="community.id"
                            >
                                <td class="px-6 py-4">
                                    {{ community.id }}
                                </td>

                                <!-- <td class="px-6 py-4">
                            {{ community.user_id }}
                        </td> -->
                                <td class="px-6 py-4">
                                    {{ community.name }}
                                </td>
                                <td class="px-6 py-4">{{ community.slug }}</td>
                                <td class="px-6 py-4">
                                    {{ community.description }}
                                </td>

                                <td class="px-6 py-4">
                                    {{ community.created_at }}
                                </td>
                                <td class="px-6 py-4">
                                    <Link
                                        :href="
                                            route(
                                                'communities.edit',
                                                community.id
                                            )
                                        "
                                        class="px-2 py-1 mr-2 font-bold text-white uppercase bg-blue-600 rounded"
                                        >Edit</Link
                                    >

                                    <Link
                                        :href="
                                            route(
                                                'communities.destroy',
                                                community.id
                                            )
                                        "
                                        method="delete"
                                        as="button"
                                        type="button"
                                        class="px-2 py-1 mr-2 font-bold text-white uppercase bg-red-600 rounded"
                                        >Delete</Link
                                    >

                                    <!-- <button
                                        @click="destroy(community.id)"
                                        type="button"
                                        class="px-2 py-1 font-bold text-white uppercase bg-red-600 rounded"
                                    >
                                        Delete
                                    </button> -->
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="p-2 m-2">
                        <Pagination :links="communities.links" />
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import GuestLayout from "@/Layouts/GuestLayout.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";

import Pagination from "../../Components/app/Pagination.vue";
import { Head, Link, useForm, router } from "@inertiajs/vue3";

const props = defineProps({
    communities: {
        type: Object,
        default: () => ({}),
    },
});

const destroy = (id) => {
    if (confirm("Are you sure?")) {
        router.delete(route("communities.destroy", id));
    }
};
</script>
