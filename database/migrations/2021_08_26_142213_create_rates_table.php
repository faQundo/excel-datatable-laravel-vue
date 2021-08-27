<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('contract_id');
            $table->foreign('contract_id')->references('id')->on('contracts');
            $table->string('origin')->nullable();
            $table->string('destination')->nullable();
            $table->string('currency')->nullable();
            $table->string('twenty')->nullable();
            $table->string('forty')->nullable();
            $table->string('fortyhc')->nullable();
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
        Schema::dropIfExists('rates');
    }
}
