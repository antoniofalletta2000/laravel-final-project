@extends("layouts.department")

@section('title', 'Tutti i dipendenti')

@section('content')

 <div class="d-flex py-4 gap-3">
        <a class="btn btn-outline-primary" href="{{ route('employees.create') }}">Aggiungi un dipendente</a>
    </div>
    <table>
        <thead>
            <tr>
                <th class="px-3">Cognome</th>
                <th class="px-3">Nome</th>
                <th class="px-3">Dipartimento</th>
                <th class="px-3"></th>
            </tr>



        </thead>
        <tbody>
            @foreach ($employees as $employee)
                <tr>
                    <td class="px-3">{{ $employee->last_name }}</td>
                    <td class="px-3">{{ $employee->name }}</td>
                    <td class="px-3">{{ $employee->department->name}}</td>
                    <td class="px-3">
                        <a href="{{ route('employees.show', $employee) }}">Visualizza</a>
                    </td>

                </tr>
            @endforeach


        </tbody>
    </table>

@endsection
