<template>
    <Head title="Community" />
    <GuestLayout>
        <section class="flex p-2 m-2 md:flex-row">
            <div class="w-8/12">
                <PostCard
                    v-for="post in posts.data"
                    :post="post"
                    :key="post.id"
                    :community="post.community_slug"
                />
            </div>

            <div class="w-4/12 p-4">
                <div class="p-2 m-2 text-white bg-slate-500">
                    <h2>Top Communities</h2>
                    <CommunityList :communities="communities.data" />
                </div>
            </div>
        </section>
    </GuestLayout>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";
import GuestLayout from "@/Layouts/GuestLayout.vue";
import PostCard from "@/Components/app/PostCard.vue";
import CommunityList from "@/Components/app/CommunityList.vue";

defineProps({
    communities: Object,
    posts: Object,
});
</script>
