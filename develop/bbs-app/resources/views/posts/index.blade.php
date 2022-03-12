@extends('layouts.app')

@section('content')
<div class="container">
    <h2>投稿一覧</h2>
    @foreach ($posts as $post)
    <div class="post-card card mb-4">
        <div class="card-body">
            <h3>{{$post->title}}</h3>
            <p class="post-card__text fs-5">{{$post->content}}</p>
        </div>
    </div>
    @endforeach
</div>
@endsection