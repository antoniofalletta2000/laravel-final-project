@extends('layouts.department')

@section('title', 'aggiungi un dipendente')

@section('content')

    <div class="d-flex justify-content-end">
        <a href="{{ route('employees.index') }}" class="btn btn-primary">Torna indietro</a>
    </div>


    <form action="{{ route('employees.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class=" mb-3 d-flex flex-column ">
            <label for="name">Nome</label>
            <input type="text" name="name" id="name">
        </div>

        <div class=" mb-3 d-flex flex-column ">
            <label for="last_name">Cognome</label>
            <input type="text" name="last_name" id="last_name">
        </div>

        <div class=" mb-3 d-flex flex-column">
            <label for="phone_number">Telefono</label>
            <input type="text" name="phone_number" id="phone_number">
        </div>

        <div class=" mb-3 d-flex flex-column">
            <label for="email">Email</label>
            <input type="text" name="email" id="email">
        </div>

        <div class=" mb-3 d-flex flex-column">
            <label for="department_id">Dipartimento</label>
            <select name="department_id" id="department_id">
                @foreach ($departments as $department)
                    <option value="{{ $department->id }}">{{ $department->name }}</option>
                @endforeach
            </select>
        </div>


        <div class="form-control mb-3 d-flex flex-column">
            @foreach ($skills as $skill)
                <div class="skill me-2">
                    <input type="checkbox" name="skills[]" value="{{ $skill->id }}" id="skill-{{ $skill->id }}">
                    <label for="skill-{{ $skill->id }}">{{ $skill->name }}</label>
                </div>
            @endforeach
        </div>

        <div class="form-control mb-3 d-flex flex-wrap gap-4">
            <label for="image">immagine</label>
            <input id="image" name="image" type="file">
        </div>

        <button type="submit" class="btn btn-success">Salva Dipendente</button>
        <a href="{{ route('employees.index') }}" class="btn btn-secondary">Annulla</a>

    </form>

@endsection
