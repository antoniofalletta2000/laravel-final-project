@extends('layouts.department')

@section('title', 'Crea una nuova skill')

@section('content')
    <div class="d-flex justify-content-end">
        <a href="{{ route('skills.index') }}" class="btn btn-primary">Torna indietro</a>
    </div>
    <div class="container my-4">

        <form action="{{ route('skills.update', $skill) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Nome Skill</label>
                <input type="text" class="form-field form-control" id="name" name="name"
                    value="{{ $skill->name }}" required>
            </div>



            <button type="submit" class="btn btn-success">Salva Skill</button>
            <a href="{{ route('skills.index') }}" class="btn btn-secondary">Annulla</a>
        </form>
    </div>
@endsection
