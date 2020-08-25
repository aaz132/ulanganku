<?php

use Illuminate\Database\Seeder;

class map_user_hobbySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i <10 ; $i++) {
            DB::table('map_user_hobby')->insert([
                'id_user'=>rand(1,10),
                'id_hobby'=>rand(1,3),
                'status'=>'A'
            ]);
        }
    }
}
