<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function getAll()
    {
        return CategoryResource::collection(Category::all());
    }    

    public function show ($id)
    {
        return new CategoryResource(Category::findOrFail($id));
    }
}
