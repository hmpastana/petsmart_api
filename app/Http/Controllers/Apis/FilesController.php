<?php

namespace App\Http\Controllers\Apis;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FilesController extends Controller
{
    public function show()
    {
        $pathToFile = 'app/dog_food.jpg';
        $name = 'food';

        return response()->download(storage_path($pathToFile), $name);
    }

    public function create(Request $request)
    {
        $fileName = 'toy.jpg';
        $path = $request->file('photo')->move(public_paht('/'), $fileName);
        $photoURL = url('/'.$fileName);
        // $path = $request->file('photo')->store('testing');
        return response()->json(['url' => $photoURL], 200);
    }
}
