<a href="{{ route('home', ['category' => $groupCategory->name]) }}" class="category-card">
    <div class="icon-wrapper">
        <i class="fas fa-{{ $groupCategory->icon }}"></i>
    </div>
    <span class="category-name">{{ $groupCategory->name }}</span>
    <span class="count-badge has-items mt-1">{{ $groupCategory->visible_groups_count }}</span>
</a>