<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipe;
use Inertia\Inertia;

class RecipeIndexController extends Controller
{
    public function show(){
        return Inertia::render('Index/Recipes', [
            'recipes' => Recipe::where('user_id', auth()->user()->id)->get()
        ]);
    }
}
