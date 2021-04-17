<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotes', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('from_id');
            $table->bigInteger('to_id');
            $table->text('quote')->nullable();
            $table->string('accept_or_reject')->nullable();
            $table->string('photographer_name')->nullable();
            $table->string('user_name')->nullable();
            $table->text('photographer_profilepic')->nullable();
            $table->text('user_profilepic')->nullable();
            $table->string('user_email')->nullable();
            $table->string('photographer_email')->nullable();
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
        Schema::dropIfExists('quotes');
    }
}
