@extends('layouts.department')

@section('title', 'Modifica il dipartimento')

@section('content')
    <div class="container my-4">

        <form action="{{ route('departments.update', $department) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Nome Dipartimento</label>
                <input type="text" class="form-field form-control" id="name" name="name" value="{{$department->name}}" required>
            </div>

            <div class="mb-3">
                <label for="address" class="form-label">Indirizzo</label>
                <input type="text" class="form-control" id="address" name="address" value="{{$department->address}}" required>
            </div>

            <div class="d-flex gap-3 mb-3">
                <div class="flex-fill">
                    <label for="phone_number" class="form-label">Telefono</label>
                    <input type="text" class="form-control" id="phone_number" name="phone_number" value="{{$department->phone_number}}" required>
                </div>

                <div class="flex-fill">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{$department->email}}" required>
                </div>
            </div>


            <div class="mb-3">
                <label for="description" class="form-label">Descrizione</label>
                <textarea class="form-control" id="description" name="description" rows="3" required>{{$department->description}}</textarea>
            </div>

            <button type="submit" class="btn btn-success">Salva Modifica</button>
            <a href="{{ route('departments.show', $department) }}" class="btn btn-secondary">Annulla</a>
        </form>
    </div>
@endsection
