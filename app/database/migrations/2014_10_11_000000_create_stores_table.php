<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::create('stores', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('store_code');
            $table->string('store_name');
            $table->string('clinic_code');
            $table->foreign('clinic_code')->references('clinic_code')->on('clinics');
            $table->string('post_code')->nullable();
            $table->string('address1')->nullable();
            $table->string('address2')->nullable();
            $table->string('address3')->nullable();
            $table->string('tel')->nullable();
            $table->string('tel2')->nullable();
            $table->string('fax')->nullable();
            $table->string('email')->nullable();
            $table->string('email2')->nullable();
            $table->string('hp_url')->nullable();
            $table->date('start_date')->default(date('Ymd'));
            $table->date('end_date')->nullable();
            $table->string('director');
            $table->smallInteger('display_order');
            $table->dateTime('created_at')->default(date('Y-m-d H:i:s'));
            $table->dateTime('updated_at')->default(date('Y-m-d H:i:s'));
            $table->boolean('delete_flg')->default(false);
            $table->string('created_user');
            $table->string('updated_user');
        });
        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stores');
    }
}
