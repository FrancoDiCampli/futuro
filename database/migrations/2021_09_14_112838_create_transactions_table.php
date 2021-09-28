<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->morphs('movable');
            $table->string('gateway');
            $table->string('charge_id');
            $table->integer('amount');
            $table->string('description')->nullable();
            $table->string('reference')->nullable();
            $table->string('kind');
            $table->string('status');
            $table->string('error_code')->nullable();
            $table->boolean('is_test');
            $table->string('last_four');
            $table->string('brand');
            $table->longText('payload');
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
        Schema::dropIfExists('transactions');
    }
}
