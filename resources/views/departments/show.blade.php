@extends("layouts.department")

@section('title', 'Pagina del singolo dipartimento')

@section('content')

<div class="d-flex justify-content-end">
    <a href="{{ route('departments.index') }}" class="btn btn-primary">Torna indietro</a>
</div>

<h2 class="mb-4">{{$department->name}}</h2>

<div class="row row-cols-1 row-cols-md-2">

    <div class="col">
        <div class="d-flex gap-2">
            <p class="fw-bold">indirizzo:</p>
            <p>{{$department->address}}</p>
        </div>
        <div class="d-flex gap-2">
            <p class="fw-bold">email:</p>
            <p>{{$department->email}}</p>
        </div>
        <div class="d-flex gap-2">
            <p class="fw-bold">Telefono:</p>
            <p>{{$department->phone_number}}</p>
        </div>
    </div>

    <div class="col">
         <div class="d-flex gap-2">
            <p class="fw-bold">Descrizione:</p>
            <p>{{$department->description}}</p>
        </div>
    </div>
</div>

<div class="d-flex justify-content-between">
    <a href="{{ route('departments.edit', $department) }}" class="btn btn-warning">Modifica</a>
    <form action="{{route('departments.destroy', $department)}}" method="POST">
        @csrf
        @method('DELETE')
        <button class="btn btn-danger">Elimina</button>
    </form>
</div>

@endsection
