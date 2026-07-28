@extends('layouts.department')

@section('title', 'Tabella skills')

@section('content')

    <div class="d-flex py-4 gap-3">
        <a class="btn btn-outline-primary" href="{{ route('skills.create') }}">Aggiungi una skill</a>
    </div>
    <table class="table table-striped">
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
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                                Elimina
                            </button>
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Elimina la skill</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <Var>VUOI ELIMINARE LA SKILL?</Var>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Annulla</button>
                                            <form action="{{ route('skills.destroy', $skill) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <input type="submit" class="btn btn-danger"
                                                    value="Elimina definitivamnte">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                </tr>
            @endforeach


        </tbody>
    </table>

@endsection
