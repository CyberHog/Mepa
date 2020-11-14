<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('login_id', 12)->unique();
            $table->string('password');
            $table->string('clinic_code', 12);
            $table->foreign('clinic_code')->references('clinic_code')->on('clinics');
            $table->unsignedInteger('store_id');
            $table->foreign('store_id')->references('id')->on('stores');
            $table->boolean('password_flg')->nullable();
            $table->date('birth_day')->nullable();
            $table->date('enter_day');
            $table->date('leave_day')->nullable();
            $table->smallInteger('sex_status');
            $table->smallInteger('employment_status');
            $table->string('last_name');
            $table->string('first_name');
            $table->string('last_name_kana')->nullable();
            $table->string('first_name_kana')->nullable();
            $table->boolean('admin_flg')->default(false);
            $table->string('tel', 12)->unique();
            $table->string('tel2', 12)->unique()->nullable();
            $table->string('email', 100)->unique();
            $table->string('email2', 100)->unique()->nullable();
            $table->string('post_code', 7)->nullable();
            $table->string('address1')->nullable();
            $table->string('address2')->nullable();
            $table->string('address3')->nullable();
            $table->smallInteger('display_order');
            $table->dateTime('created_at')->default(date('Y-m-d H:i:s'));
            $table->dateTime('updated_at')->default(date('Y-m-d H:i:s'));;
            $table->boolean('delete_flg')->default(false);
            $table->string('created_user', 12);
            $table->string('updated_user', 12);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
