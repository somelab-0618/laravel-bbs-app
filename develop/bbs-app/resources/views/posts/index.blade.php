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
            <div>
                <button class="btn btn-primary">編集</button>
                <button class="btn btn-danger">削除</button>
            </div>
            @endif
        </div>
    </div>
    @endforeach
</div>
@endsection