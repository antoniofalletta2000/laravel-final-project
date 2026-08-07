@extends('layouts.department')

@section('title', 'Modifica il dipartimento')

@section('content')
<div class="container-fluid py-3 py-md-4">

    
    <div class="d-flex flex-column-reverse flex-sm-row justify-content-between align-items-sm-center gap-3 mb-4">
        <div>
            <h2 class="fw-bold text-dark mb-0 h3">Modifica Dipartimento</h2>
            <p class="text-muted small mb-0">Aggiorna le informazioni di {{ $department->name }}</p>
        </div>
        <div>
            <a href="{{ route('departments.show', $department) }}" class="btn btn-outline-secondary rounded-pill px-4 shadow-sm w-100 w-sm-auto">
                Torna indietro
            </a>
        </div>
    </div>


    <div class="card shadow-sm border-0 rounded-4 mb-4">
        <div class="card-body p-4">

            <form action="{{ route('departments.update', $department) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row g-3">


                    <div class="col-12">
                        <label for="name" class="form-label fw-semibold text-dark">Nome Dipartimento</label>
                        <input type="text" class="form-field form-control rounded-3" id="name" name="name"
                            value="{{ $department->name }}" required>
                    </div>


                    <div class="col-12">
                        <label for="address" class="form-label fw-semibold text-dark">Indirizzo</label>
                        <input type="text" class="form-control rounded-3" id="address" name="address"
                            value="{{ $department->address }}" required>
                    </div>


                    <div class="col-12 col-md-6">
                        <label for="phone_number" class="form-label fw-semibold text-dark">Telefono</label>
                        <input type="text" class="form-control rounded-3" id="phone_number" name="phone_number"
                            value="{{ $department->phone_number }}" required>
                    </div>


                    <div class="col-12 col-md-6">
                        <label for="email" class="form-label fw-semibold text-dark">Email</label>
                        <input type="email" class="form-control rounded-3" id="email" name="email"
                            value="{{ $department->email }}" required>
                    </div>


                    <div class="col-12">
                        <label for="description" class="form-label fw-semibold text-dark">Descrizione</label>
                        <textarea class="form-control rounded-3" id="description" name="description" rows="3" required>{{ $department->description }}</textarea>
                    </div>

                </div>

                <hr class="my-4 border-secondary-subtle">


                <div class="d-flex flex-wrap justify-content-center justify-content-md-end gap-2">
                    <button type="submit" class="btn btn-success rounded-pill px-4 fw-semibold">Salva Modifica</button>
                    <a href="{{ route('departments.show', $department) }}" class="btn btn-light rounded-pill px-4">Annulla</a>

                </div>

            </form>

        </div>
    </div>

</div>
@endsection
