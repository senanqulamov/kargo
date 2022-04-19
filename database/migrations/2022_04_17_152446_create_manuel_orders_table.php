<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateManuelOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('manuel_orders', function (Blueprint $table) {
            $table->id();
            $table->integer('useraddressID');
            $table->string('IOSS');
            $table->string('Vat');
            $table->string('unit');
            $table->string('storage');            
            $table->integer('packageID');
            $table->integer('storageID');
            $table->integer('cargoID');
            $table->integer('additional_serviceID');
            $table->integer('product_content');
            $table->integer('document_fileID');
            $table->integer('status')->comment('0 => waiting')->default(0);
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
        Schema::dropIfExists('manuel_orders');
    }
}
