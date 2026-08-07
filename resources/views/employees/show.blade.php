@extends('layouts.department')

@section('title', 'Pagina del singolo dipendente')

@section('content')
<div class="container-fluid py-3 py-md-4">


    <div class="d-flex flex-column-reverse flex-sm-row justify-content-between align-items-sm-center gap-3 mb-4">
        <div>
            <h2 class="fw-bold text-dark mb-0 h3">{{ $employee->name }} {{ $employee->last_name }}</h2>
            <p class="text-muted small mb-0">Scheda personale e dettagli del dipendente</p>
        </div>
        <div>
            <a href="{{ route('employees.index') }}" class="btn btn-outline-secondary rounded-pill px-4 shadow-sm w-100 w-sm-auto">
                Torna indietro
            </a>
        </div>
    </div>


    <div class="card shadow-sm border-0 rounded-4 mb-4 overflow-hidden">
        <div class="card-body p-3 p-sm-4">
            <div class="row g-4 align-items-center">


                <div class="col-12 col-md-3 text-center" id="employee_image">
                    <img id="img_emp" class="img-fluid rounded-4 shadow-sm object-fit-cover"
                         
                         src="{{ $employee->image ? asset('storage/' . $employee->image) : asset('images/placeholder.jpg') }}"
                         alt="{{ $employee->name }}">
                </div>


                <div class="col-12 col-md-9">
                    <div class="row g-3">


                        <div class="col-12 col-md-6 border-end-md">
                            <h6 class="text-primary fw-bold text-uppercase small mb-3">Informazioni Generali</h6>

                            <div class="mb-2">
                                <span class="text-muted d-block small fw-bold">Telefono:</span>
                                <span class="fs-6 text-dark text-break">{{ $employee->phone_number }}</span>
                            </div>

                            <div class="mb-2">
                                <span class="text-muted d-block small fw-bold">Email:</span>
                                <span class="fs-6 text-dark text-break">{{ $employee->email }}</span>
                            </div>

                            <div class="mb-0">
                                <span class="text-muted d-block small fw-bold">Dipartimento:</span>
                                <span class="badge bg-primary-subtle text-primary border border-primary-subtle px-3 py-2 rounded-pill mt-1 text-wrap text-start">
                                    {{ $employee->department->name }}
                                </span>
                            </div>
                        </div>


                        <div class="col-12 col-md-6">
                            <h6 class="text-primary fw-bold text-uppercase small mb-3">Ruolo & Competenze</h6>

                            <div class="mb-3">
                                <span class="text-muted d-block small fw-bold">Posizione lavorativa:</span>
                                <span class="fs-6 text-dark fw-semibold text-break">{{ $employee->job_title }}</span>
                            </div>


                            <div class="mw-100">
                                <span class="text-muted d-block small fw-bold mb-2">Skills:</span>
                                <div class="d-flex flex-wrap gap-2 mw-100">
                                    @foreach ($employee->skills as $skill)
                                        <span class="badge px-2 px-sm-3 py-2 rounded-pill text-wrap text-break"
                                              style="background-color: {{ $skill->color }}; max-width: 100%;">
                                            {{ $skill->name }}
                                        </span>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>


    <div class="d-flex justify-content-center justify-content-md-end align-items-center gap-2 mb-4">
        <a href="{{ route('employees.edit', $employee) }}" class="btn btn-warning rounded-pill px-4 fw-semibold">
            Modifica
        </a>

        <button type="button" class="btn btn-outline-danger rounded-pill px-4 fw-semibold" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Elimina
        </button>


        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content border-0 rounded-4 shadow">
                    <div class="modal-header border-bottom-0 pb-0">
                        <h1 class="modal-title fs-5 fw-bold text-danger" id="exampleModalLabel">Elimina il dipendente</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body py-4">
                        <div class="p-3 bg-danger-subtle rounded-3 text-danger border border-danger-subtle">
                            <Var>VUOI ELIMINARE IL DIPENDENTE?</Var>
                        </div>
                    </div>
                    <div class="modal-footer border-top-0 pt-0">
                        <button type="button" class="btn btn-light rounded-pill px-3" data-bs-dismiss="modal">Annulla</button>
                        <form action="{{ route('employees.destroy', $employee) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="submit" class="btn btn-danger rounded-pill px-3" value="Elimina definitivamente">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
