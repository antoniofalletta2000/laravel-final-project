@extends('layouts.department')

@section('title', 'Crea un nuovo dipartimento')

@section('content')
    <div class="d-flex justify-content-end">
        <a href="{{ route('departments.index') }}" class="btn btn-primary">Torna indietro</a>
    </div>
    <div class="container my-4">

        <form action="{{ route('departments.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Nome Dipartimento</label>
                <input type="text" class="form-field form-control" id="name" name="name" required>
            </div>

            <div class="mb-3">
                <label for="address" class="form-label">Indirizzo</label>
                <input type="text" class="form-control" id="address" name="address">
            </div>

            <div class="d-flex gap-3 mb-3">
                <div class="flex-fill">
                    <label for="phone_number" class="form-label">Telefono</label>
                    <input type="text" class="form-control" id="phone_number" name="phone_number">
                </div>

                <div class="flex-fill">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email">
                </div>
            </div>


            <div class="mb-3">
                <label for="description" class="form-label">Descrizione</label>
                <textarea class="form-control" id="description" name="description" rows="3"></textarea>
            </div>

            <button type="submit" class="btn btn-success">Salva Dipartimento</button>
            <a href="{{ route('departments.index') }}" class="btn btn-secondary">Annulla</a>
        </form>
    </div>
@endsection
