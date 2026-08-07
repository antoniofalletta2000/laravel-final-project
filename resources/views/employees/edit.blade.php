@extends('layouts.department')

@section('title', 'Modifica il dipendente')

@section('content')
<div class="container-fluid py-3 py-md-4">

    <!-- Header con Titolo e Bottone Indietro -->
    <div class="d-flex flex-column-reverse flex-sm-row justify-content-between align-items-sm-center gap-3 mb-4">
        <div>
            <h2 class="fw-bold text-dark mb-0 h3">Modifica Dipendente</h2>
            <p class="text-muted small mb-0">Aggiorna le informazioni e le competenze di {{ $employee->name }} {{ $employee->last_name }}</p>
        </div>
        <div>
            <a href="{{ route('employees.show', $employee) }}" class="btn btn-outline-secondary rounded-pill px-4 shadow-sm w-100 w-sm-auto">
                Torna indietro
            </a>
        </div>
    </div>

    <!-- Form Contenuto in una Card -->
    <div class="card shadow-sm border-0 rounded-4 mb-4">
        <div class="card-body p-4">

            <form action="{{ route('employees.update', $employee) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row g-3">

                    <!-- Nome -->
                    <div class="col-12 col-md-6">
                        <label for="name" class="form-label fw-semibold text-dark">Nome</label>
                        <input type="text" name="name" id="name" class="form-control rounded-3" value="{{ $employee->name }}" required>
                    </div>

                    <!-- Cognome -->
                    <div class="col-12 col-md-6">
                        <label for="last_name" class="form-label fw-semibold text-dark">Cognome</label>
                        <input type="text" name="last_name" id="last_name" class="form-control rounded-3" value="{{ $employee->last_name }}" required>
                    </div>

                    <!-- Telefono -->
                    <div class="col-12 col-md-6">
                        <label for="phone_number" class="form-label fw-semibold text-dark">Telefono</label>
                        <input type="text" name="phone_number" id="phone_number" class="form-control rounded-3" value="{{ $employee->phone_number }}" required>
                    </div>

                    <!-- Email -->
                    <div class="col-12 col-md-6">
                        <label for="email" class="form-label fw-semibold text-dark">Email</label>
                        <input type="text" name="email" id="email" class="form-control rounded-3" value="{{ $employee->email }}" required>
                    </div>

                    <!-- Dipartimento -->
                    <div class="col-12 col-md-6">
                        <label for="department_id" class="form-label fw-semibold text-dark">Dipartimento</label>
                        <select name="department_id" id="department_id" class="form-select rounded-3">
                            @foreach ($departments as $department)
                                <option value="{{ $department->id }}"
                                    {{ $employee->department_id == $department->id ? 'selected' : ' ' }}>
                                    {{ $department->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Posizione Lavorativa -->
                    <div class="col-12 col-md-6">
                        <label for="job_title" class="form-label fw-semibold text-dark">Posizione Lavorativa</label>
                        <input type="text" name="job_title" id="job_title" class="form-control rounded-3" value="{{ $employee->job_title }}" required>
                    </div>

                    <!-- Skills -->
                    <div class="col-12">
                        <div class="p-3 bg-light rounded-3 border">
                            <label class="form-label fw-semibold text-dark d-block mb-2">Skills</label>
                            <div class="d-flex flex-wrap gap-3">
                                @foreach ($skills as $skill)
                                    <div class="form-check skill">
                                        <input class="form-check-input" type="checkbox" name="skills[]" value="{{ $skill->id }}" id="skill-{{ $skill->id }}"
                                            {{ $employee->skills->contains($skill->id) ? 'checked' : ' ' }}>
                                        <label class="form-check-label user-select-none" for="skill-{{ $skill->id }}">
                                            {{ $skill->name }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <!-- Immagine con Anteprima -->
                    <div class="col-12">
                        <label for="image" class="form-label fw-semibold text-dark">Immagine Profilo</label>
                        <div class="d-flex flex-column flex-sm-row align-items-start align-items-sm-center gap-3 p-3 bg-light rounded-3 border">
                            <div id="employee_image">
                                <img class="rounded-3 shadow-sm object-fit-cover"
                                    style="width: 80px; height: 80px;"
                                    src="{{ $employee->image ? asset('storage/' . $employee->image) : asset('images/placeholder.jpg') }}"
                                    alt="{{ $employee->name }}">
                            </div>
                            <div class="flex-grow-1 w-100">
                                <input id="image" name="image" type="file" class="form-control rounded-3">
                                <span class="form-text text-muted small">Carica una nuova immagine per sostituire quella attuale.</span>
                            </div>
                        </div>
                    </div>

                </div>

                <hr class="my-4 border-secondary-subtle">


                <div class="d-flex flex-wrap justify-content-center justify-content-md-end gap-2">
                    <button type="submit" class="btn btn-success rounded-pill px-4 fw-semibold">Salva Modifica</button>
                    <a href="{{ route('employees.show', $employee) }}" class="btn btn-light rounded-pill px-4">Annulla</a>

                </div>

            </form>

        </div>
    </div>

</div>
@endsection
