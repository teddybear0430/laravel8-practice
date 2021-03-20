<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Requests\PostRequest;

class PostController extends Controller
{
    /**
     * 投稿一覧
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::latest('id')->paginate(10);
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
      $post = new Post();

      $post->title = $request->title;
      $post->published_at = $request->published_at;
      $post->is_public = $request->is_public;
      $post->body = $request->body;

      $post->save();

      return redirect()->route('dashboard')->with('flash_message', '投稿を保存しました');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
