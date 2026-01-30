@extends('layouts.base')

@section('content')

<x-header title="Categorias" description="Lista de temas específicos em Grupos do WhatsApp" />

<!-- Listing Categories -->
<section class="container mt-5">
    <div class="list-group mb-5">
        <div class="row">
            @foreach ($groupCategories as $groupCategory)
                @include('components.category-card', $groupCategory)
            @endforeach
        </div>
    </div>
</section>
<!-- // Listing Categories -->

@endsection