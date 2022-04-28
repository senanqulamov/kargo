<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCareerAppliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('career_applies', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('careerID')->unsigned();
            $table->string('fullname');
            $table->string('email');
            $table->text('message');
            $table->string('cvFile');
            $table->integer('status')->comment('1 => read, 2 => unread')->default(2);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();

            $table->foreign('careerID')->references('id')->on('careers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('career_applies');
    }
}
