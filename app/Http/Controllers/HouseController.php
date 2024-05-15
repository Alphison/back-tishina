<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\HouseResource;
use App\Models\House;
use Illuminate\Http\Request;

class HouseController extends Controller
{
    public function getAll()
    {
        $houses = House::with('category')->where('visible', 1)->get();

        return HouseResource::collection($houses);
    }    

    public function show ($id)
    {
        return new HouseResource(House::findOrFail($id));
    }
}
