<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipe;
use App\Models\User;

class TestValues extends Controller
{
    //
    public function show(){
        return view('test', [
            'user' => User::all()->all(),
            'recipes' => Recipe::all()->all()
        ]);
    }
}
