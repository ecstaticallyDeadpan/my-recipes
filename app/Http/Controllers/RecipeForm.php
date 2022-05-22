<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipe;
use Inertia\Inertia;

class RecipeForm extends Controller
{
    public function show()
    {
        return Inertia::render('RecipeForm', [
            'recipe' => false,
        ]);
    }
    public function store(Request $request)
    {
        Recipe::create(
            $request->validate([
                'user_id' => 'required',
                'name' => ['required', 'max:50'],
                'author' => ['required', 'max:50'],
                'description' => ['required', 'max:200' ],
                'instructions' => ['required', 'max:1000'],
                'url' => 'nullable'
            ])
        );
        return redirect()->route('recipe_add');
    }
}
