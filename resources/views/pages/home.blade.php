@extends('layouts.base')

@section('content')
<main class="reset">
    <section class="hero">
        <h1>Find the best groups</h1>
        <p>Connect with people who share your interests in <b>gaming</b>, <b>movies</b>, f<b>riendship</b>, <b>tech</b>, <b>studies</b>, and much more.</p>
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
                <h2>No groups found 😢</h2>
                @if (request('category'))
                    <p>Maybe try a different category?</p>
                    <a href="{{ route('groups.categories') }}" class="btn btn-outline">View categories</a>
                @else
                    <p>Want to be the first one here? 👀</p>
                    <a href="{{ route('groups.create') }}" class="btn btn-outline-primary">Share Group</a>
                @endif

            </div>
        </div>
        @endif
    </div>
</main>
@endsection