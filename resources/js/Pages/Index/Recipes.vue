<script>
    import { Head } from '@inertiajs/inertia-vue3';
    import AppLayout from '@/Layouts/AppLayout.vue';
    import RecipeGrid from '@/Components/RecipeGrid.vue';

    export default {
        components: {
            Head,
            AppLayout,
            RecipeGrid
        },
        props: {
            recipes: Array
        },
    }
</script>
<template>
    <AppLayout title="Recipes">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                My recipes
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <RecipeGrid :recipes="recipes" />
            </div>
        </div>
    </AppLayout>
</template>