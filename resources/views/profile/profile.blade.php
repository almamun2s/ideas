<div class="card">
    <div class="px-3 pt-4 pb-2">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <img style="width:150px" class="me-3 avatar-sm rounded-circle" src="{{ $profile->getImageURL() }}"
                    alt="{{ $profile->name }}">
                <div>
                    <h3 class="card-title mb-0">{{ $profile->name }}</h3>
                    <span class="fs-6 text-muted">{{ $profile->email }}</span>
                </div>
            </div>
            @if (Auth::user()->id === $profile->id)
                @if (($editing ?? false) != true)
                    <div>
                        <a href="{{ route('profile.edit', $profile->id) }}">Edit</a>
                    </div>
                @endif
            @endif

        </div>
        <div class="px-2 mt-4">
            <h5 class="fs-5"> Bio : </h5>
            <p class="fs-6 fw-light">{{ $profile->bio }} </p>

            <div class="d-flex justify-content-start">
                <a href="#" class="fw-light nav-link fs-6 me-3"> <span class="fas fa-user me-1">
                    </span> {{ $profile->followers()->count() }} Followers </a>
                <a href="#" class="fw-light nav-link fs-6 me-3"> <span class="fas fa-user me-1">
                    </span> {{ $profile->followings()->count() }} Followings </a>
                <a href="#" class="fw-light nav-link fs-6 me-3"> <span class="fas fa-brain me-1">
                    </span> {{ $profile->idea()->count() }} Ideas </a>
                <a href="#" class="fw-light nav-link fs-6"> <span class="fas fa-comment me-1">
                    </span> {{ $profile->comment()->count() }} Comments </a>
            </div>
            @if (Auth::user()->id !== $profile->id)
                <div class="mt-3">
                    @if (Auth::user()->follows($profile))
                        <form action="{{ route('unfollow', $profile->id) }}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm"> Unfollow </button>
                        </form>
                    @else
                        <form action="{{ route('follow', $profile->id) }}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-primary btn-sm"> Follow </button>
                        </form>
                    @endif
                </div>
            @endif
        </div>
    </div>
</div>
<hr>


@if (count($ideas) > 0)
    @foreach ($ideas as $idea)
        <div class="mt-3">
            @include('shared.idea_card')
        </div>
    @endforeach

    <div class="mt-2">
        {{ $ideas->withQueryString()->links() }}
    </div>
@else
    <p class="text-center">No ideas found</p>
@endif
