@extends('layouts.base')

@section('content')
<main class="reset">
    <section class="hero">
        <h1>{{ __('pages.home.hero.title') }}</h1>
        <p>{{ __('pages.home.hero.description') }}</p>
    </section>

    <div class="container">
        @if($groups->isNotEmpty())
            <div class="grid-groups" id="groupGrid">
                @foreach ($groups as $group)
                    @include('components.group-card', $group)
                @endforeach
            </div>
            {{ $groups->links('components.pagination') }}
        @else
        <div id="empty-state" class="">
            <div class="empty-content">
                <div class="empty-icon">
                    <i class="fas fa-search"></i>
                </div>
                <h2>{{ __('pages.groups.empty.title') }}</h2>
                @if (request('category'))
                    <p>{{ __('pages.groups.empty.with_category.message') }}</p>
                    <a href="{{ route('groups.categories') }}" class="btn btn-outline">{{ __('pages.groups.empty.with_category.action') }}</a>
                @else
                    <p>{{ __('pages.groups.empty.without_category.message') }}</p>
                    <a href="{{ route('groups.create') }}" class="btn btn-outline-primary">{{ __('pages.groups.empty.without_category.action') }}</a>
                @endif

            </div>
        </div>
        @endif
    </div>
</main>
@endsection