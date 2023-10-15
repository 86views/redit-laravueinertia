<template>
    <Head title="Edit Community" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Edit Communities
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto bg-white max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <form @submit.prevent="submit">
                        <div class="mt-4">
                            <InputLabel for="name" value="Name" />

                            <TextInput
                                id="name"
                                type="text"
                                class="block w-full mt-1"
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
                                class="block w-full mt-1"
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
                                class="block w-full mt-1"
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
                                class="mb-2 ml-4"
                                :class="{ 'opacity-25': form.processing }"
                                :disabled="form.processing"
                            >
                                Update
                            </PrimaryButton>
                            <PrimaryButton
                                class="mb-2 ml-4"
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
import { Head, Link, useForm, router } from "@inertiajs/vue3";

const props = defineProps({
    community: Object,
});

// const form = useForm({
//     name: props.community.name,
//     description: props.community.description,
// });

const form = useForm(props.community);

const submit = () => {
    form.put(route("communities.update", props.community.id));
};
</script>
