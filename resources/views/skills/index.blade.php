@extends('layouts.department')

@section('title', 'Tutte le skills')

@section('content')

    <div class="d-flex py-4 gap-3">
        <a class="btn btn-outline-primary" href="{{ route('skills.create') }}">Aggiungi una skill</a>
    </div>
    <table>
        <thead>
            <tr>
                <th class="px-3">Nome</th>
                <th class="px-3">azioni</th>
                <th></th>
            </tr>



        </thead>
        <tbody>
            @foreach ($skills as $skill)
                <tr>
                    <td class="px-3">{{ $skill->name }}</td>
                    <td class="px-3">
                        <div class="d-flex gap-4">
                            <a href="{{ route('skills.edit', $skill) }}" class="btn btn-warning">Modifica</a>
                            <form action="{{ route('skills.destroy', $skill) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger">Elimina</button>
                            </form>
                        </div>


                </tr>
            @endforeach


        </tbody>
    </table>

@endsection
