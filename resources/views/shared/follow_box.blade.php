<div class="card mt-3">
    <div class="card-header pb-0 border-0">
        <h5 class="">Top Users</h5>
    </div>
    <div class="card-body">
        @if ($topUsers ?? false)
            @foreach ($topUsers as $topUser)
                <div class="hstack gap-2 mb-3">
                    <div class="avatar">
                        <a href="{{ route('profile.show', $topUser->id ) }}">
                            <img style="width: 50px;" class="avatar-img rounded-circle"
                                src=" {{ $topUser->getImageURL() }} " alt="">
                        </a>
                    </div>
                    <div class="overflow-hidden">
                        <a class="h6 mb-0" href="{{ route('profile.show', $topUser->id ) }}">{{ $topUser->name }}</a>
                        {{-- <p class="mb-0 small text-truncate">{{ $topUser->email }}</p> --}}
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</div>
