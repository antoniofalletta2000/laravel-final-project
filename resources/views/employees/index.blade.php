@extends("layouts.department")

@section('title', 'Tabella dipendenti')

@section('content')
<div class="container-fluid py-3 py-md-4">


    <div class="d-flex flex-column flex-sm-row justify-content-between align-items-sm-center gap-3 mb-4">
        <div>
            <h2 class="fw-bold text-dark mb-1 h3">Tabella Dipendenti</h2>
            <p class="text-muted small mb-0">Gestione e consultazione del personale dell'ente</p>
        </div>
        <a class="btn btn-primary rounded-pill px-4 shadow-sm" href="{{ route('employees.create') }}">
            Aggiungi un dipendente
        </a>
    </div>

    
    <div class="card shadow-sm border-0 rounded-4 overflow-hidden">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0 text-nowrap">
                    <thead class="table-light border-bottom">
                        <tr>
                            <th scope="col" class="py-3 px-3 px-md-4">Cognome</th>
                            <th scope="col" class="py-3 px-3">Nome</th>
                            <th scope="col" class="py-3 px-3">Dipartimento</th>
                            <th scope="col" class="py-3 px-3 px-md-4 text-end">Azione</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($employees as $employee)
                            <tr>
                                <td class="px-3 px-md-4 fw-bold text-dark">
                                    {{ $employee->last_name }}
                                </td>
                                <td class="px-3 text-secondary">
                                    {{ $employee->name }}
                                </td>
                                <td class="px-3">
                                    <span class="badge bg-primary-subtle text-primary border border-primary-subtle px-3 py-2 rounded-pill">
                                        {{ $employee->department->name }}
                                    </span>
                                </td>
                                <td class="px-3 px-md-4 text-end">
                                    <a href="{{ route('employees.show', $employee) }}" class="btn btn-sm btn-outline-primary rounded-pill px-3">
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
