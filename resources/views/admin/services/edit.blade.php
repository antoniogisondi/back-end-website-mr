@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center">
                    <h2>Modifica il servizio</h2>
                    <a href=" {{ route('admin.services.index')}} " class="btn btn-secondary btn-sm">Torna ai servizi</a>
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
                    <form action=" {{ route('admin.services.update', $service->id) }} " method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="class-group">
                            <label class="control-label">Titolo del servizio</label>
                            <input type="text" id="titolo" name="titolo" class="form-control @error('titolo')is-invalid @enderror" placeholder="Inserisci il titolo del servizio" value="{{ old('titolo') ?? $service->titolo}}">
                            @error('titolo')
                                <div class="text-danger"> {{ $message }} </div>
                            @enderror
                        </div>
                        <div class="class-group">
                            <label class="control-label">Descrizione servizio</label>
                            <textarea type="text" id="descrizione" name="descrizione" cols="30" rows="10" class="form-control @error('descrizione')is-invalid @enderror">{{ old('descrizione') ?? $service->descrizione}}</textarea>
                            @error('descrizione')
                                <div class="text-danger"> {{ $message }} </div>
                            @enderror
                        </div>
                        <div class="class-group my-3">
                            <button type="submit" class="btn btn-primary btn-success">Modifica</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection