<?php $title = 'タグ一覧'; ?>
@extends ('back.layouts.base')

@section ('content')
    <x-back.alert />
    <div class="card-body">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li class="text-red-500">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

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
                        <td class="border px-4 py-2">
                            <input
                                class="border px-2 py-2"
                                type="text"
                                name="name"
                                value="{{ $tag->name }}"
                                form="update-form-{{ $tag->id }}"
                            >
                        </td>
                        <td class="border px-4 py-2">
                          <input
                              class="border px-2 py-2"
                              type="text"
                              name="slug"
                              value="{{ $tag->slug }}"
                              form="update-form-{{ $tag->id }}"
                          >
                        </td>
                        <td class="border px-4 py-2">{{ $tag->posts->count() }}</td>
                        <td class="border px-4 py-2">
                            <div class="flex">
                                <form id="update-form-{{ $tag->id }}" method="POST" action="{{ route('tags.update', ['tag' => $tag->id]) }}">
                                    @method('PUT')
                                    @csrf
                                    <button type="submit" class="text-blue-500 font-bold px-4">編集</button>
                                </form>
                                <form id="delete-form-{{ $tag->id }}" method="POST" action="{{ route('tags.destroy', ['tag' => $tag->id]) }}">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="text-red-500 font-bold px-4">削除</button>
                                </form>
                            </div>
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
