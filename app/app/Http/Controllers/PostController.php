<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    /*
     * 一覧画面
     * @return \Illuminate\Contracts\View\View
     */
    public function index() 
    {
      // with・・・n + 1問題を軽減できる（レコードの数だけクエリが発行されてしまうのを防ぐ）
      // リレーションを定義したメソッドを引数に指定する
      // https://readouble.com/laravel/8.x/ja/eloquent-relationships.html
      $posts = Post::with('user')
                    ->where('is_public', true)
                    ->orderBy('published_at', 'desc')
                    ->paginate(10);

        return view('front.posts.index', compact('posts'));
    }

    /*
     * 詳細画面
     *
     * @param int $id
     * @return \Illuminate\Contracts\View\View
     */
    public function show(int $id) 
    {
        // findOrFail・・・一致するモデルがないと例外がスローされる
        // エラーハンドリングとか考えるとこっちのが良さそう
        $post = Post::where('is_public', true)->findOrFail($id);

        return view('front.posts.show', compact('post'));
    }
}
