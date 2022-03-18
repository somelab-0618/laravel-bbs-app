
<form action="{{$is_edit ? route('posts.update', $post->id) : route('posts.store');}}" method="POST">
  @csrf
  @if ($is_edit)
    @method('PATCH')
  @endif
  <label for="post-title" class="form-label">タイトル</label>
  <input type="text" name="title" value="{{ $is_edit ? $post->title : old('title'); }}" id="post-title" class="form-control mb-4" />
  @if ($errors->first('title'))
      <p class="text-danger">※{{$errors->first('title')}}</p>
  @endif
  <label for="post-content" class="form-label">本文</label>
  <textarea name="content" id="post-content" class="form-control mb-4" style="height: 200px">
      {{ $is_edit ? $post->content : old('content') }}
  </textarea>
  @if ($errors->first('content'))
      <p class="text-danger">※{{$errors->first('content')}}</p>
  @endif
  <input type="hidden" name="user_id" value="{{Auth::id()}}">
  <button type="submit" class="btn btn-primary">{{ $is_edit ? '更新':'投稿'; }}</button>
  <a href="{{ route('posts.index') }}" class="btn btn-secondary">戻る</a>
</form>
