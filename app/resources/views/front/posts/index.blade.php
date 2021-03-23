<?php
/**
 * @var Illuminate\Pagination\LengthAwarePaginator|\App\Models\Post[] $posts
 */
$title = '投稿一覧';
?>
@extends ('front.layouts.base')
 
@section ('content')
<div class="card-header">{{ $title }}</div>
<div class="card-body">
    @if ($posts->count() <= 0)
        <p>表示する投稿はありません。</p>
    @else
    <div id="post-list">
        @foreach ($posts as $post)
        <div class="post mt-2 mb-2 border-b-2 border-gray-300">
          <div class="flex">
            <div class="published-at mr-2">{{ $post->published_at->format('Y年m月d日') }}</div>
            <div class="user-name">{{ $post->user->name }}</div>
          </div>
          <h2 class="mt-1 mb-1">
            <a href="{{ route('post.show', ['id' => $post->id]) }}">{{ $post->title }}</a>
          </h2>
        </div>
        @endforeach
    </div>
    <div class="d-flex justify-content-center">
        {{ $posts->links() }}
    </div>
    @endif
</div>
@endsection
