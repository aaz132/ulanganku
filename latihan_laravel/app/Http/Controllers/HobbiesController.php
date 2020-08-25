<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hobbies;

class HobbiesController extends Controller
{
    public function getAllHobbies(Request $request)
    {
        $hobbies = Hobbies::all();
        return response()->json($hobbies);
    }
    public function getPointHobbies(Request $request)
    {
        $hobbies = Hobbies::where('point', '>=', 3)->get();
        return response()->json($hobbies);
    }
    public function createHobbies(Request $request)
    {
        $hobbie = Hobbies::insert([
            'name' => $request->name,
            'point' => $request->point
        ]);
    }
    public function getAllMapHobies(Request $request) {
        // mau ngapain di sini
        // user A
        // - hobi 1
        // - hobi 2
        // user B
        // - hobi 1
        // - hobi 2
        
        return response()->json([
            'success' => true
        ]);
    }
}
