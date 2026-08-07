@extends('layouts.app')

@section('content')
<div class="container-fluid py-3 py-md-4">


    <div class=" text-center mb-4">
        <h2 class="fw-bold text-dark mb-1 h3">
            Admin Dashboard
        </h2>
        <p class="text-muted small mb-0">Pannello di controllo e gestione del personale dell'ente</p>
    </div>


    @if (session('status'))
        <div class="alert alert-success alert-dismissible fade show rounded-3 shadow-sm border-0 mb-4" role="alert">
            <i class="bi bi-check-circle-fill me-2"></i> {{ session('status') }}
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
    @endif


    <div class="card shadow-sm border-0 rounded-4 mb-5 overflow-hidden">
        <div class="card-body p-4 bg-light">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-start gap-3">
                <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center shadow-sm fs-4" style="width: 50px; height: 50px;">
                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                </div>
                <div>
                    <h3 class="h5 fw-bold text-dark mb-1">Benvenuto, {{ Auth::user()->name }}!</h3>
                    <p class="text-secondary small mb-0">Cosa vuoi gestire oggi nel sistema?</p>
                </div>
            </div>
        </div>
    </div>


    <div class="row row-cols-1 row-cols-md-3 g-4">


        <div class="col">
            <a class="text-decoration-none h-100 d-block" href="{{ route('departments.index') }}">
                <div id="dep_card" class="card h-100 shadow-sm border-0 rounded-4 p-4 dash_card text-center d-flex flex-column justify-content-between transition-all">
                    <div class="py-3">
                        <h3 class="h4 fw-bold text-white mb-2">Tabella Dipartimenti</h3>
                        <p class="text-white-50 small mb-0">Gestisci gli uffici, le sedi e le strutture organizzative</p>
                    </div>
                    <div class="pt-3 border-top border-white-subtle">
                        <span class="btn btn-sm btn-light text-primary rounded-pill px-4 fw-semibold shadow-sm">
                            Accedi alla tabella
                        </span>
                    </div>
                </div>
            </a>
        </div>


        <div class="col">
            <a class="text-decoration-none h-100 d-block" href="{{ route('employees.index') }}">
                <div id="emp_card" class="card h-100 shadow-sm border-0 rounded-4 p-4 dash_card text-center d-flex flex-column justify-content-between transition-all">
                    <div class="py-3">
                        <h3 class="h4 fw-bold text-white mb-2">Tabella Dipendenti</h3>
                        <p class="text-white-50 small mb-0">Visualizza, aggiungi e aggiorna l'organico aziendale</p>
                    </div>
                    <div class="pt-3 border-top border-white-subtle">
                        <span class="btn btn-sm btn-light text-primary rounded-pill px-4 fw-semibold shadow-sm">
                            Accedi alla tabella
                        </span>
                    </div>
                </div>
            </a>
        </div>


        <div class="col">
            <a class="text-decoration-none h-100 d-block" href="{{ route('skills.index') }}">
                <div id="ski_card" class="card h-100 shadow-sm border-0 rounded-4 p-4 dash_card text-center d-flex flex-column justify-content-between transition-all">
                    <div class="py-3">
                        <h3 class="h4 fw-bold text-white mb-2">Tabella Skills</h3>
                        <p class="text-white-50 small mb-0">Gestisci le competenze e i tag professionali del personale</p>
                    </div>
                    <div class="pt-3 border-top border-white-subtle">
                        <span class="btn btn-sm btn-light text-primary rounded-pill px-4 fw-semibold shadow-sm">
                            Accedi alla tabella
                        </span>
                    </div>
                </div>
            </a>
        </div>

    </div>

</div>
@endsection
