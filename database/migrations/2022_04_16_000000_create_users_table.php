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
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('image')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');     
            $table->string('phone')->unique();
            $table->timestamp('phone_verified_at')->nullable();  
            $table->integer('sex')->comment('1 => man, 2 => woman'); 
            $table->integer('status')->comment('1 => active, NULL => passive')->nullable(); 
            $table->text('promotion')->nullable(); 
            $table->text('store'); 
            $table->text('referer');    
            $table->integer('shipment')->nullable(); 
            $table->rememberToken();
            $table->softDeletes();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });
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
