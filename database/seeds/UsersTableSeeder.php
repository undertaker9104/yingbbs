<?php

use Illuminate\Database\Seeder;
use App\Models\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 獲取 Faker 实例
        $faker = app(Faker\Generator::class);

        // 大頭貼數據
        $avatars = [
            'https://iocaffcdn.phphub.org/uploads/images/201710/14/1/s5ehp11z6s.png?imageView2/1/w/200/h/200',
            'https://iocaffcdn.phphub.org/uploads/images/201710/14/1/Lhd1SHqu86.png?imageView2/1/w/200/h/200',
            'https://iocaffcdn.phphub.org/uploads/images/201710/14/1/LOnMrqbHJn.png?imageView2/1/w/200/h/200',
            'https://iocaffcdn.phphub.org/uploads/images/201710/14/1/xAuDMxteQy.png?imageView2/1/w/200/h/200',
            'https://iocaffcdn.phphub.org/uploads/images/201710/14/1/ZqM7iaP4CR.png?imageView2/1/w/200/h/200',
            'https://iocaffcdn.phphub.org/uploads/images/201710/14/1/NDnzMutoxX.png?imageView2/1/w/200/h/200',
        ];

        // 生成數據集合
        $users = factory(User::class)
                        ->times(5)
                        ->make()
                        ->each(function ($user, $index)
                            use ($faker, $avatars)
        {
            // 從大頭貼數組中隨機取出一個並赋值
            $user->avatar = $faker->randomElement($avatars);
        });

        // 讓隐藏自段可見，並將數據集合轉換為數组
        $user_array = $users->makeVisible(['password', 'remember_token'])->toArray();

        // 插入到數據庫中
        User::insert($user_array);

        // 單獨處理第一个用户的數據
        $user = User::find(1);
        $user->name = 'Ying';
        $user->email = 'undertaker9104@gmail.com';
        $user->avatar = 'https://iocaffcdn.phphub.org/uploads/images/201710/14/1/ZqM7iaP4CR.png?imageView2/1/w/200/h/200';
        $user->save();

        //初始化腳色,將1號用戶指定為站長
        $user->assignRole('Founder');

        //將2號指定為管理員
        $user = User::find(2);
        $user->assignRole('Maintainer');

    }
}
