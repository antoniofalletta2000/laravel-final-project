@extends('layouts.department')

@section('title', 'aggiungi un dipendente')

@section('content')
    <div class="container-fluid py-3 py-md-4">


        <div class="d-flex flex-column-reverse flex-sm-row justify-content-between align-items-sm-center gap-3 mb-4">
            <div>
                <h2 class="fw-bold text-dark mb-0 h3">Aggiungi un Dipendente</h2>
                <p class="text-muted small mb-0">Inserisci i dati per registrare un nuovo dipendente nel sistema</p>
            </div>
            <div>
                <a href="{{ route('employees.index') }}"
                    class="btn btn-outline-secondary rounded-pill px-4 shadow-sm w-100 w-sm-auto">
                    Torna indietro
                </a>
            </div>
        </div>


        <div class="card shadow-sm border-0 rounded-4 mb-4">
            <div class="card-body p-4">

                <form action="{{ route('employees.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row g-3">


                        <div class="col-12 col-md-6">
                            <label for="name" class="form-label fw-semibold text-dark">Nome</label>
                            <input type="text" name="name" id="name" class="form-control rounded-3"
                                placeholder="Es. Mario">
                        </div>


                        <div class="col-12 col-md-6">
                            <label for="last_name" class="form-label fw-semibold text-dark">Cognome</label>
                            <input type="text" name="last_name" id="last_name" class="form-control rounded-3"
                                placeholder="Es. Rossi">
                        </div>


                        <div class="col-12 col-md-6">
                            <label for="phone_number" class="form-label fw-semibold text-dark">Telefono</label>
                            <input type="text" name="phone_number" id="phone_number" class="form-control rounded-3"
                                placeholder="Es. 0911234567">
                        </div>


                        <div class="col-12 col-md-6">
                            <label for="email" class="form-label fw-semibold text-dark">Email</label>
                            <input type="text" name="email" id="email" class="form-control rounded-3"
                                placeholder="Es. mario.rossi@regione.sicilia.it">
                        </div>


                        <div class="col-12 col-md-6">
                            <label for="department_id" class="form-label fw-semibold text-dark">Dipartimento</label>
                            <select name="department_id" id="department_id" class="form-select rounded-3">
                                @foreach ($departments as $department)
                                    <option value="{{ $department->id }}">{{ $department->name }}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="col-12 col-md-6">
                            <label for="job_title" class="form-label fw-semibold text-dark">Posizione Lavorativa</label>
                            <input type="text" name="job_title" id="job_title" class="form-control rounded-3"
                                placeholder="Es. Funzionario Amministrativo">
                        </div>


                        <div class="col-12">
                            <div class="p-3 bg-light rounded-3 border">
                                <label class="form-label fw-semibold text-dark d-block mb-2">Skills</label>
                                <div class="d-flex flex-wrap gap-3">
                                    @foreach ($skills as $skill)
                                        <div class="form-check skill">
                                            <input class="form-check-input" type="checkbox" name="skills[]"
                                                value="{{ $skill->id }}" id="skill-{{ $skill->id }}">
                                            <label class="form-check-label user-select-none"
                                                for="skill-{{ $skill->id }}">
                                                {{ $skill->name }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        
                        <div class="col-12">
                            <label for="image" class="form-label fw-semibold text-dark">Immagine Profilo</label>
                            <input id="image" name="image" type="file" class="form-control rounded-3">
                        </div>

                    </div>

                    <hr class="my-4 border-secondary-subtle">


                    <div class="d-flex flex-wrap justify-content-center justify-content-md-end gap-2">
                        <button type="submit" class="btn btn-success rounded-pill px-4 fw-semibold">Salva
                            Dipendente</button>
                        <a href="{{ route('employees.index') }}" class="btn btn-light rounded-pill px-4">Annulla</a>


                    </div>

                </form>

            </div>
        </div>

    </div>
@endsection
