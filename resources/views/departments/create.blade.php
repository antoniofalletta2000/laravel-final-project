@extends('layouts.department')

@section('title', 'Crea un nuovo dipartimento')

@section('content')
    <div class="container-fluid py-3 py-md-4">

        
        <div class="d-flex flex-column-reverse flex-sm-row justify-content-between align-items-sm-center gap-3 mb-4">
            <div>
                <h2 class="fw-bold text-dark mb-0 h3">Crea un Nuovo Dipartimento</h2>
                <p class="text-muted small mb-0">Inserisci i dettagli per registrare una nuova struttura dell'ente</p>
            </div>
            <div>
                <a href="{{ route('departments.index') }}"
                    class="btn btn-outline-secondary rounded-pill px-4 shadow-sm w-100 w-sm-auto">
                    Torna indietro
                </a>
            </div>
        </div>


        <div class="card shadow-sm border-0 rounded-4 mb-4">
            <div class="card-body p-4">

                <form action="{{ route('departments.store') }}" method="POST">
                    @csrf

                    <div class="row g-3">


                        <div class="col-12">
                            <label for="name" class="form-label fw-semibold text-dark">Nome Dipartimento</label>
                            <input type="text" class="form-field form-control rounded-3" id="name" name="name"
                                placeholder="Es. Dipartimento dell'Ambiente" required>
                        </div>


                        <div class="col-12">
                            <label for="address" class="form-label fw-semibold text-dark">Indirizzo</label>
                            <input type="text" class="form-control rounded-3" id="address" name="address"
                                placeholder="Es. Via Roma 123, Palermo">
                        </div>


                        <div class="col-12 col-md-6">
                            <label for="phone_number" class="form-label fw-semibold text-dark">Telefono</label>
                            <input type="text" class="form-control rounded-3" id="phone_number" name="phone_number"
                                placeholder="Es. 091 1234567">
                        </div>


                        <div class="col-12 col-md-6">
                            <label for="email" class="form-label fw-semibold text-dark">Email</label>
                            <input type="email" class="form-control rounded-3" id="email" name="email"
                                placeholder="Es. dipartimento@regione.sicilia.it">
                        </div>


                        <div class="col-12">
                            <label for="description" class="form-label fw-semibold text-dark">Descrizione</label>
                            <textarea class="form-control rounded-3" id="description" name="description" rows="3"
                                placeholder="Breve descrizione delle attività del dipartimento..."></textarea>
                        </div>

                    </div>

                    <hr class="my-4 border-secondary-subtle">


                    <div class="d-flex flex-wrap justify-content-center justify-content-md-end gap-2">
                        <button type="submit" class="btn btn-success rounded-pill px-4 fw-semibold">Salva
                            Dipartimento</button>
                        <a href="{{ route('departments.index') }}" class="btn btn-light rounded-pill px-4">Annulla</a>

                    </div>

                </form>

            </div>
        </div>

    </div>
@endsection
