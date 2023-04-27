<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAirlinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('airlines', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('name')->unique();
            $table->string('country')->nullable();
            $table->string('logo')->nullable();
            $table->string('slogan')->nullable();
            $table->string('head_quaters')->nullable();
            $table->string('website')->nullable();
            $table->string('established')->nullable();
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
        Schema::dropIfExists('airlines');
    }
}
