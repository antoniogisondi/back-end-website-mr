@extends('layouts.admin')

@section('content')

<div class="container">
<div class="col-12 col-sm-6 col-md-3 my-5 w-100">
  <div class="d-flex justify-content-between align-items-center">
    <div>
      <a href="{{route('admin.services.create')}}" class="btn btn-primary">Aggiungi un servizio</a>
    </div>
    <div>
        <a href="{{route('admin.services.index')}}" class="btn btn-primary">I servizi della nostra azienda</a>
      </div>
      <div>
        <a class="btn btn-primary my-3" href="{{ route('admin.works.index') }}">Lista dei lavori</a>
      </div>
      <div>
        <a href="{{route('admin.dashboard')}}" class="btn btn-primary">Torna alla dashboard</a>
      </div>
  </div>
</div>
    <div class="card mb-3">
      <div class="card-header">
        <h3>I nostri servizi</h3>
      </div>
      <div class="card-body">
        <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Titolo</th>
                <th scope="col">Slug</th>
                <th scope="col">Visualizza/Modifica/Elimina</th>
              </tr>
            </thead>
            <tbody>
                @foreach($services as $service)
              <tr >
                <th scope="row">{{$service->id}}</th>
                <td>{{$service->titolo}}</td>
                <td>{{$service->slug}}</td>
                <td>
                  <div class="d-flex align-items-center justify-content-between my-content">
                      <a class="btn btn-sm btn-primary" href="{{route('admin.services.show', $service->id)}}"><i class="fa-solid fa-eye"></i></a>
                      <a class="btn btn-sm btn-warning" href="{{route('admin.services.edit', $service->id)}}" class="mx-3"><i class="fa-solid fa-pen-to-square"></i></a>
                      <form class="form-delete" action="{{route('admin.services.destroy', $service->id)}}" method="POST">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-sm btn-danger">
                              <i class="fa-solid fa-trash-can"></i>
                          </button>
                      </form>
                  </div>
                </td>
              </tr>
            </tbody>
          @endforeach
        </table>
      </div>
    </div>
</div>
@include('admin.partials.modal_delete')
@endsection