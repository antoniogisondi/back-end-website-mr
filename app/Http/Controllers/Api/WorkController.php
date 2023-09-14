<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Work;
use App\Models\Type;

class WorkController extends Controller
{
    public function index(){
        $works = Work::with('type')->get();
        return response()->json([
            'success'  => true,
            'results'  => $works
        ]);
    }

    public function show($slug){
        $works = Type::where('slug', $slug)->firstOrFail()->works;
        return response()->json([
            'success' => true,
            'results' => $works
        ]);
    }
}

