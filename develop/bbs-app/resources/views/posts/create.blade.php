@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="card-header">投稿新規作成</h2>
    <div class="card-body">
        <form action="{{route('posts.store')}}" method="POST">
            @csrf
            <label for="post-title" class="form-label">タイトル</label>
            <input type="text" name="title" value="{{ old('title') }}" id="post-title" class="form-control mb-4" />
            @if ($errors->first('title'))
                <p class="text-danger">※{{$errors->first('title')}}</p>
            @endif
            <label for="post-content" class="form-label">本文</label>
            <textarea name="content" value="{{ old('content') }}" id="post-content" class="form-control mb-4" style="height: 200px">
                {{ old('content') }}
            </textarea>
            @if ($errors->first('content'))
                <p class="text-danger">※{{$errors->first('content')}}</p>
            @endif
            <input type="hidden" name="user_id" value="{{Auth::id()}}">
            <button type="submit" class="btn btn-primary">投稿</button>
            {{-- @include('posts._form') --}}
        </form>
    </div>
</div>
@endsection