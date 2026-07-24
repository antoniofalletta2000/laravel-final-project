@extends('layouts.department')

@section('title', 'Pagina del singolo dipendente')

@section('content')

    <div class="d-flex justify-content-end">
        <a href="{{ route('employees.index') }}" class="btn btn-primary">Torna indietro</a>
    </div>

    <h2 class="mb-4">{{ $employee->name }} {{ $employee->last_name }}</h2>

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
            <div class="d-flex gap-2">
                <p class="fw-bold">Skills:</p>
                <p>
                    @foreach ($employee->skills as $skill)
                        <span class="badge" style="background-color: {{ $skill->color }}">{{ $skill->name }}</span>
                    @endforeach
                </p>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-between">
        <a href="{{ route('employees.edit', $employee) }}" class="btn btn-warning">Modifica</a>
        <form action="{{ route('employees.destroy', $employee) }}" method="POST">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger">Elimina</button>
        </form>
    </div>

@endsection
