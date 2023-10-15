<template>
    <Head title="Community" />
    <GuestLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                r/{{ community.name }}
            </h2>

            <div class="flex justify-between m-2 p-2">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Community {{ community.name }} Show Page
                </h2>

                <Link
                    v-if="$page.props.auth.auth_check"
                    :href="route('communities.posts.create', community.slug)"
                    class="px-3 py-2 rounded bg-indigo-500 hover:bg-indigo-300 text-white"
                    >Create Post</Link
                >
            </div>
            <section class="flex md:flex-row m-2 p-2">
                <div class="w-8/12">
                    <PostCard
                        v-for="post in posts.data"
                        :post="post"
                        :key="post.id"
                        :community="community"
                    />
                    <div class="mt-2 p-2">
                        <Pagination :links="posts.meta.links" />
                    </div>
                </div>

                <div class="w-4/12 p-4">
                    <div class="m-2 p-2 bg-slate-500 text-white">
                        <h2>Latest Comments</h2>
                    </div>
                </div>
            </section>
        </template>
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
