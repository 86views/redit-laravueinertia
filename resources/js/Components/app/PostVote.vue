<template>
    <div class="w-12 flex flex-col h-full p-2">
        <UpLink :slug="post.slug"></UpLink>
        <div class="p-2 bg-blue-300 rounded-md">{{ post.votes }}</div>
        <DownLink :slug="post.slug"></DownLink>
    </div>
</template>

<script setup>
import { Link, useForm } from "@inertiajs/vue3";
import UpLink from "@/Components/app/UpLink.vue";
import DownLink from "@/Components/app/DownLink.vue";
defineProps({
    post: Object,
});
</script>
