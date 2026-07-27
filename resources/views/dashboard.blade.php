@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="fs-4 text-secondary my-4">
            Admin Dashboard
        </h2>
        <div class="row justify-content-center">
            <div class="col">
                <div class="card">
                    <div class="card-header">Benvenuto {{ Auth::user()->name }} !</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        Cosa vuoi fare oggi?
                    </div>
                </div>
            </div>
        </div>

        <div class="row row-cols-1 row-cols-md-3 mt-5 text-center">

            <div class="col">
                <a class="text-decoration-none"  href="{{ route('departments.index') }}">
                    <div class="card p-5 dash_card">
                        <h2>Tabella Dipartimenti</h2>
                    </div>
                </a>
            </div>

            <div class="col">
                <a class="text-decoration-none"  href="{{ route('employees.index') }}">
                    <div class="card p-5 dash_card">
                        <h2>Tabella Dipendenti</h2>
                    </div>
                </a>
            </div>

            <div class="col">
                <a class="text-decoration-none" href="{{ route('skills.index') }}">
                    <div class="card p-5 dash_card">
                        <h2>Tabella Skills</h2>
                    </div>
                </a>
            </div>

        </div>


    </div>
@endsection
