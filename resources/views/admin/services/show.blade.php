@extends('layouts.admin')

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-12">
                <div class="mb-4 d-flex justify-content-end">
                    <a href="{{route('admin.services.index')}}" class="btn btn-primary">Torna alla lista dei servizi</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h1>{{ $service->titolo }}</h1>
                        <h6>{{ $service->slug }}</h6>
                    </div>

                    <div class="card-body">
                        <strong>Descrizione:</strong>
                        <ul>
                            <li> {{ $service->descrizione }}</li>
                        </ul>   
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection