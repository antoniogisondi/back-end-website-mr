<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
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

        $work = new Work();

        $form_data['slug'] = Work::generateSlug($form_data['titolo']);

        if (isset($form_data['data_inizio'])) {
            $form_data['data_inizio'] = Carbon::createFromFormat('d/m/Y', $form_data['data_inizio'])->format('Y/m/d');
        }

        if (isset($form_data['data_fine'])) {
            $form_data['data_fine'] = Carbon::createFromFormat('d/m/Y', $form_data['data_fine'])->format('Y-m-d');
        }
        $work->fill($form_data);

        $work->save();

        if($request->hasFile('image')){
                    
            $img_path = Storage::put('work_images', $request->image);
            
            $form_data['image'] = $img_path;
        }

        if($request->hasFile('image_2')){
                    
            $img_path_2 = Storage::put('work_images', $request->image_2);
            
            $form_data['image_2'] = $img_path_2;
        }
        if($request->hasFile('image_3')){
                    
            $img_path_3 = Storage::put('work_images', $request->image_3);
            
            $form_data['image_3'] = $img_path_3;
        }
        if($request->hasFile('image_4')){
                    
            $img_path_4 = Storage::put('work_images', $request->image_4);
            
            $form_data['image_4'] = $img_path_4;
        }
        if($request->hasFile('image_5')){
                    
            $img_path_5 = Storage::put('work_images', $request->image_5);
            
            $form_data['image_5'] = $img_path_5;
        }

        Image::create([
            'work_id' => $work->id,
            'image' => $img_path,
            'image_2' => $img_path_2,
            'image_3' => $img_path_3,
            'image_4' => $img_path_4,
            'image_5' => $img_path_5,
        ]);

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
        $images = Image::where('work_id', $work->id)->get();
        return view('admin.works.show', compact('work', 'images'));
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
