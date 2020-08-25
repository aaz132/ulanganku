<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyToMapUserHobbyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('map_user_hobby', function (Blueprint $table) {
            //
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_hobby')->references('id')->on('hobbies')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('map_user_hobby', function (Blueprint $table) {
            //
        });
    }
}
