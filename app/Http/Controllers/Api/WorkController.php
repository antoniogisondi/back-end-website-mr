<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Work;

class WorkController extends Controller
{
    public function index(){
        $works = Work::all();
        return response()->json([
            'success'  => true,
            'results'  => $works
        ]);
    }

    public function show($slug){
        $work = Work::all()->where('slug', $slug)->first();

        if($work){
            return response()->json([
                'success' => true,
                'results' => $work
            ]);
        }
        else{
            return response()->json([
                'success' => false,
                'error' => 'Nessun lavoro trovato'
            ]);
        }
    }
}

