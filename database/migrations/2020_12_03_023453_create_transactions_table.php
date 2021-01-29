<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('add', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->default(0)->index();
            $table->string('firstname');
            $table->string('lastname');
            $table->integer('total')->default(0);
            $table->integer('status')->default(0)->index();
            $table->string('phone');
            $table->string('email');
            $table->string('note')->nullable();
            $table->string('province_city');
            $table->string('district');
            $table->string('village');
            $table->string('hamlet')->nullable();
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
