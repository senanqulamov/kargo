<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCargoZonesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cargo_zones', function (Blueprint $table) {
            $table->id();
            $table->string('companyID');
            $table->string('countryID');
            $table->string('DESI');
            $table->string('zone1');
            $table->string('zone2');
            $table->string('zone3');
            $table->string('zone4');
            $table->string('zone5');
            $table->string('zone6');
            $table->string('zone7');
            $table->string('zone8');
            $table->string('zone9');
            $table->string('zone10');
            $table->string('zone11');
            $table->string('zone12');
            $table->string('zone13');
            $table->string('zone14');
            $table->string('zone15');
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
        Schema::dropIfExists('cargo_zones');
    }
}
