@extends('layouts.base')

@section('content')
<main class="container col-md-9 col-sm-12 mt-5 mb-5">
    <div class="row">
        <h1 class="text-center mb-5">{{ $group->name }}</h1>
        <div class="col-md-6 mb-5">
            <div class="card">
                <img src="{{ asset('storage/images/groups/'.$group->image_path) }}" class="card-img-top object-fit-cover group-img" width="100%" height="300px" />
                <div class="card-body">
                    <h5 class="card-title fw-bold">{{ $group->name }}</h5>
                    <p class="card-text">{{ $group->description }}</p>
                    <div class="text-center d-sm-inline d-none">
                        <a href="https://chat.whatsapp.com/{{ $group->invite_code }}" target="_blank" class="btn btn-success btn-group-join w-100">Entrar no Grupo</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card card-body">
                <p class="card-text">Este grupo foi enviado em <strong>{{ $group->created_at_formatted }}</strong>.</p>
                <hr />
                <div class="mt-2">
                    <a href="{{ route('group.create') }}" class="text-decoration-none">Envie o seu grupo</a> também e comece a receber novos integrantes!
                </div>
            </div>
        </div>
    </div>
</main>
@endsection