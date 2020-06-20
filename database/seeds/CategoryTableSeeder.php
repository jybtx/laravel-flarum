<?php

use Illuminate\Database\Seeder;
use App\Models\Category;
class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
			'name'        => '分享',
			'description' => '分享创造，分享发现',
        ]);
        Category::create([
			'name'        => '教程',
			'description' => '开发技巧、推荐扩展包等',
        ]);
        Category::create([
			'name'        => '问答',
			'description' => '请保持友善，互帮互助',
        ]);
        Category::create([
			'name'        => '公告',
			'description' => '站点公告',
        ]);
    }
}
