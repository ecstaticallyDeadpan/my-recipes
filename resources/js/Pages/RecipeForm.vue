<script>
    import { Head } from '@inertiajs/inertia-vue3';
    import AppLayout from '@/Layouts/AppLayout.vue';
    import { useForm } from '@inertiajs/inertia-vue3'

    export default{
        props: {
            recipe : Object
        },
        setup () {
            const form = useForm({
                name: null,
                author: null,
                description: null,
                instructions: null,
                url: null,
                user_id: 1,
                id: null
            })
            return { form }
        },
        mounted(){
            if(this.recipe){
                this.form.name = this.recipe.name;
                this.form.author = this.recipe.author;
                this.form.description = this.recipe.description;
                this.form.instructions = this.recipe.instructions;
                this.form.url = this.recipe.url;
                this.form.user_id = this.recipe.user_id;
                this.form.id = this.recipe.id;
            }
        },
        components: {
            Head,
            AppLayout
        }
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
                <form class="space-y-8 divide-y divide-gray-200"
                    @submit.prevent="form.put('/recipes/add/')">
                    <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">
                        <div>
                            <div>
                                <h3 class="text-lg leading-6 font-medium text-gray-900">Recipe details</h3>
                                <p class="mt-1 max-w-2xl text-sm text-gray-500">Please fill in details of your recipe</p>
                            </div>
                            <div class="mt-6 sm:mt-5 space-y-6 sm:space-y-5">
                                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                    <label for="username" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">Name of recipe</label>
                                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                                        <div class="max-w-lg flex rounded-md shadow-sm">
                                            <input v-model="form.name" type="text" name="name" autocomplete="name" class="flex-1 block w-full focus:ring-indigo-500 focus:border-indigo-500 min-w-0 rounded-none rounded-r-md sm:text-sm border-gray-300">
                                        </div>
                                        <div v-if="form.errors.name" class="text-red-400 text-sm block">{{ form.errors.name }}</div>
                                    </div>
                                </div>
                                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                    <label for="username" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">Original author</label>
                                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                                        <div class="max-w-lg flex rounded-md shadow-sm">
                                            <input v-model="form.author" type="text" name="author" autocomplete="author" class="flex-1 block w-full focus:ring-indigo-500 focus:border-indigo-500 min-w-0 rounded-none rounded-r-md sm:text-sm border-gray-300">
                                        </div>
                                         <div v-if="form.errors.author" class="text-red-400 text-sm block">{{ form.errors.author }}</div>
                                    </div>
                                </div>
                                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                    <label for="username" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">Original URL</label>
                                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                                        <div class="max-w-lg flex rounded-md shadow-sm">
                                            <input v-model="form.url" type="text" name="url" autocomplete="url" class="flex-1 block w-full focus:ring-indigo-500 focus:border-indigo-500 min-w-0 rounded-none rounded-r-md sm:text-sm border-gray-300">
                                        </div>
                                        <div v-if="form.errors.url" class="text-red-400 text-sm block">{{ form.errors.url }}</div>
                                    </div>
                                </div>
                                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                    <label for="description" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">Brief Description</label>
                                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                                        <textarea v-model="form.description"  name="description" rows="3" class="max-w-lg shadow-sm block w-full focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border border-gray-300 rounded-md"></textarea>
                                        <p class="mt-2 text-sm text-gray-500">Describe the recipe briefly</p>
                                        <div v-if="form.errors.description" class="text-red-400 text-sm block">{{ form.errors.description }}</div>
                                    </div>
                                </div>
                                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                    <label for="instructions" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">Instructions</label>
                                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                                        <textarea v-model="form.instructions"  name="instructions" rows="3" class="max-w-lg shadow-sm block w-full focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border border-gray-300 rounded-md"></textarea>
                                        <p class="mt-2 text-sm text-gray-500">How do you make the recipe? Give step by step instructions</p>
                                        <div v-if="form.errors.instructions" class="text-red-400 text-sm block">{{ form.errors.description }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="pt-5">
                        <div class="flex justify-end">
                            <input v-model="recipe.id" type="hidden">
                            <button type="submit" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </AppLayout>
</template>