@extends('layouts.department')

@section('title', 'Crea una nuova skill')

@section('content')
<div class="container-fluid py-3 py-md-4">


    <div class="d-flex flex-column-reverse flex-sm-row justify-content-between align-items-sm-center gap-3 mb-4">
        <div>
            <h2 class="fw-bold text-dark mb-0 h3">Crea una Nuova Skill</h2>
            <p class="text-muted small mb-0">Inserisci il nome per registrare una nuova competenza nel sistema</p>
        </div>
        <div>
            <a href="{{ route('skills.index') }}" class="btn btn-outline-secondary rounded-pill px-4 shadow-sm w-100 w-sm-auto">
                Torna indietro
            </a>
        </div>
    </div>


    <div class="card shadow-sm border-0 rounded-4 mb-4">
        <div class="card-body p-4">

            <form action="{{ route('skills.store') }}" method="POST">
                @csrf

                <div class="row g-3">
                    
                    <div class="col-12">
                        <label for="name" class="form-label fw-semibold text-dark">Nome Skill</label>
                        <input type="text" class="form-field form-control rounded-3" id="name" name="name" placeholder="Es. Laravel, JavaScript, UI/UX Design..." required>
                    </div>
                </div>

                <hr class="my-4 border-secondary-subtle">

                
                <div class="d-flex flex-wrap justify-content-center justify-content-md-end gap-2">
                    <button type="submit" class="btn btn-success rounded-pill px-4 fw-semibold">Salva Skill</button>
                    <a href="{{ route('skills.index') }}" class="btn btn-light rounded-pill px-4">Annulla</a>

                </div>

            </form>

        </div>
    </div>

</div>
@endsection
