@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="card-header">投稿編集</h2>
    <div class="card-body">
            @include('posts._form', ['post' => $post, 'is_edit' => true])
        </form>
    </div>
</div>
@endsection