<?php

use Illuminate\Database\Seeder;
use App\Models\Menu;
class MenuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Menu::create([
			'parent_id' => 0,
			'name'      => '内容管理',
			'icon'      => '',
			'url'       => 'admin/manager',
			'active'    => 'admin/manager*,admin/cagetory*,admin/topic*,admin/reply*',
        ]);
        Menu::create([
			'parent_id' => 0,
			'name'      => '用户与权限',
			'icon'      => '',
			'url'       => 'admin/manager',
			'active'    => 'admin/manager*,admin/users*,admin/role*,admin/permission*',
        ]);
        Menu::create([
			'parent_id' => 0,
			'name'      => '站点管理',
			'icon'      => '',
			'url'       => 'admin/setting',
			'active'    => 'admin/setting*,admin/site*',
        ]);
        Menu::create([
			'parent_id' => 1,
			'name'      => '分类',
			'icon'      => '',
			'url'       => 'admin/cagetory',
			'active'    => 'admin/cagetory*',
        ]);
        Menu::create([
			'parent_id' => 1,
			'name'      => '话题',
			'icon'      => '',
			'url'       => 'admin/topic',
			'active'    => 'admin/topic*',
        ]);
        Menu::create([
			'parent_id' => 1,
			'name'      => '回复',
			'icon'      => '',
			'url'       => 'admin/reply',
			'active'    => 'admin/reply*',
        ]);
        
        Menu::create([
			'parent_id' => 2,
			'name'      => '用户管理',
			'icon'      => '',
			'url'       => 'admin/users',
			'active'    => 'admin/users*',
        ]);
        Menu::create([
			'parent_id' => 2,
			'name'      => '角色管理',
			'icon'      => '',
			'url'       => 'admin/role',
			'active'    => 'admin/role*',
        ]);
        Menu::create([
			'parent_id' => 2,
			'name'      => '权限管理',
			'icon'      => '',
			'url'       => 'admin/permission',
			'active'    => 'admin/permission*',
        ]);
        Menu::create([
			'parent_id' => 3,
			'name'      => '站点设置',
			'icon'      => '',
			'url'       => 'admin/site',
			'active'    => 'admin/site*',
        ]);
        
    }
}
