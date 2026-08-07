@extends('layouts.department')

@section('title', 'Pagina del singolo dipartimento')

@section('content')
<div class="container-fluid py-3 py-md-4">


    <div class="d-flex flex-column-reverse flex-sm-row justify-content-between align-items-sm-center gap-3 mb-4">
        <div>
            <h2 class="fw-bold text-dark mb-0 h3">{{ $department->name }}</h2>
            <p class="text-muted small mb-0">Dettaglio e scheda informativa del dipartimento</p>
        </div>
        <div class="d-flex justify-content-end gap-2">
            <a href="{{ route('departments.index') }}" class="btn btn-outline-secondary rounded-pill px-4 shadow-sm ">
                Torna indietro
            </a>
        </div>
    </div>


    <div class="card shadow-sm border-0 rounded-4 mb-4">
        <div class="card-body p-4">
            <div class="row g-4">


                <div class="col-12 col-md-5 border-end-md">
                    <h6 class="text-primary fw-bold text-uppercase small mb-3">Informazioni di Contatto</h6>

                    <div class="mb-3">
                        <span class="text-muted d-block small fw-bold">Indirizzo:</span>
                        <span class="fs-6 text-dark">{{ $department->address }}</span>
                    </div>

                    <div class="mb-3">
                        <span class="text-muted d-block small fw-bold">Email:</span>
                        <span class="fs-6 text-dark">{{ $department->email }}</span>
                    </div>

                    <div class="mb-0">
                        <span class="text-muted d-block small fw-bold">Telefono:</span>
                        <span class="fs-6 text-dark">{{ $department->phone_number }}</span>
                    </div>
                </div>


                <div class="col-12 col-md-7">
                    <h6 class="text-primary fw-bold text-uppercase small mb-3">Descrizione</h6>
                    <p class="text-secondary mb-0 lh-base">
                        {{ $department->description }}
                    </p>
                </div>

            </div>
        </div>
    </div>


    <div class="d-flex justify-content-center justify-content-md-end align-items-center gap-2">
        <a href="{{ route('departments.edit', $department) }}" class="btn btn-warning rounded-pill px-4 fw-semibold">
            Modifica
        </a>

        <button type="button" class="btn btn-outline-danger rounded-pill px-4 fw-semibold" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Elimina
        </button>

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content border-0 rounded-4 shadow">
                    <div class="modal-header border-bottom-0 pb-0">
                        <h1 class="modal-title fs-5 fw-bold text-danger" id="exampleModalLabel">Elimina il dipartimento</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body py-4">
                        <div class="p-3 bg-danger-subtle rounded-3 text-danger border border-danger-subtle">
                            <Var>VUOI ELIMINARE IL DIPARTIMENTO?</Var>
                        </div>
                    </div>
                    <div class="modal-footer border-top-0 pt-0">
                        <button type="button" class="btn btn-light rounded-pill px-3" data-bs-dismiss="modal">Annulla</button>
                        <form action="{{ route('departments.destroy', $department) }}" method="POST">
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
