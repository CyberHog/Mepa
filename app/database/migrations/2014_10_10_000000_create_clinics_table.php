<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClinicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::create('clinics', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('clinic_code')->unique();
            $table->string('clinic_name');
            $table->string('post_code')->nullable();
            $table->string('address1')->nullable();
            $table->string('address2')->nullable();
            $table->string('address3')->nullable();
            $table->string('tel')->unique();
            $table->string('tel2')->unique()->nullable();
            $table->string('fax')->unique()->nullable();
            $table->string('email')->unique();
            $table->string('email2')->unique()->nullable();
            $table->string('hp_url')->nullable();
            $table->date('start_date')->default(date('Ymd'));
            $table->date('end_date')->nullable();
            $table->string('organizer');
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
        Schema::dropIfExists('clinics');
    }
}
