<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Tag;

/**
 * App\Models\Post
 *
 * @property int $id
 * @property string $title
 * @property string $body
 * @property bool $is_public 公開・非公開
 * @property \Illuminate\Support\Carbon $published_at 公開日
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Post newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Post newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Post query()
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereIsPublic($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post wherePublishedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property int $user_id
 * @property-read \Illuminate\Database\Eloquent\Collection|Tag[] $tags
 * @property-read int|null $tags_count
 * @property-read User $user
 * @method static \Database\Factories\PostFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereUserId($value)
 */
class Post extends Model
{
    use HasFactory;

    // 変更可能な値を定義する
    protected $fillable = [
        'title', 'body', 'is_public', 'published_at'
    ];

    // $castsプロパティにカラム名と変換したい型を指定すると、
    // データアクセス時に型変換をしてくれる
    protected $casts = [
        'is_public' => 'bool',
        'published_at' => 'datetime'
    ];

    // 投稿に紐づくユーザーを取得
    // belongsTo・・・従テーブルの複数レコードに対して、
    // 主テーブルの1つのレコードが紐付けるときに使われる。
    public function user() 
    {
        return $this->belongsTo(User::class);
    }

    // 投稿に紐づくタグを取得
    // 中間テーブルの名前がLaravelの規約に沿っていない場合は、以下の情報を指定する必要がある
    // 第1引数・・・リレーションを張る対象のモデル
    // 第2引数・・・中間テーブルの名前
    // 第3引数・・・関係を定義しているモデルの外部キー名（今回だとPostモデル）
    // 第4引数・・・関連付けるモデルの外部キー名（今回だとTagモデル）
    public function tags() 
    {
        return $this->belongsToMany(Tag::class, 'post_tags', 'post_id', 'tag_id'); 
    }
}
