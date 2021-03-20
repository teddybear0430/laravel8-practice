<?php $title = 'ダッシュボード'; ?>
@extends ('back.layouts.base')
 
@section ('content')
    <div class="container mx-auto p-2 border-2 border-gray-400 rounded-md">
        <h1 class="text-2xl">{{ $title }}</h1>
        <div class="container">
            <a class="hover:text-blue-600" href="{{ route('posts.create') }}">投稿一覧</a>
        </div>
    </div>
@endsection
