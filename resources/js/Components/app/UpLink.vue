<template>
    <Link
        :href="route('posts.upVote', slug)"
        method="post"
        as="button"
        type="button"
        class="text-gray-400 hover:text-blue-500"
        ><svg
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 24 24"
            strokeWidth="{1.5}"
            stroke="currentColor"
            className="w-6 h-6"
        >
            <path
                strokeLinecap="round"
                strokeLinejoin="round"
                d="M4.5 10.5L12 3m0 0l7.5 7.5M12 3v18"
            />
        </svg>
    </Link>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";

defineProps({
    slug: String,
});
</script>
