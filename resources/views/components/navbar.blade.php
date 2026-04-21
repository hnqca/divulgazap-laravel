<header>
    <a href="{{ route('home') }}" class="logo">
        <i class="fab fa-whatsapp"></i> <span>{{ config('app.name') }}</span>
    </a>
    <div class="nav-actions">
        <a href="{{ route('groups.categories') }}" class="btn btn-outline">{{ __('common.buttons.categories') }}</a>
        <a href="{{ route('groups.create') }}" class="btn btn-primary">{{ __('common.buttons.share_group') }}</a>
    </div>
</header>