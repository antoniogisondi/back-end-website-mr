@extends('layouts.admin')

@section('content')
{{-- prova --}}
    <div class="container">
        <div class="row">
            <div class="col-12 my-3">
                <div class="d-flex justify-content-between align-items-center">
                    <h2>Inserisci un nuovo lavoro</h2>
                    <a href=" {{ route('admin.works.index')}} " class="btn btn-secondary btn-sm">I lavori della nostra azienda</a>
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
                    <form action=" {{ route('admin.works.store') }} " method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="class-group">
                            <label class="control-label">Titolo</label>
                            <input type="text" id="titolo" name="titolo" class="form-control @error('titolo')is-invalid @enderror" placeholder="Inserisci il titolo del lavoro" value="{{ old('titolo') }}">
                            @error('titolo')
                                <div class="text-danger"> {{ $message }} </div>
                            @enderror
                        </div>
                        <div class="class-group">
                            <label class="control-label">Descrizione del lavoro</label>
                            <textarea type="text" id="descrizione" name="descrizione" class="form-control @error('descrizione')is-invalid @enderror" placeholder="Inserire la descrizione del lavoro">{{ old('descrizione') }}</textarea>
                            @error('descrizione')
                                <div class="text-danger"> {{ $message }} </div>
                            @enderror
                        </div>
                        <div class="col-12 my-3">
                            <!-- Immagine -->
                            <label class="control-label my-3">Immagine 1</label>
                            <input type="file" name="image-1" id="image-1" placeholder="Inserisci l'immagine del lavoro in questione" class="form-control @error('image') is-invalid @enderror" value="{{ old('image-1') }}">
                            @error('image')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-12 my-3">
                            <!-- Immagine -->
                            <label class="control-label my-3">Immagine 2</label>
                            <input type="file" name="image-2" id="image-2" placeholder="Inserisci l'immagine del lavoro in questione" class="form-control @error('image') is-invalid @enderror" value="{{ old('image-2') }}">
                            @error('image')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-12 my-3">
                            <!-- Immagine -->
                            <label class="control-label my-3">Immagine 3</label>
                            <input type="file" name="image-3" id="image-3" placeholder="Inserisci l'immagine del lavoro in questione" class="form-control @error('image') is-invalid @enderror" value="{{ old('image-3') }}">
                            @error('image')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-12 my-3">
                            <!-- Immagine -->
                            <label class="control-label my-3">Immagine 4</label>
                            <input type="file" name="image-4" id="image-4" placeholder="Inserisci l'immagine del lavoro in questione" class="form-control @error('image') is-invalid @enderror" value="{{ old('image-4') }}">
                            @error('image')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="class-group my-3">
                            <button type="submit" class="btn btn-primary btn-success">Aggiungi lavoro</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection