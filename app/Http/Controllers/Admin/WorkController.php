<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreWorkRequest;
use App\Http\Requests\UpdateWorkRequest;
use App\Models\Work;

class WorkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $works = Work::all();
        return view('admin.works.index', compact('works'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.works.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreWorkRequest $request)
    {
        $form_data = $request->all();

        $works = new Work();

        if($request->hasFile('img-1')){
            $path = Storage::put('works-image', $request->img);
            $form_data['img-1'] = $path;
        }

        if($request->hasFile('img-2')){
            $path = Storage::put('works-image', $request->img);
            $form_data['img-2'] = $path;
        }

        if($request->hasFile('img-3')){
            $path = Storage::put('works-image', $request->img);
            $form_data['img-3'] = $path;
        }

        if($request->hasFile('img-4')){
            $path = Storage::put('works-image', $request->img);
            $form_data['img-4'] = $path;
        }
        
        $form_data['slug'] =  $works->generateSlug($form_data['titolo']);

        $works->fill($form_data);

        $works->save();
        $message = 'Creazione  completata';
        return redirect()->route('admin.works.index', ['message' => $message]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Work $work)
    {
        return view('admin.works.show', compact('work'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Work $work)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateWorkRequest $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
