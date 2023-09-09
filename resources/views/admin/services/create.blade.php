@extends('layouts.admin')

@section('content')
{{-- prova --}}
    <div class="container">
        <div class="row">
            <div class="col-12 my-3">
                <div class="d-flex justify-content-between align-items-center">
                    <h2>Inserisci un nuovo servizio</h2>
                    <a href=" {{ route('admin.services.index')}} " class="btn btn-secondary btn-sm">I servizi della nostra azienda</a>
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
                    <form action=" {{ route('admin.services.store') }} " method="POST">
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
                        <div class="class-group my-3">
                            <button type="submit" class="btn btn-primary btn-success">Aggiungi un servizio</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection