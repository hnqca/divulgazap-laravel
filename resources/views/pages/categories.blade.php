@extends('layouts.base')

@section('title', 'Categories - '. config('app.name'))

@section('content')
<main class="reset">
    <div class="page-header">
        <h1>{{ __("pages.categories.hero.title") }}</h1>
        <p>{{ __("pages.categories.hero.description") }}</p>
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