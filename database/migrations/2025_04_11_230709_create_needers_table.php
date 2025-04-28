<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNeedersTable extends Migration
{
    public function up()
    {
        Schema::create('needers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('password');
            $table->string('phone');
            $table->text('location');
            $table->string('blood_group_needed');
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('needers');
    }
}