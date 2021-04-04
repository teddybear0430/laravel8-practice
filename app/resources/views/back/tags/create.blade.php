<?php $title = 'タグの登録画面'; ?>
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

        <form method="POST" action="{{ route('tags.store') }}">
          @csrf 
          <label class="block mt-2 mb-4">
              <span class="text-gray-700 font-semibold">タグの名前</span>
              <input class="w-full form-input mt-1 block p-2 border-2 border-gray-401 rounded-md" type="text" name="name" placeholder="タグの名前">
          </label>
          <label class="block mt-2 mb-4">
              <span class="text-gray-700 font-semibold">タグのスラッグ</span>
              <input class="w-full form-input mt-1 block p-2 border-2 border-gray-401 rounded-md" type="text" name="slug" placeholder="タグのスラッグ">
          </label>
          <button id="submit-btn" type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
              タグの登録
          </button>
        </form>
    </div>
@endsection
