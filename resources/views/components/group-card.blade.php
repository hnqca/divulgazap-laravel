<div class="card">
    <div class="card-image">
        <img class="object-fit-cover" width="100%" height="180px" src="{{ asset('storage/images/groups/' . $group->image_path) }}" />
    </div>
    <div class="card-body">
        <span class="category-tag">{{ $group->category->name }}</span>
        <h3 class="card-title">{{ $group->name }}</h3>
         <a href="{{ route('groups.show', $group->slug) }}" class="btn btn-group mt-1">
            <span class="fs-1">Join Group</span>
        </a>
    </div>
</div>