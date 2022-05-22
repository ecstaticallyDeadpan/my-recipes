<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use App\Models\Recipe;
use App\Http\Controllers\TestValues;
use App\Http\Controllers\RecipeIndex;
use App\Http\Controllers\RecipeForm;
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

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/recipes', [ RecipeIndex::class, 'show' ]);

Route::get('/recipes/add', [RecipeForm::class, 'show'])->name('recipe_add');

Route::put('/recipes/add', [RecipeForm::class, 'store']);


Route::get('/recipe/{id}', function($id){
    return Inertia::render('SingleRecipe', [
        'recipe' => Recipe::find($id),
    ]);
} );

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});
