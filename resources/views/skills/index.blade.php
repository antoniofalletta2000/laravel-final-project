@extends('layouts.department')

@section('title', 'Tabella skills')

@section('content')
<div class="container-fluid py-3 py-md-4">


    <div class="d-flex flex-column flex-sm-row justify-content-between align-items-sm-center gap-3 mb-4">
        <div>
            <h2 class="fw-bold text-dark mb-1 h3">Tabella Skills</h2>
            <p class="text-muted small mb-0">Gestione delle competenze registrate a sistema</p>
        </div>
        <a class="btn btn-primary rounded-pill px-4 shadow-sm " href="{{ route('skills.create') }}">
            Aggiungi una skill
        </a>
    </div>


        <div class="card shadow-sm border-0 rounded-4 overflow-hidden">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0 text-nowrap">
                    <thead class="table-light border-bottom">
                        <tr>
                            <th scope="col" class="py-3 px-3 px-md-4">Nome Skill</th>
                            <th scope="col" class="py-3 px-3 px-md-4 text-end">Azioni</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($skills as $skill)
                            <tr>

                                <td class="px-3 px-md-4 fw-bold text-dark">
                                    <span class="badge px-3 py-2 rounded-pill fs-6" style="background-color: {{ $skill->color }};">
                                        {{ $skill->name }}
                                    </span>
                                </td>


                                <td class="px-3 px-md-4 text-end">
                                    <div class="d-inline-flex gap-2">
                                        <a href="{{ route('skills.edit', $skill) }}" class="btn btn-sm btn-outline-warning rounded-pill px-3">
                                            Modifica
                                        </a>

                                        <button type="button" class="btn btn-sm btn-outline-danger rounded-pill px-3"
                                                data-bs-toggle="modal"
                                                data-bs-target="#deleteSkillModal-{{ $skill->id }}">
                                            Elimina
                                        </button>
                                    </div>

                                    
                                    <div class="modal fade text-start" id="deleteSkillModal-{{ $skill->id }}" tabindex="-1" aria-labelledby="deleteSkillModalLabel-{{ $skill->id }}" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content border-0 rounded-4 shadow">
                                                <div class="modal-header border-bottom-0 pb-0">
                                                    <h1 class="modal-title fs-5 fw-bold text-danger" id="deleteSkillModalLabel-{{ $skill->id }}">Elimina la skill</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body py-4">
                                                    <div class="p-3 bg-danger-subtle rounded-3 text-danger border border-danger-subtle">
                                                        <Var>VUOI ELIMINARE LA SKILL "{{ $skill->name }}"?</Var>
                                                    </div>
                                                </div>
                                                <div class="modal-footer border-top-0 pt-0">
                                                    <button type="button" class="btn btn-light rounded-pill px-3" data-bs-dismiss="modal">Annulla</button>
                                                    <form action="{{ route('skills.destroy', $skill) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <input type="submit" class="btn btn-danger rounded-pill px-3" value="Elimina definitivamente">
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

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
