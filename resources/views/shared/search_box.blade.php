<div class="card">
    <div class="card-header pb-0 border-0">
        <h5 class="">{{ __('ideas.search')}}</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('dashboard') }} " method="get">
            <input name="search" value="{{ request('search', '')}}" placeholder="..." class="form-control w-100" type="text" autocomplete="off" >
            <button class="btn btn-dark mt-2">{{ __('ideas.search')}}</button>
        </form>
    </div>
</div>
