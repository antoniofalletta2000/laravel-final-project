@extends('layouts.department')

@section('title', 'Pagina del singolo dipendente')

@section('content')

    <div class="d-flex justify-content-end">
        <a href="{{ route('employees.index') }}" class="btn btn-primary">Torna indietro</a>
    </div>

    <h2 class="mb-4">{{ $employee->name }} {{ $employee->last_name }}</h2>

    <div id="employee_image">
        <img class="w-25 img-fluid"
            src="{{ $employee->image ? asset('storage/' . $employee->image) : asset('images/placeholder.jpg') }}"
            alt="{{ $employee->name }}">
    </div>

    <div class="row row-cols-1 row-cols-md-2">

        <div class="col">
            <div class="d-flex gap-2">
                <p class="fw-bold">Telefono:</p>
                <p>{{ $employee->phone_number }}</p>
            </div>
            <div class="d-flex gap-2">
                <p class="fw-bold">email:</p>
                <p>{{ $employee->email }}</p>
            </div>
            <div class="d-flex gap-2">
                <p class="fw-bold">Dipartimento:</p>
                <p>{{ $employee->department->name }}</p>
            </div>
        </div>

        <div class="col">
            <div class="d-flex flex-column gap-2">
                <div class="d-flex gap-2">
                    <p class="fw-bold">Skills:</p>
                    <p>
                        @foreach ($employee->skills as $skill)
                            <span class="badge" style="background-color: {{ $skill->color }}">{{ $skill->name }}</span>
                        @endforeach
                    </p>
                </div>

                <div class="d-flex gap-2">
                    <p class="fw-bold">Posizione lavorativa:</p>
                    <p>{{ $employee->job_title }}</p>
                </div>

            </div>
        </div>
    </div>

    <div class="d-flex justify-content-between mb-4">
        <a href="{{ route('employees.edit', $employee) }}" class="btn btn-warning">Modifica</a>
        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Elimina
        </button>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Elimina il dipendente</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <Var>VUOI ELIMINARE IL DIPENDENTE?</Var>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                        <form action="{{ route('employees.destroy', $employee) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="submit" class="btn btn-danger" value="Elimina definitivamnte">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
