<?php $title = '投稿一覧'; ?>
@extends ('back.layouts.base')
 
@section ('content')
    <x-back.alert />
    <h1 class="text-2xl">{{ $title }}</h1>
    <div class="card-body">
        @if (!$posts)
            <p>表示する投稿はありません。</p>
        @else
            <table class="table-auto">
                <tr>
                    <th class="px-4 py-2">タイトル</th>
                    <th class="px-4 py-2">公開状態</th>
                    <th class="px-4 py-2">公開日</th>
                    <th class="px-4 py-2">編集</th>
                    <th class="px-4 py-2">編集者</th>
                </tr>
                <tbody>
                    @foreach ($posts as $post)
                    <tr>
                        <td class="border px-4 py-2">{{ $post->title }}</td>
                        <td class="border px-4 py-2">{{ $post->is_public ? '公開' : '非公開' }}</td>
                        <td class="border px-4 py-2">{{ $post->published_at->format('Y年/m月/d日') }}</td>
                        <td class="border px-4 py-2">
                          <a href="{{ route('posts.edit', ['post' => $post->id])}}">編集する</a>
                        </td>
                        <td class="border px-4 py-2">{{ $post->user->name }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mt-5 d-flex justify-content-center">
                {{ $posts->links() }}
            </div>
        @endif
    </div>
@endsection
