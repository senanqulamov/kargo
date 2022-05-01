<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('title', 150);
            $table->string('logo', 40)->default('logo.svg');
            $table->string('phone', 17)->unique();
            $table->string('email', 60)->unique();  
            $table->string('address', 200);                       
            $table->text('description');
            $table->integer('status')->comment('1 => admin, cargo');
            $table->integer('state')->default('1')->comment('1 => active, 2 => passive, 3 => waiting');   
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
        Schema::dropIfExists('companies');
    }
}
