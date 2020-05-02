<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profile', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name'); // 氏名を保存するカラム php/laravel14課題
            $table->string('gender'); // 性別を保存するカラム php/laravel14課題
            $table->string('hobby'); // 趣味を保存するカラム php/laravel14課題
            $table->string('introduction'); // 自己紹介を保存するカラム php/laravel14課題
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profile');
    }
}
