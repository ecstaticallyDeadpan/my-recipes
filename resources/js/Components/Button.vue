<script>
    import { Link } from '@inertiajs/inertia-vue3';
    export default {
        components: {
            Link
        }, 
        props: {
            text: String,
            link: String
        }
    }
</script>

<template>
    <Link
        type="button"
        :href="link"
        class="inline-flex items-center px-4 py-2 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
        {{ text }}
    </Link>
</template>

