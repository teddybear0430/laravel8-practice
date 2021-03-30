<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 複数のテーブルにデータを登録するため、Seederクラスに処理を書いてる？
        \DB::table('tags')->insert([
            [
                'name' => 'お知らせ',
                'slug' => 'news',
                'created_at' => now(),
                'updated_at' => now()
              ],[
                'name' => 'リリース',
                'slug' => 'release',
                'created_at' => now(),
                'updated_at' => now()
              ],[
                'name' => 'キャンペーン',
                'slug' => 'campaign',
                'created_at' => now(),
                'updated_at' => now()
              ]
        ]);

        $faker = Faker::create();

        // 登録されている投稿の数だけpost_tags（投稿とタグの中間テーブル）に
        // データを登録する
        for ($i = 1; $i <= 21; $i++) {
            \DB::table('post_tags')->insert([
                'post_id' => $i,
                // ユーザーIDが1〜3までしかないので
                'tag_id' => $faker->numberBetween(1,3),
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
