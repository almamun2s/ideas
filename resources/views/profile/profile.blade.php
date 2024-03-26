<div class="card">
    <div class="px-3 pt-4 pb-2">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <img style="width:150px" class="me-3 avatar-sm rounded-circle"
                    src="https://api.dicebear.com/6.x/fun-emoji/svg?seed={{ $profile->name }}" alt="{{ $profile->name }}">
                <div>
                    @if ($editing ?? false)
                        <input type="text" name="name" value="{{ $profile->name }}" class="form-control">
                    @else
                        <h3 class="card-title mb-0">{{ $profile->name }}</h3>
                        <span class="fs-6 text-muted">{{ $profile->email }}</span>
                    @endif
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
            @if ($editing ?? false)
                <div class="mb-3">
                    <textarea name="bio" class="form-control" rows="3" style="resize: none;"></textarea>
                    @error('content')
                        <span class="text-danger d-block mt-2"> {{ $message }} </span>
                    @enderror
                </div>
                <button class="btn btn-dark btn-sm mb-3 ">Save</button>
            @else
                <p class="fs-6 fw-light">
                    This book is a treatise on the theory of ethics, very popular during the
                    Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes
                    from a line in section 1.10.32.
                </p>
            @endif

            <div class="d-flex justify-content-start">
                <a href="#" class="fw-light nav-link fs-6 me-3"> <span class="fas fa-user me-1">
                    </span> 0 Followers </a>
                <a href="#" class="fw-light nav-link fs-6 me-3"> <span class="fas fa-brain me-1">
                    </span> {{ $profile->idea()->count() }} </a>
                <a href="#" class="fw-light nav-link fs-6"> <span class="fas fa-comment me-1">
                    </span> {{ $profile->comment()->count() }} </a>
            </div>
            @if (Auth::user()->id !== $profile->id)
                <div class="mt-3">
                    <button class="btn btn-primary btn-sm"> Follow </button>
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
