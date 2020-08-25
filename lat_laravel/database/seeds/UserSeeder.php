<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users=array(
            array('name'=>'Revi', 'email'=>'revi@gmail.com', 'password'=>'revipermana', 'kelas'=>'RPL XII-B')
        );
        foreach ($users as $user => $value) {
            DB::table('users')->insert([
                'name'=>$value['name'],
                'email'=>$value['email'],
                'password'=>$value['password'],
                'kelas'=>$value['kelas']
            ]);
        }
    }
}
