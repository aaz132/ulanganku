<?php

use Illuminate\Database\Seeder;

class hobbiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $hobbies=array(
            array('name'=>'eat', 'point'=>'3'),
            array('name'=>'sing', 'point'=>'4'),
            array('name'=>'sleep', 'point'=>'5')
        );
        foreach ($hobbies as $hobby => $value) {
            DB::table('hobbies')->insert([
                'name'=>$value['name'],
                'point'=>$value['point']
            ]);
        }
       
    }
}
