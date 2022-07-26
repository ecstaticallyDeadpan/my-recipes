<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use App\Models\Recipe;
use App\Http\Controllers\RecipeIndexController;
use App\Http\Controllers\RecipeFormController;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/', function () {
        return Inertia::render('Dashboard', [
            'recipes' => Recipe::all()
        ]);
    })->name('dashboard');

    // Recipe index
    Route::get('/recipes', [RecipeIndexController::class, 'show'])->name('recipe_index');

    // Form routes
    Route::get('/recipes/add/', [RecipeFormController::class, 'show'])->name('recipe_add');
    Route::put('/recipes/add', [RecipeFormController::class, 'store']);
    Route::get('/recipes/edit/{id}', [RecipeFormController::class, 'show'])->name('recipe_edit');

    // Single recipe
    Route::get('/recipe/{id}', function ($id) {
        $recipe = Recipe::find($id);
        return Inertia::render('SingleRecipe', [
            'recipe' => $recipe,
            'canEdit' => ($recipe && $recipe->user_id == auth()->user()->id)
        ]);
    })->name('recipe_single');
});