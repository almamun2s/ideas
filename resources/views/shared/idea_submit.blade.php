<h4> Share yours ideas </h4>
<div class="row">
    <form action="{{ route('ideas.store') }} " method="post">
        @csrf
        <div class="mb-3">
            <textarea name="idea" class="form-control" id="idea" rows="3" style="resize: none;" autofocus ></textarea>
            @error('idea')
                <span class="text-danger d-block mt-2" > {{ $message }} </span>
            @enderror
        </div>
        <div class="">
            <button type="submit" class="btn btn-dark"> Share </button>
        </div>
    </form>
</div>
<hr>
