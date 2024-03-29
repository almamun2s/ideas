@auth
    <h4> {{ __('ideas.share_ideas')}} </h4>
    <div class="row">
        <form action="{{ route('ideas.store') }} " method="post">
            @csrf
            <div class="mb-3">
                <textarea name="content" class="form-control" id="content" rows="3" style="resize: none;" autofocus></textarea>
                @error('content')
                    <span class="text-danger d-block mt-2"> {{ $message }} </span>
                @enderror
            </div>
            <div class="">
                <button type="submit" class="btn btn-dark"> {{ __('ideas.share')}} </button>
            </div>
        </form>
    </div>
    <hr>
@endauth
@guest
    <h4> {{ __('ideas.login_to_share')}} </h4>
@endguest
