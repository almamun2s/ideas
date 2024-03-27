<div class="card">
    <div class="px-3 pt-4 pb-2">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <img style="width:50px" class="me-2 avatar-sm rounded-circle" src="{{ $idea->user->getImageURL() }}"
                    alt="{{ $idea->user->name }}">
                <div>
                    <h5 class="card-title mb-0"><a
                            href="{{ route('profile.show', $idea->user->id) }}">{{ $idea->user->name }} </a></h5>
                </div>
            </div>
            <div class="d-flex">
                <a class="mx-2" href="{{ route('ideas.show', $idea->id) }} ">View</a>
                @auth
                    @if (Auth::user()->id === $idea->user->id)
                        <a class="mx-2" href="{{ route('ideas.edit', $idea->id) }} ">Edit </a>
                        <form action=" {{ route('ideas.destroy', $idea->id) }} " method="post">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger btn-sm">X</button>
                        </form>
                    @endif
                @endauth
            </div>
        </div>
    </div>
    <div class="card-body">
        @if ($editing ?? false)
            <div class="row">
                <form action="{{ route('ideas.update', $idea->id) }} " method="post">
                    @csrf
                    @method('put')
                    <div class="mb-3">
                        <textarea name="content" class="form-control" id="content" rows="3" style="resize: none;" autofocus>{{ $idea->content }}</textarea>
                        @error('content')
                            <span class="text-danger d-block mt-2"> {{ $message }} </span>
                        @enderror
                    </div>
                    <div class="">
                        <button type="submit" class="btn btn-dark"> Update </button>
                    </div>
                </form>
            </div>
        @else
            <p class="fs-6 fw-light text-muted">{{ $idea->content }} </p>
        @endif
        <div class="d-flex justify-content-between">
            @include('ideas.like_button')
            <div>
                <span class="fs-6 fw-light text-muted"> <span class="fas fa-clock"> </span> {{ $idea->created_at }}
                </span>
            </div>
        </div>
        @include('shared.comment')
    </div>
</div>
