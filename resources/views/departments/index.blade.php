@extends("layouts.department")

@section('title', 'Tutti i dipartimenti')

@section('content')

 <div class="d-flex py-4 gap-3">
        <a class="btn btn-outline-primary" href="{{ route('departments.create') }}">Aggiungi un dipartimento</a>
    </div>
    <table>
        <thead>
            <tr>
                <th class="px-3">Nome</th>
                <th class="px-3">Indirizzo</th>
                <th class="px-3">Email</th>
                <th class="px-3"></th>
            </tr>



        </thead>
        <tbody>
            @foreach ($departments as $department)
                <tr>
                    <td class="px-3">{{ $department->name }}</td>
                    <td class="px-3">{{ $department->address }}</td>
                    <td class="px-3">{{ $department->email}}</td>
                    <td class="px-3">
                        <a href="{{ route('departments.show', $department) }}">Visualizza</a>
                    </td>

                </tr>
            @endforeach


        </tbody>
    </table>

@endsection
