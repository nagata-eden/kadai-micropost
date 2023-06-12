<div class="mt-4">
    @if (isset($threads))
        <ul class="list-none">
            @foreach ($threads as $thread)
                <li class="flex items-start gap-x-2 mb-4">
                    <div>
                        <div>
                            {{-- 投稿の所有者のユーザ詳細ページへのリンク --}}
                            <a class="link link-hover text-info" href="{{ route('users.show', $thread->user->id) }}">{{ $thread->user->name }}</a>
                            <span class="text-muted text-gray-500">posted at {{ $thread->created_at }}</span>
                        </div>
                        <div>
                            {{-- 投稿内容 --}}
                            <p class="mb-0">{!! nl2br(e($thread->content)) !!}</p>
                        </div>
                        <div>
                            @if (Auth::id() == $thread->user->id)
                                {{-- 投稿削除ボタンのフォーム --}}
                                <form method="POST" action="{{ route('threads.destroy', $thread->user->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-error btn-sm normal-case" 
                                        onclick="return confirm('Delete id = {{ $thread->user->id }} ?')">Delete</button>
                                </form>
                            @endif
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
        {{-- ページネーションのリンク --}}
        {{ $threads->links() }}
    @endif
        
</div>