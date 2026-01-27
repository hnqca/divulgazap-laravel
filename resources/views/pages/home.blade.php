@extends('layouts.base')

@section('content')

<x-header title="DivulgaZap" description="Encontre e divulgue grupos de WhatsApp por interesses como estudos, trabalho, tecnologia, jogos e muito mais." />

<!-- Listing Groups -->
<section class="bg-light py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row gx-4 gx-lg-5 row-cols-1 row-cols-md-2 row-cols-xl-3 row-cols-xl-4 justify-content-center">
            @foreach ($groups as $group)
            <div class="col mb-5">
                @include('components.group-card', $group)
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- // Listing Groups -->

@endsection