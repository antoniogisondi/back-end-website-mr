@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center">
                    <h2>Modifica i dati del lavoro in corso</h2>
                    <a href=" {{ route('admin.works.index')}} " class="btn btn-secondary btn-sm">Torna alla lista dei lavori</a>
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
                    <form action=" {{ route('admin.works.update', $work->id) }} " method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="class-group">
                            <label class="control-label">Titolo del lavoro</label>
                            <input type="text" id="titolo" name="titolo" class="form-control @error('name')is-invalid @enderror" placeholder="{{ $work->titolo }}" value="{{ old('titolo') ?? $work->titolo}}">
                            @error('titolo')
                                <div class="text-danger"> {{ $message }} </div>
                            @enderror
                        </div>
                     
                        <div class="class-group">
                            <label class="control-label">Descrizione del lavoro</label>
                            <textarea type="text" id="descrizione" name="descrizione" class="form-control @error('descrizione')is-invalid @enderror" placeholder="Inserire la descrizione del lavoro">{{ old('descrizione') ?? $work->descrizione}}</textarea>
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