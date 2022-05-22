<script>
    import { Link } from '@inertiajs/inertia-vue3';

    export default{
        components: {
            Link
        },
        props: {
            recipes: Array,
        },
        methods:{
            recipeUrl(id){
                return "/recipe/" + id
            }
        }
    }
</script>

<template>
<!-- This example requires Tailwind CSS v2.0+ -->
  <ul role="list" class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
      <li
        v-for="recipe in recipes"
        :key="recipe.id"
        class="col-span-1 bg-white rounded-lg shadow divide-y divide-gray-200">

          <div class="w-full flex items-center justify-between p-6 space-x-6">
              <div class="flex-1 truncate">
                  <div class="flex items-center space-x-3">
                      <h3 class="text-gray-900 text-sm font-medium truncate">{{ recipe.name }}</h3>
                  </div>
                  <p class="mt-1 text-gray-500 text-sm truncate">{{ recipe.author }}</p>
              </div>
              <img class="w-10 h-10 bg-gray-300 rounded-full flex-shrink-0" src="https://bigseventravel.com/wp-content/uploads/2019/12/Screenshot-2019-02-06-at-20.46.48.png" alt="">
          </div>
          <div>
              <div class="-mt-px flex divide-x divide-gray-200">
                  <div class="w-0 flex-1 flex">
                      <Link :href="recipeUrl( recipe.id )" class="relative -mr-px w-0 flex-1 inline-flex items-center justify-center py-4 text-sm text-gray-700 font-medium border border-transparent rounded-bl-lg hover:text-gray-500">
                          <!-- Heroicon name: solid/mail -->
                          <span class="ml-3">Read Recipe</span>
                      </Link>
                  </div>
              </div>
          </div>
      </li>
      <!-- More people... -->
  </ul>
</template>