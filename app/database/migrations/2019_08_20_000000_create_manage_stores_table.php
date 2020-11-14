<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ManageStoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('manage_stores', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('clinic_code', 12);
            $table->unsignedInteger('store_id');
            $table->bigInteger('user_id')->references('id')->on('users');
            $table->string('role_code', 3);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('manage_stores');
    }
}
