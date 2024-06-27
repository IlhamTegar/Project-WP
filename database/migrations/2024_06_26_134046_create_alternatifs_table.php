<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlternatifsTable extends Migration
{
    public function up()
    {
        Schema::create('alternatifs', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->integer('teknik');
            $table->integer('fisik');
            $table->integer('intelejen');
            $table->integer('mental');
            $table->integer('usia');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('alternatifs');
    }
}
