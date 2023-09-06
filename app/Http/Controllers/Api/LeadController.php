<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lead;
use App\Mail\NewContact;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;

class LeadController extends Controller
{
    public function store(Request $request){

        $form_data = $request->all();

        $validator = Validator::make($form_data, [
            'name'  => 'required',
            'email'  => 'required|email',
            'description' => 'required'
        ]);
   
    
        if($validator->fails()){
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }

        $new_lead = new Lead();
        $new_lead->fill($form_data);
        $new_lead->save();

        Mail::to('artigianoedile@contacts.com')->send(new NewContact($new_lead)); 
    

        return response()->json([
            'success' => true,
        ]);
    }
}
