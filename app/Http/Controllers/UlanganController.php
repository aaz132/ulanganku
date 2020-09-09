<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Ulangan;

class UlanganController extends Controller
{
    public function createUlangan(Type $var = null)
    {

        $input = $request->input();
        $nama_ulangan = $input['nama_ulangan'];
        $ulangan = new Ulangan;
        $ulangan->nama_ulangan = $nama_ulangan;
        $ulangan->save();
        
    }
}
