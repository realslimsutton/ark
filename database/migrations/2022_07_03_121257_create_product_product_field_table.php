<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_product_field', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->index()->constrained()->cascadeOnDelete();
            $table->foreignId('product_field_id')->index()->constrained()->cascadeOnDelete();
            $table->json('config')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_product_field');
    }
};
