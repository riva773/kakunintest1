<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
<<<<<<< HEAD:src/database/migrations/2014_10_12_000000_create_users_table.php
=======
    
>>>>>>> c5d9d0f (フォーム確認機能の実装(デザイン以外)):src/database/migrations/2025_03_20_212518_create_users_table.php
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
<<<<<<< HEAD:src/database/migrations/2014_10_12_000000_create_users_table.php
            $table->string('email')->unique();
=======
            $table->string('email');
>>>>>>> c5d9d0f (フォーム確認機能の実装(デザイン以外)):src/database/migrations/2025_03_20_212518_create_users_table.php
            $table->string('password');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}
