<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreWorkRequest;
use App\Http\Requests\UpdateWorkRequest;
use App\Models\Work;
use App\Models\Type;
use App\Models\Image;
use Carbon\Carbon;


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
    public function create(Work $work)
    {
        $types = Type::all();
        return view('admin.works.create', compact('work', 'types'));
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

        for ($i = 1; $i <= 10; $i++) {
            $field_name_image = 'image_'.$i;
            $field_name_description = 'description_'.$i;
            
            if ($request->hasFile($field_name_image)) {
                $img_path = Storage::put('work_image', $request->file($field_name_image));
                Image::create([
                    'work_id' => $work->id,
                    'path_img' => $img_path,
                    'description_img' => $request->input($field_name_description)
                ]);
            }
        }

        $works = new Work();
        
        $form_data['slug'] = $works->generateSlug($form_data['titolo']);

        // Formattazione delle date
        if (isset($form_data['data_inizio'])) {
            $form_data['data_inizio'] = Carbon::createFromFormat('d/m/Y', $form_data['data_inizio'])->format('Y/m/d');
        }

        if (isset($form_data['data_fine'])) {
            $form_data['data_fine'] = Carbon::createFromFormat('d/m/Y', $form_data['data_fine'])->format('Y-m-d');
        }

        $works->fill($form_data);

        $works->save();
        $message = 'Creazione completata';
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
        $types = Type::all();
        return view('admin.works.edit', compact('work', 'types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateWorkRequest  $request
     * @param  \App\Models\Work  $pet
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateWorkRequest $request, Work $work)
    {
        $form_data = $request->all();
        
        $form_data['slug'] =  $work->generateSlug($form_data['titolo']);
        $work->update($form_data);

        $message = 'Lavoro aggiornato correttamente';

        return redirect()->route('admin.works.index', ['message' => $message]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Work $work)
    {
        $work->delete();
        return redirect()->route('admin.works.index');
    }
}
