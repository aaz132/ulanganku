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
            array('name'=>'Frasch', 'gender'=>'F', 'status'=>'unset'),
            array('name'=>'Garmuth', 'gender'=>'M', 'status'=>'unset'),
            array('name'=>'Goliath', 'gender'=>'M', 'status'=>'unset'),
            array('name'=>'Luna', 'gender'=>'F', 'status'=>'unset'),
            array('name'=>'Zeus', 'gender'=>'M', 'status'=>'unset'),
            array('name'=>'Aphrodite', 'gender'=>'F', 'status'=>'unset'),
            array('name'=>'Ares', 'gender'=>'M', 'status'=>'unset'),
            array('name'=>'Lina', 'gender'=>'F', 'status'=>'unset'),
            array('name'=>'Lanaya', 'gender'=>'F', 'status'=>'unset'),
            array('name'=>'Hades', 'gender'=>'M', 'status'=>'unset')
        );
        foreach ($users as $user => $value) {
            DB::table('users')->insert([
                'name'=>$value['name'],
                'gender'=>$value['gender'],
                'status'=>$value['status']
            ]);
        }
    }
}
