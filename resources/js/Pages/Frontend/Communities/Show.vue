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
                
                    <h2 class="font-semibold text-lg p-6 bg-indigo-700 rounded-t-lg text-white">
                        About {{ community.name }}
                    </h2>
               <p class="bg-white p-4 rounded-lg"> {{ community.description }}</p>

               <CommunityList class="mt-4" :communities="communities.data">
                 <template #title> Latest Communities </template>
               </CommunityList>
            </div>
        </section>
    </GuestLayout>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";
import GuestLayout from "@/Layouts/GuestLayout.vue";
import PostCard from "@/Components/app/PostCard.vue";
import Pagination from "@/Components/app/Pagination.vue";
import CommunityList from "@/Components/app/CommunityList.vue";

defineProps({
    community: Object,
    posts: Object,
    communities: Object,
});
</script>
