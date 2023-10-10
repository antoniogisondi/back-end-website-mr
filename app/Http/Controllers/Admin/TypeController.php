<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Models\Type;
use Illuminate\Support\Str;
use App\Http\Requests\StoreTypeRequest;
use App\Http\Requests\UpdateTypeRequest;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = Type::all();
        return view('admin.types.index', compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Type $type)
    {
        return view('admin.types.create', compact('type'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTypeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTypeRequest $request)
    {
        $form_data = $request->all();

        if($request->hasFile('cover_image')){
                    
            $img_path = Storage::put('types_image', $request->cover_image);
            
            $form_data['cover_image'] = $img_path;
        }

        $type = new Type();

        $form_data['slug'] = Type::generateSlug($form_data['nome_tipologia']);

        $type->fill($form_data);

        $type->save();

        $name = $type->nome_tipologia;

        return redirect()->route('admin.types.show', $type->id)->with('message', "Tipologia di lavoro : '$name' creata correttamente");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function show(Type $type)
    {
        return view('admin.types.show', compact('type'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function edit(Type $type)
    {
        return view('admin.types.edit', compact('type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTypeRequest  $request
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTypeRequest $request, Type $type)
    {
        $form_data = $request->all();

        if($request->hasFile('cover_image')){

            if($type->cover_image){

                Storage::delete($type->cover_image);
            }
            
            $img_path = Storage::put('types_image', $request->cover_image);
            
            $form_data['cover_image'] = $img_path;
        }
        

        $form_data['slug'] = Type::generateSlug($form_data['nome_tipologia']);

        $name = $type->nome_tipologia;

        $type->update($form_data);

        return redirect()->route('admin.types.show', $type->id)->with('message', "Tipologia di lavoro : '$name' modificata correttamente");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function destroy(Type $type)
    {
        $type->delete();
        $name = $type->nome_tipologia;
        return redirect()->route('admin.types.index')->with('message', "Tipologia di lavoro : '$name' eliminata correttamente");
    }
}


if($request->hasFile('image')){
                    
    $img_path = Storage::put('work_image', $request->image);
    
    $form_data['image'] = $img_path;
}
