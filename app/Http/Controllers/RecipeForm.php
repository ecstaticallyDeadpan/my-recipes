<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipe;
use Inertia\Inertia;

class RecipeForm extends Controller
{
    public function show($id = false)
    {
        return Inertia::render('RecipeForm', [
            'recipe' => $id ? Recipe::find($id) : false,
        ]);
    }
    public function store(Request $request)
    {
        // Validate
        $results = $request->validate([
            'user_id' => 'required',
            'name' => ['required', 'max:50'],
            'author' => ['required', 'max:50'],
            'description' => ['required', 'max:200' ],
            'instructions' => ['required', 'max:1000'],
            'url' => 'nullable',
            'id' => 'nullable',
        ]);

        // Editing if user is editing a recipe or saving a new one
        if($results['id']){
            // Get the current recipe
            $recipe = Recipe::find($results['id']);
            // Check if user can edit recipe
            if ($recipe->user_id == auth()->user()->id) {
                $recipe->update($results);
            } else {
                dd('You are not permitted to do that');
            }
        }
        else{
            // Create a new recipe
            $recipe = Recipe::create($results);
        }
        // Redirect to the single recipe form
        $results['user_id'] = auth()->user()->id;

        return redirect()->route('recipe_single',['id' => $recipe->id]);
    }
}
