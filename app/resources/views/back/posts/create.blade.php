<?php $title = '記事の作成・編集'; ?>
@extends ('back.layouts.base')

@section ('content')
    <div class="max-w-screen-md mx-auto">
        <h1 class="text-2xl">{{ $title }}</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li class="text-red-500">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('posts.store') }}">
          @csrf 
          <label class="block mt-2 mb-4">
              <span class="text-gray-700 font-semibold">記事タイトル</span>
              <input class="w-full form-input mt-1 block p-2 border-2 border-gray-401 rounded-md" type="text" name="title" placeholder="記事タイトル">
          </label>
          <label class="block mt-2 mb-4">
              <span class="text-gray-700 font-semibold">公開日</span>
              <input class="w-full form-input mt-1 block p-2 border-2 border-gray-401 rounded-md" type="text" name="published_at" value="{{ now()->format('Y-m-d H:i') }}">
          </label>
          <div class="mt-4">
            <span class="text-gray-700 font-semibold">公開状態の設定</span>
            <div class="mt-2">
              <label class="inline-flex items-center">
                <input type="radio" class="form-radio" name="is_public" value="1">
                <span class="ml-2">公開</span>
              </label>
              <label class="inline-flex items-center ml-6">
                <input type="radio" class="form-radio" name="is_public" value="0">
                <span class="ml-2">非公開</span>
              </label>
            </div>
          </div>
          <label class="block mt-2 mb-1">
              <span class="block text-gray-700 mb-2 font-semibold">記事本文</span>
              <textarea id="my-text-area"></textarea>
              <textarea id="hidden-editor" style="display: none;" name="body"></textarea>
          </label>
          <button id="submit-btn" type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
              更新
          </button>
        </form>
    </div>
@endsection
