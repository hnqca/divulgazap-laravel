@extends('layouts.base')

@section('title', $group->name.' - '.config('app.name'))

@section('styles')
<link rel="stylesheet" href="/assets/css/page-group-show.css">
@endsection

@section('scripts')
<script>
    function onTurnstileSuccess(token) {
        $('#cf-token').val(token);
        $('.join-btn').prop('disabled', false);
    }
</script>
@endsection

@section('content')
<div class="group-show-container">

    <main class="group-hero">
        <form method="POST" action="{{ route('groups.join', $group->slug) }}">
            @csrf
            <div class="group-banner-wrapper">
                <img src="{{ asset('storage/images/groups/'.$group->image_path) }}" class="group-banner">
                <div class="banner-overlay"></div>
            </div>
            <div class="group-main-content">
                <span class="category-tag">{{ $group->category->name }}</span>
                <h1 class="group-title">{{ $group->name }}</h1>

                <div 
                    class="cf-turnstile" 
                    data-sitekey="{{ config('services.turnstile.site_key') }}"
                    data-callback="onTurnstileSuccess">
                </div>

                <input type="hidden" name="cloudflare_turnstile_token" id="cf-token">

                <button type="submit" class="btn join-btn mt-1" disabled>
                    <i class="fab fa-whatsapp"></i> Join group now
                </button>
            </div>
        </form>
    </main>


    <div class="group-details-grid">

        <aside class="description-box">
            <h3>About</h3>
            <p class="card-desc">{{ $group->description ?: "No description provided." }}</p>
            <a href="{{ route('groups.create') }}" style="color: var(--primary); font-size: 0.85rem; text-decoration: none; font-weight: 600;">
                <i class="fas fa-plus-circle"></i> Want to promote your group too? Click here!
            </a>
        </aside>

        <section class="metadata-box">
            <div class="meta-item">
                <i class="fas fa-calendar-alt"></i>
                <span>Submitted on: <b>{{ \Carbon\Carbon::parse($group->created_at)->translatedFormat('j M, Y') }}.</b></span>
            </div>
        </section>

    </div>
</div>
@endsection