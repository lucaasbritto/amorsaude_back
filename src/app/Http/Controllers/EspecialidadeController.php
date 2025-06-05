<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class EspecialidadeController extends Controller
{
    public function index()
    {
        $especialidades = DB::table('especialidades')->select('id', 'nome')->get();
        return response()->json($especialidades);
    }
}
