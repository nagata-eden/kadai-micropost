@extends('layouts.app')

@section('content')
    @if (Auth::check())
        <div class="sm:grid sm:grid-cols-3 sm:gap-10">
            <div>
                <div class="avatar">
                    <div class="w-12 rounded">
                        <img src="{{ Gravatar::get($root->user->email) }}" alt="" />
                    </div>
                </div>
                <div>
                    <div>
                        {{-- 投稿の所有者のユーザ詳細ページへのリンク --}}
                        <a class="link link-hover text-info" href="{{ route('users.show', $root->user->id) }}">{{ $root->user->name }}</a>
                        <span class="text-muted text-gray-500">posted at {{ $root->created_at }}</span>
                    </div>
                    <div>
                        {{-- 投稿内容 --}}
                        <p class="mb-0">{!! nl2br(e($root->content)) !!}</p>
                        <div class="sm:grid sm:grid-cols-3 sm:gap-10">
                            <div class="sm:col-span-2 mt-4">
                                @include('microposts.show')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="sm:col-span-2">
                {{-- 投稿一覧 --}}
                @include('threads.thread')
                {{-- 投稿フォーム --}}
                @include('threads.form')
            </div>
        </div>
    @endif
@endsection