<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;

class ServiceController extends Controller
{
    public function index(){
        $services = Service::all();
        return response()->json([
            'success' => true,
            'results' => $services
        ]);
    }

    public function show($slug){
        $service = Service::all()->where('slug', $slug)->first();

        if($service){
            return response()->json([
                'success' => true,
                'results' => $service
            ]);
        }
        else{
            return response()->json([
                'success' => false,
                'error'   => 'Nessun lavoro trovato'
            ]);
        }
    }
}
