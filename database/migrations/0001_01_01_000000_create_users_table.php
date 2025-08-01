<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
        public function up()
        {
            Schema::create('users', function (Blueprint $table) {
                $table->id();
                $table->string('username');
                $table->string('email')->unique();
                $table->string('phone')->unique();
                $table->string('location');
                $table->string('password');
                $table->timestamps();
            });
    }
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
