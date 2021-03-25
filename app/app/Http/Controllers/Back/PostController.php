<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * 投稿一覧
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with('user')->latest('id')->paginate(10);
        return view('back.posts.index', compact('posts'));
    }

    /**
     * 記事作成ページ
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.posts.create');
    }

    /**
     * 記事の保存処理
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
      // バリデーションの実施
      $request->validated();

      $post = new Post();

      $post->title = $request->title;
      $post->published_at = $request->published_at;
      $post->is_public = $request->is_public;
      $post->body = $request->body;
      $post->user_id = Auth::id();
      $post->save();

      return redirect()->route('dashboard')->with('flash_message', '投稿を保存しました');
    }

    /**
     * 記事の編集処理
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::where('id', $id)->findOrFail($id);
        return view('back.posts.edit', compact('post'));
    }

    /**
     * 記事の更新
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, int $id)
    {
      // バリデーションの実施
      $request->validated();

      $old_post = Post::where('id', $id)->findOrFail($id);

      $old_post->title = $request->title;
      $old_post->published_at = $request->published_at;
      $old_post->is_public = $request->is_public;
      $old_post->body = $request->body;
      $old_post->save();

      return redirect()->route('posts.edit', $old_post)->with('flash_message', '記事を更新しました');
    }

    /**
     * 記事の削除
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $post = Post::where('id', $id)->findOrFail($id);
      $post->delete();

      return redirect()->route('posts.index')->with('flash_message', '投稿を削除しました');
    }
}
