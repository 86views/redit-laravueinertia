<template>
    <Head title="Community" />
    <GuestLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                r/{{ community.name }}
            </h2>

            <div class="flex justify-between p-2 m-2">
                <h2 class="text-xl font-semibold leading-tight text-gray-800">
                    Community {{ community.name }} Show Page
                </h2>

                <Link
                    v-if="$page.props.auth.auth_check"
                    :href="route('communities.posts.create', community.slug)"
                    class="px-3 py-2 text-white bg-indigo-500 rounded hover:bg-indigo-300"
                    >Create Post</Link
                >
            </div>
        </template>
        <section class="flex p-2 m-2 md:flex-row">
            <div class="w-8/12">
                <PostCard
                    v-for="post in posts.data"
                    :post="post"
                    :key="post.id"
                    :community="community.slug"
                />
                <div class="p-2 mt-2">
                    <Pagination :links="posts.meta.links" />
                </div>
            </div>

            <div class="w-4/12 p-4">
                <div class="p-2 m-2 text-white bg-slate-500">
                    <h2>Latest Comments</h2>
                </div>
            </div>
        </section>
    </GuestLayout>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";
import GuestLayout from "@/Layouts/GuestLayout.vue";
import PostCard from "@/Components/app/PostCard.vue";
import Pagination from "@/Components/app/Pagination.vue";

defineProps({
    community: Object,
    posts: Object,
});
</script>
