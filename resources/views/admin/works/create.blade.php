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
                        <div class="class-group mt-4">
                            <label class="control-label">Titolo</label>
                            <input type="text" id="titolo" name="titolo" class="form-control @error('titolo')is-invalid @enderror" placeholder="Inserisci il titolo del lavoro" value="{{ old('titolo') }}">
                            @error('titolo')
                                <div class="text-danger"> {{ $message }} </div>
                            @enderror
                        </div>
                        <div class="class-group mt-4">
                            <label for="type_id" class="form-label">Seleziona la tipologia di lavoro</label>
                            <select name="type_id" id="type_id" class="form-control">
                                <option value="" selected>Seleziona la tipologia</option>
                                @foreach ($types as $type)
                                    <option {{$type->id == old('type_id', $work->type_id) ? 'selected' : ''}} value="{{ $type->id }}">{{ $type->nome_tipologia }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="class-group mt-4">
                            <label class="control-label">Descrizione del lavoro</label>
                            <textarea type="text" id="descrizione" name="descrizione" class="form-control @error('descrizione')is-invalid @enderror" placeholder="Inserire la descrizione del lavoro">{{ old('descrizione') }}</textarea>
                            @error('descrizione')
                                <div class="text-danger"> {{ $message }} </div>
                            @enderror
                        </div>
                        <div class="class-group mt-4 d-flex flex-column">
                            <label class="input-label">Costo del lavoro</label>
                            <div class="input-group">
                                <span class="input-group-text">$</span>
                                <input type="text" id="costo" name="costo" class="form-control @error('costo')is-invalid @enderror" placeholder="Inseririsci il costo del lavoro" aria-label="Amount (to the nearest dollar)" value="{{ old('costo') }}">
                                <span class="input-group-text">.00</span>
                            </div>
                            @error('costo')
                                <div class="text-danger"> {{ $message }} </div>
                            @enderror
                        </div>
                        <div class="class-group mt-4">
                            <label class="control-label">Data d'inizio</label>
                            <input type="text" id="data_inizio" name="data_inizio" class="form-control @error('data_inizio') is-invalid @enderror" placeholder="Inserire la data d'inizio del lavoro" value="{{ old('data_inizio') }}">
                            @error('data_inizio')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="class-group mt-4">
                            <label class="control-label">Data di fine</label>
                            <input type="text" id="data_fine" name="data_fine" class="form-control @error('data_fine')is-invalid @enderror" placeholder="Inserire la data di fine del lavoro" value="{{ old('data_fine') }}">
                            @error('data_fine')
                                <div class="text-danger"> {{ $message }} </div>
                            @enderror
                        </div>
                        <div class="class-group mt-4">
                            <label class="control-label">Cliente</label>
                            <input type="text" id="cliente" name="cliente" class="form-control @error('cliente')is-invalid @enderror" placeholder="Inserire il cliente" value="{{ old('cliente') }}">
                            @error('cliente')
                                <div class="text-danger"> {{ $message }} </div>
                            @enderror
                        </div>
                        <div class="class-group mt-4">
                            <label class="control-label">Indirizzo</label>
                            <input type="text" id="indirizzo_lavoro" name="indirizzo_lavoro" class="form-control @error('indirizzo_lavoro')is-invalid @enderror" placeholder="Inserirsci l'indirizzo" value="{{ old('indirizzo_lavoro') }}">
                            @error('indirizzo_lavoro')
                                <div class="text-danger"> {{ $message }} </div>
                            @enderror
                        </div>
                        <div class="class-group mt-4">
                            <label class="control-label">Responsabile del lavoro</label>
                            <input type="text" id="responsabile_lavoro" name="responsabile_lavoro" class="form-control @error('responsabile_lavoro')is-invalid @enderror" placeholder="Inserisci il responsabile del lavoro" value="{{ old('responsabile_lavoro') }}">
                            @error('responsabile_lavoro')
                                <div class="text-danger"> {{ $message }} </div>
                            @enderror
                        </div>
                        <div class="class-group mt-4">
                            <label class="control-label">Materiali</label>
                            <textarea type="text" id="materiali" name="materiali" class="form-control @error('materiali')is-invalid @enderror" placeholder="Inserisci i materiali utilizzati">{{ old('materiali') }}</textarea>
                            @error('materiali')
                                <div class="text-danger"> {{ $message }} </div>
                            @enderror
                        </div>
                        <div class="class-group mt-4">
                            <button type="submit" class="btn btn-primary btn-success">Aggiungi lavoro</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection