@extends("layouts.department")

@section('title', 'Tabella dipartimenti')

@section('content')
<div class="container-fluid py-4">


    <div class="d-flex flex-wrap justify-content-between align-items-center mb-4 gap-2">
        <div>
            <h2 class="fw-bold text-dark mb-0">Tabella Dipartimenti</h2>
            <p class="text-muted small mb-0">Gestione delle strutture dell'ente</p>
        </div>
        <a class="btn btn-primary rounded-pill px-4 shadow-sm" href="{{ route('departments.create') }}">
            Aggiungi un dipartimento
        </a>
    </div>


    <div class="card shadow-sm border-0 rounded-4 overflow-hidden">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light border-bottom">
                        <tr>
                            <th scope="col" class="py-3 px-4">Nome</th>
                            <th scope="col" class="py-3 px-3">Indirizzo</th>
                            <th scope="col" class="py-3 px-3">Email</th>
                            <th scope="col" class="py-3 px-4 text-end">Azione</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($departments as $department)
                            <tr>
                                <td class="px-4 fw-bold text-primary">
                                    {{ $department->name }}
                                </td>
                                <td class="px-3 text-secondary">
                                    {{ $department->address }}
                                </td>
                                <td class="px-3">
                                    <span class="badge bg-light text-dark border font-monospace px-2 py-1">
                                        {{ $department->email }}
                                    </span>
                                </td>
                                <td class="px-4 text-end">
                                    <a href="{{ route('departments.show', $department) }}" class="btn btn-sm btn-outline-primary rounded-pill px-3">
                                        Visualizza
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection
