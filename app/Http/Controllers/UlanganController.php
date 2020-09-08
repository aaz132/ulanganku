<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class UlanganController extends Controller
{
    public function createUlangan(Request $request)
    {
        $ulangan = Ulangan::insert([
            'id_mata_pelajaran' => $request->id_user,
        ]);

        $flight = new Flight;
        $flight->name = $request->name;
        $flight->save();
    }
}
