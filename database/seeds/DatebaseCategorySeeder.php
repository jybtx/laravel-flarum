<?php

use Illuminate\Database\Seeder;
use App\Models\Category;
class DatebaseCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'name'        => '分享',
                'description' => '分享创造，分享发现',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name'        => '教程',
                'description' => '开发技巧、推荐扩展包等',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name'        => '问答',
                'description' => '请保持友善，互帮互助',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name'        => '公告',
                'description' => '站点公告',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];
        Category::insert($categories);
    }
}
