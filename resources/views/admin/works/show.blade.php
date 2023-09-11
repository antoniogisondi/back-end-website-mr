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
                        </ul>   
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection