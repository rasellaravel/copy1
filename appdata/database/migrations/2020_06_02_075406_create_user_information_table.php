<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_information', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->nullable();
            $table->string('last_name')->comment('first_name is in user_table as name')->nullable();
            $table->string('phone')->nullable();
            $table->string('image')->nullable();
            $table->string('billing_country')->nullable();
            $table->string('billing_district')->nullable();
            $table->string('billing_town')->nullable();
            $table->string('billing_strt_address')->nullable();
            $table->string('billing_apartment')->nullable();
            $table->string('billing_post_code')->nullable();
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
        Schema::dropIfExists('user_information');
    }
}
