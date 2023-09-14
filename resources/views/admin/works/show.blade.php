@extends('layouts.admin')

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-12">
                <div class="mb-4 d-flex justify-content-end">
                    <a href="{{route('admin.works.index')}}" class="btn btn-primary">Torna alla lista dei lavori</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h1>{{$work->titolo}}</h1>
                    </div>

                    <div class="card-body">
                        <strong>Dettagli:</strong>
                        <ul>
                            <li><strong>Slug:</strong> {{ $work->slug}}</li>
                            <li><strong>Descrizione:</strong> {{ $work->descrizione}}</li>
                            @if ($work->type)
                                <li><strong>Tipo lavoro:</strong> {{$work->type->nome_tipologia}}</li>
                                <li><strong>Descrizione tipologia lavoro:</strong> {{$work->type->descrizione}}</li>
                            @else
                                <li><strong>Tipo lavoro:</strong> Non specificato</li>
                            @endif
                            <li><strong>Costo:</strong> {{ $work->costo}}</li>
                            <li><strong>Data inizio:</strong> {{ Carbon\Carbon::createFromFormat('Y-m-d', $work->data_inizio)->format('d/m/Y') }}</li>
                            <li><strong>Data fine:</strong> {{ Carbon\Carbon::createFromFormat('Y-m-d', $work->data_fine)->format('d/m/Y') }}</li>
                            <li><strong>Cliente:</strong> {{ $work->cliente}}</li>
                            <li><strong>Indirizzo lavoro:</strong> {{ $work->indirizzo_lavoro}}</li>
                            <li><strong>Responsabile lavoro:</strong> {{ $work->responsabile_lavoro}}</li>
                            <li><strong>Materiali:</strong> {{ $work->materiali}}</li>
                        </ul>   
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection