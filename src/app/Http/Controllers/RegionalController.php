<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class RegionalController extends Controller
{
    public function index()
    { 
        $regionais = DB::table('regionais')->select('id', 'nome')->OrderBy('nome','asc')->get();
        return response()->json($regionais);
    }
}
