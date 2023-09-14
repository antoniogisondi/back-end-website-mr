@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center">
                    <h2>Modifica la tipologia</h2>
                    <a href=" {{ route('admin.types.index')}} " class="btn btn-secondary btn-sm">Torna alla lista delle tipologie di lavori</a>
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
                    <form action=" {{ route('admin.types.update', $type->id) }} " method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="class-group">
                            <label class="control-label">Nome tipologia:</label>
                            <input type="text" id="nome_tipologia" name="nome_tipologia" class="form-control @error('name')is-invalid @enderror" placeholder="{{ $type->nome_tipologia }}" value="{{ old('nome_tipologia') ?? $type->nome_tipologia}}">
                            @error('nome_tipologia')
                                <div class="text-danger"> {{ $message }} </div>
                            @enderror
                        </div>
                     
                        <div class="class-group">
                            <label class="control-label">Descrizione della tipologia di lavoro</label>
                            <textarea type="text" id="descrizione" name="descrizione" class="form-control @error('descrizione')is-invalid @enderror" placeholder="Inserire la descrizione del lavoro">{{ old('descrizione') ?? $type->descrizione}}</textarea>
                            @error('descrizione')
                                <div class="text-danger"> {{ $message }} </div>
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