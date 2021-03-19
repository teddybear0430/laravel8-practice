<?php
$title = 'ダッシュボード';
?>
@extends ('back.layouts.base')
 
@section ('content')
<div class="card-header">{{ $title }}</div>
<div class="card-body">
    @if ($posts->count() <= 0)
        <p>表示する投稿はありません。</p>
    @else
    <div id="post-list">
        @foreach ($posts as $post)
        <div class="post">
          <h2>
            <a href="{{ route('post.show', ['id' => $post->id]) }}">{{ $post->title }}</a>
        </h2>
          <div class="published-at">{{ $post->published_at->format('Y年m月d日') }}</div>
        </div>
        @endforeach
    </div>
    <div class="d-flex justify-content-center">
        {{ $posts->links() }}
    </div>
    @endif
</div>
@endsection
