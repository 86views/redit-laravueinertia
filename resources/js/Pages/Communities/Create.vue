<template>
    <Head title="Create Community" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Communities
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto bg-white sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <form @submit.prevent="submit">
                        <div class="mt-4">
                            <InputLabel for="name" value="Name" />

                            <TextInput
                                id="name"
                                type="text"
                                class="mt-1 block w-full"
                                v-model="form.name"
                                autofocus
                                autocomplete="name"
                            />

                            <InputError
                                class="mt-2"
                                :message="form.errors.name"
                            />
                        </div>

                        <div class="mt-4">
                            <InputLabel for="description" value="Description" />

                            <TextInput
                                id="description"
                                type="text"
                                class="mt-1 block w-full"
                                v-model="form.description"
                                autofocus
                                autocomplete="description"
                            />

                            <InputError
                                class="mt-2"
                                :message="form.errors.description"
                            />
                        </div>

                        <!-- <div class="mt-4">
                            <InputLabel for="slug" value="Slug" />

                            <TextInput
                                id="slug"
                                type="text"
                                class="mt-1 block w-full"
                                v-model="form.slug"
                                autocomplete="slug"
                            />

                            <InputError
                                class="mt-2"
                                :message="form.errors.slug"
                            />
                        </div> -->

                        <progress
                            v-if="form.progress"
                            :value="form.progress.percentage"
                            max="full"
                        >
                            {{ form.progress.percentage }}%
                        </progress>

                        <div class="flex items-center justify-end mt-4">
                            <PrimaryButton
                                class="ml-4 mb-2"
                                :class="{ 'opacity-25': form.processing }"
                                :disabled="form.processing"
                            >
                                Submit
                            </PrimaryButton>
                            <PrimaryButton
                                class="ml-4 mb-2"
                                :href="route('communities.index')"
                            >
                                Cancel
                            </PrimaryButton>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";

const form = useForm({
    name: "",
    description: "",
    slug: "",
});

const submit = () => {
    form.post(route("communities.store"));
};
</script>
