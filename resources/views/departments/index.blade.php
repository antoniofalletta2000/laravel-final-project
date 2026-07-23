@extends("layouts.department")

@section('title', 'Tutti i dipartimenti')

@section('content')

 <div class="d-flex py-4 gap-3">
        <a class="btn btn-outline-primary" href="{{ route('departments.create') }}">Aggiungi un dipartimento</a>
    </div>
    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>Indirizzo</th>
                <th>Email</th>
                <th></th>
            </tr>



        </thead>
        <tbody>
            @foreach ($departments as $department)
                <tr>
                    <td>{{ $department->name }}</td>
                    <td>{{ $department->address }}</td>
                    <td>{{ $department->email}}</td>
                    <td>
                        <a href="{{ route('departments.show', $department) }}">Visualizza</a>
                    </td>

                </tr>
            @endforeach


        </tbody>
    </table>

@endsection
