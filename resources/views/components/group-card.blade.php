<!-- Card -->
<div class="card position-relative card-group">
    <img style="height: 170px; object-fit: cover;" src="{{ asset('storage/images/groups/' . $group->image_path) }}" class="card-img-top" />
    <div class="card-body">
        <a href="{{ route('group.show', $group->slug) }}" style="position: absolute; margin-top: -25px; left: 10px;" class="badge bg-dark text-uppercase text-decoration-none">{{ $group->category->name }}</a>
        <h5 class="card-title mb-3">{{ $group->name }}</h5>
        <a href="{{ route('group.show', $group->slug) }}" class="btn btn-success btn-group-join w-100">Entrar no Grupo</a>
    </div>
</div>
<!--// Card -->