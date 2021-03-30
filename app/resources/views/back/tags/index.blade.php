<?php $title = 'タグ一覧'; ?>
@extends ('back.layouts.base')

@section ('content')
    <div class="card-body">
        @if (!$tags)
            <p>登録されているタグはありません</p>
        @else
            <table class="table-auto">
                <tr>
                    <th class="px-4 py-2">タグ名</th>
                    <th class="px-4 py-2">スラッグ</th>
                    <th class="px-4 py-2">タグに紐づく投稿の件数</th>
                    <th class="px-4 py-2">編集</th>
                </tr>
                <tbody>
                    @foreach ($tags as $tag)
                    <tr>
                        <td class="border px-4 py-2">{{ $tag->name}}</td>
                        <td class="border px-4 py-2">{{ $tag->slug }}</td>
                        <td class="border px-4 py-2">{{ $tag->posts->count() }}</td>
                        <td class="border px-4 py-2">
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mt-5 d-flex justify-content-center">
                {{ $tags->links() }}
            </div>
        @endif
    </div>
@endsection
