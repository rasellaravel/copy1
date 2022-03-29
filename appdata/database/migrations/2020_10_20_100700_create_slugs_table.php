<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlugsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('slugs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('slug_en')->unique();
            $table->string('slug_lt')->unique();
            $table->string('slug_rus')->unique();
            $table->string('slug_pt')->unique();
            $table->string('slug_es')->unique();
            $table->integer("slugable_id");
            $table->string("slugable_type");
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
        Schema::dropIfExists('slugs');
    }
}
