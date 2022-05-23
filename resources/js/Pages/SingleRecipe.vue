
<script>
    import { Head } from '@inertiajs/inertia-vue3';
    import AppLayout from '@/Layouts/AppLayout.vue';
    import Button from '@/Components/Button.vue';

    export default{
        components: {
            Head,
            AppLayout,
            Button
        },
        props: {
            recipe: Object,
            canEdit: Boolean
        }
    }
</script>
<template>
    <AppLayout title="Recipes">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Recipe: {{ recipe.name }}
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                    <div class="px-4 py-5 sm:px-6 flex" >
                        <img class="w-20 h-20 mr-5 block bg-gray-300 rounded-full flex-shrink-0" src="https://bigseventravel.com/wp-content/uploads/2019/12/Screenshot-2019-02-06-at-20.46.48.png" alt="">
                        <div>
                            <h3 class="text-lg leading-6 font-medium text-gray-900">{{ recipe.name }}</h3>
                            <p class="mt-1 max-w-2xl text-sm text-gray-500">{{ recipe.name }}</p>
                        </div>
                    </div>
                    <div class="border-t border-gray-200">
                        <dl>
                            <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500">Author</dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ recipe.author }}</dd>
                            </div>
                            <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500">Description</dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ recipe.description }}</dd>
                            </div>
                            <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500">Instructions</dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ recipe.instructions }}</dd>
                            </div>
                            <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500">Web link</dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2"><a :href='recipe.url'>{{ recipe.url }}</a></dd>
                            </div>
                            <div v-if="canEdit" class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <Button text="Edit Recipe" :link="'/recipes/edit/' + recipe.id "/>
                            </div>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

