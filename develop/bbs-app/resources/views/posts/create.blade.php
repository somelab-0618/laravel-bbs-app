@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="card-header">投稿新規作成</h2>
    <div class="card-body">
            @include('posts._form', ['is_edit' => false])
        </form>
    </div>
</div>
@endsection