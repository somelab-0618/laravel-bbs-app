@extends('layouts.app')

@section('content')
<div class="container">
    <h2>投稿一覧</h2>
    @foreach ($posts as $post)
    <div class="post-card card mb-4">
        <div class="card-body">
            <h3>{{$post->title}}</h3>
            <p class="post-card__text fs-5">{{$post->content}}</p>
            <p class="post-card__text">投稿者: {{$post->user->name}}</p>
            @if($post->user_id === Auth::id())
            <div class="d-flex">
                <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary me-2">編集</a>
                <form action="{{route('posts.destroy', $post->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">削除</button>
                </form>
            </div>
            @endif
            <div>
            @if($post->is_good_by_auth_user())
            <form action="{{ route("goods.destroy", $post->id) }}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-default btn-sm"><i class="bi {{ $post->goods->count() ? 'bi-heart-fill text-danger': 'bi-heart'; }}"></i><span class="badge text-dark fs-6">{{ $post->goods->count() }}</span></button>
            </form>
            @else
                <form action="{{ route("goods.store",['id' => $post->id]) }}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-default btn-sm"><i class="bi {{ $post->goods->count() ? 'bi-heart-fill text-danger': 'bi-heart'; }}"></i><span class="badge text-dark fs-6">{{ $post->goods->count() }}</span></button>
                </form>
            @endif
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection