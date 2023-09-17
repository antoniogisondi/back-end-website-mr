@extends('layouts.admin')

@section('content')
{{-- prova --}}
    <div class="container">
        <div class="row">
            <div class="col-12 my-3">
                <div class="d-flex justify-content-between align-items-center">
                    <h2>Inserisci una nuova tipologia di lavoro</h2>
                    <a href=" {{ route('admin.types.index')}} " class="btn btn-secondary btn-sm">Le nostre tipologie di lavoro</a>
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
                    <form action=" {{ route('admin.types.store') }} " method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="class-group">
                            <label class="control-label">Nome tipologia</label>
                            <input type="text" id="nome_tipologia" name="nome_tipologia" class="form-control @error('nome_tipologia')is-invalid @enderror" placeholder="Inserisci il nome della tipologia di lavoro" value="{{ old('nome_tipologia') }}">
                            @error('nome_tipologia')
                                <div class="text-danger"> {{ $message }} </div>
                            @enderror
                        </div>
                        <div class="class-group">
                            <label class="control-label">Descrizione della tipologia di lavoro</label>
                            <textarea type="text" id="descrizione" name="descrizione" class="form-control @error('descrizione')is-invalid @enderror" placeholder="Inserire la descrizione del lavoro">{{ old('descrizione') }}</textarea>
                            @error('descrizione')
                                <div class="text-danger"> {{ $message }} </div>
                            @enderror
                        </div>
                        <div class="col-12 my-3">
                            <!-- Immagine -->
                            <label class="control-label my-3">Immagine</label>
                            <input type="file" name="cover_image" id="cover_image" placeholder="Inserisci l'immagine dell'animale in questione" class="form-control @error('cover_image') is-invalid @enderror" value="{{ old('cover_image') }}">
                            @error('cover_image')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="class-group my-3">
                            <button type="submit" class="btn btn-primary btn-success">Aggiungi tipologia</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection