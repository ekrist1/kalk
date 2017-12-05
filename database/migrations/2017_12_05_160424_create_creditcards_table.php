<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCreditcardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('creditcards', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('description')->nullable();
            $table->integer('interestfree_days')->nullable();
            $table->decimal('yearly_fee', 8,2)->nullable();
            $table->decimal('no_withdrawal_fixed_fee', 7,2)->nullable();
            $table->decimal('no_withdrawal_percentage_fee', 12,4)->nullable();
            $table->decimal('foreign_withdrawal_fixed_fee', 7,2)->nullable();
            $table->decimal('foreign_withdrawal_percentage_fee', 14,4)->nullable();
            $table->decimal('foreign_currency_fee', 6,2)->nullable();
            $table->decimal('effective_interest_rate',12,4)->nullable();
            $table->decimal('nominal_interest_rate',12,4)->nullable();
            $table->decimal('max_credit', 15,2)->nullable();
            $table->decimal('minimum_payment', 8,2)->nullable();
            $table->text('benefits')->nullable();
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
        Schema::dropIfExists('creditcards');
    }
}
