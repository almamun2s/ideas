<div class="card">
    <div class="px-3 pt-4 pb-2">
        <form action="{{ route('profile.update', $profile->id) }}" enctype="multipart/form-data" method="post">
            @csrf
            @method('put')
            <div class="d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                    <img style="width:150px" class="me-3 avatar-sm rounded-circle"
                        src="{{ $profile->getImageURL() }}"
                        alt="{{ $profile->name }}">
                    <div>
                        <input type="text" name="name" value="{{ $profile->name }}" class="form-control">
                        @error('name')
                            <p class="text-danger mt-2">{{ $message }} </p>
                        @enderror

                    </div>
                </div>
                <div>
                    <a href="{{ route('profile.show', $profile->id) }}">View</a>
                </div>

            </div>
            <div class="mt-4">
                <label for="image">Profile Picture</label>
                <input type="file" name="image" class="form-control">
            </div>
            <div class="px-2 mt-4">
                <h5 class="fs-5"> Bio : </h5>
                <div class="mb-3">
                    <textarea name="bio" class="form-control" rows="3" style="resize: none;">{{ $profile->bio }} </textarea>
                    @error('bio')
                        <span class="text-danger d-block mt-2"> {{ $message }} </span>
                    @enderror
                </div>
                <button class="btn btn-dark btn-sm mb-3 ">Save</button>


                <div class="d-flex justify-content-start">
                    <a href="#" class="fw-light nav-link fs-6 me-3"> <span class="fas fa-user me-1">
                        </span> 0 Followers </a>
                    <a href="#" class="fw-light nav-link fs-6 me-3"> <span class="fas fa-brain me-1">
                        </span> {{ $profile->idea()->count() }} </a>
                    <a href="#" class="fw-light nav-link fs-6"> <span class="fas fa-comment me-1">
                        </span> {{ $profile->comment()->count() }} </a>
                </div>
            </div>
        </form>
    </div>
</div>
<hr>
