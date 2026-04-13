@extends('layouts.base')

@section('content')
<main class="reset">
    <div class="page-header">
        <h1>Categories</h1>
        <p>Explore groups by theme and find exactly what you're looking for.</p>
    </div>
    <div class="container">
        <div class="category-grid">
            @foreach ($groupCategories as $groupCategory)
                @include('components.category-card', $groupCategory)
            @endforeach
        </div>
    </div>
</main>
@endsection