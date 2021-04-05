<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use App\Http\Requests\TagRequest;

class TagController extends Controller
{
    /**
     * タグ一覧（作成・削除もこの画面でできるようにする）
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::with('posts')->paginate(20);
        return view('back.tags.index', compact('tags'));
    }

    /**
     * タグの作成ページ
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.tags.create');
    }

    /**
     * タグの保存処理
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TagRequest $request)
    {
        $request->validated();

        $tag = new Tag();

        $tag->name = $request->name;
        $tag->slug = $request->slug;
        $tag->save();

        return redirect()->route('dashboard')->with('flash_message', 'タグを保存しました');
    }

    /**
     * タグの更新
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(TagRequest $request, int $id)
    {
        $request->validated();

        $old_tag = Tag::where('id', $id)->findOrFail($id);

        $old_tag->name = $request->name;
        $old_tag->slug = $request->slug;
        $old_tag->save();

        return redirect()->route('tags.index')->with('flash_message', 'タグの更新を行いました');
    }

    /**
     * タグの削除
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $tag = Tag::where('id', $id)->findOrFail($id);
        $tag->delete();

        return redirect()->route('tags.index')->with('flash_message', 'タグの削除を行いました');
    }
}
