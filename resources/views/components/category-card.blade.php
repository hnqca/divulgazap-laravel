<!-- Category Item -->
<div class="col-md-4 mb-3 text-center">
    <a href="{{ route('home', ['category' => $groupCategory->name]) }}" class="text-center list-group-item list-group-item-action">
        <img src="/assets/images/icons/categories/{{ $groupCategory->icon }}" width="45" />
        <span class="d-block text-muted text-decoration-none">{{ $groupCategory->name }}</span>
        <span class="badge rounded-pill bg-success">{{ $groupCategory->visible_groups_count }}</span>
    </a>
</div>
<!--// Category Item -->