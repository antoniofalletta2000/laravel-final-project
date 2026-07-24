@extends('layouts.department')

@section('title', 'Modifica il dipendente')

@section('content')

    <div class="d-flex justify-content-end">
        <a href="{{ route('employees.show', $employee) }}" class="btn btn-primary">Torna indietro</a>
    </div>


    <form action="{{ route('employees.update', $employee) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class=" mb-3 d-flex flex-column ">
            <label for="name">Nome</label>
            <input type="text" name="name" id="name" value="{{ $employee->name }}" required>
        </div>

        <div class=" mb-3 d-flex flex-column ">
            <label for="last_name">Cognome</label>
            <input type="text" name="last_name" id="last_name" value="{{ $employee->last_name }}" required>
        </div>

        <div class=" mb-3 d-flex flex-column">
            <label for="phone_number">Telefono</label>
            <input type="text" name="phone_number" id="phone_number" value="{{ $employee->phone_number }}" required>
        </div>

        <div class=" mb-3 d-flex flex-column">
            <label for="email">Email</label>
            <input type="text" name="email" id="email" value="{{ $employee->email }}" required>
        </div>

        <div class=" mb-3 d-flex flex-column">
            <label for="department_id">Dipartimento</label>
            <select name="department_id" id="department_id">
                @foreach ($departments as $department)
                    <option value="{{ $department->id }}"
                        {{ $employee->department_id == $department->id ? 'selected' : ' ' }}>
                        {{ $department->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class=" mb-3 d-flex flex-column">
            <label for="job_title">Posizione Lavorativa</label>
            <input type="text" name="job_title" id="job_title" value="{{ $employee->job_title }}" required>
        </div>


        <div class="form-control mb-3 d-flex flex-column">
            @foreach ($skills as $skill)
                <div class="skill me-2">
                    <input type="checkbox" name="skills[]" value="{{ $skill->id }}" id="skill-{{ $skill->id }}"
                        {{ $employee->skills->contains($skill->id) ? 'checked' : ' ' }}>
                    <label for="skill-{{ $skill->id }}">{{ $skill->name }}</label>
                </div>
            @endforeach
        </div>

        <div class="form-control mb-3 d-flex flex-wrap gap-4">
            <label for="image">immagine</label>
            <input id="image" name="image" type="file">
            <div id="employee_image">
                <img class="w-25 img-fluid"
                    src="{{ $employee->image ? asset('storage/' . $employee->image) : asset('images/placeholder.jpg') }}"
                    alt="{{ $employee->name }}">
            </div>
        </div>

        <button type="submit" class="btn btn-success">Salva Modifica</button>
        <a href="{{ route('employees.show', $employee) }}" class="btn btn-secondary">Annulla</a>

    </form>

@endsection
