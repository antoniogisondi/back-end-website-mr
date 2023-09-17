@extends('layouts.admin')

@section('content')
    <div class="container mt-4">
        <div class="row">
            @if (session('message'))
                <div class="col-12 mt-5">
                    <div class="alert alert-success">
                        <span>{{ session('message') }}</span>
                    </div>
                </div>
            @endif
            <div class="col-12">
                <div class="mb-4 d-flex justify-content-end">
                    <a href="{{route('admin.types.index')}}" class="btn btn-primary">Torna alla lista delle tipologie di lavoro</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h1>{{$type->nome_tipologia}}</h1>
                    </div>

                    <div class="card-body">
                        <strong>Dettagli:</strong>
                        <ul>
                            <li><strong>Slug:</strong> {{ $type->slug}}</li>
                            <li><strong>Descrizione:</strong> {{ $type->descrizione}}</li>
                            <li>
                                <strong>Copertina:</strong>
                                @if ($type->cover_image)
                                    <img class="d-block img-fluid w-25 border border-3 my-3" src="{{ asset('storage/'.$type->cover_image) }}" alt="{{ $type->slug }}-immagine-di-copertina">     
                                @else
                                    <span>Immagine non disponibile</span>
                                @endif
                            </li> 
                        </ul>   
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection