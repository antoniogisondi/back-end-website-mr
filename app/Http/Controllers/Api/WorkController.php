<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Work;
use App\Models\Type;
use App\Models\Image;

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
        try {
            $type = Type::where('slug', $slug)->with('works.images')->firstOrFail();
            $works = $type->works;
    
            return response()->json([
                'success' => true,
                'results' => $works
            ]);
    
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Tipologia non trovata'
            ], 404);
        }
    }
}

