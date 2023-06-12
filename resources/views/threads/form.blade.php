@if (Auth::check())
    <div class="mt-4">
        <form method="POST" action="{{ route('threads.store') }}">
            @csrf
        
            <div class="form-control mt-4">
                <textarea rows="2" name="content" class="input input-bordered w-full"></textarea>
            </div>
            
            <input type="hidden" name='id' value={{$root->id}} />
        
            <button type="submit" class="btn btn-primary btn-block normal-case">Reply</button>
        </form>
    </div>
@endif