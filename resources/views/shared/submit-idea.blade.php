@auth
@csrf
    <h4> Share yours ideas </h4>
    <div class="row">
        <form action="{{ route('ideas.store') }}" method="POST"> {{-- ideas.store is the name of route --}}
            @csrf {{-- used for security reasons in post,put,delete,patch methods to make sure that the session token is equal to the edit token --}}
            <div class="mb-3">
                <textarea name='content' class="form-control" id="content" rows="3"></textarea>
                @error('content')
                    {{-- if there is an error it will return to validation and show the resone --}}
                    <span class="d-block fs-6 text-danger mmt-2">{{ $message }}</span>
                @enderror
            </div>
            <div class="">
                <button type="submit" class="btn btn-dark"> Share </button>
            </div>
        </form>

    </div>
@endauth
@guest
<h4>Login to share yours ideas </h4>

@endguest
