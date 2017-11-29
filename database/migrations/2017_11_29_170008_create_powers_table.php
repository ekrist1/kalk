<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePowersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('powers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('agreement_type')->nullable();
            $table->decimal('fee', 8,2);
            $table->decimal('price', 8,2);
            $table->decimal('invoice_fee', 8,2)->nullable();
            $table->string('company');
            $table->text('description')->nullable();
            $table->decimal('customer_score')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('powers');
    }
}
