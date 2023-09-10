@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center">
                    <h2>Modifica i dati del lavoro in corso</h2>
                    <a href=" {{ route('admin.works.index')}} " class="btn btn-secondary btn-sm">Torna alla lista dei lavori</a>
                </div>
                <div>
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action=" {{ route('admin.works.update', $work->id) }} " method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <form action=" {{ route('admin.works.store') }} " method="POST">
                        @csrf
                        <div class="class-group">
                            <label class="control-label">Titolo del lavoro</label>
                            <input type="text" id="name" name="name" class="form-control @error('name')is-invalid @enderror" placeholder="{{ $work->titolo }}" value="{{ old('titolo') ?? $work->titolo}}">
                            @error('name')
                                <div class="text-danger"> {{ $message }} </div>
                            @enderror
                        </div>

                        
                     
                        <div>
                            <img src="{{ asset('storage/'.$work->image) }}" width="600px" height="500px" alt="Immagine non disponibile">
                        </div>
                        <div class="col-12 my-3">
                            <!-- Immagine -->
                            <label class="control-label my-3">Immagine</label>
                            <input type="file" name="image" id="image" placeholder="Inserisci l'immagine dell'animale in questione" class="form-control @error('image') is-invalid @enderror" value="{{ old('image') ?? $work->image}}">
                            @error('image')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="class-group my-3">
                            <button type="submit" class="btn btn-primary btn-success">Modifica dati</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection