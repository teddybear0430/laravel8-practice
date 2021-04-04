<?php $title = 'ダッシュボード'; ?>
@extends ('back.layouts.base')
 
@section ('content')
    <x-back.alert />
    <div class="container mx-auto p-2 border-2 border-gray-400 rounded-md">
        <h1 class="text-2xl">{{ $title }}</h1>
        <div class="container">
            <ul>
              <li><a class="hover:text-blue-600" href="{{ route('posts.index') }}">投稿一覧</a></li>
              <li><a class="hover:text-blue-600" href="{{ route('posts.create') }}">投稿の新規作成</a></li>
              <li><a class="hover:text-blue-600" href="{{ route('tags.index') }}">タグ一覧</a></li>
              <li><a class="hover:text-blue-600" href="{{ route('tags.create') }}">タグの新規作成</a></li>
            </ul>
        </div>
    </div>
@endsection
