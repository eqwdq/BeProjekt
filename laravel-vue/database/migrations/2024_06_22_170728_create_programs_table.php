<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgramsTable extends Migration
{
    public function up()
    {
        Schema::create('programs', function (Blueprint $table) {
            $table->id();
            $table->string('day');
            $table->string('time');
            $table->string('title');
            $table->string('stage');
            $table->text('short_description');
            $table->text('long_description');
            $table->string('speaker');
            $table->string('speaker_link')->nullable();
            $table->string('image')->nullable();
            $table->integer('capacity')->default(0); // Add the capacity column
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('programs');
    }
}

