<template>
    <Head title="Create Post" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Create Post For {{ community.name }}
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto bg-white sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <form @submit.prevent="submit">
                        <div class="mt-4">
                            <InputLabel for="name" value="Post Title" />

                            <TextInput
                                id="title"
                                type="text"
                                class="mt-1 block w-full"
                                v-model="form.title"
                                autofocus
                                autocomplete="title"
                            />

                            <InputError
                                class="mt-2"
                                :message="form.errors.title"
                            />
                        </div>

                        <div class="mt-4">
                            <InputLabel for="slug" value="Post URL" />

                            <TextInput
                                id="url"
                                type="url"
                                class="mt-1 block w-full"
                                v-model="form.url"
                                autocomplete="url"
                            />

                            <InputError
                                class="mt-2"
                                :message="form.errors.slug"
                            />
                        </div>

                        <div class="mt-4">
                            <InputLabel
                                for="description"
                                value="Post Description"
                            />

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
                            <!-- <PrimaryButton
                                class="ml-4 mb-2"
                                :href="
                                    route(
                                        'communities.posts.index',
                                        props.community.slug
                                    )
                                "
                            >
                                Cancel
                            </PrimaryButton> -->
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

const props = defineProps({
    community: {
        type: Object,
        default: () => ({}),
    },

    post: Object,
});

// const form = useForm({
//     title: "",
//     description: "",
//     url: "",
// });

const form = useForm(props.post);

const submit = () => {
    form.put(
        route("communities.posts.update", [
            props.community.slug,
            props.post.slug,
        ])
    );
};
</script>
